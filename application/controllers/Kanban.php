<?php
/**
 * @Author Namchok Singhachai
 * @Create Date	5-02-2564
 *
 */
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/BaseController.php");
class Kanban extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Kanban board Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles Kanban board.
	| * @Author	Namchok Singhachai
	| * @Create Date	22-02-2564
    |
    */
    public function __construct()
    {
        parent::__construct();
		$this->load->model("Data_manager","DM");
    } // End construct

    /**
     * Display a Kanban.
     *
	 * @Author	Namchok Singhachai
	 * @Create Date	22-02-2564
     * @return mixed
     */
    public function index()
    {
        $data["temp_data"] = '';
		$scripts['temp_scripts'] = '';
		$detail['header'] = "Kanban board";
    	$this->output('v_Kanban', $data, $scripts, $detail);
    }
}