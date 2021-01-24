<?php
/**
 * @Author	Jiranuwat Jaiyen       
 * @Create Date	22-03-2563
 *
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Challenger extends CI_Controller
{
    /*
    |--------------------------------------------------------------------------
    | Challenger Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles Challenger.
	| @Author	Jiranuwat Jaiyen       
	| @Create Date	22-03-2563
    |
    */
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('asia/bangkok');
		$this->load->library('auth');
        $this->auth->authenticate();
		//var_dump(can(['Editor', 'publish-posts']));
    }

    /**
     * Display a Challenger.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @return mixed
     */
    public function index($id="")
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
		} // End set id

		$scripts['scripts'][0] = "";
		$scripts['css'][0] = "";
		$detail['header'] = "Challenger";
		$scripts['Profile'][0] = $this->auth->user();
		$scripts['Profile'][1] = $this->auth->userRoles();
		$scripts['Profile'][2]= $this->auth->userName();
		$detail['Profile'][0]= $this->auth->user();
		$detail['Profile'][1]= $this->auth->userRoles();
		$detail['Profile'][2]= $this->auth->userName();
		$data['User_list'] = $this->User->find_by_role($id+1);
		$data['cluster_id'] = $id;

		$this->load->view('includes/header',$scripts);
		$this->load->view('includes/sidebar',$detail);
		$this->load->view('v_challenger',$data);
		$this->load->view('includes/footer');
    }
	
}