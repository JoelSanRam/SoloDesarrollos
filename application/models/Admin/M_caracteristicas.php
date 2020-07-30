<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_caracteristicas extends CI_Model{

    private $table = 'caracteristicas';
    private $table_id = 'id';

    public function __construct(){
        parent::__construct();
		$this->db = $this->load->database('default',TRUE);
    }

    function insert($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    function find($id){
        $this->db->select();
        $this->db->from($this->table);
        $this->db->where($this->table_id, $id);

        $query=$this->db->get();
        return $query->row();
    }

    public function findAll(){
        $this->db->select();
        $this->db->from($this->table); 
        $this->db->where('activo', 1);
        $query=$this->db->get();
        
        return $query->result();
    }

    function update($id, $data){
        $this->db->where($this->table_id, $id); 
        return $this->db->update($this->table, $data);        
    }

    public function delete($id){
        $this->db->where($this->table_id, $id);
        $data =  array('Activo' => 0 );
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }
}

