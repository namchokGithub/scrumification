<?php
/**
 * @Author Namchok Singhachai
 * @Create Date	5-02-2564
 *
 */
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/BaseController.php");
class Kanban extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Kanban board Controller
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
     * @return mixed
     */
    public function index()
    {
        $data["temp_data"] = '';
		$scripts['temp_scripts'] = '';
		$detail['header'] = "Kanban board";
    	$this->output('v_Kanban', $data, $scripts, $detail);
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