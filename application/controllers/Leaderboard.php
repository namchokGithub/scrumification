<?php
/**
 * @Author	Jiranuwat Jaiyen       
 * @Create Date	22-03-2563
 *
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Leaderboard extends CI_Controller
{
    /*
    |--------------------------------------------------------------------------
    | Leaderboard Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles Leaderboard.
	| @Author	Jiranuwat Jaiyen       
	| @Create Date	22-03-2563
    |
    */
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('asia/bangkok');
		$this->load->model("Data_manager","DM");
		$this->load->library('auth');
		//var_dump(can(['Editor', 'publish-posts']));
    }

    /**
     * Display a Leaderboard.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @return mixed
     */
    public function index()
    {
        $this->auth->authenticate();
		$scripts['scripts'][0] = 'assets/bower_components/toastr/toastr.min.js';
		$scripts['css'][0] = "assets/bower_components/toastr/toastr.min.css";
		$detail['header'] = "Leaderboard";
		$scripts['Profile'][0] = $this->auth->user();
		$scripts['Profile'][1] = $this->auth->userRoles();
		$scripts['Profile'][2]= $this->auth->userName();
		$detail['Profile'][0]= $this->auth->user();
		$detail['Profile'][1]= $this->auth->userRoles();
		$detail['Profile'][2]= $this->auth->userName();
		$data['point_list'] = $this->User->get_all_point();
		$data['individual_list'] = $this->User->get_all_individual();
		$data['Profile']= $this->auth->userRoles();
		$data['is_show'] = $this->DM->get_data("show_topic",array("page"=>"LeaderBoard"));
		/*$scripts['scripts'][0] = 'assets/js/plugins/highchart/highcharts.js';
		
		$scripts['scripts'][2] = 'assets/js/daterangepicker.js';
		$scripts['css'][1] = 'assets/css/custom.css';*/
		$this->load->view('includes/header',$scripts);
		$this->load->view('includes/sidebar',$detail);
		$this->load->view('v_leaderboard',$data);
		$this->load->view('includes/footer');
    }
	
	/**
     * Get All Point.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @return Json Data
     */
	public function get_all_point(){
		echo json_encode($this->User->get_all_point()); 
	}

    /**
     * Edit Data.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @return mixed
     */
    public function update_status_show()
    {	
		if(!hasRole(['ScrumMaster'])){
			redirect('home');
		}
		$data = $this->input->post();
		var_dump($data);
		if($data['is_checked'] =="true"){
        $this->DM->edit_data("show_topic", array("id"=>"1","page"=>"LeaderBoard","status"=>"1"));
		}
		else{
        $this->DM->edit_data("show_topic", array("id"=>"1","page"=>"LeaderBoard","status"=>"0"));
		}
    }
}