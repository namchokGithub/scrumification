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
    } // End construct

	/**
	 * Output for view
	 * Name: Namchok Singhchai
	 * Date: 2020-01-24
	 * Paremeter: $view, $header, $scripts="", $detail=""
	 */
    public function output($view, $data, $scripts, $detail) {
        $this->auth->authenticate();

		$scripts['Profile'][0] = $this->auth->user();
		$scripts['Profile'][1] = $this->auth->userRoles();
		$scripts['Profile'][2]= $this->auth->userName();
		$detail['Profile'][0]= $this->auth->user();
		$detail['Profile'][1]= $this->auth->userRoles();
		$detail['Profile'][2]= $this->auth->userName();
		
		$this->load->view('includes/header',$scripts);
		$this->load->view('includes/sidebar',$detail);
		$this->load->view($view, $data);
		$this->load->view('includes/footer');
	}
	// ------------------------------------------------- End Output ----------------------------------------- //
}