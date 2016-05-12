<?php
namespace Ficus\Base;

use Mojavi\Form\MongoForm;

class Client extends MongoForm {
    
    const GENDER_MALE = "m";
    const GENDER_FEMALE = "f";
    const GENDER_ANDROGYNOUS = "a";
    
    protected $firstname;
    protected $lastname;
    protected $mailing;
    protected $dob;
    protected $start_of_care;
    protected $gender;
    protected $ssn;
    protected $spouse_name;
    protected $emergency_contacts;
    protected $important_dates;
    protected $profile_image_url;
    
    protected $policy_number;
    protected $insurer;
    protected $tpa_client_id;
    
    protected $policy;
    protected $provider;
    
    protected $location;
    protected $pcp;
    protected $employer;
    protected $emergency_contact;
    protected $nok;
    protected $clinical;
    protected $extra;
    
    /**
     * Constructs new user
     * @return void
     */
    function __construct() {
        $this->setCollectionName('client');
        $this->setDbName('default');
    }
    
    /**
     * Returns the clients name
     * @return string
     */
    function getName($reversed = false) {
        $ret_val = '';
        if ($reversed) {
            $ret_val = $this->getLastname();
            if (trim($this->getFirstname()) != '') {
                $ret_val .= ', ';
            }
            $ret_val .= $this->getFirstname();
        } else {
            $ret_val = $this->getFirstname();
            if (trim($this->getLastname()) != '') {
                $ret_val .= ' ';
            }
            $ret_val .= $this->getLastname();
        }
        return trim($ret_val);
    }
    
    /**
     * Returns the firstname
     * @return string
     */
    function getFirstname() {
        if (is_null($this->firstname)) {
            $this->firstname = "";
        }
        return $this->firstname;
    }
    
    /**
     * Sets the firstname
     * @var string
     */
    function setFirstname($arg0) {
        $this->firstname = $arg0;
        $this->addModifiedColumn("firstname");
        return $this;
    }
    
    /**
     * Returns the lastname
     * @return string
     */
    function getLastname() {
        if (is_null($this->lastname)) {
            $this->lastname = "";
        }
        return $this->lastname;
    }
    
    /**
     * Sets the lastname
     * @var string
     */
    function setLastname($arg0) {
        $this->lastname = $arg0;
        $this->addModifiedColumn("lastname");
        return $this;
    }
    
    /**
     * Returns the mailing
     * @return \Ficus\Link\Contact
     */
    function getMailing() {
        if (is_null($this->mailing)) {
            $this->mailing = new \Ficus\Link\Contact();
        }
        return $this->mailing;
    }
    
    /**
     * Sets the mailing
     * @var \Ficus\Link\Contact
     */
    function setMailing($arg0) {
        if (is_array($arg0)) {
            $this->mailing = new \Ficus\Link\Contact();
            $this->mailing->populate($arg0);
        } else if ($arg0 instanceof \Ficus\Link\Contact) {
            $this->mailing = $arg0;
        }
        $this->addModifiedColumn("mailing");
        return $this;
    }
    
    /**
     * Returns the dob
     * @return \MongoDate
     */
    function getDob() {
        if (is_null($this->dob)) {
            $this->dob = new \MongoDate();
        }
        return $this->dob;
    }
    
    /**
     * Sets the dob
     * @var \MongoDate
     */
    function setDob($arg0) {
        $this->dob = $arg0;
        $this->addModifiedColumn("dob");
        return $this;
    }
    
    /**
     * Returns the profile_image_url
     * @return string
     */
    function getProfileImageUrl() {
        if (is_null($this->profile_image_url)) {
            $this->profile_image_url = "";
        }
        return $this->profile_image_url;
    }
    
    /**
     * Sets the profile_image_url
     * @var string
     */
    function setProfileImageUrl($arg0) {
        $this->profile_image_url = $arg0;
        $this->addModifiedColumn("profile_image_url");
        return $this;
    }
    
    /**
     * Returns the start_of_care
     * @return \MongoDate
     */
    function getStartOfCare() {
        if (is_null($this->start_of_care)) {
            $this->start_of_care = new \MongoDate();
        }
        return $this->start_of_care;
    }
    
    /**
     * Sets the start_of_care
     * @var \MongoDate
     */
    function setStartOfCare($arg0) {
        $this->start_of_care = $arg0;
        $this->addModifiedColumn("start_of_care");
        return $this;
    }
    
    /**
     * Returns the gender
     * @return string
     */
    function getGender() {
        if (is_null($this->gender)) {
            $this->gender = self::GENDER_MALE;
        }
        return $this->gender;
    }
    
    /**
     * Sets the gender
     * @var string
     */
    function setGender($arg0) {
        $this->gender = $arg0;
        $this->addModifiedColumn("gender");
        return $this;
    }
    
    /**
     * Returns the ssn
     * @return string
     */
    function getSsn() {
        if (is_null($this->ssn)) {
            $this->ssn = "";
        }
        return $this->ssn;
    }
    
    /**
     * Sets the ssn
     * @var string
     */
    function setSsn($arg0) {
        $this->ssn = $arg0;
        $this->addModifiedColumn("ssn");
        return $this;
    }
    
    /**
     * Returns the emergency_contacts
     * @return array
     */
    function getEmergencyContacts() {
        if (is_null($this->emergency_contacts)) {
            $this->emergency_contacts = array();
        }
        return $this->emergency_contacts;
    }
    
    /**
     * Sets the emergency_contacts
     * @var array
     */
    function setEmergencyContacts($arg0) {
        $this->emergency_contacts = array();
        if (is_array($arg0)) {
            foreach ($arg0 as $contact) {
                if (is_array($contact)) {
                    $new_contact = new \Ficus\Link\EmergencyContact();
                    $new_contact->populate($contact);
                    $this->emergency_contacts[] = $new_contact;
                } else if ($contact instanceof \Ficus\Link\EmergencyContact) {
                    $this->emergency_contacts[] = $contact;
                }
            }
        } else if ($arg0 instanceof \Ficus\Link\EmergencyContact) {
            $this->emergency_contacts[] = $arg0;
        }
        $this->addModifiedColumn("emergency_contacts");
        return $this;
    }
    
    /**
     * Returns the policy_number
     * @return string
     */
    function getPolicyNumber() {
        if (is_null($this->policy_number)) {
            $this->policy_number = "";
        }
        return $this->policy_number;
    }
    
    /**
     * Sets the policy_number
     * @var string
     */
    function setPolicyNumber($arg0) {
        $this->policy_number = $arg0;
        $this->addModifiedColumn("policy_number");
        return $this;
    }
    
    /**
     * Returns the insurer
     * @return string
     */
    function getInsurer() {
        if (is_null($this->insurer)) {
            $this->insurer = "";
        }
        return $this->insurer;
    }
    
    /**
     * Sets the insurer
     * @var string
     */
    function setInsurer($arg0) {
        $this->insurer = $arg0;
        $this->addModifiedColumn("insurer");
        return $this;
    }
    
    /**
     * Returns the tpa_client_id
     * @return string
     */
    function getTpaClientId() {
        if (is_null($this->tpa_client_id)) {
            $this->tpa_client_id = "";
        }
        return $this->tpa_client_id;
    }
    
    /**
     * Sets the tpa_client_id
     * @var string
     */
    function setTpaClientId($arg0) {
        $this->tpa_client_id = $arg0;
        $this->addModifiedColumn("tpa_client_id");
        return $this;
    }
    
    /**
     * Returns the insurance
     * @return \Ficus\Link\ClientInsurance
     */
    function getInsurance() { return $this->getPolicy(); }
    
    /**
     * Sets the policy
     * @var \Ficus\Link\ClientInsurance
     */
    function setInsurance($arg0) { return $this->setPolicy($arg0); }

    /**
     * Returns the policy
     * @return \Ficus\Link\ClientInsurance
     */
    function getPolicy() {
        if (is_null($this->policy)) {
            $this->policy = new \Ficus\Link\ClientInsurance();
        }
        return $this->policy;
    }
    
    /**
     * Sets the policy
     * @var \Ficus\Link\ClientInsurance
     */
    function setPolicy($arg0) {
        if (is_array($arg0)) {
            $this->policy = new \Ficus\Link\ClientInsurance();
            $this->policy->populate($arg0);
        } else if ($arg0 instanceof \Ficus\Link\ClientInsurance) {
            $this->policy = $arg0;
        }
        $this->addModifiedColumn("policy");
        return $this;
    }
    
    /**
     * Returns the employer
     * @return \Ficus\Link\Employer
     */
    function getEmployer() {
        if (is_null($this->employer)) {
            $this->employer = new \Ficus\Link\Employer();
        }
        return $this->employer;
    }
    
    /**
     * Sets the employer
     * @var \Ficus\Link\Employer
     */
    function setEmployer($arg0) {
        if (is_array($arg0)) {
            $this->employer = new \Ficus\Link\Employer();
            $this->employer->populate($arg0);
        } else if ($arg0 instanceof \Ficus\Link\Employer) {
            $this->employer = $arg0;
        }
        $this->addModifiedColumn("employer");
        return $this;
    }
    
    /**
     * Returns the provider
     * @return \Ficus\Link\Provider
     */
    function getProvider() {
        if (is_null($this->provider)) {
            $this->provider = new \Ficus\Link\Provider();
        }
        return $this->provider;
    }
    
    /**
     * Sets the provider
     * @var \Ficus\Link\Provider
     */
    function setProvider($arg0) {
        if (is_array($arg0)) {
            $this->provider = new \Ficus\Link\Provider();
            $this->provider->populate($arg0);
        } else if ($arg0 instanceof \Ficus\Link\Provider) {
            $this->provider = $arg0;
        }
        $this->addModifiedColumn("provider");
        return $this;
    }
    
    /**
     * Returns the location
     * @return \Ficus\Link\Location
     */
    function getLocation() {
        if (is_null($this->location)) {
            $this->location = new \Ficus\Link\Location();
        }
        return $this->location;
    }
    
    /**
     * Sets the location
     * @var \Ficus\Link\Location
     */
    function setLocation($arg0) {
        if (is_array($arg0)) {
            $this->location = new \Ficus\Link\Location();
            $this->location->populate($arg0);
        } else if ($arg0 instanceof \Ficus\Link\Location) {
            $this->location = $arg0;
        }
        $this->addModifiedColumn("location");
        return $this;
    }
    
    /**
     * Returns the clinical
     * @return \Ficus\Link\Clinical
     */
    function getClinical() {
        if (is_null($this->clinical)) {
            $this->clinical = new \Ficus\Link\Clinical();
        }
        return $this->clinical;
    }
    
    /**
     * Sets the clinical
     * @var \Ficus\Link\Clinical
     */
    function setClinical($arg0) {
        if (is_array($arg0)) {
            $this->clinical = new \Ficus\Link\Clinical();
            $this->clinical->populate($arg0);
        } else if ($arg0 instanceof \Ficus\Link\Clinical) {
            $this->clinical = $arg0;
        }
        $this->addModifiedColumn("clinical");
        return $this;
    }
    
    /**
     * Returns the pcp
     * @return \Ficus\Link\Physician
     */
    function getPcp() {
        if (is_null($this->pcp)) {
            $this->pcp = new \Ficus\Link\Physician();
        }
        return $this->pcp;
    }
    
    /**
     * Alias for getPcp()
     * @return \Ficus\Link\Physician
     */
    function getPrimaryCarePhysician() { return $this->getPcp(); }
    
    /**
     * Sets the pcp
     * @var \Ficus\Link\Physician
     */
    function setPhysician($arg0) {
        if (is_array($arg0)) {
            $this->pcp = new \Ficus\Link\Physician();
            $this->pcp->populate($arg0);
        } else if ($arg0 instanceof \Ficus\Link\Physician) {
            $this->pcp = $arg0;
        }
        $this->addModifiedColumn("pcp");
        return $this;
    }
    
    /**
     * Alias for setPcp($arg0)
     * @return \Ficus\Link\Physician
     */
    function setPrimaryCarePhysician($arg0) { return $this->setPcp($arg0); }
    
    /**
     * Returns the extra client information
     * @return \Ficus\Link\ClientExtra
     */
    function getExtra() {
        if (is_null($this->extra)) {
            $this->extra = new \Ficus\Link\ClientExtra();
        }
        return $this->extra;
    }
    
    /**
     * Sets the extra client information
     * @var \Ficus\Link\ClientExtra
     */
    function setExtra($arg0) {
        if (is_array($arg0)) {
            $this->extra = new \Ficus\Link\ClientExtra();
            $this->extra->populate($arg0);
        } else if ($arg0 instanceof \Ficus\Link\ClientExtra) {
            $this->extra = $arg0;
        }
        $this->addModifiedColumn("extra");
        return $this;
    }
}