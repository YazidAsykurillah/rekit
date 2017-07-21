<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function formatUang($angka) {
    return number_format($angka, 2, '.', ',') . ',-';
}

function is_multiarray($a) {
    $rv = array_filter($a, 'is_array');
    if (count($rv) > 0) {
        return true;
    }
    return false;
}

function list_of_files($path) {
    $ci = & get_instance();
    $ci->load->helper('directory');
    $map = directory_map($path);
    return $map;
}

function revDate($date, $e = '-', $i = '-') {
    if (strlen($date) > 2) {
        $x = explode($e, $date);
        $date = $x[2] . $i . $x[1] . $i . $x[0];
        return $date;
    } else {
        return NULL;
    }
}

function checkIfNotAjax() {
    $ci = & get_instance();
    if (!$ci->input->is_ajax_request()) {
        redirect(base_url('auth/'));
    }
}

function cekSelect2($args = array(), $postData) {
    foreach ($args as $val) {
        $postData[$val] = isset($postData[$val]) ? $postData[$val] : NULL;
    }
    return $postData;
}

function cekStatus($p) {
    $s = isset($p['status']) ? '1' : '0';
    return $s;
}

//---- Fungsi Mengecek Umur atau Masa Kerja ------------------------
function umurnya($birthday,$apa=0){
    list($year,$month,$day) = explode("-",$birthday);
    $year_diff  = date("Y") - $year;
    $month_diff = date("m") - $month;
    $day_diff   = date("d") - $day;
    if ($month_diff < 0)  {$year_diff--; $month_diff = $month_diff+$month;} elseif (($month_diff==0) && ($day_diff < 0)) {$year_diff--;}
    if ($apa == 0) {return $year_diff." Thn";} else { return $year_diff." Thn ".$month_diff." Bln";}
}

function getOption($val = null) {
    $ci = & get_instance();
    $s = $ci->db->get_where('options',array('opkey'=> $val))->row();
    return $s->opvalue;
}
