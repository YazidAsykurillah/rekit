<?php

class User extends BMA_Controller {

    function __construct() {
        $config = array('modules' => 'user', 'jsfiles' => array('user'));
        parent::__construct($config);
        $this->bmamdl->table = 'user';
    }

    /**
     * Akses Halaman
     */
    function index() {
        $this->libauth->check(__METHOD__);
        $this->template->title('User Application');
        $this->template->set('tsmall', 'User');
        $this->template->set('icon', 'glyphicon glyphicon-user');
        $this->template->build('user/user_v');
    }

    /**
     * Simpan Data
     */
    function insert() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $postData['username'] = strtolower($postData['username']);
        $postData['password'] = $this->encrypt->hash($postData['password']);
        $postData = cekSelect2(array('group_id'), $postData);
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
        $postData['username'] = strtolower($postData['username']);
        if (strlen($postData['password']) > 0) {
            $postData['password'] = $this->encrypt->hash($postData['password']);
        } else {
            unset($postData['password']);
        }
        $postData = cekSelect2(array('group_id'), $postData);
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
        $this->bmamdl->table = 'v_user';
        $cpData = $this->bmamdl->getDataTable();
        $this->bmamdl->outputToJson($cpData);
    }

    /**
     * Ambil Data User Group
     */
    function getUsergroup() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $this->bmamdl->table = 'group';
        $this->bmamdl->searchable = array('groupname');
        $this->bmamdl->select2fields = array('id' => 'id', 'text' => "groupname");
        $result['results'] = $this->bmamdl->getSelect2(array('status' => '1'));
        $result['more'] = true;
        echo json_encode($result);
    }

    /**
     * Upload Foto User
     */
    function upload() {
        $this->libauth->check(__METHOD__);
        $config['upload_path'] = '../bma-modules/photo/user/';
        $config['allowed_types'] = 'jpg';
        $config['max_size'] = '1024';
        $config['max_width'] = '160';
        $config['max_height'] = '160';
        $config['file_name'] = key($_FILES);
        $this->load->library('upload', $config);
        $filex = $config['upload_path'] . $config['file_name'];
        @unlink($filex . ".jpg");
        if (!$this->upload->do_upload(key($_FILES))) {
            $error = array('error' => $this->upload->display_errors());
            echo $error["error"];
        } else {
            $data = array('upload_data' => $this->upload->data());
            echo "1";
        }
    }

    /**
     * Hapus Foto User
     */
    function delphoto() {
        checkIfNotAjax();
        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $filex = '../bma-modules/photo/user/user-' . $postData['id'] . ".jpg";
        $status = @unlink($filex);
        if ($status) {
            $json['msg'] = '1';
            echo json_encode($json);
        } else {
            $json['msg'] = 'No File Deleted';
            echo json_encode($json);
        }
    }

}
