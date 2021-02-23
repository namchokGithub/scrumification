<?php
/**
 * @Author	Jiranuwat Jaiyen       
 * @Create Date	22-03-2563
 *
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_manager extends CI_Model
{
    /**
     * Data_manager constructor.
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     */
    public function __construct()
    {
        parent::__construct();
    }
	/**
     * Select Data.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @param $name_table
     * @param $data
     * @return mixed
     */
	public function get_data($name_table,$data)
    {
		return array_reverse($this->db->get_where($name_table,$data)->result());
    }
	
	/**
     * Insert Data.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @param $name_table
     * @param $data
     * @return mixed
     */
    public function add_data($name_table,$data)
    {
        return $this->db->insert($name_table, $data);
    }

    /**
     * Edit Data.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @param $name_table
     * @param $data
     * @return mixed
     */
    public function edit_data($name_table,$data)
    {
        return $this->db->update($name_table, $data , array('id' => $data['id']));
    }

    /**
     * Edit Data with two id.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @param $name_table
     * @param $data
     * @return mixed
     */
    public function edit_data_with_twoid($name_table,$data)
    {
        return $this->db->update($name_table, $data , $data);
    }

    /**
     * Delete Data.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @param $name_table
     * @param $data
     * @return mixed
     */
    public function delete_data($name_table,$data)
    {
        return $this->db->delete($name_table, array('id' => $data['id']));
    }

    /**
     * Delete Data with two id.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @param $name_table
     * @param $data
     * @return mixed
     */
    public function delete_data_with_twoid($name_table,$data)
    {
        return $this->db->delete($name_table, $data);
    }

    /**
     * Get activity report
     *
	 * @Author	Namchok Singhachai
	 * @Create Date	12-02-2564
     * @return mixed
     */
	public function get_activity($activityId = "2", $groupId = "1", $dateStart = "2021-01-01", $dateEnd = "2021-12-31")
	{
		$sql = "SELECT Count(activity_checkin.user_id) as group$groupId
                FROM `activity_checkin`
                JOIN activity ON activity_checkin.activity_id = activity.id
                JOIN users ON users.id = activity_checkin.user_id
                JOIN roles_users on roles_users.user_id = users.id
                WHERE `time` BETWEEN '$dateStart' AND  '$dateEnd'
                    AND 
                        activity_checkin.activity_id = '$activityId'
                    AND roles_users.role_id = '$groupId'
            ";
        return $this->db->query($sql)->result_array();
	} // End get_rp_SprintPlanning

    /**
     * Toggle id of actitvity
     * 
     * @Author: Namchok Singhachai
     * @Crate: 14-02-2564
     */
    public function toggle_activity($id){
        $sql = "UPDATE `activity` SET\n"
            . "activity.status = CASE WHEN activity.status = 1 THEN 0 ELSE 1 END\n"
            . "WHERE activity.id = $id";
        return $this->db->query($sql);
    }

    /**
     * Log shop with roles
     * 
     * @Author: Namchok Singhachai
     * @Crate: 15-02-2564
     */
    public function get_log_shop(){
		$sql = "SELECT log_shop.role_id, log_shop.shop_id, log_shop.total, log_shop.status, shop.name as item_name,shop.point, shop.type, shop.type, roles.name as roles_name FROM `log_shop`
                JOIN shop on shop.id = log_shop.shop_id
                JOIN roles on roles.id = log_shop.role_id";
        return $this->db->query($sql)->result_array();
    } // End get_log_shop
}
?>