<?php
namespace Ficus;

class Icd extends Base\Icd {
        
    private $show_approved_only;
    private $filename;
    private $is_order_file;
    
    /**
     * Returns the is_order_file
     * @return boolean
     */
    function getIsOrderFile() {
        if (is_null($this->is_order_file)) {
            $this->is_order_file = false;
        }
        return $this->is_order_file;
    }
    
    /**
     * Sets the is_order_file
     * @var boolean
     */
    function setIsOrderFile($arg0) {
        $this->is_order_file = $arg0;
        $this->addModifiedColumn("is_order_file");
        return $this;
    }   
    
    /**
     * Returns the filename
     * @return string
     */
    function getFilename() {
        if (is_null($this->filename)) {
            $this->filename = "";
        }
        return $this->filename;
    }
    
    /**
     * Sets the filename
     * @var string
     */
    function setFilename($arg0) {
        $this->filename = $arg0;
        $this->addModifiedColumn("filename");
        return $this;
    }
    
    /**
     * Returns the show_approved_only
     * @return boolean
     */
    function getShowApprovedOnly() {
        if (is_null($this->show_approved_only)) {
            $this->show_approved_only = false;
        }
        return $this->show_approved_only;
    }
    
    /**
     * Sets the show_approved_only
     * @var boolean
     */
    function setShowApprovedOnly($arg0) {
        $this->show_approved_only = (boolean)$arg0;
        $this->addModifiedColumn("show_approved_only");
        return $this;
    }
    
    /**
     * Returns the user based on the criteria
     * @return Ficus\User
     */
    function queryAll(array $criteria = array(), array $fields = array(), $hydrate = true, $timeout = 30000) {
        if (trim($this->getName()) != '') {
            $criteria['name'] = new \MongoRegex("/" . $this->getName() . "/i");
        }
        if ($this->getShowApprovedOnly()) {
            $criteria['approved'] = true;
        }
        return parent::queryAll($criteria, $fields, $hydrate, $timeout);
    }
    
    /**
     * Imports records from the filename into the database
     * @return integer
     */
    function import() {
        try {
            if (file_exists($this->getFilename())) {
                if (($fh = fopen($this->getFilename(), 'r')) !== false) {
                    $mongo_import_obj = new \MongoUpdateBatch($this->getCollection(), array('w' => 1, 'socketTimeoutMS' => -1, 'wTimeoutMS' => -1, 'ordered' => false, 'continueOnError' => true));
                    $category_name = "";
                    $counter = 0;
                    while (($line = fgets($fh, 4096)) !== false) {
                        $counter++;
                        
                        if ($this->getIsOrderFile()) {
                            $order = trim(substr($line, 0, 5));
                            $code = trim(substr($line, 6, 7));
                            $is_category = (trim(substr($line, 14, 1)) == "0");
                            $name = trim(substr($line, 16, 60));
                            $description = trim(substr($line, 77));
                            // Approve any code that begins with F
                            /* @todo make this a setting that can be customized */
                            $approved = (strpos($code, 'F') === 0);
                            
                            if ($is_category) {
                                $category_name = $code . " - " . $name;
                            } else {
                                $mongo_import_obj->add(array(
                                    'q' => array('code' => $code),
                                    'u' => array(
                                        '$setOnInsert' => array(
                                            'code' => $code
                                        ),
                                        '$set' => array(
                                            'name' => $name,
                                            'description' => $description,
                                            'category' => $category_name,
                                            'approved' => $approved
                                        )),
                                    'upsert' => true
                                ));
                            }
                        } else {
                            $code = trim(substr($line, 0, 7));
                            $name = trim(substr($line, 8));
                            // Approve any code that begins with F
                            /* @todo make this a setting that can be customized */
                            $approved = (strpos($code, 'F') === 0);
                            
                            $mongo_import_obj->add(array(
                                'q' => array('code' => $code),
                                'u' => array(
                                        '$setOnInsert' => array(
                                            'code' => $code
                                        ), 
                                        '$set' => array(
                                            'name' => $name,
                                            'approved' => $approved
                                        )),
                                'upsert' => true
                            ));
                        }
                    }   
                    
                    $rows_affected_array = $mongo_import_obj->execute();
                    
                    fclose($fh);
                    
                    return ($rows_affected_array['nUpserted'] + $rows_affected_array['nMatched']);
                } else {
                    throw new \Exception('Cannot open file ' . $this->getFilename() . ' for reading');
                }
            } else {
                throw new \Exception('Cannot find file ' . $this->getFilename() . ' to open');
            }
        } catch (\Exception $e) {
            throw $e;
        }
        
        return 0;
    }
    
}