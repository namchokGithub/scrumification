<?php
/**
 * @Author	Namchok Singhachai
 * @Create Date	14-01-2564
 */
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/BaseController.php");
class RoleManager extends BaseController
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
    } // End construct

    /**
     * Role manager.
     * 
	 * @Author by: Namchok Singhachai
 	 * @Create Date	12-01-2564
     * @return view
     */
    public function index()
    {
    	$this->output('v_RoleManager', "Role");
    } // End index
	
}