<?php
class Customer extends Model {
    var $cust_id = '';
	var $cust_company = '';
	var $cust_lname = '';
	var $cust_fname = '';
	var $cust_address = '';
	var $cust_city = '';
	var $cust_state = '';
	var $cust_zip = '';
	var $region_id = '';
	var $cust_phone = '';
	var $cust_fax = '';
	var $cust_email = '';

    function Blogmodel()
    {
        // Call the Model constructor
        parent::Model();
    }
	
	public function save()
	{
		
	}
	
	
	/**
     * Returns $cust_address.
     *
     * @see Customer::$cust_address
     */
    public function getCust_address() {
        return $this->cust_address;
    }
    
    /**
     * Sets $cust_address.
     *
     * @param object $cust_address
     * @see Customer::$cust_address
     */
    public function setCust_address($cust_address) {
        $this->cust_address = $cust_address;
    }
    
    /**
     * Returns $cust_city.
     *
     * @see Customer::$cust_city
     */
    public function getCust_city() {
        return $this->cust_city;
    }
    
    /**
     * Sets $cust_city.
     *
     * @param object $cust_city
     * @see Customer::$cust_city
     */
    public function setCust_city($cust_city) {
        $this->cust_city = $cust_city;
    }
    
    /**
     * Returns $cust_company.
     *
     * @see Customer::$cust_company
     */
    public function getCust_company() {
        return $this->cust_company;
    }
    
    /**
     * Sets $cust_company.
     *
     * @param object $cust_company
     * @see Customer::$cust_company
     */
    public function setCust_company($cust_company) {
        $this->cust_company = $cust_company;
    }
    
    /**
     * Returns $cust_email.
     *
     * @see Customer::$cust_email
     */
    public function getCust_email() {
        return $this->cust_email;
    }
    
    /**
     * Sets $cust_email.
     *
     * @param object $cust_email
     * @see Customer::$cust_email
     */
    public function setCust_email($cust_email) {
        $this->cust_email = $cust_email;
    }
    
    /**
     * Returns $cust_fax.
     *
     * @see Customer::$cust_fax
     */
    public function getCust_fax() {
        return $this->cust_fax;
    }
    
    /**
     * Sets $cust_fax.
     *
     * @param object $cust_fax
     * @see Customer::$cust_fax
     */
    public function setCust_fax($cust_fax) {
        $this->cust_fax = $cust_fax;
    }
    
    /**
     * Returns $cust_fname.
     *
     * @see Customer::$cust_fname
     */
    public function getCust_fname() {
        return $this->cust_fname;
    }
    
    /**
     * Sets $cust_fname.
     *
     * @param object $cust_fname
     * @see Customer::$cust_fname
     */
    public function setCust_fname($cust_fname) {
        $this->cust_fname = $cust_fname;
    }
    
    /**
     * Returns $cust_id.
     *
     * @see Customer::$cust_id
     */
    public function getCust_id() {
        return $this->cust_id;
    }
    
    /**
     * Sets $cust_id.
     *
     * @param object $cust_id
     * @see Customer::$cust_id
     */
    public function setCust_id($cust_id) {
        $this->cust_id = $cust_id;
    }
    
    /**
     * Returns $cust_lname.
     *
     * @see Customer::$cust_lname
     */
    public function getCust_lname() {
        return $this->cust_lname;
    }
    
    /**
     * Sets $cust_lname.
     *
     * @param object $cust_lname
     * @see Customer::$cust_lname
     */
    public function setCust_lname($cust_lname) {
        $this->cust_lname = $cust_lname;
    }
    
    /**
     * Returns $cust_phone.
     *
     * @see Customer::$cust_phone
     */
    public function getCust_phone() {
        return $this->cust_phone;
    }
    
    /**
     * Sets $cust_phone.
     *
     * @param object $cust_phone
     * @see Customer::$cust_phone
     */
    public function setCust_phone($cust_phone) {
        $this->cust_phone = $cust_phone;
    }
    
    /**
     * Returns $cust_state.
     *
     * @see Customer::$cust_state
     */
    public function getCust_state() {
        return $this->cust_state;
    }
    
    /**
     * Sets $cust_state.
     *
     * @param object $cust_state
     * @see Customer::$cust_state
     */
    public function setCust_state($cust_state) {
        $this->cust_state = $cust_state;
    }
    
    /**
     * Returns $cust_zip.
     *
     * @see Customer::$cust_zip
     */
    public function getCust_zip() {
        return $this->cust_zip;
    }
    
    /**
     * Sets $cust_zip.
     *
     * @param object $cust_zip
     * @see Customer::$cust_zip
     */
    public function setCust_zip($cust_zip) {
        $this->cust_zip = $cust_zip;
    }
    
    /**
     * Returns $region_id.
     *
     * @see Customer::$region_id
     */
    public function getRegion_id() {
        return $this->region_id;
    }
    
    /**
     * Sets $region_id.
     *
     * @param object $region_id
     * @see Customer::$region_id
     */
    public function setRegion_id($region_id) {
        $this->region_id = $region_id;
    }
	
	
}
?>