<?php
/**
 * @Author	Jiranuwat Jaiyen       
 * @Create Date	22-03-2563
 *
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model
{
    /**
     * User constructor.
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     */
    public function __construct()
    {
        parent::__construct();
    }
	
    /**
     * Get All Item.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @return mixed
     */
	public function get_Item()
    {
        return $this->db->get_where("shop")->result();
    }

	/**
     * Get Point By Role.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @return mixed
     */
    public function get_Point($target)
    {
        return $this->db->get_where("roles_point", array("role_id"=>  $target))->result_array();
    }
	
    /**
     * Get Achievement by role_id.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * Update: Namchok Singhachai
     * @param $role_id
     * @return mixed
     */
	public function get_all_Achievement($role_id)
    {
		$sql="SELECT achievement.id 
                    ,achievement.detail 
                    ,roles_users.role_id
                    ,ceil(Max_user_table.count_user_role) as level
                    ,achievement.name 
                    ,point
                    ,count(*) as count_user 
            
            FROM `achievement`
			INNER JOIN activity_checkin on activity_checkin.activity_id =achievement.target_activity
			LEFT JOIN users on users.id = activity_checkin.user_id
			LEFT JOIN roles_users on users.id = roles_users.user_id
			LEFT JOIN (
                        SELECT role_id,COUNT(*) as count_user_role
						FROM `roles_users`
						GROUP BY role_id 
                       ) as Max_user_table on Max_user_table.role_id = roles_users.role_id
			WHERE achievement.target_activity != 0  AND roles_users.role_id = $role_id
			GROUP BY achievement.id, roles_users.role_id

			UNION

			SELECT achievement.id  
                   ,achievement.detail 
                   ,log_achievement.role_id
                   ,1 as level
                   ,achievement.name 
                   ,point
                   ,count(*) as count_user  
            
            FROM `achievement`
			LEFT JOIN log_achievement on log_achievement.achievement_id =achievement.id
			LEFT JOIN (
                        SELECT role_id,COUNT(*) as count_user_role
						FROM `roles_users`
						GROUP BY role_id
                       ) as Max_user_table on Max_user_table.role_id = log_achievement.role_id
			WHERE achievement.target_activity = 0 AND log_achievement.role_id = $role_id
			GROUP BY achievement.id, log_achievement.role_id";
		return $this->db->query($sql)->result_array();	
    }
	
    /**
     * Calulate All Role Point
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @return mixed
     */
	public function calulate_point()
    {
		$sql="SELECT * 
                    ,SUM(raw_data.TotalPoint) as Last_TotalPoint 
            FROM (
                    SELECT achievement.id 
                        ,achievement.detail 
                        ,roles_users.role_id 
                        ,achievement.name 
                        ,point 
                        ,count(*) as count_user 
                        ,((count(*)/ceil(Max_user_table.count_user_role) )*point) as TotalPoint 
                    FROM `achievement`
                    INNER JOIN activity_checkin on activity_checkin.activity_id =achievement.target_activity
                    LEFT JOIN users on users.id = activity_checkin.user_id
                    LEFT JOIN roles_users on users.id = roles_users.user_id
                    LEFT JOIN (
                                SELECT role_id,COUNT(*) as count_user_role
                                FROM `roles_users`
                                GROUP BY role_id
                            ) as Max_user_table on Max_user_table.role_id = roles_users.role_id
                                
                    WHERE achievement.target_activity != 0 
                    GROUP BY achievement.id,roles_users.role_id
                    
                    UNION
                    
                    SELECT achievement.id  
                        ,achievement.detail 
                        ,log_achievement.role_id
                        ,achievement.name 
                        ,point
                        ,count(*) as count_user 
                        ,((count(*)/1)*point) as TotalPoint 
                    FROM `achievement`
                    LEFT JOIN log_achievement on log_achievement.achievement_id =achievement.id
                    LEFT JOIN (
                                SELECT role_id,COUNT(*) as count_user_role
                                FROM `roles_users`
                                GROUP BY role_id
                            ) as Max_user_table on Max_user_table.role_id = log_achievement.role_id

                    WHERE achievement.target_activity = 0 
                    GROUP BY achievement.id ,log_achievement.role_id
                ) as raw_data
            GROUP BY raw_data.role_id";
            
		$raw_data = $this->db->query($sql)->result_array();
		
		foreach($raw_data as $row_data){
			$sql = "UPDATE
						roles_point
					SET
						roles_point.raw_point = ".$row_data["Last_TotalPoint"]."
					WHERE
						roles_point.role_id = '".$row_data["role_id"]."'";
			$this->db->query($sql);
		}
    }
	
	/**
     * Get Inventory By Role.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @return mixed
     * Update: Namchok Singhachai
     */
	public function get_Inventory($target){
		 return $this->db
            ->select("shop.id,shop.name,log_shop.total,shop.type, log_shop.status" ,FALSE)
            ->from("log_shop")
			->join("shop", "shop.id = log_shop.shop_id", "LEFT")
            ->where(array("log_shop.role_id" => $target	))->where('shop.id IS NOT NULL', null)
            ->where('(log_shop.status <> -1)')
            ->get()->result_array();
	}

	/**
     * Check Point If This User Can Buy Item Then Update Log Item 
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @param $data consisting item_id and count
     * @return mixed
     * Update: Namchok Singhachai
     */
	public function Useitem($data)
    {
		// var_dump($data);
        $raw_data = $this->db->get_where("log_shop",array("shop_id"=>  $data['item_id'],"role_id"=>  $data['target']))->row();
		$update_sql="update log_shop set total = total-1 where shop_id = ".$data['item_id']." AND role_id = ".$data['target'];
		$update_sql_status="update log_shop set status = 2, updated_at = NOW() where shop_id = ".$data['item_id']." AND role_id = ".$data['target'];
		// var_dump($raw_data);
        if($raw_data->total - 1 >= 0){
			$this->db->query($update_sql);
			$this->db->query($update_sql_status);
			$data['type']="Comple";
			return $data;
		}
		else
        {
			$data['type']="Item";
			return $data;
		}

		$data['type']="Error";
		return $data;
	}
	
	/**
     * Check Point If This User Can Buy Item Then Update Log Item 
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @param $data consisting item_id and count
     * @return mixed
     */
	public function BuyItem($data)
    {
        $raw_data = $this->db->get_where("shop",array("id"=>  $data['item_id']))->row();
		$raw_point = $this->db->get_where("roles_point", array("role_id"=>  $data['target']))->row();
		$point = $raw_point->raw_point-$raw_point->used_point;
		$date = new DateTime("now");
		$PostQopen = new DateTime($raw_data->time_start);
        $PostQClose = new DateTime($raw_data->time_end);
                              
        $sql="INSERT INTO `log_shop` (`role_id`, `shop_id`, `total`, `created_at`, `updated_at`) VALUES ('".$data['target']."', '".$data['item_id']."', '".$data['count']."', NOW(), NOW())ON DUPLICATE KEY UPDATE updated_at = NOW(), total=total+".$data['count'];
        
        $update_sql="update shop set total = total-".$data['count']." where id = ".$data['item_id'];
        
		if($raw_data->type == 3){
			if($raw_data->total - $data['count'] < 0){
				$data['type']="Item";
				return $data;
			}			
			if($point-($raw_data->point*$data['count']) >=0){
				$this->db->set('used_point', 'used_point+'.($raw_data->point*$data['count']), FALSE);
				$this->db->where('role_id', $data['target']);
				$this->db->update('roles_point');
				$this->db->query($sql);
				$this->db->query($update_sql);
				$data['type']="Comple";
				return $data;
			}
			else{
				$data['type']="Money";
				return $data;
			}
		}
		else if($raw_data->type == 2){
			if(!($PostQopen <= $date && $PostQClose >=$date)){					
				$data['type']="Error";
				return $data;
			}
			if($raw_data->total - $data['count'] < 0){
				$data['type']="Item";
				return $data;
			}			
			if($point-($raw_data->point*$data['count']) >=0){
				$this->db->set('used_point', 'used_point+'.($raw_data->point*$data['count']), FALSE);
				$this->db->where('role_id', $data['target']);
				$this->db->update('roles_point');
				$this->db->query($sql);
				$data['type']="Comple";
				return $data;
			}
			else{
				$data['type']="Money";
				return $data;
			}
		}
		if($point-($raw_data->point*$data['count']) >=0){		
			$this->db->set('used_point', 'used_point+'.($raw_data->point*$data['count']), FALSE);
			$this->db->where('role_id', $data['target']);
			$this->db->update('roles_point');
			$this->db->query($sql);
			$data['type']="Comple";
			return $data;
		}		
		else{
			$data['type']="Money";
			return $data;
		}
    }
	
	/**
     * Get All Point.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     **@Update Namchok Singhachai
     * @return mixed
     */
    public function get_all_point(){
		 return $this->db
            ->select("id,raw_point-used_point as point" ,FALSE)
            ->from("roles_point")
			->order_by("point DESC")
            ->get()->result_array();
	} // End get_all_point
	
	/**
     * Get All individual.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @return mixed
     */
	public function get_all_individual(){
		 return $this->db
            ->select("name_indi , users.name as users_name , username , roles.name as roles_name " ,FALSE)
            ->from("user_individual")
			->join("individual", "individual.id = user_individual.individual_id", "LEFT")
            ->join("users", "users.id = user_individual.user_id", "LEFT")
            ->join("roles_users", "roles_users.user_id = users.id", "LEFT")
            ->join("roles", "roles.id = roles_users.role_id", "LEFT")
			->order_by("name_indi DESC")
            ->get()->result_array();
	}
	
	/**
     * Get All Activity.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Update	Namchok Singhachai
	 * @Create Date	22-03-2563
     * @return mixed
     */
    public function all_Activity()
    {
		
        return $this->db
            ->select("*" ,FALSE)
            ->from("activity")
			->where('DATEDIFF(CURDATE(), date_start) >=0 AND DATEDIFF(CURDATE(), date_end) <=0')
			->order_by("activity.time_start ASC")
            ->get()->result_array();
    }
	
	/**
     * Check relation_role between user_id and target_role_id.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @param $user_id
     * @return int
     */
	public function can_add_Activity($user_id)
    {
        return $this->db
            ->select("users.id as id,users.username ,users.name as user_name ,roles.name as role_name")
            ->from("roles")
            ->join("roles_users", "roles.id = roles_users.role_id", "inner")
            ->join("users", "users.id = roles_users.user_id", "inner")
			->join("relation_role", "roles.id = relation_role.role_id")
            ->where(array("roles_users.user_id" => $user_id,"relation_role.target_role_id" => $this->auth->roles[0]))
            ->get()->num_rows();
    }
	
	/**
     * Check relation_role between role_id and target_role_id.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @param $role_id
     * @return int
     */
	public function can_add_Activity_by_role_id($role_id)
    {
        return $this->db
            ->select("users.id as id,users.username ,users.name as user_name ,roles.name as role_name")
            ->from("roles")
            ->join("roles_users", "roles.id = roles_users.role_id", "inner")
            ->join("users", "users.id = roles_users.user_id", "inner")
			->join("relation_role", "roles.id = relation_role.role_id")
            ->where(array("roles_users.role_id" => $role_id,"relation_role.target_role_id" => $this->auth->roles[0]))
            ->get()->num_rows();
    }
	/**
     * Check relation_role by target_role_id.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @param $user_id
     * @return int
     */
	public function can_Activity()
    {
        return $this->db
            ->select("users.id as id,users.username ,users.name as user_name ,roles.name as role_name,roles.id as role_id")
            ->from("roles")
            ->join("roles_users", "roles.id = roles_users.role_id", "inner")
            ->join("users", "users.id = roles_users.user_id", "inner")
			->join("relation_role", "roles.id = relation_role.role_id")
            ->where(array("relation_role.target_role_id" => $this->auth->roles[0]))
            ->get()->result_array();
    }
	
	/**
     * Add Activity
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @param $data consisting acivity_id and user_id
     * @return String
     */
	public function add_Activity($data)
    {
		if($this->db
            ->select("*")
			->where("'".date("H:i:s")."' BETWEEN time_start and time_end And activity.id Like ".$data['activity_id']."")
            ->from("activity")->get()->num_rows() || hasRole(['ScrumMaster'])){
			if($this->db
				->select("activity_checkin.*")
				->from("activity_checkin")
				->where("activity_checkin.user_id Like ".$data['user_id']." And activity_checkin.activity_id Like ".$data['activity_id']." And DATE(activity_checkin.time) = CURDATE() ")
				->get()->num_rows()){
					$this->db->where("activity_checkin.user_id Like ".$data['user_id']." And activity_checkin.activity_id Like ".$data['activity_id']." And DATE(activity_checkin.time) = CURDATE() ");
					$this->db->delete('activity_checkin'); 
					return "ดำเนินการยกเลิกเสร็จสิ้น";
			}
			else{
				$this->db->insert('activity_checkin', $data);
				return "ดำเนินการเสร็จสิ้น";
			}
		}
		else{
			return "กิจกรรมยังไม่ถึงช่วงดำเนินกิจกรรม";
		}
        //
        //
    }
		
	/**
     * Select Activity By Role.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @param $id
     * @param $role_id
     * @return mixed
     */
	public function Activity_by_role($id,$role_id)
    {
        return $this->db
            ->select("activity_checkin.*,users.name, activity.status ")
            ->from("activity_checkin")
            ->join("users", "users.id = activity_checkin.user_id", "inner")
            ->join("activity", "activity.id = activity_checkin.activity_id", "inner")
            ->join("roles_users", "users.id = roles_users.user_id", "inner")
            ->where("activity_checkin.activity_id Like '$id' And roles_users.role_id Like '$role_id' And DATE(activity_checkin.time) = CURDATE() ")
            ->get()->result_array();
    }

    /**
     * Select Activity For Count.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @param $role_id
     * @return mixed
     */
	public function Activity_by_count($role_id)
    {
        return $this->db->distinct()
            ->select("activity.name,count(activity.name) as count_user , max_user")
            ->from("activity")
            ->join("activity_checkin", "activity.id = activity_checkin.activity_id", "Left")
            ->join("users", "users.id = activity_checkin.user_id", "Left")
            ->join("roles_users", "users.id = roles_users.user_id", "Left")
			->join("(SELECT role_id as new_role_id , count(user_id) as max_user FROM `roles_users` GROUP by role_id) as t", "t.new_role_id = roles_users.role_id", "Left")
            ->where("roles_users.role_id Like '$role_id' And DATE(activity_checkin.time) = CURDATE() ")
			->group_by("activity.name")
            ->get()->result_array();
    }

    /**
     * Find data.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @param $id
     * @return mixed
     */
    public function find_by_role($id)
    {
        return $this->db
            ->select("users.id as id,users.username ,users.name as user_name ,roles.display_name ,roles.name as role_name,code as secon_role")
            ->from("roles")
            ->join("roles_users", "roles.id = roles_users.role_id", "inner")
            ->join("users", "users.id = roles_users.user_id", "inner")
            ->where(array("roles_users.role_id" => $id,"roles.status" => 1))
            ->get()->result_array();
    }


    /**
     * Find data.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @param $id
     * @return mixed
     */
    public function find_by_username($username)
    {
        return $this->db
            ->select("users.id as id,users.username ,users.name as user_name ,roles.name as role_name,code as secon_role")
            ->from("roles")
            ->join("roles_users", "roles.id = roles_users.role_id", "inner")
            ->join("users", "users.id = roles_users.user_id", "inner")
            ->where(array("users.username" => $username,"roles.status" => 1))
            ->get()->result_array();
    }
    /**
     * Find data.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->db->get_where("users", array("id" => $id, "deleted_at" => null))->row(0);
    }

    /**
     * Find all data.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @return mixed
     */
    public function all()
    {
        return $this->db->get_where("users", array("deleted_at" => null))->result();
    }

    /**
     * Insert data.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @param $data
     * @return mixed
     */
    public function add($data)
    {
        $data["password"] = password_hash($data["password"], PASSWORD_BCRYPT);

        return $this->db->insert('users', $data);
    }

    /**
     * Edit data.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @param $data
     * @return mixed
     */
    public function edit($data)
    {
        return $this->db->update('users', $data, array('id' => $data['id']));
    }

    /**
     * Delete data.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @param $id
     * @return int
     */
    public function delete($id)
    {
        $data['deleted_at'] = date("Y-m-d H:i:s");

        return $this->find($id) ? $this->db->update('users', $data, array('id' => $id)) : 0;
    }

    /**
     * Insert roles.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @param $user_id
     * @param $roles
     * @return int
     */
    public function addRoles($user_id, $roles)
    {
        $data["user_id"] = $user_id;
        if (is_array($roles)) {
            foreach ($roles as $role) {
                $data["role_id"] = $role;
                $this->addRole($data);
            }
        }
        else {
            $data["role_id"] = $roles;
            $this->addRole($data);
        }

        return 1;
    }

    /**
     * Insert role.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @param $data
     * @return mixed
     */
    public function addRole($data)
    {
        return $this->db->insert('roles_users', $data);
    }

    /**
     * Edit roles.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @param $user_id
     * @param $roles
     * @return int
     */
    public function editRoles($user_id, $roles)
    {
        if($this->deleteRoles($user_id, $roles))
            $this->addRoles($user_id, $roles);

        return 1;
    }

    /**
     * Delete roles.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @param $user_id
     * @param $roles
     * @return mixed
     */
    public function deleteRoles($user_id, $roles)
    {

        return $this->db->delete('roles_users', array('user_id' => $user_id));
    }

    /**
     * Delete role.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @param $user_id
     * @param $role_id
     * @return mixed
     */
    public function deleteRole($user_id, $role_id)
    {

        return $this->db->delete('roles_users', array('user_id' => $user_id, 'role_id' => $role_id));
    }

    /**
     * Find roles associated with user.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @param $id
     * @return array
     */
    public function userWiseRoles($id)
    {
        return array_map(function($item){
            return $item["role_id"];
        }, $this->db->get_where("roles_users", array("user_id" => $id))->result_array());
    }

    /**
     * Find role details associated with user.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @param $id
     * @return array
     */
    public function userWiseRoleDetails($id)
    {
        return array_map(function($item){
            $user = new User();
            return $user->findRole($item);
        }, $this->userWiseRoles($id));
    }

    /**
     * Find role.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @param $id
     * @return mixed
     */
    public function findRole($id)
    {
        return $this->db->get_where("roles", array("id" => $id, "deleted_at" => null))->row(0);
    }

    /**
     * Confirm item
     *
	 * @Author Namchok Singhachai
     * @return Json Data
     */
	public function confirmItem($rold_id, $shop_id){
		$update_sql_status="update log_shop set status = 1, updated_at = NOW() where shop_id = ".$shop_id." AND role_id = ".$rold_id;
		return $this->db->query($update_sql_status);;
	}

    /**
     * Used item
     *
	 * @Author Namchok Singhachai
     * @return Json Data
     */
	public function usedItem($rold_id, $shop_id, $status=0){
		$update_sql_status="update log_shop set status = ".$status.", updated_at = NOW() where shop_id = ".$shop_id." AND role_id = ".$rold_id;
		return $this->db->query($update_sql_status);;
	}

    /**
     * Find item confirmed
     *
	 * @Author Namchok Singhachai
     * @return Json Data
     */
	public function findItemConfirmed($id=12){
		$sql="  SELECT role_id, shop_id, log_shop.status, name as item_name, updated_at
                FROM `log_shop`
                LEFT JOIN `shop` ON log_shop.shop_id = shop.id
                WHERE role_id = $id AND log_shop.status = 1";
		return $this->db->query($sql)->result();
	}

    public function get_status_activity($id){
		$sql="  SELECT activity.status
                FROM `activity`
                WHERE activity.id = $id";
		return $this->db->query($sql)->row();
	}
}