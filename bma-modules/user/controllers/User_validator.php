<?php

class User_validator extends BMA_Controller {

    function __construct() {
        $config = array('modules' => 'user', 'jsfiles' => array('user_validator'));
        parent::__construct($config);
        $this->bmamdl->table = 'group_validator_users';
    }

    function index() {
        //$this->libauth->check(__METHOD__);
        $this->template->title('User Validator');
        $this->template->set('tsmall', 'User');
        $this->template->set('icon', 'fa fa-users');
        $this->template->build('user/user_validator_v');
    }

    /**
     * Simpan Data
     */
    function insert() {
        checkIfNotAjax();
        //$this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $arrid = json_decode($postData['id']);
        $gid = $postData['groupvalidator_id'];
        $auth = $this->session->userdata('auth');
        $userid = $auth['id'];
        $created = date('Y-m-d H:i:s', time());
        $dx = array();
        $max = $this->db->select_max('orderuser', 'maxorder')->get_where('group_validator_users', array('groupvalidator_id' => $gid))->row();
        foreach ($arrid as $key => $val) {
            $dx[$key]['user_id'] = $val;
            $dx[$key]['groupvalidator_id'] = $gid;
            $dx[$key]['orderuser'] = ++$max->maxorder;
            $dx[$key]['created'] = $created;
            $dx[$key]['createdby'] = $userid;
        }
        $co = count($dx);
        $status = $this->db->insert_batch('group_validator_users', $dx);
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
//        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $id = json_decode($postData['id']);
        $this->db->trans_begin();
        $orderm = $this->db->select("orderuser,groupvalidator_id")->get_where('group_validator_users', array('id' => $id))->row();
        $awal = '>' . $orderm->orderuser;
        $setorder = '`orderuser` - 1';
        $this->db->set('`orderuser`', $setorder, FALSE);
        $this->db->where('`orderuser` ' . $awal);
        $this->db->where('groupvalidator_id ', $orderm->groupvalidator_id);
        $this->db->update('group_validator_users');
        $status = $this->bmamdl->delete('id', $id);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $err = $this->db->error();
            $json['msg'] = $err['code'] . '<br>' . $err['message'];
            echo json_encode($json);
        } else {
            $this->db->trans_commit();
            $json['msg'] = '1';
            echo json_encode($json);
        }
    }

    /**
     * Ambil Data Group Validator
     */
    function getGroupvalidator($id = '') {
        checkIfNotAjax();
//        $this->libauth->check(__METHOD__);
        $this->bmamdl->table = 'group_validator';
        $this->bmamdl->searchable = array('groupvalidatorname');
        $this->bmamdl->select2fields = array('id' => 'id', 'text' => "groupvalidatorname");
        $result['results'] = $this->bmamdl->getSelect2(array('status' => '1'));
        $result['more'] = true;
        echo json_encode($result);
    }

    /**
     * Ambil Data User Validator
     */
    function getUservalidator($id = '') {
        checkIfNotAjax();
        //$this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $this->bmamdl->table = 'v_group_validator_users';
        $where[0]['field'] = 'groupvalidator_id';
        $where[0]['data'] = isset($postData['gid']) ? $postData['gid'] : NULL;
        $where[0]['sql'] = 'where';
        $cpData = $this->bmamdl->getDataTable($where);
        $this->bmamdl->outputToJson($cpData);
    }

    /**
     * Ambil Data Table List Method
     */
    function getDataListUser() {
        checkIfNotAjax();
        //$this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $this->bmamdl->table = 'v_user';
        $dx = $this->db->select('user_id')->get_where('v_group_validator_users', array('groupvalidator_id' => $postData['gid']))->result_array();
        $arr = array_column($dx, 'user_id');
        $where[0]['field'] = 'group_id';
        $where[0]['data'] = '4';
        $where[0]['sql'] = 'where';
        $where[1]['field'] = 'id';
        $where[1]['data'] = (count($arr) > 0) ? $arr : NULL;
        $where[1]['sql'] = 'where_not_in';
        $cpData = $this->bmamdl->getDataTable($where);
        $this->bmamdl->outputToJson($cpData);
    }

    /**
     * Update Down Order
     */
    function updateDown() {
        checkIfNotAjax();
        //$this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $this->db->trans_begin();
        $datax['orderuser'] = $postData['ou'];
        $status = $this->bmamdl->update($datax, array('groupvalidator_id' => $postData['gv'], 'orderuser' => $postData['ou'] + 1));
        $datay['orderuser'] = $postData['ou'] + 1;
        $status = $this->bmamdl->update($datay, 'id=' . $postData['id']);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $err = $this->db->error();
            $json['msg'] = $err['code'] . '<br>' . $err['message'];
            echo json_encode($json);
        } else {
            $this->db->trans_commit();
            $json['msg'] = '1';
            echo json_encode($json);
        }
    }
    
    /**
     * Update Up Order
     */
    function updateUp() {
        checkIfNotAjax();
        //$this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $this->db->trans_begin();
        $datax['orderuser'] = $postData['ou'];
        $status = $this->bmamdl->update($datax, array('groupvalidator_id' => $postData['gv'], 'orderuser' => $postData['ou'] - 1));
        $datay['orderuser'] = $postData['ou'] - 1;
        $status = $this->bmamdl->update($datay, 'id=' . $postData['id']);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $err = $this->db->error();
            $json['msg'] = $err['code'] . '<br>' . $err['message'];
            echo json_encode($json);
        } else {
            $this->db->trans_commit();
            $json['msg'] = '1';
            echo json_encode($json);
        }
    }

}
