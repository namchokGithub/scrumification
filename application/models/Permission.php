<?php

/**
 * @Author	Jiranuwat Jaiyen       
 * @Create Date	22-03-2563
 *
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Permission extends CI_Model
{
    /**
     * Permission constructor.
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     */
    public function __construct()
    {
        parent::__construct();
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
        return $this->db->get_where("permissions", array("id" => $id, "deleted_at" => null))->row(0);
    }

    /**
     * Read all data.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @return mixed
     */
    public function all()
    {
        return $this->db->get_where("permissions", array("deleted_at" => null))->result();
    }

    /**
     * Insert Data.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @param $data
     * @return mixed
     */
    public function add($data)
    {
        return $this->db->insert('permissions', $data);
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
        return $this->db->update('permissions', $data, array('id' => $data['id']));
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

        return $this->find($id) ? $this->db->update('permissions', $data, array('id' => $id)) : 0;
    }
}