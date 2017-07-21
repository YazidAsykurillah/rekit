<?php

class Process extends BMA_Controller {

    function __construct() {
        $config = array('modules' => 'process', 'jsfiles' => array('svidget.min','jquery-ui.min', 'jsKeyboard', 'process'));
        parent::__construct($config);
        $this->bmamdl->table = 'process';
    }

    /**
     * Akses Halaman
     */
    function index() {
//        $this->libauth->check(__METHOD__);
        $this->template->title('Main Process');
        $this->template->set('tsmall', 'Process');
        $this->template->set('icon', 'fa fa-gears');
        $data['tanks'] = $this->db->get('tank_process')->result_array();
        $data['rcps'] = $this->db->get_where('v_recipe', array('status'=>'1'))->result_array();
        $this->template->build('process/process_v',$data);
    }
    
    /**
     * Start Process
     */
    function start() {
        checkIfNotAjax();
//        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        var_dump($postData);exit;
        $sc = getOption('secondchecker');
        $idf = $this->db->order_by('id', 'DESC')->limit(1)->get('loginfinger')->row();
        if ($sc == '1') {
            if (isset($idf)) {
                $fpid = $idf->fingerprint_id;
                $this->db->truncate('loginfinger');
            } else {
                $json['msg'] = 'Please Auth Second Checker';
                echo json_encode($json);
                exit;
            }
            $get = $this->db->get_where('v_user', array('fingerprint_id' => $fpid, 'secondchecker' => '1', 'status' => '1'))->row_array();
            if (isset($get)) {
                $postData['secondchecker_id'] = $get['id']; // VALID USER !!
            } else {
                $json['msg'] = 'Second Checker is Not Valid';
                echo json_encode($json);
                exit;
            }
        }
        $postData['start_time'] = date('Y-m-d H:i:s', time());
        $postData['user_id'] = $this->auth['id'];
        $postData['flag'] = 'start';

        $status = $this->bmamdl->insert($postData);
        if ($status == 'true') {
            $json['msg'] = '1';
            echo json_encode($json);
        } else {
            $json['msg'] = $status;
            echo json_encode($json);
        }
    }


}
