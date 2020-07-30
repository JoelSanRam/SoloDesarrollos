<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model{

    public function __construct(){
      parent::__construct();
      $this->load->helper('url');
		  $this->db = $this->load->database('default',TRUE);
    }
    
    /* public function login($data){ 
        $this -> db -> select('Id_asesor, email, pass');
        $this -> db -> from('asesor');
        $this -> db -> where('Correo', $data['email']);
        $this -> db -> where('Contrasenia', $data['pass']);
        $this -> db -> limit(1);
        $query = $this -> db -> get();
        if($query -> num_rows() == 1){
          return $query->result();
        }else{
          return false;
        }
    } */

    public function mostrar_usuario($correo = null, $password = null){
        $this->db->select();
        $this->db->from('asesor');
        $this->db->where('Correo', $correo);
        $this->db->where('Contrasenia', $password);   
        $query =  $this->db->get();       
        $resultado = $query->num_rows();
        return $resultado;
    }

    public function consulta_existe_usuario($where=''){
      $this->db->select('a.*', 'u.*');
      $this->db->from('asesor a');
      $this->db->join('usuario u','a.Id_usuario = u.Id_usuario','INNER');
      $this->db->where('a.Activo',1);
  
      if($where != '') $this->db->where($where);
  
      $query = $this->db->get();
      $_SESSION['consulta'] = $this->db->last_query();
  
      return $query;
    }
}