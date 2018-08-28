<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Traffic extends CI_Controller {	

	public function __construct() {
		parent::__construct();		
	}
		
    public function index() {		
		$data['result'] = $this->massdot->getData();
		$this->load->view('public/traffic/view', $data);
	}
	
	/**
     * getTraffic
     * @return type boolean
	 * Returns massdot data
     */
	/*public function getTrafficDebug() {
		$result = getData();		
        foreach ($result as $key => $v) {
           echo $v->location->latitude . "<br>";
        }
	}*/
}
