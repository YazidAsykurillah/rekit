<?php

class Dashboard extends BMA_Controller {

    function __construct() {
        $config = array('modules' => 'dashboard', 'jsfiles' => array('dashboard'));
        parent::__construct($config);
        $this->auth = $this->session->userdata('auth');
    }

    function index() {
        // Jika Operator redirect ke Process
        if ($this->auth['group_id'] == '3') {
            redirect('process');
        }
        $data['totaluser'] = $this->db->count_all('user') - 1;
//        $data['totaloperator'] = $this->db->where('group_id', '3')->from('user')->count_all_results();
//        $tglskrg = date("Y-m-d");
//        $data['recordharian'] = $this->db->like('start_time', $tglskrg)->from('process')->count_all_results();
//        $blnskrg = date("Y-m-");
//        $data['recordbulanan'] = $this->db->like('start_time', $blnskrg)->from('process')->count_all_results();
//        $temp = $this->db->select_max('start_time')->get('process')->row();
//        $temp = explode(' ', $temp->start_time);
//        $data['laststart_date'] = revDate($temp[0]);
//        $data['laststart_time'] = @$temp[1];
//        $temp = $this->db->select_max('finish_time')->get('process')->row();
//        $temp = explode(' ', $temp->finish_time);
//        $data['lastfinish_date'] = revDate($temp[0]);
//        $data['lastfinish_time'] = @$temp[1];
        $this->template->title('Dashboard');
        $this->template->set('icon', 'fa fa-dashboard');
        $this->template->build('dashboard/dashboard_v', $data);
    }

}
