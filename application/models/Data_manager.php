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
	} // End get_activity

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

    /**
     * Log shop with roles
     * 
     * @Author: Namchok Singhachai
     * @Crate: 15-02-2564
     */
    public function get_log_shop_request(){
		$sql = "SELECT log_shop.role_id, log_shop.shop_id, log_shop.total, log_shop.status, shop.name as item_name,shop.point, shop.type, shop.type, roles.name as roles_name FROM `log_shop`
                JOIN shop on shop.id = log_shop.shop_id
                JOIN roles on roles.id = log_shop.role_id
                WHERE log_shop.status = 2";
        return $this->db->query($sql)->result_array();
    } // End get_log_shop

    /**
     * Get activity report
     *
	 * @Author	Namchok Singhachai
	 * @Create Date	12-02-2564
     * @return mixed
     */
	public function get_activity_by_group($activityId = "2", $groupId = "1", $dateStart = "2021-01-01", $dateEnd = "2021-12-31")
	{
		$sql = "SELECT Count(activity_checkin.user_id) as numberOfCheckin, users.id
                FROM `users`
                LEFT JOIN activity_checkin ON activity_checkin.user_id = users.id
                LEFT JOIN activity ON activity_checkin.activity_id = activity.id
                LEFT JOIN roles_users on roles_users.user_id = users.id
                WHERE `time` BETWEEN '$dateStart' AND  '$dateEnd'
                    AND activity_checkin.activity_id = '$activityId'
                    AND roles_users.role_id = '$groupId'
                GROUP BY users.id
            ";
        return $this->db->query($sql)->result_array();
	} // End get_activity

    /**
     * Update time activity
     *
	 * @Author	Namchok Singhachai
	 * @Create Date	7-03-2564
     * @return mixed
     */
    public function updateTimeActity($id, $timeStart, $timeEnd, $dateStart, $dateEnd)
    {
		$sql = "UPDATE `activity` SET\n"
            . "activity.time_start = '$timeStart',\n"
            . "activity.time_end = '$timeEnd',\n"
            . "activity.date_start = '$dateStart',\n"
            . "activity.date_end = '$dateEnd',\n"
            . "activity.status = '1'\n"
            . "WHERE activity.id = $id";
        return $this->db->query($sql);
    }

    //**-------------------------------------------------------------------------------------- */

    /**
     * Get achievement report.
     *
	 * @Author	Thutsaneeya Chanong     
	 * @Create Date	10-02-2564
     * @param $role_id
     * @return mixed
     */
    public function get_achievement_by_group($role_id)
    {
        return $this->db
            ->select(
                     "log_achievement.id, 
                     log_achievement.role_id, 
                     log_achievement.achievement_id, 
                     log_achievement.created_at, 
                     achievement.name as achievement_name "
                    )
            ->from("log_achievement")
            ->join("roles", "log_achievement.role_id = roles.id", "LEFT")
            ->join("achievement", "log_achievement.achievement_id = achievement.id", "LEFT")
            ->where("log_achievement.role_id Like '$role_id'")
            ->get()->result_array();
    } // End get_achievement_by_group

    /**
     * Get name group.
     *
	 * @Author	Thutsaneeya Chanong     
	 * @Create Date	11-02-2564
     * @return mixed
     */
    public function get_name_group()
    {
        return $this->db
            ->select ("roles.id, replace(roles.name, 'สมาชิกมกุล', 'Cluster') as group_name")
            ->from("roles")
            ->where("name Like 'สมาชิกมกุล %'")
            ->get()->result_array();
    } // End get_name_group

    /**
     * Get member by group.
     *
	 * @Author	Thutsaneeya Chanong     
	 * @Create Date	11-02-2564
     * @param $roles_user_id
     * @return mixed
     */
    public function get_member_by_group($roles_user_id)
    {
        return $this->db
            ->select(
                      "users.name As name, 
                      users.username As username,
                      roles.name As role, display_name, users.code"
                    )
            ->from("roles_users")
            ->join("roles", "roles_users.role_id = roles.id", "LEFT")
            ->join("users","roles_users.user_id = users.id", "LEFT")
            ->where("roles_users.role_id Like '$roles_user_id'")
            ->get()->result_array();
    } // End get_member_by_group

    /**
     * Get data by group.
     *
	 * @Author	Thutsaneeya Chanong     
	 * @Create Date	11-02-2564
     * @return mixed
     */
    public function get_data_by_group()
    {
        return $this->db
            ->select ("roles.id, replace(roles.name, 'สมาชิกมกุล', 'Cluster') as group_name, image_path, color, display_name")
            ->from("roles")
            ->where("name Like 'สมาชิกมกุล %' or name Like 'Cluster %' or name Like 'มกุล'")
            ->get()->result_array();
    } // End get_data_by_group
}
?>