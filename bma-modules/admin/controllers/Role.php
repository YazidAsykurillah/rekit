<?php

class Role extends BMA_Controller {

    function __construct() {
        $config = array('modules' => 'admin', 'jsfiles' => array('role'));
        parent::__construct($config);
        $this->bmamdl->table = 'group_role';
    }

    function index() {
        //$this->libauth->check(__METHOD__);
        $this->template->title('Group Role');
        $this->template->set('tsmall', 'Admin');
        $this->template->set('icon', 'fa fa-gears');
        $this->template->build('admin/role_v');
    }

    /**
     * Simpan Data
     */
    function insert() {
        checkIfNotAjax();
        //$this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $gid = $postData['group_id'];
        $auth = $this->session->userdata('auth');
        $userid = $auth['id'];
        $created = date('Y-m-d H:i:s', time());
        $dx = $this->db->select('controller,method,info')
                        ->select("'$gid' as group_id")
                        ->select("'$created' as created")
                        ->select("'$userid' as createdby")
                        ->where_in('id', json_decode($postData['id']))
                        ->get('listmethod')->result_array();
        $co = count($dx);
        $status = $this->db->insert_batch('group_role', $dx);
        if ($status == $co) {
            $json['msg'] = '1';
            echo json_encode($json);
        } else {
            $err = $this->db->error();
            $json['msg'] = $err['code'] . '<br>' . $err['message'];
            echo json_encode($json);
        }
    }


    /**
     * Hapus Data
     */
    function delete() {
        checkIfNotAjax();
        //$this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $id = json_decode($postData['id']);
        $status = $this->bmamdl->delete('id', $id);
        if ($status == 'true') {
            $json['msg'] = '1';
            echo json_encode($json);
        } else {
            $json['msg'] = $status;
            echo json_encode($json);
        }
    }

    /**
     * Ambil Data Table Menu
     */
    function getDataRole($id = '') {
        checkIfNotAjax();
        //$this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $where[0]['field'] = 'group_id';
        $where[0]['data'] = isset($postData['gid']) ? $postData['gid'] : NULL;
        $where[0]['sql'] = 'where';
        $this->bmamdl->table = 'group_role';
        $cpData = $this->bmamdl->getDataTable($where);
        $this->bmamdl->outputToJson($cpData);
    }

    /**
     * Ambil Data Table List Method
     */
    function getDataListMethod() {
        checkIfNotAjax();
        //$this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $this->bmamdl->table = 'v_listmethod';
        $dx = $this->db->select('classmethod')->get_where('v_group_role', array('group_id' => $postData['gid']))->result_array();
        $arr = array();
        foreach ($dx as $val) {
            $arr[] = $val['classmethod'];
        }
        $where[0]['field'] = 'classmethod';
        $where[0]['data'] = (count($arr) > 0) ? $arr : NULL;
        $where[0]['sql'] = 'where_not_in';
        $cpData = $this->bmamdl->getDataTable($where);
        $this->bmamdl->outputToJson($cpData);
    }

    /**
     * Update Status
     */
    function updateStatus() {
        checkIfNotAjax();
        //$this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $postData['status'] = cekStatus($postData);
        $id = $postData['id'];
        unset($postData['id']);
        $status = $this->bmamdl->update($postData, 'id=' . $id);
        if ($status == 'true') {
            $json['msg'] = '1';
            echo json_encode($json);
        } else {
            $json['msg'] = $status;
            echo json_encode($json);
        }
    }

}
