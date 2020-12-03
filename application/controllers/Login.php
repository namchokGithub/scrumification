<?php
/**
 * @Author	Jiranuwat Jaiyen       
 * @Create Date	22-03-2563
 *
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
    }

    /**
     * handle the login.
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     */
    public function index()
    {
		$data = array();
        if($_POST) {
            $data = $this->auth->login($_POST);
        }
        return $this->auth->showLoginForm($data);
    }

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
    }
}
