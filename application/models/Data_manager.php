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
                      roles.name As role"
                    )
            ->from("roles_users")
            ->join("roles", "roles_users.role_id = roles.id", "LEFT")
            ->join("users","roles_users.user_id = users.id", "LEFT")
            ->where("roles_users.role_id Like '$roles_user_id'")
            ->get()->result_array();
    } // End get_member_by_group

}
?>
