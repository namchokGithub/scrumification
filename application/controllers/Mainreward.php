<?php
/**
 * @Author	Jiranuwat Jaiyen       
 * @Create Date	22-03-2563
 *
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class MainReward extends CI_Controller
{
    /*
    |--------------------------------------------------------------------------
    | MainReward Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles MainReward.
	| @Author	Jiranuwat Jaiyen       
	| @Create Date	22-03-2563
    |
    */
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('asia/bangkok');
		$this->load->library('auth');
		//var_dump(can(['Editor', 'publish-posts']));
    }

    /**
     * Display a MainReward.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @return mixed
     */
    public function index($id="",$targle=0)
    {
		/**
		 *    กำหนดค่า id สำหรับมกุล ว่าอยู่ในช่วงใด เผื่อที่จะเลือกrole ที่ถูกต้องในการแสดง
		*/
		if($id=="") {
			$id = $this->auth->roles();
			$id = $id[0];
			// echo $id; die;
			// var_dump($this->auth->roles()); die;
			
			/**
			 *    กรณีไอดีมกุลอยู่ไม่ได้อยู่ในช่วง จะถูกตรวจสอบ โดย ถ้าไอดีมากกว่า จะถูกนำไปลบระยะห่างของมกุล 
			 */
			if($id>13){
				$id = $id - 13;
			}
			if($id <1 || $id>11) // ถ้าid ไม่ได้อยู่ช่วง ให้กำหนดเป็นมกุล 0 โดยทันที
			{ 
				$id = 0;
			}
		}
		if($id >= 10) {
			$id = 0;	
		}  // End set id

        $this->auth->authenticate();
		$scripts['scripts'][0] = "assets/dist/js/countdown.js";
		$scripts['scripts'][1] = 'assets/bower_components/moment/moment.js';
		$scripts['scripts'][2] = 'assets/bower_components/OwlCarousel2/dist/owl.carousel.min.js';
		$scripts['scripts'][3] = 'assets/bower_components/toastr/toastr.min.js';
		$scripts['css'][0] = "assets/bower_components/OwlCarousel2/dist/assets/owl.carousel.min.css";
		$scripts['css'][1] = "assets/bower_components/OwlCarousel2/dist/assets/owl.theme.default.min.css";
		$scripts['css'][2] = "assets/bower_components/toastr/toastr.min.css";
		$detail['header'] = "MainReward";
		$scripts['Profile'][0] = $this->auth->user();
		$scripts['Profile'][1] = $this->auth->userRoles();
		$scripts['Profile'][2]= $this->auth->userName();
		$detail['Profile'][0]= $this->auth->user();
		$detail['Profile'][1]= $this->auth->userRoles();
		$detail['Profile'][2]= $this->auth->userName();
		$data['Data_list'] = $this->User->all_Activity();
		$data['User_list'] = $this->User->find_by_role($id+1);
		$data['id'] = $id;
		$data['targle'] = $targle;
		/*$scripts['scripts'][0] = 'assets/js/plugins/highchart/highcharts.js';
		
		$scripts['scripts'][2] = 'assets/js/daterangepicker.js';
		$scripts['css'][1] = 'assets/css/custom.css';*/
		$this->load->view('includes/header',$scripts);
		$this->load->view('includes/sidebar',$detail);
		$this->load->view('v_mainreward',$data);
		$this->load->view('includes/footer');
    }
	
	/**
     * Check in Activity .
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
	 * @param id
	 * @param user_id
     * @return Json Data
     */
	public function add_Activity($id=0,$user_id=0){
		$action = 1;
		if(hasRole(['ScrumMaster'])){
			$action = 0;
		}
		if($this->User->can_add_Activity($user_id)){
			$action = 0;
		}
		if($action){
			echo "คุณไม่มีสิทธิ์เข้าถึง";
			return ;
		}
		echo $this->User->add_Activity([ 'activity_id' => $id, 'user_id' => $user_id,'time' => date("Y-m-d H:i:s")]); 
	}
	
	/**
     * Get List Activity .
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
	 * @param id
	 * @param role_id
     * @return Json Data
     */
	public function get_Activity($id=0,$role_id=0){
		echo json_encode($this->User->Activity_by_role($id,$role_id)); 
	}
}