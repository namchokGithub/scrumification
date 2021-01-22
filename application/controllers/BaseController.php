<?php
/**
 * @Author: Namchok Singhachai
 * @Create Date: 07-12-2563
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseController extends CI_Controller
{
    /*
    |--------------------------------------------------------------------------
    | Base Controller
    |--------------------------------------------------------------------------
    |
    | This controller Scrumification.
	| @Author: Namchok Singhachai
	| @Create Date:	07-12-2563
    |
    */
    public function __construct()
    {	
        parent::__construct();
        date_default_timezone_set('asia/bangkok');
		$this->load->library('auth');
		//var_dump(can(['Editor', 'publish-posts']));
    } // End construct

    public function output($view, $header = "untitled") {
        $this->auth->authenticate();

		$detail['header'] = $header;
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
		// var_dump($data['userRoles']); die;
		// var_dump($detail); die;
		if($data['userRoles'][0] >10){
			$data['userRoles'][0] = $data['userRoles'][0] - 16;
		}
		/*$scripts['scripts'][0] = 'assets/js/plugins/highchart/highcharts.js';
		$scripts['scripts'][1] = 'assets/js/moment.js';
		$scripts['scripts'][2] = 'assets/js/daterangepicker.js';
		$scripts['css'][1] = 'assets/css/custom.css';*/
		$this->load->view('includes/header',$scripts);
		$this->load->view('includes/sidebar',$detail);
		$this->load->view($view, $data);
		$this->load->view('includes/footer');
    }
}