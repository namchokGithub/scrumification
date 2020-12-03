<?php
/**
 * @Author	Jiranuwat Jaiyen       
 * @Create Date	22-03-2563
 *
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles Dashboard.
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
     * Display a Dashboard.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @return mixed
     */
    public function index()
    {
        $this->auth->authenticate();
		$scripts['scripts'][0] = "";
		$scripts['css'][0] = "";
		$detail['header'] = "Home";
		$scripts['Profile'][0] = $this->auth->user();
		$scripts['Profile'][1] = $this->auth->userRoles();
		$scripts['Profile'][2]= $this->auth->userName();
		$detail['Profile'][0]= $this->auth->user();
		$detail['Profile'][1]= $this->auth->userRoles();
		$detail['Profile'][2]= $this->auth->userName();
		$data['Data_list'] = $this->User->all_Activity();
		$data['userRoles'] = $this->auth->userWiseRoles();
		/**
		 *    กรณีลำดับไอดีตำแหน่งอยู่ไม่ได้อยู่ในช่วงมกุล จะถูกตรวจสอบ โดย ถ้าไอดีมากกว่า จะถูกนำไปลบระยะห่างของมกุล 
		*/
		if($data['userRoles'][0] >11){
			$data['userRoles'][0] = $data['userRoles'][0] - 16;
		}
		/*$scripts['scripts'][0] = 'assets/js/plugins/highchart/highcharts.js';
		$scripts['scripts'][1] = 'assets/js/moment.js';
		$scripts['scripts'][2] = 'assets/js/daterangepicker.js';
		$scripts['css'][1] = 'assets/css/custom.css';*/
		$this->load->view('includes/header',$scripts);
		$this->load->view('includes/sidebar',$detail);
		$this->load->view('v_home',$data);
		$this->load->view('includes/footer');
    }
	
	/**
     * Get List Activity.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
	 * @param role_id
     * @return Json Data
     */
	public function get_Activity($role_id=0){
		echo json_encode($this->User->Activity_by_count($role_id)); 
	}
	
	/**
     * Get All Achievement by role id.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
	 * @param role_id
     * @return Json Data
     */
	public function get_all_Achievement($role_id=0){
		echo json_encode($this->User->get_all_Achievement($role_id));
	}
	
    /**
     * Calulate All Role Point
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @return mixed
     */
	public function calulate_point(){
		$this->User->calulate_point();
	}
	
	
    /**
     * Upload File.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @return string
     */
	public function upload_file_image(){
		/* Getting file name */
		$filename = $_FILES['file']['name'];

		/* Location */
		$location = "/home/htdocs/gami_ossd/assets/dist/img/user/".$this->auth->userName().".jpg";
		$uploadOk = 1;
		echo $imageFileType = pathinfo($location,PATHINFO_EXTENSION);

		/* Valid Extensions */
		$valid_extensions = array("jpg");
		/* Check file extension */
		if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
		   $uploadOk = 0;
		}

		if($uploadOk == 0){
		   echo 1;
		}else{
		   /* Upload file */
		   if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
			  echo $location;
		   }else{
			  echo 2;
		   }
		}
	}
}