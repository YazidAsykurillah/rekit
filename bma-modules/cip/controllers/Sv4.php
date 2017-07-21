<?php

class Sv4 extends BMA_Controller {

    function __construct() {
        $config = array('modules' => 'cip', 'jsfiles' => array('sv4'));
        parent::__construct($config);
        $this->auth = $this->session->userdata('auth');
    }

    function index() {
        
        $data['sv4s'] = $this->db->select('*')->get('sv4s')->result();
        $this->template->title('SV 1');
        $this->template->set('icon', 'fa fa-gears');
        $this->template->build('cip/sv4/index_v', $data);
    }

    public function create()
    {
        $this->template->title('Create');
        $this->template->set('icon', 'fa fa-gears');
        $this->template->build('cip/sv4/create_v');
    }

    public function store()
    {
        $postData = $this->input->post();
        /*echo '<pre>';
        print_r($postData);
        echo '</pre>';
        exit();*/

        if($postData['recipe_name'] != ""){
            $data = $postData;
            //Pre Rinse cycle cheking inputs condition
                $data['prc_check'] = isset($postData['prc_check']) ? $data['prc_check'] = TRUE : $data['prc_check'] = FALSE;
                $data['prc_tp_top_transfer_line_check'] = isset($postData['prc_tp_top_transfer_line_check']) ? $data['prc_tp_top_transfer_line_check'] = TRUE : $data['prc_tp_top_transfer_line_check'] = FALSE;
                $data['prc_tp_through_filling_line_check'] = isset($postData['prc_tp_through_filling_line_check']) ? $data['prc_tp_through_filling_line_check'] = TRUE : $data['prc_tp_through_filling_line_check'] = FALSE;
                
            //Rinse Cycle cheking inputs condition
                $data['rc_check'] = isset($postData['rc_check']) ? $data['rc_check'] = TRUE : $data['rc_check'] = FALSE;
                $data['rc_tp_top_transfer_line_check'] = isset($postData['rc_tp_top_transfer_line_check']) ? $data['rc_tp_top_transfer_line_check'] = TRUE : $data['rc_tp_top_transfer_line_check'] = FALSE;
                $data['rc_tp_through_filling_line_check'] = isset($postData['rc_tp_through_filling_line_check']) ? $data['rc_tp_through_filling_line_check'] = TRUE : $data['rc_tp_through_filling_line_check'] = FALSE;

            // Air Purge checking inputs conditions
                $data['app_top_transfer_line_check'] = isset($postData['app_top_transfer_line_check']) ? $data['app_top_transfer_line_check'] = TRUE : $data['app_top_transfer_line_check'] = FALSE;
                $data['app_through_filling_line_check'] = isset($postData['app_through_filling_line_check']) ? $data['app_through_filling_line_check'] = TRUE : $data['app_through_filling_line_check'] = FALSE;

            //Santization Cycle cheking inputs condition
                $data['sc_check'] = isset($postData['sc_check']) ? $data['sc_check'] = TRUE : $data['sc_check'] = FALSE;
                $data['sc_tp_top_transfer_line_check'] = isset($postData['sc_tp_top_transfer_line_check']) ? $data['sc_tp_top_transfer_line_check'] = TRUE : $data['sc_tp_top_transfer_line_check'] = FALSE;
                $data['sc_tp_through_filling_line_check'] = isset($postData['sc_tp_through_filling_line_check']) ? $data['sc_tp_through_filling_line_check'] = TRUE : $data['sc_tp_through_filling_line_check'] = FALSE;
                
            //Wipe and Swab Test
                $data['wipe_test'] = isset($postData['wipe_test']) ? $data['wipe_test'] = TRUE : $data['wipe_test'] = FALSE;
                $data['swab_test'] = isset($postData['swab_test']) ? $data['swab_test'] = TRUE : $data['swab_test'] = FALSE;
            $data['created_by'] = $this->auth['id'];
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            $store = $this->db->insert('sv4s', $data);
            redirect(base_url('cip/sv4/'));
        }
        else{
            exit("Recipe name is empty");
        }
    }

    public function show($id = NULL)
    {
        $config = array('modules' => 'cip', 'jsfiles' => array('sv4show'));
        parent::__construct($config);

        if($id != NULL){
            $sv4 = $this->db->get_where('sv4s', array('id'=>$id ))->result();
            $data['sv4'] = $sv4;
            $this->template->title('Show');
            $this->template->set('icon', 'fa fa-gears');
            $this->template->build('cip/sv4/show_v', $data);
        }
    }

    public function edit($id = NULL)
    {
        $config = array('modules' => 'cip', 'jsfiles' => array('sv4edit'));
        parent::__construct($config);
        if($id != NULL){
            $sv4 = $this->db->get_where('sv4s', array('id'=>$id ))->result();
            $data['sv4'] = $sv4;
            $this->template->title('Edit');
            $this->template->set('icon', 'fa fa-gears');
            $this->template->build('cip/sv4/edit_v', $data);
        }
    }

    public function update()
    {
        $postData = $this->input->post();
         /*echo '<pre>';
        print_r($postData);
        echo '</pre>';
        exit();*/
        $id = $postData['id'];
        if($postData['recipe_name'] != ""){
            unset($postData['id']);
            $data = $postData;
            //Pre Rinse cycle cheking inputs condition
                $data['prc_check'] = isset($postData['prc_check']) ? $data['prc_check'] = TRUE : $data['prc_check'] = FALSE;
                $data['prc_tp_top_transfer_line_check'] = isset($postData['prc_tp_top_transfer_line_check']) ? $data['prc_tp_top_transfer_line_check'] = TRUE : $data['prc_tp_top_transfer_line_check'] = FALSE;
                $data['prc_tp_through_filling_line_check'] = isset($postData['prc_tp_through_filling_line_check']) ? $data['prc_tp_through_filling_line_check'] = TRUE : $data['prc_tp_through_filling_line_check'] = FALSE;
                
            //Rinse Cycle cheking inputs condition
                $data['rc_check'] = isset($postData['rc_check']) ? $data['rc_check'] = TRUE : $data['rc_check'] = FALSE;
                $data['rc_tp_top_transfer_line_check'] = isset($postData['rc_tp_top_transfer_line_check']) ? $data['rc_tp_top_transfer_line_check'] = TRUE : $data['rc_tp_top_transfer_line_check'] = FALSE;
                $data['rc_tp_through_filling_line_check'] = isset($postData['rc_tp_through_filling_line_check']) ? $data['rc_tp_through_filling_line_check'] = TRUE : $data['rc_tp_through_filling_line_check'] = FALSE;

            // Air Purge checking inputs conditions
                $data['app_top_transfer_line_check'] = isset($postData['app_top_transfer_line_check']) ? $data['app_top_transfer_line_check'] = TRUE : $data['app_top_transfer_line_check'] = FALSE;
                $data['app_through_filling_line_check'] = isset($postData['app_through_filling_line_check']) ? $data['app_through_filling_line_check'] = TRUE : $data['app_through_filling_line_check'] = FALSE;

            //Santization Cycle cheking inputs condition
                $data['sc_check'] = isset($postData['sc_check']) ? $data['sc_check'] = TRUE : $data['sc_check'] = FALSE;
                $data['sc_tp_top_transfer_line_check'] = isset($postData['sc_tp_top_transfer_line_check']) ? $data['sc_tp_top_transfer_line_check'] = TRUE : $data['sc_tp_top_transfer_line_check'] = FALSE;
                $data['sc_tp_through_filling_line_check'] = isset($postData['sc_tp_through_filling_line_check']) ? $data['sc_tp_through_filling_line_check'] = TRUE : $data['sc_tp_through_filling_line_check'] = FALSE;
                
            //Wipe and Swab Test
                $data['wipe_test'] = isset($postData['wipe_test']) ? $data['wipe_test'] = TRUE : $data['wipe_test'] = FALSE;
                $data['swab_test'] = isset($postData['swab_test']) ? $data['swab_test'] = TRUE : $data['swab_test'] = FALSE;
            $this->db->where('id', $id);
            $update = $this->db->update('sv4s', $data);
            // print_r($update);
            // exit();
            redirect(base_url('cip/sv4/'));
        }
        else{
            exit("Recipe name is required");
        }
    }

    public function delete()
    {

    }
    
}   
