<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_modelo extends CI_Model{

    private $table = 'modelo';
    private $table_id = 'Id_modelo';

    public function __construct(){
        parent::__construct();
		$this->db = $this->load->database('default',TRUE);
    }

    public function insert($data){
        return $this->db->insert($this->table, $data);
        //return $this->db->insert_id();
    }

    public function obtenerTipos(){
        $this->db->select('Id_tipo, Tipo');
        $this->db->from('tipo_inmbueble');
        $this->db->where('Activo', 1);
        $query=$this->db->get();
        return $query->result();
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

    public function obtenerModelos(){
        $this->db->select('m.Id_modelo as Id_modelo, m.Modelo as Modelo, t.Tipo as Tipo');
        $this->db->from('modelo m');
        $this->db->join('tipo_inmbueble t', 'm.Id_tipo = t.Id_tipo');
        $this->db->where('m.Activo', 1);
        $query = $this->db->get();
        
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