<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_desarrollo extends CI_Model{

    private $table = 'desarrollo';
    private $table_id = 'id';

    public function __construct(){
        parent::__construct();
		$this->db = $this->load->database('default',TRUE);
    }

    public function insert($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
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

    function delete_galeria($id){
        $this->db->where($this->table_id, $id);   
        return $this->db->delete('galeria_desarrollo');    
    }

    /* Localización */

    function findEstado(){
        $this->db->select();
        $this->db->from('estado');
        $this->db->where('activo', 1);
        $query=$this->db->get();
        return $query->result();
    }

    function findMunicipio($key){
        $this->db->select();
        $this->db->from('municipio');
        $this->db->where('activo', 1);
        $this->db->where('estado_id', $key);
        $query=$this->db->get();
        return $query->result();
    }

    function findColonia($key){
        $this->db->select();
        $this->db->from('colonia');
        $this->db->where('activo', 1);
        $this->db->where('municipio_id', $key);
        $query=$this->db->get();
        return $query->result();
    }

    function findParent($table, $key){
        $this->db->select();
        $this->db->from($table);
        $this->db->where('id', $key);

        $query=$this->db->get();
        return $query->row();
    }

    function findAmenidades(){
        $this->db->select();
        $this->db->from('amenidades');
        $this->db->where('activo', 1);
        $query=$this->db->get();
        return $query->result();
    }

    function findAmenidad($key){
        $this->db->select();
        $this->db->from('amenidades');
        $this->db->where('id', $key);
        $this->db->where('activo', 1);
        $query=$this->db->get();
        return $query->row();
    }

    function findTP(){
        $this->db->select();
        $this->db->from('tipo_producto');
        $this->db->where('activo', 1);
        $query=$this->db->get();
        return $query->result();
    }

    function findTPs($key){
        $this->db->select();
        $this->db->from('tipo_producto');
        $this->db->where('id', $key);
        $this->db->where('activo', 1);
        $query=$this->db->get();
        return $query->row();
    }

    function findTD(){
        $this->db->select();
        $this->db->from('tipo_desarrollo');
        $this->db->where('activo', 1);
        $query=$this->db->get();
        return $query->result();
    }

    function findTDs($key){
        $this->db->select();
        $this->db->from('tipo_desarrollo');
        $this->db->where('id', $key);
        $this->db->where('activo', 1);
        $query=$this->db->get();
        return $query->row();
    }


    function findCaracteristicas(){
        $this->db->select();
        $this->db->from('caracteristicas');
        $this->db->where('activo', 1);
        $query=$this->db->get();
        return $query->result();
    }

    function findCaracteristica($key){
        $this->db->select();
        $this->db->from('caracteristicas');
        $this->db->where('id', $key);
        $this->db->where('activo', 1);
        $query=$this->db->get();
        return $query->row();
    }
    
    public function insert_row($data, $table){
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    function existsAmenidad($data){
        $this->db->select();
        $this->db->from('amenidades_desarrollo');
        $this->db->where('desarrollo_id', $data['desarrollo_id']);
        $this->db->where('amenidades_id', $data['amenidades_id']);
        $query=$this->db->get();
        return $query->row();
    }

    function existsTP($data){
        $this->db->select();
        $this->db->from('pivot_tipo_producto');
        $this->db->where('desarrollo_id', $data['desarrollo_id']);
        $this->db->where('tipo_producto_id', $data['tipo_producto_id']);
        $query=$this->db->get();
        return $query->row();
    }

    function existsTD($data){
        $this->db->select();
        $this->db->from('pivot_tipo_desarrollo');
        $this->db->where('desarrollo_id', $data['desarrollo_id']);
        $this->db->where('tipo_id', $data['tipo_id']);
        $query=$this->db->get();
        return $query->row();
    }

    function existsCaracteristica($data){
        $this->db->select();
        $this->db->from('caracteristicas_desarrollo');
        $this->db->where('desarrollo_id', $data['desarrollo_id']);
        $this->db->where('caracteristicas_id', $data['caracteristicas_id']);
        $query=$this->db->get();
        return $query->row();
    }

    function delete_rows($key, $table){
        $this->db->where('desarrollo_id', $key);   
        $this->db->delete($table);    
    }

    public function findPicture($id){
        $this->db->select();
        $this->db->from('galeria_desarrollo');
        $this->db->where('id', $id);

        $query=$this->db->get();
        return $query->row();
    }

    public function insertImg($data){
        return $this->db->insert('galeria_desarrollo', $data);
    }

    public function obtenerGaleria($key){
        $this->db->select('id, imagen as foto');
        $this->db->from('galeria_desarrollo');
        $this->db->where('activo', 1);
        $this->db->where('desarrollo_id', $key);
        $query=$this->db->get();
        
        return $query->result();
    }

    function get_rows($key, $table){
        $this->db->select();
        $this->db->from($table.'_desarrollo');
        $this->db->where('desarrollo_id', $key);
        $query=$this->db->get();
        return $query->result();
    }

    function get_tipo($key, $table){
        $this->db->select();
        $this->db->from('pivot_tipo_'.$table);
        $this->db->where('desarrollo_id', $key);
        $query=$this->db->get();
        return $query->result();
    }

}