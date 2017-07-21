<?php

class Cip extends BMA_Controller {

    function __construct() {
        $config = array('modules' => 'cip', 'jsfiles' => array('cip'));
        parent::__construct($config);
        $this->auth = $this->session->userdata('auth');
    }

    function index() {
        
        $data['cip'] = "Cip";
        $this->template->title('Cip');
        $this->template->set('icon', 'fa fa-cip');
        $this->template->build('cip/cip_v', $data);
    }
}
