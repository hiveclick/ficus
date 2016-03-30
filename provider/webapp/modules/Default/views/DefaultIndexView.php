<?php
// +----------------------------------------------------------------------------+
// | This file is part of the Flux package.									  |
// |																			|
// | For the full copyright and license information, please view the LICENSE	|
// | file that was distributed with this source code.						   |
// +----------------------------------------------------------------------------+
use Mojavi\View\BasicView;

class DefaultIndexView extends BasicView
{

    private $active_menu;
    
	// +-----------------------------------------------------------------------+
	// | METHODS															   |
	// +-----------------------------------------------------------------------+

	/**
	 * Execute any presentation logic and set template attributes.
	 *
	 * @return void
	 */
	public function execute ()
	{
		parent::execute();
		// set our template

		// set the title
		$this->setTitle('Ficus');

		$this->setDecoratorTemplate(MO_TEMPLATE_DIR . "/index.shell.php");

	}
	
	/**
	 * Returns the active_menu
	 * @return string
	 */
	function getActiveMenu() {
	    if (is_null($this->active_menu)) {
	        $this->active_menu = "";
	    }
	    return $this->active_menu;
	}
	
	/**
	 * Sets the active_menu
	 * @var string
	 */
	function setActiveMenu($arg0) {
	    $this->active_menu = $arg0;
	    return $this;
	}
	
	/**
	 * Returns the menu
	 * @return Zend\Navigation
	 */
	function getMenu() {		
		$navigation_config = MO_WEBAPP_DIR . '/config/navigation.xml';
		
		if (file_exists($navigation_config)) {
			$navigation_contents = file_get_contents($navigation_config);
			
			// Load the modified menu
			require(MO_WEBAPP_DIR . "/lib/vendor/autoload.php");
			$reader = new \Zend\Config\Reader\Xml();
			$data   = $reader->fromString($navigation_contents);
			$zend_navigation = new \Zend\Navigation\Navigation($data);
			if (isset($_SERVER['REQUEST_URI'])) {
			    foreach ($zend_navigation->getPages() as $page) {
			        if ($page->hasPages(true)) {
			            /* @var $child_page \Zend\Navigation\Page\Uri */
			            $pages = $page->getPages();
			            foreach ($pages as $child_page) {
			                if ($child_page->getUri() == trim($_SERVER['REQUEST_URI'])) {
			                    $child_page->setClass('active');
			                    $page->setClass('active');
			                } else if (trim($this->getActiveMenu()) != '' && ($child_page->getUri() == $this->getActiveMenu())) {
			                    $child_page->setClass('active');
			                    $page->setClass('active');
			                }
			            }
			        }
			        if ($page->getUri() == trim($_SERVER['REQUEST_URI'])) {
			            $page->setClass('active');
			        } else if (trim($this->getActiveMenu()) != '' && ($page->getUri() == $this->getActiveMenu())) {
			            $page->setClass('active');
			        }
			    }
			}
			return $zend_navigation;
		}
		return null;
	}

}