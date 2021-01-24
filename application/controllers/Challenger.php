<?php
/**
 * @Author	Jiranuwat Jaiyen       
 * @Create Date	22-03-2563
 * Update: Namchok Singhachai
 */
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/BaseController.php");
class Challenger extends BaseController
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
    } // End construct

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
			if($id <1 || $id>11) // ถ้า id ไม่ได้อยู่ช่วง ให้กำหนดเป็นมกุล 0 โดยทันที
			{ 
				$id = 1;
			}
		}

		if($id > 10) {
			$id = 1;
		} // End set id

		// +1 For Cluster SE BUU
		$data['User_list'] = $this->User->find_by_role($id);
		$data['cluster_id'] = $id;

		$this->output('v_challenger', "Challenger", $data);
    }
	
}