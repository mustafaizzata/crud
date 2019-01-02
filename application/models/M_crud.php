<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_crud extends CI_Model {

    function show($params=array()){
        $this->db->select('*');
        $this->db->from('products');

        if(!empty($params['id'])){
            $this->db->where('product_id', $params['id']);
            $query=$this->db->get()->row();

        }else{
            $query=$this->db->get()->result();

        }
        return $query;
    }

    function add($params=array(), $id=null)
    {
        if($id !=null)
        {
            $this->db->where('product_id', $id);
            $query = $this->db->update('products', $params);
        }else{
            $query = $this->db->insert('products', $params);
        }
        return $query;
    }
    

	public function index()
	{
		$this->load->view('welcome_message');
	}
}
