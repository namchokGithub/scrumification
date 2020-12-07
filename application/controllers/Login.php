<?php
/**
 * @Author Jiranuwat Jaiyen       
 * @Create Date	22-03-2563
 * @Update by: Namchok Singhachai
 * @Update date: 07-12-2563
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a library
    | to conveniently provide its functionality to your applications.
    |
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(['auth', 'form_validation']);
    } // End construct

    /**
     * Handle the login.
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     */
    public function index()
    {
        // echo "guest: \n";
        // echo $this->auth->guest() . "\n";
        if(!$this->auth->guest()) {
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
        } else {            
            $data = array();
            if($_POST) {
                $data = $this->auth->login($_POST);
            }
            return $this->auth->showLoginForm($data);
        }
    } // End index

    /**
     * Logout.
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     */
    public function logout()
    {
        if($this->auth->logout())
            return redirect('login');

        return false;
    } // End logout
} // End Login