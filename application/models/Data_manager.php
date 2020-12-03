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
}
?>