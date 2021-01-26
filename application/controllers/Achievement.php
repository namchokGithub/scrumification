<?php
/**
 * @Author	Jiranuwat Jaiyen       
 * @Create Date	22-03-2563
 *
 */
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/BaseController.php");
class Achievement extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Achievement Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles Achievement.
	| @Author Jiranuwat Jaiyen       
	| @Create Date	22-03-2563
    |
    */
    public function __construct()
    {
        parent::__construct();
        $this->auth->authenticate();
    }

    /**
     * Display a Achievement.
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
				$id = 1;
			}
		}
		if($id >= 11) {
			$id = 1;	
		} // End set id
		
		$scripts['scripts'][0] = "assets/dist/js/countdown.js";
		$scripts['scripts'][1] = 'assets/bower_components/moment/moment.js';
		$scripts['scripts'][2] = 'assets/bower_components/OwlCarousel2/dist/owl.carousel.min.js';
		$scripts['scripts'][3] = 'assets/bower_components/toastr/toastr.min.js';
		$scripts['css'][0] = "assets/bower_components/OwlCarousel2/dist/assets/owl.carousel.min.css";
		$scripts['css'][1] = "assets/bower_components/OwlCarousel2/dist/assets/owl.theme.default.min.css";
		$scripts['css'][2] = "assets/bower_components/toastr/toastr.min.css";
		
		$data['Profile_role']= $this->auth->userRoles();
		$data['point_list'] = $this->User->get_all_point();
		$data['individual_list'] = $this->User->get_all_individual();
		$data['Secon_target']= $this->User->can_Activity();
		$data['Role_can'] = $this->User->find_by_username($this->auth->userName());
		$data['id'] = $id;

		$scripts['temp_scripts'] = '';
		$detail['header'] = "Shopping";
    	$this->output('v_achievement', $data, $scripts, $detail);
    }
	
	/**
     * Buy Item With User Point
     *
     * @return Json Data
     */
	public function BuyItem($item,$count,$target_id = 9999){
		if($count<=0){
			$data['type']="Count";
			echo json_encode($data);
			return ;
		}
		if(hasRole(['ScrumMaster'])){
			$target = $target_id;
		}
		else
		{
			$target = $this->auth->roles[0];
		}
		echo json_encode($this->User->Buyitem(['item_id' => $item, 'count' => $count, 'target'=>$target])); 
	}
	
	/**
     * Buy Item With User Point
     *
     * @return Json Data
     */
	public function UseItem($item, $target_id = 9999){
		if(hasRole(['ScrumMaster'])){
			$target = $target_id;
		}
		else{
			$data['type']="Error";
			return $data;
		}
		echo json_encode($this->User->Useitem([ 'item_id' => $item, 'target'=>$target])); 
	}
	/**
     * Get List Item.
     *
     * @return Json Data
     */
	public function get_Item(){
		echo json_encode($this->User->get_Item()); 
	}
	
	/**
     * Get All User Point.
     *
     * @return Json Data
     */
	public function get_Point($target_id = 9999){
		$Secon_role = $this->User->can_Activity();
		if(hasRole(['ScrumMaster'])){
			$target = $target_id;
		}
		else if($this->User->can_add_Activity_by_role_id($target_id)){
			$target = $target_id;
		}
		else{
			$target = $this->auth->roles[0];
		}
		echo json_encode($this->User->get_Point($target)); 
	}
	
	/**
     * Get All Inventory.
     *
     * @return Json Data
     */
	public function get_Inventory($target_id = 9999){
		if(hasRole(['ScrumMaster'])){
			$target = $target_id;
		}
		else if($this->User->can_add_Activity_by_role_id($target_id)){
			$target = $target_id;
		}
		else{
			$target = $this->auth->roles[0];
		}
		echo json_encode($this->User->get_Inventory($target)); 
	}
}