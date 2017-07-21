<?php

class Photo extends BMA_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        redirect('.');
    }

    /**
     * Tampilkan Foto User
     */
    function user($id = 'default') {
        header('Content-type: image/jpeg');
        $filex = '../bma-modules/photo/user/user-' . $id . '.jpg';
        if (file_exists($filex)) {
            readfile($filex);
        } else {
            readfile('../bma-modules/photo/user/user-default.jpg');
        }
    }
    
    /**
     * Tampilkan Foto Pegawai
     */
    function pegawai($nip = 'default') {
        header('Content-type: image/jpeg');
        $filex = '../bma-modules/photo/pegawai/' . $nip . '.jpg';
        if (file_exists($filex)) {
            readfile($filex);
        } else {
            readfile('../bma-modules/photo/pegawai/pegawai-default.jpg');
        }
    }

}
