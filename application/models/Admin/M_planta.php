<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_planta extends CI_Model{

    private $table = 'planta';
    private $table_id = 'id';

    public function __construct(){
        parent::__construct();
		$this->db = $this->load->database('default',TRUE);
    }

    function insert($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    function insert_details($data){
        $this->db->insert('detalles_planta', $data);
        return $this->db->insert_id();
    }

    function find($id){
        $this->db->select();
        $this->db->from($this->table);
        $this->db->where($this->table_id, $id);
        $query=$this->db->get();
        return $query->row();
    }

    function findDetalles(){
        $this->db->select();
        $this->db->from('detalles'); 
        $this->db->where('activo', 1);
        $query=$this->db->get();
        
        return $query->result();
    }

    function find_active($key){
        $this->db->select('dp.detalles_id as id, d.detalle, d.activo');
        $this->db->from('detalles_planta dp'); 
        $this->db->join('detalles d', 'dp.detalles_id = d.id');
        $this->db->where('dp.planta_id', $key);
        $query=$this->db->get();
        
        return $query->result();
    }

    public function findAll($key){
        $this->db->select();
        $this->db->from($this->table); 
        $this->db->where('inmueble_id', $key);
        $query=$this->db->get();
        
        return $query->result();
    }

    function update($id, $data){
        $this->db->where($this->table_id, $id); 
        return $this->db->update($this->table, $data);        
    }

    public function delete($id){
        $this->db->where($this->table_id, $id);   
        return $this->db->delete($this->table); 
    }

    function delete_details($id){
        $this->db->where('planta_id', $id);   
        return $this->db->delete('detalles_planta');  
    } 
}
