<?php

class Group_menu_clone extends BMA_Controller {

    function __construct() {
        $config = array('modules' => 'menu', 'jsfiles' => array('group_menu_clone'));
        parent::__construct($config);
        $this->bmamdl->table = 'group_menu';
    }

    /**
     * Akses Halaman
     */
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('Clone Group Menu');
        $this->template->set('tsmall', 'Menu');
        $this->template->build('menu/group_menu_clone_v');
    }

    /**
     * Clone Menu
     */
    function clonemenu() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $source = $postData['group_id'];
        $target = $postData['target_group_id'];
        $s = date('Y-m-d H:i:s', time());
        $auth = $this->session->userdata('auth');
        $idu = $auth['id'];
        $this->db->trans_begin();
        $this->db->delete('group_menu', array('group_id' => $target));
        $this->db->query("INSERT INTO `group_menu` (group_id,menu_id,parent_id,`order`,`status`,`created`,`createdby`) SELECT $target,menu_id,parent_id,`order`,`status`,'$s',$idu FROM `group_menu` WHERE group_id = $source");
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
