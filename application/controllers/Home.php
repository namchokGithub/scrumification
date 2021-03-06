<?php
/**
 * @Author	Jiranuwat Jaiyen       
 * @Create Date	22-03-2563
 * @Update by: Namchok Singhachai
 * @Create Date	07-12-2563
 */
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/BaseController.php");
class Home extends BaseController
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
    } // End construct

    /**
     * Display a Dashboard.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @return mixed
     */
    public function index()
    {
    	$this->output('v_home');
    } // End index
	
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
	} // get_Activity
	
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
	} // get_all_Achievement
	
    /**
     * Calulate All Role Point
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @return mixed
     */
	public function calulate_point(){
		$this->User->calulate_point();
	} // calulate_point
	
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
	} // upload_file_image
}