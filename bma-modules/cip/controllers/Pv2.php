<?php

class Pv2 extends BMA_Controller {

    function __construct() {
        $config = array('modules' => 'cip', 'jsfiles' => array('pv2'));
        parent::__construct($config);
        $this->auth = $this->session->userdata('auth');
    }

    function index() {
        
        $data['pv2s'] = $this->db->select('*')->get('pv2s')->result();
        $this->template->title('PV 1');
        $this->template->set('icon', 'fa fa-pv2');
        $this->template->build('cip/pv2/index_v', $data);
    }

    public function create()
    {
        $this->template->title('Create');
        $this->template->set('icon', 'fa fa-pv2');
        $this->template->build('cip/pv2/create_v');
    }

    public function store()
    {
        $postData = $this->input->post();
        

        if($postData['recipe_name'] != ""){
            $data = $postData;
            //Pre Rinse cycle cheking inputs condition
                $data['prc_check'] = isset($postData['prc_check']) ? $data['prc_check'] = TRUE : $data['prc_check'] = FALSE;
                $data['prc_tp_transfer_line_from_pv2_to_mv2_check'] = isset($postData['prc_tp_transfer_line_from_pv2_to_mv2_check']) ? $data['prc_tp_transfer_line_from_pv2_to_mv2_check'] = TRUE : $data['prc_tp_transfer_line_from_pv2_to_mv2_check'] = FALSE;
                
                

            //Rinse Cycle cheking inputs condition
                $data['rc_check'] = isset($postData['rc_check']) ? $data['rc_check'] = TRUE : $data['rc_check'] = FALSE;
                $data['rc_tp_transfer_line_from_pv2_mv2_check'] = isset($postData['rc_tp_transfer_line_from_pv2_mv2_check']) ? $data['rc_tp_transfer_line_from_pv2_mv2_check'] = TRUE : $data['rc_tp_transfer_line_from_pv2_mv2_check'] = FALSE;

            //Santization Cycle cheking inputs condition
                $data['sc_check'] = isset($postData['sc_check']) ? $data['sc_check'] = TRUE : $data['sc_check'] = FALSE;
                $data['sc_tp_transfer_line_from_pv2_to_mv2_check'] = isset($postData['sc_tp_transfer_line_from_pv2_to_mv2_check']) ? $data['sc_tp_transfer_line_from_pv2_to_mv2_check'] = TRUE : $data['sc_tp_transfer_line_from_pv2_to_mv2_check'] = FALSE;
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
            $store = $this->db->insert('pv2s', $data);
            
            redirect(base_url('cip/pv2/'));
        }
        else{
            exit("Recipe name is empty");
        }
    }

    public function show($id = NULL)
    {
        $config = array('modules' => 'cip', 'jsfiles' => array('pv2show'));
        parent::__construct($config);

        if($id != NULL){
            $pv2 = $this->db->get_where('pv2s', array('id'=>$id ))->result();
            $data['pv2'] = $pv2;
            $this->template->title('Show');
            $this->template->set('icon', 'fa fa-pv2');
            $this->template->build('cip/pv2/show_v', $data);
        }
    }

    public function edit($id = NULL)
    {
        $config = array('modules' => 'cip', 'jsfiles' => array('pv2edit'));
        parent::__construct($config);
        if($id != NULL){
            $pv2 = $this->db->get_where('pv2s', array('id'=>$id ))->result();
            $data['pv2'] = $pv2;
            $this->template->title('Edit');
            $this->template->set('icon', 'fa fa-pv2');
            $this->template->build('cip/pv2/edit_v', $data);
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
                $data['prc_tp_transfer_line_from_pv2_to_mv2_check'] = isset($postData['prc_tp_transfer_line_from_pv2_to_mv2_check']) ? $data['prc_tp_transfer_line_from_pv2_to_mv2_check'] = TRUE : $data['prc_tp_transfer_line_from_pv2_to_mv2_check'] = FALSE;
                
                

            //Rinse Cycle cheking inputs condition
                $data['rc_check'] = isset($postData['rc_check']) ? $data['rc_check'] = TRUE : $data['rc_check'] = FALSE;
                $data['rc_tp_transfer_line_from_pv2_mv2_check'] = isset($postData['rc_tp_transfer_line_from_pv2_mv2_check']) ? $data['rc_tp_transfer_line_from_pv2_mv2_check'] = TRUE : $data['rc_tp_transfer_line_from_pv2_mv2_check'] = FALSE;

            //Santization Cycle cheking inputs condition
                $data['sc_check'] = isset($postData['sc_check']) ? $data['sc_check'] = TRUE : $data['sc_check'] = FALSE;
                $data['sc_tp_transfer_line_from_pv2_to_mv2_check'] = isset($postData['sc_tp_transfer_line_from_pv2_to_mv2_check']) ? $data['sc_tp_transfer_line_from_pv2_to_mv2_check'] = TRUE : $data['sc_tp_transfer_line_from_pv2_to_mv2_check'] = FALSE;
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
            $this->db->update('pv2s', $data);
            redirect(base_url('cip/pv2/'));
        }
        else{
            exit("Recipe name is required");
        }
    }

    public function delete()
    {

    }
    
}   
