<?php

class Menu extends BMA_Controller {

    function __construct() {
        $config = array('modules' => 'menu', 'jsfiles' => array('menu'));
        parent::__construct($config);
        $this->bmamdl->table = 'menu';
    }

    /**
     * Akses Halaman
     */
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('List Menu');
        $this->template->set('tsmall', 'Menu');
        $this->template->set('icon', 'fa fa-navicon');
        $this->template->build('menu/menu_v');
    }

    /**
     * Simpan Data
     */
    function insert() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $postData['status'] = cekStatus($postData);
        $status = $this->bmamdl->insert($postData);
        if ($status == 'true') {
            $json['msg'] = '1';
            echo json_encode($json);
        } else {
            $json['msg'] = $status;
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

    /**
     * Hapus Data
     */
    function delete() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
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
     * Ambil Data Table
     */
    function getData() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $cpData = $this->bmamdl->getDataTable();
        $this->bmamdl->outputToJson($cpData);
    }

    function _createMenu($group_id = null, $pid = 0) {
        $query = $this->db->order_by("order")->get_where('v_create_menu', array('group_id' => $group_id, 'parent_id' => $pid, 'status' => '1'))->result_array();
        if (count($query) > 0) {
            foreach ($query as $val) {
                if ($val['h_child'] == 1) {
                    $c1 = 'xn-openable';
                    if ($val['parent_id'] == 0) {
                        $c2 = '<span class="xn-text">' . $val['menu'] . '</span>';
                    } else {
                        $c2 = $val['menu'];
                    }
                    $c3 = '<ul class="nav-dropdown-items">';
                } else {
                    $c1 = '';
                    if ($val['parent_id'] == 0) {
                        $c2 = '<span class="xn-text">' . $val['menu'] . '</span>';
                    } else {
                        $c2 = $val['menu'];
                    }
                    $c3 = '</li>';
                }
                echo '<li class="' . $c1 . '">
                        <a href="' . $val['link'] . '"><i class="' . $val['icon'] . '"></i> ' . $c2 . '</a>';
                echo $c3;
                if ($val['h_child'] == 1) {
                    $this->_createMenu($group_id, $val['menu_id']);
                }
            }
            echo '</ul></li>';
        }
    }

}
