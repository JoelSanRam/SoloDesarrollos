<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_asesor extends CI_Model{

    private $table = 'asesor';
    private $table_id = 'Id_asesor';

    public function __construct(){
        parent::__construct();
		$this->db = $this->load->database('default',TRUE);
    }

    public function insert($data){
        return $this->db->insert($this->table, $data);
        //return $this->db->insert_id();
    }

    public function obtenerDesarrolladoras(){
        $this->db->select('Id_empresa, Nombre');
        $this->db->from('empresa');
        $this->db->where('Activo', 1);
        $query=$this->db->get();
        return $query->result();
    }

    public function obtenerUsuarios(){
        $this->db->select('Id_usuario, TipoUsuario');
        $this->db->from('usuario');
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

    public function obtenerTipos(){
        $this->db->select('a.Id_asesor as Id_asesor, a.Nombre as Nombre, a.Apellido as Apellido, a.Telefono as Telefono, a.Correo as Correo, e.Nombre as Empresa');
        $this->db->from('asesor a');
        $this->db->join('empresa e', 'a.Id_empresa = e.Id_empresa');
        $this->db->where('a.Activo', 1);
        $query = $this->db->get();
        
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