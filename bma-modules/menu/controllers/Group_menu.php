<?php

class Group_menu extends BMA_Controller {

    function __construct() {
        $config = array('modules' => 'menu', 'jsfiles' => array('group_menu'));
        parent::__construct($config);
        $this->bmamdl->table = 'group_menu';
    }

    /**
     * Akses Halaman
     */
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('Group Menu');
        $this->template->set('tsmall', 'Menu');
        $this->template->set('icon', 'fa fa-navicon');
        $this->template->build('menu/group_menu_v');
    }

    /**
     * Simpan Data
     */
    function insert() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $postData = cekSelect2(array('group_id', 'menu_id'), $postData);
        $postData['parent_id'] = isset($postData['parent_id']) ? $postData['parent_id'] : 0;
        $postData['status'] = cekStatus($postData);
        $this->db->trans_begin();
        $awal = '>=' . $postData['order'];
        $setorder = '`order` + 1';
        $this->db->set('`order`', $setorder, FALSE);
        $this->db->where('`order` ' . $awal);
        $this->db->where('group_id ', $postData['group_id']);
        $this->db->update('group_menu');
        $status = $this->bmamdl->insert($postData);
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
     * Update Data
     */
    function update() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $postData = cekSelect2(array('group_id', 'menu_id'), $postData);
        $postData['parent_id'] = isset($postData['parent_id']) ? $postData['parent_id'] : 0;
        $postData['status'] = cekStatus($postData);
        $id = $postData['id'];
        unset($postData['id']);
        $this->db->trans_begin();
        $orderm = $this->db->select("order")->get_where('group_menu', array('id' => $id))->row();
        if ($postData['order'] < $orderm->order) {
            $awal = '>=' . $postData['order'];
            $akhir = '<' . $orderm->order;
            $setorder = '`order` + 1';
        } else {
            $awal = '>' . $orderm->order;
            $akhir = '<=' . $postData['order'];
            $setorder = '`order` - 1';
        }
        $this->db->set('`order`', $setorder, FALSE);
        $this->db->where('`order` ' . $awal);
        $this->db->where('`order` ' . $akhir);
        $this->db->where('group_id ', $postData['group_id']);
        $this->db->update('group_menu');
        $status = $this->bmamdl->update($postData, 'id=' . $id);
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
     * Hapus Data
     */
    function delete() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $id = json_decode($postData['id']);
        $this->db->trans_begin();
        $orderm = $this->db->select("order,group_id")->get_where('group_menu', array('id' => $id))->row();
        $awal = '>' . $orderm->order;
        $setorder = '`order` - 1';
        $this->db->set('`order`', $setorder, FALSE);
        $this->db->where('`order` ' . $awal);
        $this->db->where('group_id ', $orderm->group_id);
        $this->db->update('group_menu');
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
     * Ambil Data Table Menu
     */
    function getDataMenu($id = '') {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $where[0]['field'] = 'group_id';
        $where[0]['data'] = isset($postData['gid']) ? $postData['gid'] : NULL;
        $where[0]['sql'] = 'where';
        $this->bmamdl->table = 'v_create_menu';
        $cpData = $this->bmamdl->getDataTable($where);
        $this->bmamdl->outputToJson($cpData);
    }

    /**
     * Ambil Data Menu (Select2)
     */
    function getMenu() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $this->bmamdl->table = 'menu';
        $this->bmamdl->searchable = array('menu', 'link');
        $this->bmamdl->select2fields = array('id' => 'id', 'text' => "concat(menu,' [', link,']')");
        $result['results'] = $this->bmamdl->getSelect2(array('status' => '1'));
        $result['more'] = true;
        echo json_encode($result);
    }

}
