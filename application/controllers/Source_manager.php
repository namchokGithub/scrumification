<?php
/**
 * @Author	Jiranuwat Jaiyen       
 * @Create Date	22-03-2563
 *
 */
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/BaseController.php");
class Source_manager extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Source Manager Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles Source Manager.
	| @Author	Jiranuwat Jaiyen       
	| @Create Date	22-03-2563
    |
    */
    public function __construct()
    {
        parent::__construct();
	
		$this->load->model("Data_manager","DM");
		$this->load->model("User","US");
		if(!hasRole(['ScrumMaster']) && !hasRole(['Administrator'])){
			redirect('home');
		}
	}
	//-----------------------------------  End __contructor -----------------------------------
	
	/**
     * Display a Setup System.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @return mixed
     */
    public function Setup_View($name)
    {
		$scripts['scripts'][0] = "assets/bower_components/datatables/js/jquery.dataTables.min.js";
		$scripts['scripts'][1] = "assets/bower_components/datatables/js/dataTables.altEditor.free.js";
		$scripts['scripts'][2] = "assets/bower_components/datatables/js/dataTables.buttons.min.js";
		$scripts['scripts'][3] = "assets/bower_components/datatables/js/dataTables.select.min.js";
		$scripts['scripts'][4] = "assets/bower_components/other/jquery.datetimepicker.full.js";
		$scripts['scripts'][5] = "assets/bower_components/other/select2.js";
		$scripts['scripts'][6] = 'assets/bower_components/toastr/toastr.min.js';
		$scripts['css'][0] = "assets/bower_components/datatables/css/jquery.dataTables.min.css";
		$scripts['css'][1] = "assets/bower_components/datatables/css/editor.dataTables.min.css";
		$scripts['css'][2] = "assets/bower_components/datatables/css/buttons.dataTables.min.css";
		$scripts['css'][3] = "assets/bower_components/datatables/css/select.dataTables.min.css";
		$scripts['css'][4] = "assets/bower_components/other/jquery.datetimepicker.css";
		$scripts['css'][5] = "assets/bower_components/other/select2.css";
		$scripts['css'][6] = "assets/bower_components/toastr/toastr.min.css";
		
		if($name == "UserAchievement")
		{
			$detail['header'] = "User Achievement";
		} 
		else if($name == "UserIndividual")
		{
			$detail['header'] = "User Individual";
		}
		else if($name == "Roles_users")
		{
			$detail['header'] = "Roles";
		} 
		else if($name == "RoleManager")
		{
			$detail['header'] = "Roles";
		} 
		else if($name == "Request_Item")
		{
			$data['Secon_target']= $this->User->can_Activity();
			$detail['header'] = "Request Item";
		} 
		else if($name == "ActivityReport")
		{
			$detail['header'] = "Report";
		} 
		else if($name == "AssignRole")
		{
			$detail['header'] = "Assign Role";
		} 
		else if($name == "Individual")
		{
			$detail['header'] = "Individual Achievement";
		}
		else if($name == "AchievementReport")
		{
			$detail['header'] = "Achievement Report";
		}
		else if($name == "Users")
		{
			$detail['header'] = "Users manangement";
			$data['roles'] = $this->get_roles(); 
			// $data['roles'] = $this->get_data('roles'); 
			/***----------- */
		}
		else 
		{
			$detail['header'] = $name;
		}
		
		$data['temp_data404'] = "404";

		$scripts['temp_scripts'] = '';
		$this->output("manager/v_".$name, $data, $scripts, $detail);
	}
	//-----------------------------------  End Setup_View -----------------------------------
	
	/**
     * Display a ViewManager.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @return mixed
     */
	public function index($name){
		$this->Setup_View($name);
	}
	//-----------------------------------  End index -----------------------------------
	
	/**
     * Select Data.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @return Json Data
     */
	public function get_data($name_table)
    {
		$data = $this->input->post();
        echo json_encode($this->DM->get_data($name_table,$data));
    }

	/**
     * Select User Data.
     *
	 * @Author	Namchok Singhachai     
	 * @Create Date	12-03-2564
     * @return Json Data
     */
	public function get_user_data($name_table)
    {
		$data = $this->input->post();
        echo json_encode($this->DM->get_user_data($name_table,$data));
    }

	/**
     * Select roles.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     */
	public function get_roles()
    {
        return $this->DM->get_roles();
    }
	
	/**
     * Insert Data.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
	 * @return mixed
     */
    public function add_data($name_table)
    {
		$data = $this->input->post();
		unset($data['addRowBtn']);
		unset($data['undefined']);
		unset($data['1']);
		unset($data['x']);
        $this->DM->add_data($name_table,$data);
		echo json_encode($data);
    }

	/**
     * Insert Data with role.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
	 * @return mixed
     */
    public function add_user_with_role($name_table)
    {
		$data = $this->input->post("rowdata");
		$role_id = $this->input->post("role_id");
		unset($data['addRowBtn']);
		unset($data['undefined']);
		$data["password"] = password_hash($data["password"], PASSWORD_BCRYPT);
        $this->DM->add_data($name_table,$data);

		// Get id from username 
		$users_id =  $this->DM->get_id_by_user($data["name"])->row();
	
		// Asign roles$users_id
		$this->DM->add_user_with_role($role_id,$users_id->id);

		echo json_encode($data);
    }

	/**
     * Insert Role Data.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
	 **@Update Namchok Singhachai
	 * @return mixed
     */
    public function add_role_data($name_table)
    {
		$data = $this->input->post();
		unset($data['1']);
		unset($data['addRowBtn']);
		unset($data['undefined']);
        $this->DM->add_data($name_table,$data);
		echo json_encode($data);
    } // End add_role_data

	/**
     * Update Role Data.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
	 **@Update Namchok Singhachai
	 * @return mixed
     */
    public function edit_role_data($name_table)
    {
		$data = $this->input->post();
		unset($data['x']);
		unset($data['1']);
		unset($data['editRowBtn']);
		unset($data['undefined']);
        $this->DM->edit_data($name_table,$data);
		echo json_encode($data);
    } // End edit_role_data

	/**
     * Insert Data (No1).
     * No1 for datatable with role order number
	 * @Author	Namchok 
	 * @Create Date	22-03-2563
	 **@Update Namchok Singhachai
	 * @return mixed
     */
    public function add_no1_data($name_table)
    {
		$data = $this->input->post();
		unset($data['1']);
		unset($data['addRowBtn']);
		unset($data['undefined']);
        $this->DM->add_data($name_table,$data);
		echo json_encode($data);
    } // End add_role_data

	/**
     * Update Data (No1).
     * No1 for datatable with role order number
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
	 **@Update Namchok Singhachai
	 * @return mixed
     */
    public function edit_no1_data($name_table)
    {
		$data = $this->input->post();
		unset($data['1']);
		unset($data['editRowBtn']);
		unset($data['undefined']);
        $this->DM->edit_data($name_table,$data);
		echo json_encode($data);
    } // End edit_role_data

	/**
     * Insert User.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
	 * @return mixed
     */
    public function add_user($name_table)
    {
		$data = $this->input->post();
		unset($data['addRowBtn']);
		unset($data['undefined']);
		$data["password"] = password_hash($data["password"], PASSWORD_BCRYPT);
		$this->User->add($data);
		echo json_encode($data);
	}
	
    /**
     * Edit Data user.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @return mixed
     */
    public function edit_user($name_table)
    {
		$data = $this->input->post();
		unset($data['1']);
		unset($data['x']);
		unset($data['editRowBtn']);
		unset($data['editRowBtn']);
		unset($data['undefined']);
		$data["password"] = password_hash($data["password"], PASSWORD_BCRYPT);
        $this->DM->edit_data($name_table, $data);
		echo json_encode($data);
    }
	
    /**
     * Edit Data.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @return mixed
     */
    public function edit_data($name_table)
    {
		$data = $this->input->post();
		unset($data['1']);
		unset($data['x']);
		unset($data['editRowBtn']);
		unset($data['editRowBtn']);
		unset($data['undefined']);
        $this->DM->edit_data($name_table, $data);
		echo json_encode($data);
    }

    /**
     * Delete Data.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @return mixed
     */
    public function delete_data($name_table)
    {
		$data = $this->input->post();
		unset($data['1']);
        return $this->DM->delete_data($name_table, $data);
    }

    /**
     * Edit Data.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @return mixed
     */
    public function edit_data_with_twoid($name_table)
    {
		$data = $this->input->post();
		unset($data['editRowBtn']);
		unset($data['undefined']);
        $this->DM->edit_data_with_twoid($name_table, $data);
		echo json_encode($data);
    }

    /**
     * Delete Data.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @return mixed
     */
    public function delete_data_with_twoid($name_table)
    {
		$data = $this->input->post();
		unset($data['deleteRowBtn']);
		unset($data['undefined']);
        return $this->DM->delete_data_with_twoid($name_table, $data);
    }


	/**
     * Get activity report
     *
	 * @Author	Namchok Singhachai
	 * @Create Date	12-02-2564
     * @return mixed
     */
	public function get_activity($dateStart = "2021-01-01", $dateEnd = "2021-12-31")
	{	
		$data["SprintPlanning"] = array(
			$this->DM->get_activity("2", "1", $dateStart, $dateEnd),
			$this->DM->get_activity("2", "2", $dateStart, $dateEnd),
			$this->DM->get_activity("2", "3", $dateStart, $dateEnd),
			$this->DM->get_activity("2", "4", $dateStart, $dateEnd),
			$this->DM->get_activity("2", "5", $dateStart, $dateEnd),
			$this->DM->get_activity("2", "6", $dateStart, $dateEnd),
			$this->DM->get_activity("2", "7", $dateStart, $dateEnd),
			$this->DM->get_activity("2", "8", $dateStart, $dateEnd),
			$this->DM->get_activity("2", "9", $dateStart, $dateEnd),
			$this->DM->get_activity("2", "10", $dateStart, $dateEnd)
		);
		$data["SprintReview"] = array(
			$this->DM->get_activity("3", "1", $dateStart, $dateEnd),
			$this->DM->get_activity("3", "2", $dateStart, $dateEnd),
			$this->DM->get_activity("3", "3", $dateStart, $dateEnd),
			$this->DM->get_activity("3", "4", $dateStart, $dateEnd),
			$this->DM->get_activity("3", "5", $dateStart, $dateEnd),
			$this->DM->get_activity("3", "6", $dateStart, $dateEnd),
			$this->DM->get_activity("3", "7", $dateStart, $dateEnd),
			$this->DM->get_activity("3", "8", $dateStart, $dateEnd),
			$this->DM->get_activity("3", "9", $dateStart, $dateEnd),
			$this->DM->get_activity("3", "10", $dateStart, $dateEnd)
		); 	
		$data["SprintRetrospect"] = array(
			$this->DM->get_activity("4", "1", $dateStart, $dateEnd),
			$this->DM->get_activity("4", "2", $dateStart, $dateEnd),
			$this->DM->get_activity("4", "3", $dateStart, $dateEnd),
			$this->DM->get_activity("4", "4", $dateStart, $dateEnd),
			$this->DM->get_activity("4", "5", $dateStart, $dateEnd),
			$this->DM->get_activity("4", "6", $dateStart, $dateEnd),
			$this->DM->get_activity("4", "7", $dateStart, $dateEnd),
			$this->DM->get_activity("4", "8", $dateStart, $dateEnd),
			$this->DM->get_activity("4", "9", $dateStart, $dateEnd),
			$this->DM->get_activity("4", "10", $dateStart, $dateEnd)
		); 	
		$data["DailyScrum"] = array(
			$this->DM->get_activity("17", "1", $dateStart, $dateEnd),
			$this->DM->get_activity("17", "2", $dateStart, $dateEnd),
			$this->DM->get_activity("17", "3", $dateStart, $dateEnd),
			$this->DM->get_activity("17", "4", $dateStart, $dateEnd),
			$this->DM->get_activity("17", "5", $dateStart, $dateEnd),
			$this->DM->get_activity("17", "6", $dateStart, $dateEnd),
			$this->DM->get_activity("17", "7", $dateStart, $dateEnd),
			$this->DM->get_activity("17", "8", $dateStart, $dateEnd),
			$this->DM->get_activity("17", "9", $dateStart, $dateEnd),
			$this->DM->get_activity("17", "10", $dateStart, $dateEnd)
		); 	
		echo json_encode($data);
	} // End get_activity

	 /**
     * Toggle id of actitvity
     * 
     * @Author: Namchok Singhachai
     * @Crate: 14-02-2564
     */
    public function toggle_activity($id){
		$this->DM->toggle_activity($id);
    } // End toggle activity

	/**
     * Log shop with roles
     * 
     * @Author: Namchok Singhachai
     * @Crate: 15-02-2564
     */
    public function get_log_shop(){
		echo json_encode($this->DM->get_log_shop());
    } // End get_log_shop
	
	/**
     * Log shop with roles
     * 
     * @Author: Namchok Singhachai
     * @Crate: 15-02-2564
     */
    public function get_log_shop_request(){
		echo json_encode($this->DM->get_log_shop_request());
    } // End get_log_shop

	// /**
    //  * Get activity report with member
    //  *
	//  * @Author	Namchok Singhachai
	//  * @Create Date	12-02-2564
    //  * @return mixed
    //  */
	// public function get_activity_with_member($dateStart = "2021-01-01", $dateEnd = "2021-12-31", $group)
	// {	
	// 	$data["SprintPlanning"] = $this->DM->get_activity_by_group("2", $group, $dateStart, $dateEnd);
	// 	$data["SprintReview"] = $this->DM->get_activity_by_group("3", $group, $dateStart, $dateEnd); 	
	// 	$data["SprintRetrospect"] = $this->DM->get_activity_by_group("4", $group, $dateStart, $dateEnd); 	
	// 	$data["DailyScrum"] = $this->DM->get_activity_by_group("17", $group, $dateStart, $dateEnd);
	// 	$data["Member"] = $this->User->find_by_role($group);
	// 	echo json_encode($data);
	// } // End get_activity_with_member

	/**
     * Update time activity
     *
	 * @Author	Namchok Singhachai
	 * @Create Date	7-03-2564
     * @return mixed
     */
    public function updateTimeActity()
    {
		$id = $this->input->post("id");
		$timeStart = $this->input->post("timeStart");
		$timeEnd = $this->input->post("timeEnd");
		$dateStart = $this->input->post("dateStart");
		$dateEnd = $this->input->post("dateEnd");
        return $this->DM->updateTimeActity($id, $timeStart, $timeEnd, $dateStart, $dateEnd);
    }

	//**-------------------------------------------------------------------------------------- */

	/**
     * Get achievement by group.
     *
	 * @Author	  Thutsaneeya Chanrong
	 * @Create Date 10-02-2564
     * @return Json Data
     */
	public function get_achievement_by_group($role_id)
    {
        echo json_encode($this->DM->get_achievement_by_group($role_id));
    }

	/**
     * Get name group.
     *
	 * @Author	 Thutsaneeya Chanrong
	 * @Create Date 10-02-2564
     * @return Json Data
     */
	public function get_name_group()
    {
        echo json_encode($this->DM->get_name_group());
    }

	/**
     * Get member by group.
     *
	 * @Author   Thutsaneeya Chanrong
	 * @Create Date 11-02-2564
     * @return Json Data
     */
	public function get_member_by_group($roles_user_id)
    {
        echo json_encode($this->DM->get_member_by_group($roles_user_id));
    }

	/**
     * Import file.
     *
	 * @Author   Thutsaneeya Chanrong
	 * @Create Date 1-03-2564
     * @return Json Data
     */
	function loadStudent() {

		if ($_FILES["csv_file"]["name"])
		{
			$count=0;
			$data = array();
			$fp = fopen($_FILES['csv_file']['tmp_name'],'r') or die("can't open file");

			while($csv_line = fgetcsv($fp,1024))
			{
				$count++;
				if($count == 1)
				{
					continue;
				} // keep this if condition if you want to remove the first row
				array_push($data, array('name' => $csv_line[0] , 'username' => $csv_line[1], 'password' => $csv_line[2], 'code' => $csv_line[3]));
			}
			fclose($fp) or die("can't close file");
		} else {
			$data = "Fails";
		}
		echo json_encode($data);
	}

	public function AchievementReport($id="1") {
		$scripts['scripts'][0] = "assets/bower_components/datatables/js/jquery.dataTables.min.js";
		$scripts['scripts'][1] = "assets/bower_components/datatables/js/dataTables.altEditor.free.js";
		$scripts['scripts'][2] = "assets/bower_components/datatables/js/dataTables.buttons.min.js";
		$scripts['scripts'][3] = "assets/bower_components/datatables/js/dataTables.select.min.js";
		$scripts['scripts'][4] = "assets/bower_components/other/jquery.datetimepicker.full.js";
		$scripts['scripts'][5] = "assets/bower_components/other/select2.js";
		$scripts['scripts'][6] = 'assets/bower_components/toastr/toastr.min.js';
		$scripts['css'][0] = "assets/bower_components/datatables/css/jquery.dataTables.min.css";
		$scripts['css'][1] = "assets/bower_components/datatables/css/editor.dataTables.min.css";
		$scripts['css'][2] = "assets/bower_components/datatables/css/buttons.dataTables.min.css";
		$scripts['css'][3] = "assets/bower_components/datatables/css/select.dataTables.min.css";
		$scripts['css'][4] = "assets/bower_components/other/jquery.datetimepicker.css";
		$scripts['css'][5] = "assets/bower_components/other/select2.css";
		$scripts['css'][6] = "assets/bower_components/toastr/toastr.min.css";
		$detail['header'] = " Achievement Report";
		$scripts['Profile'][0] = $this->auth->user();
		$scripts['Profile'][1] = $this->auth->userRoles();
		$scripts['Profile'][2]= $this->auth->userName();
		$detail['Profile'][0]= $this->auth->user();
		$detail['Profile'][1]= $this->auth->userRoles();
		$detail['Profile'][2]= $this->auth->userName();

		$data['group'] = $id;
		$this->load->view('includes/header',$scripts);
		$this->load->view('includes/sidebar',$detail);
		$this->load->view("manager/v_Achievement_Report",$data);
		$this->load->view('includes/footer');
	}

	/**
     * Get data by group.
     *
	 * @Author	 Thutsaneeya Chanrong
	 * @Create Date 10-02-2564
     * @return Json Data
     */
	public function get_data_by_group()
    {
        echo json_encode($this->DM->get_data_by_group());
    }
}
?>