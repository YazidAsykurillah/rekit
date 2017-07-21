<?php

class Pv3 extends BMA_Controller {

    function __construct() {
        $config = array('modules' => 'cip', 'jsfiles' => array('pv3'));
        parent::__construct($config);
        $this->auth = $this->session->userdata('auth');
    }

    function index() {
        
        $data['pv3s'] = $this->db->select('*')->get('pv3s')->result();
        $this->template->title('PV 1');
        $this->template->set('icon', 'fa fa-pv3');
        $this->template->build('cip/pv3/index_v', $data);
    }

    public function create()
    {
        $this->template->title('Create');
        $this->template->set('icon', 'fa fa-pv3');
        $this->template->build('cip/pv3/create_v');
    }

    public function store()
    {
        $postData = $this->input->post();
        
        /*echo '<pre>';
        print_r($postData);
        echo '</pre>';*/

        if($postData['recipe_name'] != ""){
            $data = $postData;
            //Pre Rinse cycle cheking inputs condition
                $data['prc_check'] = isset($postData['prc_check']) ? $data['prc_check'] = TRUE : $data['prc_check'] = FALSE;
                $data['prc_tp_transfer_line_from_pv3_to_mv2_check'] = isset($postData['prc_tp_transfer_line_from_pv3_to_mv2_check']) ? $data['prc_tp_transfer_line_from_pv3_to_mv2_check'] = TRUE : $data['prc_tp_transfer_line_from_pv3_to_mv2_check'] = FALSE;
                
                

            //Rinse Cycle cheking inputs condition
                $data['rc_check'] = isset($postData['rc_check']) ? $data['rc_check'] = TRUE : $data['rc_check'] = FALSE;
                $data['rc_tp_transfer_line_from_pv3_mv2_check'] = isset($postData['rc_tp_transfer_line_from_pv3_mv2_check']) ? $data['rc_tp_transfer_line_from_pv3_mv2_check'] = TRUE : $data['rc_tp_transfer_line_from_pv3_mv2_check'] = FALSE;

            //Santization Cycle cheking inputs condition
                $data['sc_check'] = isset($postData['sc_check']) ? $data['sc_check'] = TRUE : $data['sc_check'] = FALSE;
                $data['sc_tp_transfer_line_from_pv3_to_mv2_check'] = isset($postData['sc_tp_transfer_line_from_pv3_to_mv2_check']) ? $data['sc_tp_transfer_line_from_pv3_to_mv2_check'] = TRUE : $data['sc_tp_transfer_line_from_pv3_to_mv2_check'] = FALSE;
                $data['sc_mp_selection'] = isset($postData['sc_mp_selection']) ? $data['sc_mp_selection'] = TRUE : $data['sc_mp_selection'] = FALSE;

            //Vacuum Santization cheking inputs condition
                $data['vs_selection'] = isset($postData['vs_selection']) ? $data['vs_selection'] = TRUE : $data['vs_selection'] = FALSE;

            //Sterlization cycle cheking inputs condition
                $data['ster_c_selection'] = isset($postData['ster_c_selection']) ? $data['ster_c_selection'] = TRUE : $data['ster_c_selection'] = FALSE;

            //Wipe and Swab Test
                $data['wipe_test'] = isset($postData['wipe_test']) ? $data['wipe_test'] = TRUE : $data['wipe_test'] = FALSE;
                $data['swab_test'] = isset($postData['swab_test']) ? $data['swab_test'] = TRUE : $data['swab_test'] = FALSE;
            $data['created_by'] = $this->auth['id'];
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            $store = $this->db->insert('pv3s', $data);
            
            redirect(base_url('cip/pv3/'));
        }
        else{
            exit("Recipe name is empty");
        }
    }

    public function show($id = NULL)
    {
        $config = array('modules' => 'cip', 'jsfiles' => array('pv3show'));
        parent::__construct($config);

        if($id != NULL){
            $pv3 = $this->db->get_where('pv3s', array('id'=>$id ))->result();
            $data['pv3'] = $pv3;
            $this->template->title('Show');
            $this->template->set('icon', 'fa fa-pv3');
            $this->template->build('cip/pv3/show_v', $data);
        }
    }

    public function edit($id = NULL)
    {
        $config = array('modules' => 'cip', 'jsfiles' => array('pv3edit'));
        parent::__construct($config);
        if($id != NULL){
            $pv3 = $this->db->get_where('pv3s', array('id'=>$id ))->result();
            $data['pv3'] = $pv3;
            $this->template->title('Edit');
            $this->template->set('icon', 'fa fa-pv3');
            $this->template->build('cip/pv3/edit_v', $data);
        }
    }

    public function update()
    {
        $postData = $this->input->post();
        $id = $postData['id'];
        if($postData['recipe_name'] != ""){
            unset($postData['id']);
            $data = $postData;
            //Pre Rinse cycle cheking inputs condition
                $data['prc_check'] = isset($postData['prc_check']) ? $data['prc_check'] = TRUE : $data['prc_check'] = FALSE;
                $data['prc_tp_transfer_line_from_pv3_to_mv2_check'] = isset($postData['prc_tp_transfer_line_from_pv3_to_mv2_check']) ? $data['prc_tp_transfer_line_from_pv3_to_mv2_check'] = TRUE : $data['prc_tp_transfer_line_from_pv3_to_mv2_check'] = FALSE;
                
                

            //Rinse Cycle cheking inputs condition
                $data['rc_check'] = isset($postData['rc_check']) ? $data['rc_check'] = TRUE : $data['rc_check'] = FALSE;
                $data['rc_tp_transfer_line_from_pv3_mv2_check'] = isset($postData['rc_tp_transfer_line_from_pv3_mv2_check']) ? $data['rc_tp_transfer_line_from_pv3_mv2_check'] = TRUE : $data['rc_tp_transfer_line_from_pv3_mv2_check'] = FALSE;

            //Santization Cycle cheking inputs condition
                $data['sc_check'] = isset($postData['sc_check']) ? $data['sc_check'] = TRUE : $data['sc_check'] = FALSE;
                $data['sc_tp_transfer_line_from_pv3_to_mv2_check'] = isset($postData['sc_tp_transfer_line_from_pv3_to_mv2_check']) ? $data['sc_tp_transfer_line_from_pv3_to_mv2_check'] = TRUE : $data['sc_tp_transfer_line_from_pv3_to_mv2_check'] = FALSE;
                $data['sc_mp_selection'] = isset($postData['sc_mp_selection']) ? $data['sc_mp_selection'] = TRUE : $data['sc_mp_selection'] = FALSE;

            //Vacuum Santization cheking inputs condition
                $data['vs_selection'] = isset($postData['vs_selection']) ? $data['vs_selection'] = TRUE : $data['vs_selection'] = FALSE;

            //Sterlization cycle cheking inputs condition
                $data['ster_c_selection'] = isset($postData['ster_c_selection']) ? $data['ster_c_selection'] = TRUE : $data['ster_c_selection'] = FALSE;

            //Wipe and Swab Test
                $data['wipe_test'] = isset($postData['wipe_test']) ? $data['wipe_test'] = TRUE : $data['wipe_test'] = FALSE;
                $data['swab_test'] = isset($postData['swab_test']) ? $data['swab_test'] = TRUE : $data['swab_test'] = FALSE;
            
            //now updating process
            $this->db->where('id', $id);
            $this->db->update('pv3s', $data);
            redirect(base_url('cip/pv3/'));
        }
        else{
            exit("Recipe name is required");
        }
    }

    public function delete()
    {

    }
    
}   
