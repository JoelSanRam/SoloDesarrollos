<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_inmueble extends CI_Model{

    private $table      = 'inmueble';
    private $table_id   = 'id';

    public function __construct(){
        parent::__construct();
		$this->db = $this->load->database('default',TRUE);
    }

    public function insert($data){
        return $this->db->insert($this->table, $data);
        //return $this->db->insert_id();
    }

    public function getAsesor(){
        $this->db->select('Id_asesor, Nombre, Apellido');
        $this->db->from('asesor');
        $this->db->where('Activo', 1);
        $query=$this->db->get();
        
        return $query->result();
    }

    /* Inicio Formas */
    function findMethods(){
        $this->db->select();
        $this->db->from('forma_pago');
        $this->db->where('activo', 1);
        $query=$this->db->get();
        return $query->result();
    }

    function findMethod($key){
        $this->db->select();
        $this->db->from('forma_pago');
        $this->db->where('id', $key);
        $this->db->where('activo', 1);
        $query=$this->db->get();
        return $query->row();
    }

    function eliminarFormas($id){
        $this->db->where('id', $id);   
        $this->db->delete('forma_inmueble');    
    }

    function insertarForma($data){
        return $this->db->insert('forma_inmueble', $data);
    } 

    /* Fin Formas */

    public function getDesarrollo(){
        $this->db->select('id, nombre');
        $this->db->from('desarrollo');
        $this->db->where('activo', 1);
        $query=$this->db->get();
        return $query->result();
    }
    public function obtenerTipos($key){
        $this->db->select('pt.tipo_producto_id as id, tp.tipo as tipo');
        $this->db->from('pivot_tipo_producto pt');
        $this->db->join('tipo_producto tp', 'tp.id = pt.tipo_producto_id');
        $this->db->where('pt.desarrollo_id', $key);
        $query = $this->db->get();
        return $query->result();
    }

    /* Inicio Servicios */
    function findServicios(){
        $this->db->select();
        $this->db->from('servicio');
        $this->db->where('activo', 1);
        $query=$this->db->get();
        return $query->result();
    }

    function findServicio($key){
        $this->db->select();
        $this->db->from('servicio');
        $this->db->where('id', $key);
        $this->db->where('activo', 1);
        $query=$this->db->get();
        return $query->row();
    }

    function findEquipamientos(){
        $this->db->select();
        $this->db->from('equipamiento');
        $this->db->where('activo', 1);
        $query=$this->db->get();
        return $query->result();
    }

    function findEquipamiento($key){
        $this->db->select();
        $this->db->from('equipamiento');
        $this->db->where('id', $key);
        $this->db->where('activo', 1);
        $query=$this->db->get();
        return $query->row();
    }

    function findFinanciamientos(){
        $this->db->select();
        $this->db->from('financiamiento');
        $this->db->where('activo', 1);
        $query=$this->db->get();
        return $query->result();
    }

    function findFinanciamiento($key){
        $this->db->select();
        $this->db->from('financiamiento');
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

    function eliminarServicios($id){
        $this->db->where('inmueble_id', $id);   
        $this->db->delete('servicio_inmueble');    
    }

    function insertarServicio($data){
        return $this->db->insert('servicio_inmueble', $data);
        //return $this->db->insert_id();
    } 

    /* Fin Servicios */

    public function obtenerGaleria($key){
        $this->db->select('id, foto');
        $this->db->from('galeria');
        $this->db->where('activo', 1);
        $this->db->where('inmueble_id', $key);
        $query=$this->db->get();
        
        return $query->result();
    }
    
    public function getTipo(){
        $this->db->select('id, tipo');
        $this->db->from('tipoprecio');
        $this->db->where('activo', 1);
        $query=$this->db->get();
        
        return $query->result();
    }

    public function getFinanciamiento(){
        $this->db->select('id, financiamiento');
        $this->db->from('financiamiento');
        $this->db->where('activo', 1);
        $query=$this->db->get();
        
        return $query->result();
    }

    public function getEquipamiento(){
        $this->db->select('id, equipamiento');
        $this->db->from('equipamiento');
        $this->db->where('activo', 1);
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

    public function insertImg($data){
        return $this->db->insert('galeria', $data);
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
        $this->db->where('id', $id);   
        return $this->db->delete('galeria');  
    } 
    public function findPicture($id){
        $this->db->select();
        $this->db->from('galeria');
        $this->db->where('id', $id);

        $query=$this->db->get();
        return $query->row();
    }

    function existsService($data){
        $this->db->select();
        $this->db->from('servicio_inmueble');
        $this->db->where('inmueble_id', $data['inmueble_id']);
        $this->db->where('servicio_id', $data['servicio_id']);
        $query=$this->db->get();
        return $query->row();
    }

    function existsMethod($data){
        $this->db->select();
        $this->db->from('forma_inmueble');
        $this->db->where('inmueble_id', $data['inmueble_id']);
        $this->db->where('forma_pago_id', $data['forma_pago_id']);
        $query=$this->db->get();
        return $query->row();
    }

    function existsEquipamiento($data){
        $this->db->select();
        $this->db->from('equipamiento_inmueble');
        $this->db->where('inmueble_id', $data['inmueble_id']);
        $this->db->where('equipamiento_id', $data['equipamiento_id']);
        $query=$this->db->get();
        return $query->row();
    }

    function existsFinanciamiento($data){
        $this->db->select();
        $this->db->from('financiamiento_inmueble');
        $this->db->where('inmueble_id', $data['inmueble_id']);
        $this->db->where('financiamiento_id', $data['financiamiento_id']);
        $query=$this->db->get();
        return $query->row();
    }

    function get_rows($key, $table){
        $this->db->select();
        $this->db->from($table.'_inmueble');
        $this->db->where('inmueble_id', $key);
        $query=$this->db->get();
        return $query->result();
    }

    public function insert_row($data, $table){
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    function delete_rows($key, $table){
        $this->db->where('inmueble_id', $key);   
        $this->db->delete($table);    
    }

    function findSales(){
        $this->db->select();
        $this->db->from('oferta');
        //$this->db->where('activo', 1);
        $query=$this->db->get();
        return $query->result();       
    }
}
