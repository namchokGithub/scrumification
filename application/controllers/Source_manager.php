<?php
/**
 * @Author	Jiranuwat Jaiyen       
 * @Create Date	22-03-2563
 *
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Source_manager extends CI_Controller
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
        date_default_timezone_set('asia/bangkok');
		$this->load->model("Data_manager","DM");
		$this->load->library('auth');
		
		if(!hasRole(['ScrumMaster'])){
			redirect('home');
		}
    }
	
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
		$detail['header'] = $name." Manager";
		$scripts['Profile'][0] = $this->auth->user();
		$scripts['Profile'][1] = $this->auth->userRoles();
		$scripts['Profile'][2]= $this->auth->userName();
		$detail['Profile'][0]= $this->auth->user();
		$detail['Profile'][1]= $this->auth->userRoles();
		$detail['Profile'][2]= $this->auth->userName();
		$data="";
		/*$scripts['scripts'][0] = 'assets/js/plugins/highchart/highcharts.js';
		$scripts['scripts'][1] = 'assets/js/moment.js';
		$scripts['scripts'][2] = 'assets/js/daterangepicker.js';
		$scripts['css'][1] = 'assets/css/custom.css';*/
		$this->load->view('includes/header',$scripts);
		$this->load->view('includes/sidebar',$detail);
		$this->load->view("manager/v_".$name,$data);
		$this->load->view('includes/footer');
    }
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
        $this->DM->add_data($name_table,$data);
		echo json_encode($data);
    }

	
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
		$this->User->add($data);
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
}
?>