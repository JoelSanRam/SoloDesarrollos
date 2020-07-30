<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_desarrolladora extends CI_Model{

    private $table = 'desarrolladora';
    private $table_id = 'Id_desarrolladora';

    public function __construct(){
        parent::__construct();
		$this->db = $this->load->database('default',TRUE);
    }

    public function insert($data){
        return $this->db->insert($this->table, $data);
        //return $this->db->insert_id();
    }

    public function find($id){
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

    function delete($id){
        $this->db->where($this->table_id, $id);   
        $this->db->delete($this->table);    
    } 
}