<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_contenido extends CI_Model{

    public function __construct(){
        parent::__construct();
		$this->db = $this->load->database('default',TRUE);
    }

    public function sendCorreo($data){
        return $this->db->insert('cliente', $data);
        //return $this->db->insert_id();
    }

    public function datosFormaInmueble($id)
    {
        $this->db->select();
        $this->db->from('forma_inmueble fi');
        $this->db->join('forma_pago fp', 'fi.forma_pago_id = fp.id', 'JOIN');
        $this->db->join('inmueble i', 'fi.inmueble_id = i.id');
        $this->db->where('i.id', $id);
        $this->db->where('i.activo', 1);
        $query = $this->db->get();

        return $query->result();
    }

    public function datosAmenidadesDesarrollo($id)
    {
        //$mostrar = $this->datosGaleria($id);
        $this->db->select();
        $this->db->from('amenidades_desarrollo ad');
        $this->db->join('amenidades a', 'ad.amenidades_id = a.id', 'JOIN');
        $this->db->join('desarrollo d', 'ad.desarrollo_id = d.id', 'JOIN');
        $this->db->join('inmueble i', 'i.desarrollo_id = d.id');
        $this->db->where('i.id', $id);
        $this->db->where('i.activo', 1);
        $query = $this->db->get();

        return $query->result();
    }

    public function datosEquipamoentoInmueble($id)
    {
        $this->db->select();
        $this->db->from('equipamiento_inmueble ei');
        $this->db->join('equipamiento e', 'ei.equipamiento_id = e.id', 'JOIN');
        $this->db->join('inmueble i', 'ei.inmueble_id = i.id');
        $this->db->where('i.id', $id);
        $this->db->where('i.activo', 1);
        $query = $this->db->get();

        return $query->result();
    }

    public function datosServicioInmueble($id)
    {
        $this->db->select();
        $this->db->from('servicio_inmueble si');
        $this->db->join('servicio s', 'si.servicio_id = s.id', 'JOIN');
        $this->db->join('inmueble i', 'si.inmueble_id = i.id', 'JOIN');
        $this->db->where('i.activo', 1, $id);
        $query = $this->db->get();

        return $query->result();
    }

    public function datosPlanta1Inmueble($id)
    {
        $this->db->select();
        $this->db->from('detalles_planta dp');
        $this->db->join('detalles d', 'dp.detalles_id = d.id', 'JOIN');
        $this->db->join('planta p', 'dp.planta_id = p.id', 'JOIN');
        $this->db->join('inmueble i', 'p.inmueble_id = i.id', 'JOIN');
        $this->db->where('p.nombre', 'Alta');
        $this->db->where('i.activo', 1, $id);
        $query = $this->db->get();

        return $query->result();
    }

    public function datosPlanta2Inmueble($id)
    {
        $this->db->select();
        $this->db->from('detalles_planta dp');
        $this->db->join('detalles d', 'dp.detalles_id = d.id', 'JOIN');
        $this->db->join('planta p', 'dp.planta_id = p.id', 'JOIN');
        $this->db->join('inmueble i', 'p.inmueble_id = i.id', 'JOIN');
        $this->db->where('p.nombre', 'Baja');
        $this->db->where('i.activo', 1, $id);
        $query = $this->db->get();

        return $query->result();
    }    

    public function datosPlantaInmueble2($id)
    {
        $this->db->select();
        $this->db->from('detalles_planta dp');
        $this->db->join('detalles d', 'dp.detalles_id = d.id', 'JOIN');
        $this->db->join('planta p', 'dp.planta_id = p.id', 'JOIN');
        $this->db->join('inmueble i', 'p.inmueble_id = i.id', 'JOIN');
        $this->db->where('p.nombre', 'Alta');
        $this->db->where('i.activo', 1, $id);
        $query =  $this->db->get()->row();

		return $query;
    }

    public function datosPlantaDosInmueble($id)
    {
        $this->db->select();
        $this->db->from('detalles_planta dp');
        $this->db->join('detalles d', 'dp.detalles_id = d.id', 'JOIN');
        $this->db->join('planta p', 'dp.planta_id = p.id', 'JOIN');
        $this->db->join('inmueble i', 'p.inmueble_id = i.id', 'JOIN');
        $this->db->where('i.activo', 1);
        $this->db->where('i.id', $id);
        $query = $this->db->get();
        //print_r($query);
        return $query->result();
    }

    public function datosClienteInmueble($id)
    {
        $this->db->select();
        $this->db->from('cliente cli');
        $this->db->join('inmueble i', 'i.Id_inmmueble = cli.Id_inmmueble');
        $this->db->where('i.Activo', 1, $id);
        $query =  $this->db->get()->row();

		return $query;
    }

    public function datosInmueble()
    {
        $this->db->select();
        $this->db->from('inmueble i');
        $this->db->join('desarrollo d', 'i.desarrollo_id = d.id', 'JOIN');
        $this->db->join('colonia col', 'd.colonia_id = col.id', 'JOIN');
        $this->db->join('municipio m', 'col.municipio_id= m.id', 'JOIN');
        $this->db->join('estado est', 'm.estado_id = est.id', 'JOIN');
        $this->db->join('tipoprecio tp', 'i.tipoprecio_id = tp.id', 'JOIN');
        $this->db->where('i.activo', 1);
        $query =  $this->db->get()->row();

		return $query;
    }

    public function datosGaleria($id){
        $mostrar = $this->ShowPrecio($id);
        $this->db->select();
        $this->db->from('galeria g');
        $this->db->join('inmueble i', 'g.inmueble_id = i.id', 'JOIN');
        $this->db->join('asesor a', 'i.Id_asesor = a.Id_asesor', 'JOIN');
        $this->db->join('desarrollo d', 'i.desarrollo_id = d.id', 'JOIN');
        $this->db->join('tipoprecio tp', 'i.tipoprecio_id = tp.id', 'JOIN');
        $this->db->join('colonia col', 'd.colonia_id = col.id', 'JOIN');
        $this->db->join('municipio m', 'col.municipio_id= m.id', 'JOIN');
        $this->db->join('estado est', 'm.estado_id = est.id', 'JOIN');
        $this->db->join('oferta o', 'o.inmueble_id = i.id', 'JOIN');
        $this->db->where('i.id', $id, $mostrar);
        $this->db->where('i.activo', 1, $id, $mostrar);
        $query =  $this->db->get()->row();

        //print_r($mostrar);

		return $query;
    }

    public function ShowPrecio($id){
        //$mostrar = $this->datosGaleria($id);
        $this->db->select();
        $this->db->distinct('i.id');
        $this->db->from('oferta o');
        $this->db->join('inmueble i', 'o.inmueble_id = i.id', 'JOIN');
        $this->db->join('galeria g', 'g.inmueble_id = i.id', 'JOIN');
        $this->db->join('desarrollo d', 'i.desarrollo_id = d.id', 'JOIN');
        $this->db->join('colonia col', 'd.colonia_id = col.id', 'JOIN');
        $this->db->join('municipio m', 'col.municipio_id= m.id', 'JOIN');
        $this->db->join('estado est', 'm.estado_id = est.id', 'JOIN');
        $this->db->group_by('i.id', $id);
        $this->db->where('i.activo', 1/*, $mostrar*/);

        $query = $this->db->get();

        //print_r($query);
        return $query->result();
    }

    public function datosGaleria2($id, $modelo, $idDesarrollo){
        $mostrar = $this->ShowPrecio($id);
        $this->db->select();
        $this->db->distinct();
        $this->db->from('galeria g');
        $this->db->join('inmueble i', 'g.inmueble_id = i.id', 'INNER');
        $this->db->join('desarrollo d', 'i.desarrollo_id = d.id', 'INNER');
        $this->db->join('colonia col', 'd.colonia_id = col.id', 'INNER');
        $this->db->join('municipio m', 'col.municipio_id= m.id', 'INNER');
        $this->db->join('estado est', 'm.estado_id = est.id', 'INNER');
        $this->db->join('oferta o', 'o.inmueble_id = i.id', 'INNER');
        $this->db->where('i.activo', 1, $mostrar);
        $this->db->where('i.desarrollo_id', $idDesarrollo);
        $this->db->group_by('i.Modelo');
        $this->db->having('i.Modelo !=', $modelo);

        $query = $this->db->get();
        //print_r($query);
        //$sql = $this->db->last_query();
        //print_r($sql);
        return $query->result();
    }

    public function mostrarGaleria($id){
        $mostrar = $this->datosInmueble();
        $this->db->select();
        $this->db->from('galeria g');
        $this->db->join('inmueble i', 'g.inmueble_id = i.id');
        $this->db->where('g.activo', 1, $mostrar);

        $query = $this->db->get();

        //print_r($query->result());
        return $query->result();
    }

    //Consulta carrusel
    public function showCarrusel($id){
        $this->db->select();
        $this->db->from('galeria g');
        $this->db->join('inmueble i', 'g.inmueble_id = i.id');
        $this->db->where('g.activo', 1);
        $this->db->where('i.id', $id);

        $query = $this->db->get();

        return $query->result();
    }
    public function showCarrusel2($id){
        $mostrar = $this->datosInmueble();
        $this->db->select();
        $this->db->from('galeria_desarrollo gd');
        $this->db->join('desarrollo d', 'gd.desarrollo_id = d.id');
        $this->db->join('inmueble i', 'i.desarrollo_id = d.id', 'JOIN');
        $this->db->where('gd.activo', 1, $mostrar);
        $this->db->where('i.id', $id);

        $query = $this->db->get();

        return $query->result();
    }
}