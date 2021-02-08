<?php
/**
 * @Author	Jiranuwat Jaiyen       
 * @Create Date	22-03-2563
 **@Update Namchok Singhachai
 */
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/BaseController.php");
class Leaderboard extends BaseController
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
		$this->load->model("Data_manager","DM");
    } // End construct

    /**
     * Display a Leaderboard.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     **@Update Namchok Singhachai
     * @return mixed
     */
    public function index()
    {
		$scripts['scripts'][0] = 'assets/bower_components/toastr/toastr.min.js';
		$scripts['css'][0] = "assets/bower_components/toastr/toastr.min.css";
		$data['point_list'] = $this->User->get_all_point();
		$data['individual_list'] = $this->User->get_all_individual();
		$data['Profile']= $this->auth->userRoles();
		$data['is_show'] = $this->DM->get_data("show_topic",array("page"=>"LeaderBoard"));
		
		$scripts['temp_scripts'] = '';
		$detail['header'] = "Leaderboard";
    	$this->output('v_leaderboard', $data, $scripts, $detail);
    } // End index
	
	/**
     * Get All Point.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     **@Update Namchok Singhachai
     * @return Json Data
     */
	public function get_all_point(){
		echo json_encode($this->User->get_all_point()); 
	} // End get_all_point

    /**
     * Edit Data.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     **@Update Namchok Singhachai
     * @return mixed
     */
    public function update_status_show()
    {	
		if(!hasRole(['ScrumMaster'])){
			redirect('home');
		} // Check role

		$data = $this->input->post();
		// var_dump($data);
		if($data['is_checked'] =="true"){
            $this->DM->edit_data("show_topic", array("id"=>"1","page"=>"LeaderBoard","status"=>"1"));
		}
		else{
            $this->DM->edit_data("show_topic", array("id"=>"1","page"=>"LeaderBoard","status"=>"0"));
		}
    } // End update_status_show
}