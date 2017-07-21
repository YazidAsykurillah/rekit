<?php

class Temp extends BMA_Controller {

    function __construct() {
        $config = array('modules' => 'pegawai', 'jsfiles' => array('anak'));
        parent::__construct($config);
    }

    function ubahtanggal() {
        $this->bmamdl->table = 'test';
        $hsl = $this->db->select('nip,tgllhr')->get('test')->result();
        foreach ($hsl as $key => $val) {
            $tgll = str_replace(' ', '', $val->tgllhr);
            $tgll = revDate($tgll);
            $data = array(
                'tgllahir' => $tgll,
            );
            $this->db->where('nip', $val->nip)->update('test', $data);
        }
        echo "SELESAI";
    }

    function transfer_test() {
        $this->bmamdl->table = 'test';
        $hsl = $this->db->select('nip,niplama,nama,gdpn,gblk,tgllhr,kelamin')->get('test')->result();
        foreach ($hsl as $key => $val) {
            $data = array(
                'nip' => $val->nip,
                'niplama' => $val->niplama,
                'nama' => $val->nama,
                'gdpn' => $val->gdpn,
                'gblk' => $val->gblk,
                'tgllhr' => $val->tgllhr,
                'kelamin' => $val->kelamin
            );
            $this->db->insert('pegawai', $data);
        }
        echo "SELESAI";
    }

}
