<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_busqueda extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
    }

    public function buscarInmueble($Ubicacion = null, $tipoIn = null)
    {
        $this->db->select();
        $this->db->distinct('i.id');
        $this->db->from('galeria g');
        $this->db->join('inmueble i', 'g.inmueble_id = i.id', 'JOIN');
        $this->db->join('asesor a', 'a.Id_asesor = i.Id_asesor', 'JOIN');
        $this->db->join('tipoprecio tp', 'i.tipoprecio_id = tp.id', 'JOIN');
        $this->db->join('desarrollo d', 'i.desarrollo_id = d.id', 'JOIN');
        $this->db->join('colonia col', 'd.colonia_id = col.id', 'JOIN');
        $this->db->join('municipio m', 'col.municipio_id= m.id', 'JOIN');
        $this->db->join('estado est', 'm.estado_id = est.id', 'JOIN');
        $this->db->join('tipo_producto tprod', 'i.tipo_producto_id = tprod.id', 'JOIN');
        $this->db->join('oferta o', 'o.inmueble_id = i.id', 'JOIN');
        $this->db->group_by('i.id');
        $this->db->where('i.Activo', 1);
        $this->db->like('tprod.Tipo', $tipoIn);
        $this->db->like('m.municipio', $Ubicacion);
        $this->db->or_like('est.estado', $Ubicacion);
        $this->db->or_like('col.colonia', $Ubicacion);

        $query =  $this->db->get();

        $resultado = $query->result();
        //print_r($resultado);
        return $resultado;
    }

    public function buscarInmueble2($Ubicacion = null, $tipoIn = null)
    {
        $this->db->select();
        $this->db->distinct('tprod.Tipo', 'm.municipio', 'est.estado', 'col.colonia');
        $this->db->from('galeria g');
        $this->db->join('inmueble i', 'g.inmueble_id = i.id', 'JOIN');
        $this->db->join('asesor a', 'a.Id_asesor = i.Id_asesor', 'JOIN');
        $this->db->join('tipoprecio tp', 'i.tipoprecio_id = tp.id', 'JOIN');
        $this->db->join('desarrollo d', 'i.desarrollo_id = d.id', 'JOIN');
        $this->db->join('colonia col', 'd.colonia_id = col.id', 'JOIN');
        $this->db->join('municipio m', 'col.municipio_id= m.id', 'JOIN');
        $this->db->join('estado est', 'm.estado_id = est.id', 'JOIN');
        $this->db->join('tipo_producto tprod', 'i.tipo_producto_id = tprod.id', 'JOIN');
        $this->db->join('oferta o', 'o.inmueble_id = i.id', 'JOIN');
        $this->db->group_by('tprod.Tipo');
        $this->db->where('i.Activo', 1);
        $this->db->like('tprod.Tipo', $tipoIn);
        $this->db->like('m.municipio', $Ubicacion);
        $this->db->or_like('est.estado', $Ubicacion);
        $this->db->or_like('col.colonia', $Ubicacion);

        $query =  $this->db->get()->row();

        return $query;
    }

    public function buscarInmueble3($Ubicacion = null)
    {
        $this->db->select();
        $this->db->distinct('i.id');
        $this->db->from('galeria g');
        $this->db->join('inmueble i', 'g.inmueble_id = i.id', 'JOIN');
        $this->db->join('asesor a', 'a.Id_asesor = i.Id_asesor', 'JOIN');
        $this->db->join('tipoprecio tp', 'i.tipoprecio_id = tp.id', 'JOIN');
        $this->db->join('desarrollo d', 'i.desarrollo_id = d.id', 'JOIN');
        $this->db->join('colonia col', 'd.colonia_id = col.id', 'JOIN');
        $this->db->join('municipio m', 'col.municipio_id= m.id', 'JOIN');
        $this->db->join('estado est', 'm.estado_id = est.id', 'JOIN');
        $this->db->join('tipo_producto tprod', 'i.tipo_producto_id = tprod.id', 'JOIN');
        $this->db->join('oferta o', 'o.inmueble_id = i.id', 'JOIN');
        $this->db->group_by('i.id');
        $this->db->where('i.Activo', 1);
        $this->db->like('m.municipio', $Ubicacion);
        $this->db->or_like('est.estado', $Ubicacion);
        $this->db->or_like('col.colonia', $Ubicacion);

        $query =  $this->db->get();

        $resultado = $query->result();
        //print_r($resultado);
        return $resultado;
    }

    public function mostrarInmueble()
    {
        $this->db->select();
        $this->db->from('inmueble i');
        $this->db->where('activo', 1);
        $query = $this->db->get();

        return $query->result();
    }

    public function mostrarAll()
    {
        $this->db->select(
            'i.*',
            'a.*',
            'm.*',
            'c.*',
            'tp.*'
        );
        $this->db->from('inmueble i');
        $this->db->join('asesor a', 'a.Id_asesor = i.Id_asesor', 'JOIN');
        $this->db->join('modelo m', 'm.Id_modelo = i.Id_modelo', 'JOIN');
        $this->db->join('caracteristicas c', 'c.id_producto = i.id_producto', 'JOIN');
        $this->db->join('tipoprecio tp', 'tp.id_tipoPrecio = i.id_tipoPrecio', 'JOIN');
        $this->db->join('colonia col', 'col.Id_colonia = i.Id_colonia', 'JOIN');
        $this->db->join('ciudad ciu', 'ciu.id_ciudad = col.id_ciudad', 'JOIN');
        $this->db->join('estado est', 'est.Id_estado = ciu.Id_estado', 'JOIN');
        $this->db->where('i.activo', 1);
        $query = $this->db->get();

        return $query->result();
    }

    public function ShowPrecio()
    {
        $mostrar = $this->mostrarFoto();
        $this->db->select();
        $this->db->distinct('i.id');
        $this->db->from('oferta o');
        $this->db->join('inmueble i', 'o.inmueble_id = i.id', 'JOIN');
        $this->db->join('galeria g', 'g.inmueble_id = i.id', 'JOIN');
        $this->db->join('desarrollo d', 'i.desarrollo_id = d.id', 'JOIN');
        $this->db->join('colonia col', 'd.colonia_id = col.id', 'JOIN');
        $this->db->join('municipio m', 'col.municipio_id= m.id', 'JOIN');
        $this->db->join('estado est', 'm.estado_id = est.id', 'JOIN');
        $this->db->group_by('i.id');
        $this->db->where('i.activo', 1, $mostrar);

        $query = $this->db->get();

        //print_r($query);
        return $query->result();
    }

    public function mostrarFoto()
    {
        $this->db->select();
        $this->db->distinct('i.id');
        $this->db->from('galeria g');
        $this->db->join('inmueble i', 'g.inmueble_id = i.id', 'JOIN');
        $this->db->join('desarrollo d', 'i.desarrollo_id = d.id', 'JOIN');
        $this->db->join('colonia col', 'd.colonia_id = col.id', 'JOIN');
        $this->db->join('municipio m', 'col.municipio_id= m.id', 'JOIN');
        $this->db->join('estado est', 'm.estado_id = est.id', 'JOIN');
        $this->db->group_by('i.id');
        $this->db->where('i.activo', 1);


        $query = $this->db->get();

        //print_r($query);
        return $query->result();
    }

    public function mostrarFotoOthers($key)
    {
        $mostrar = $this->ShowPrecio();
        $this->db->select();
        $this->db->distinct('i.id');
        $this->db->from('galeria g');
        $this->db->join('inmueble i', 'g.inmueble_id = i.id', 'JOIN');
        $this->db->join('desarrollo d', 'i.desarrollo_id = d.id', 'JOIN');
        $this->db->join('colonia col', 'd.colonia_id = col.id', 'JOIN');
        $this->db->join('municipio m', 'col.municipio_id= m.id', 'JOIN');
        $this->db->join('estado est', 'm.estado_id = est.id', 'JOIN');
        $this->db->join('oferta o', 'o.inmueble_id = i.id', 'JOIN');
        $this->db->where('i.activo', 1, $mostrar);
        $this->db->group_by('i.id');
        $this->db->having('i.id !=', $key);


        $query = $this->db->get();

        //print_r($query);
        return $query->result();
    }

    //Filtros de busqueda avanzada
    public function FiltroAvanzado($busqueda)
    {
        $this->db->select();
        $this->db->distinct('i.id');
        $this->db->from('galeria g');
        $this->db->join('inmueble i', 'g.inmueble_id = i.id', 'JOIN');
        $this->db->join('asesor a', 'a.Id_asesor = i.Id_asesor', 'JOIN');
        $this->db->join('tipoprecio tp', 'i.tipoprecio_id = tp.id', 'JOIN');
        $this->db->join('desarrollo d', 'i.desarrollo_id = d.id', 'JOIN');
        $this->db->join('colonia col', 'd.colonia_id = col.id', 'JOIN');
        $this->db->join('municipio m', 'col.municipio_id= m.id', 'JOIN');
        $this->db->join('estado est', 'm.estado_id = est.id', 'JOIN');
        $this->db->join('tipo_producto tprod', 'i.tipo_producto_id = tprod.id', 'JOIN');
        $this->db->join('oferta o', 'o.inmueble_id = i.id', 'JOIN');
        $this->db->where('i.Activo', 1);
        $this->db->where('i.recamaras', $busqueda);
        $this->db->group_by('i.id');
        /* $this->db->like('o.cantidad', $desde);
            $this->db->like('o.cantidad', $hasta); */

        $query =  $this->db->get();

        $resultado = $query->result();
        //print_r($resultado);
        return $resultado;
    }

    public function FiltroAvanzadoPlus($busqueda)
    {
        $this->db->select();
        $this->db->distinct('i.id');
        $this->db->from('galeria g');
        $this->db->join('inmueble i', 'g.inmueble_id = i.id', 'JOIN');
        $this->db->join('asesor a', 'a.Id_asesor = i.Id_asesor', 'JOIN');
        $this->db->join('tipoprecio tp', 'i.tipoprecio_id = tp.id', 'JOIN');
        $this->db->join('desarrollo d', 'i.desarrollo_id = d.id', 'JOIN');
        $this->db->join('colonia col', 'd.colonia_id = col.id', 'JOIN');
        $this->db->join('municipio m', 'col.municipio_id= m.id', 'JOIN');
        $this->db->join('estado est', 'm.estado_id = est.id', 'JOIN');
        $this->db->join('tipo_producto tprod', 'i.tipo_producto_id = tprod.id', 'JOIN');
        $this->db->join('oferta o', 'o.inmueble_id = i.id', 'JOIN');
        $this->db->where('i.Activo', 1);
        $this->db->where('i.recamaras >=', $busqueda);
        $this->db->group_by('i.id');
        /* $this->db->like('o.cantidad', $desde);
            $this->db->like('o.cantidad', $hasta); */

        $query =  $this->db->get();

        $resultado = $query->result();
        //print_r($resultado);
        return $resultado;
    }

    public function FiltroAvanzadoEstacionamiento($busqueda)
    {
        $this->db->select();
        $this->db->distinct('i.id');
        $this->db->from('galeria g');
        $this->db->join('inmueble i', 'g.inmueble_id = i.id', 'JOIN');
        $this->db->join('asesor a', 'a.Id_asesor = i.Id_asesor', 'JOIN');
        $this->db->join('tipoprecio tp', 'i.tipoprecio_id = tp.id', 'JOIN');
        $this->db->join('desarrollo d', 'i.desarrollo_id = d.id', 'JOIN');
        $this->db->join('colonia col', 'd.colonia_id = col.id', 'JOIN');
        $this->db->join('municipio m', 'col.municipio_id= m.id', 'JOIN');
        $this->db->join('estado est', 'm.estado_id = est.id', 'JOIN');
        $this->db->join('tipo_producto tprod', 'i.tipo_producto_id = tprod.id', 'JOIN');
        $this->db->join('oferta o', 'o.inmueble_id = i.id', 'JOIN');
        $this->db->where('i.Activo', 1);
        $this->db->where('i.estacionamiento', $busqueda);
        $this->db->group_by('i.id');

        $query =  $this->db->get();

        $resultado = $query->result();
        //print_r($resultado);
        return $resultado;
    }

    public function FiltroAvanzadoEstacionamientoPlus($busqueda)
    {
        $this->db->select();
        $this->db->distinct('i.id');
        $this->db->from('galeria g');
        $this->db->join('inmueble i', 'g.inmueble_id = i.id', 'JOIN');
        $this->db->join('asesor a', 'a.Id_asesor = i.Id_asesor', 'JOIN');
        $this->db->join('tipoprecio tp', 'i.tipoprecio_id = tp.id', 'JOIN');
        $this->db->join('desarrollo d', 'i.desarrollo_id = d.id', 'JOIN');
        $this->db->join('colonia col', 'd.colonia_id = col.id', 'JOIN');
        $this->db->join('municipio m', 'col.municipio_id= m.id', 'JOIN');
        $this->db->join('estado est', 'm.estado_id = est.id', 'JOIN');
        $this->db->join('tipo_producto tprod', 'i.tipo_producto_id = tprod.id', 'JOIN');
        $this->db->join('oferta o', 'o.inmueble_id = i.id', 'JOIN');
        $this->db->where('i.Activo', 1);
        $this->db->where('i.estacionamiento >=', $busqueda);
        $this->db->group_by('i.id');

        $query =  $this->db->get();

        $resultado = $query->result();
        //print_r($resultado);
        return $resultado;
    }

    public function FiltroAvanzadoPeso(/*$busqueda*/$desde, $hasta, $pesos)
    {
        $this->db->select();
        $this->db->distinct('i.id');
        $this->db->from('galeria g');
        $this->db->join('inmueble i', 'g.inmueble_id = i.id', 'JOIN');
        $this->db->join('asesor a', 'a.Id_asesor = i.Id_asesor', 'JOIN');
        $this->db->join('tipoprecio tp', 'i.tipoprecio_id = tp.id', 'JOIN');
        $this->db->join('desarrollo d', 'i.desarrollo_id = d.id', 'JOIN');
        $this->db->join('colonia col', 'd.colonia_id = col.id', 'JOIN');
        $this->db->join('municipio m', 'col.municipio_id= m.id', 'JOIN');
        $this->db->join('estado est', 'm.estado_id = est.id', 'JOIN');
        $this->db->join('tipo_producto tprod', 'i.tipo_producto_id = tprod.id', 'JOIN');
        $this->db->join('oferta o', 'o.inmueble_id = i.id', 'JOIN');
        $this->db->where('i.Activo', 1);
        $this->db->where('o.cantidad >=', $desde);
        $this->db->where('o.cantidad <=', $hasta);
        $this->db->where('tp.tipo_precio', $pesos);
        $this->db->group_by('i.id');
        /* $this->db->like('o.cantidad', $desde);
        $this->db->like('o.cantidad', $hasta); */

        $query =  $this->db->get();

        $resultado = $query->result();
        //print_r($resultado);
        return $resultado;
    }

    public function FiltroAvanzadoDolar(/*$busqueda*/$desde, $hasta, $dolares)
    {
        $this->db->select();
        $this->db->distinct('i.id');
        $this->db->from('galeria g');
        $this->db->join('inmueble i', 'g.inmueble_id = i.id', 'JOIN');
        $this->db->join('asesor a', 'a.Id_asesor = i.Id_asesor', 'JOIN');
        $this->db->join('tipoprecio tp', 'i.tipoprecio_id = tp.id', 'JOIN');
        $this->db->join('desarrollo d', 'i.desarrollo_id = d.id', 'JOIN');
        $this->db->join('colonia col', 'd.colonia_id = col.id', 'JOIN');
        $this->db->join('municipio m', 'col.municipio_id= m.id', 'JOIN');
        $this->db->join('estado est', 'm.estado_id = est.id', 'JOIN');
        $this->db->join('tipo_producto tprod', 'i.tipo_producto_id = tprod.id', 'JOIN');
        $this->db->join('oferta o', 'o.inmueble_id = i.id', 'JOIN');
        $this->db->where('i.Activo', 1);
        $this->db->where('o.cantidad >=', $desde);
        $this->db->where('o.cantidad <=', $hasta);
        $this->db->where('tp.tipo_precio', $dolares);
        $this->db->group_by('i.id');
        /* $this->db->like('o.cantidad', $desde);
            $this->db->like('o.cantidad', $hasta); */

        $query =  $this->db->get();

        $resultado = $query->result();
        //print_r($resultado);
        return $resultado;
    }

    public function FiltroAvanzadoConstruccion(/*$busqueda*/$desde, $hasta)
    {
        $this->db->select();
        $this->db->distinct('i.id');
        $this->db->from('galeria g');
        $this->db->join('inmueble i', 'g.inmueble_id = i.id', 'JOIN');
        $this->db->join('asesor a', 'a.Id_asesor = i.Id_asesor', 'JOIN');
        $this->db->join('tipoprecio tp', 'i.tipoprecio_id = tp.id', 'JOIN');
        $this->db->join('desarrollo d', 'i.desarrollo_id = d.id', 'JOIN');
        $this->db->join('colonia col', 'd.colonia_id = col.id', 'JOIN');
        $this->db->join('municipio m', 'col.municipio_id= m.id', 'JOIN');
        $this->db->join('estado est', 'm.estado_id = est.id', 'JOIN');
        $this->db->join('tipo_producto tprod', 'i.tipo_producto_id = tprod.id', 'JOIN');
        $this->db->join('oferta o', 'o.inmueble_id = i.id', 'JOIN');
        $this->db->where('i.Activo', 1);
        $this->db->where('i.construccion >=', $desde);
        $this->db->where('i.construccion <=', $hasta);
        $this->db->group_by('i.id');

        $query =  $this->db->get();

        $resultado = $query->result();
        //print_r($resultado);
        return $resultado;
    }

    public function FiltroAvanzadoSuperficie(/*$busqueda*/$desde, $hasta)
    {
        $this->db->select();
        $this->db->distinct('i.id');
        $this->db->from('galeria g');
        $this->db->join('inmueble i', 'g.inmueble_id = i.id', 'JOIN');
        $this->db->join('asesor a', 'a.Id_asesor = i.Id_asesor', 'JOIN');
        $this->db->join('tipoprecio tp', 'i.tipoprecio_id = tp.id', 'JOIN');
        $this->db->join('desarrollo d', 'i.desarrollo_id = d.id', 'JOIN');
        $this->db->join('colonia col', 'd.colonia_id = col.id', 'JOIN');
        $this->db->join('municipio m', 'col.municipio_id= m.id', 'JOIN');
        $this->db->join('estado est', 'm.estado_id = est.id', 'JOIN');
        $this->db->join('tipo_producto tprod', 'i.tipo_producto_id = tprod.id', 'JOIN');
        $this->db->join('oferta o', 'o.inmueble_id = i.id', 'JOIN');
        $this->db->where('i.Activo', 1);
        $this->db->where('i.superficie >=', $desde);
        $this->db->where('i.superficie <=', $hasta);
        $this->db->group_by('i.id');

        $query =  $this->db->get();

        $resultado = $query->result();
        //print_r($resultado);
        return $resultado;
    }

    public function FiltroAvanzadoOtherFormaPago()
    {
        $this->db->select();
        $this->db->distinct('i.id');
        $this->db->from('galeria g');
        $this->db->join('inmueble i', 'g.inmueble_id = i.id', 'JOIN');
        $this->db->join('asesor a', 'a.Id_asesor = i.Id_asesor', 'JOIN');
        $this->db->join('tipoprecio tp', 'i.tipoprecio_id = tp.id', 'JOIN');
        $this->db->join('desarrollo d', 'i.desarrollo_id = d.id', 'JOIN');
        $this->db->join('colonia col', 'd.colonia_id = col.id', 'JOIN');
        $this->db->join('municipio m', 'col.municipio_id= m.id', 'JOIN');
        $this->db->join('estado est', 'm.estado_id = est.id', 'JOIN');
        $this->db->join('tipo_producto tprod', 'i.tipo_producto_id = tprod.id', 'JOIN');
        $this->db->join('oferta o', 'o.inmueble_id = i.id', 'JOIN');
        $this->db->join('forma_inmueble forI', 'forI.inmueble_id = i.id', 'JOIN');
        $this->db->join('forma_pago forP', 'forI.forma_pago_id = forP.id', 'JOIN');
        $this->db->where('i.Activo', 1);
        $this->db->where('forP.forma !=', 'Recurso Propio');
        $this->db->where('forP.forma !=', 'Credito Bancario');
        $this->db->where('forP.forma !=', 'INFONAVIT');
        $this->db->where('forP.forma !=', 'COFINAVIT');
        $this->db->where('forP.forma !=', 'FOVISSTE');
        $this->db->group_by('i.id');
        $query =  $this->db->get();

        $resultado = $query->result();
        //print_r($resultado);
        return $resultado;
    }

    public function FiltroAvanzadoFormaPago($busqueda)
    {
        $this->db->select();
        $this->db->distinct('i.id');
        $this->db->from('galeria g');
        $this->db->join('inmueble i', 'g.inmueble_id = i.id', 'JOIN');
        $this->db->join('asesor a', 'a.Id_asesor = i.Id_asesor', 'JOIN');
        $this->db->join('tipoprecio tp', 'i.tipoprecio_id = tp.id', 'JOIN');
        $this->db->join('desarrollo d', 'i.desarrollo_id = d.id', 'JOIN');
        $this->db->join('colonia col', 'd.colonia_id = col.id', 'JOIN');
        $this->db->join('municipio m', 'col.municipio_id= m.id', 'JOIN');
        $this->db->join('estado est', 'm.estado_id = est.id', 'JOIN');
        $this->db->join('tipo_producto tprod', 'i.tipo_producto_id = tprod.id', 'JOIN');
        $this->db->join('oferta o', 'o.inmueble_id = i.id', 'JOIN');
        $this->db->join('forma_inmueble forI', 'forI.inmueble_id = i.id', 'JOIN');
        $this->db->join('forma_pago forP', 'forI.forma_pago_id = forP.id', 'JOIN');
        $this->db->where('i.Activo', 1);
        $this->db->where('forP.forma', $busqueda);
        $this->db->group_by('i.id');

        $query =  $this->db->get();

        $resultado = $query->result();
        //print_r($resultado);
        return $resultado;
    }

    // Características de la propiedad y servicios

    public function FiltroAvanzadoCaracteristicas($AguaPotable)
    {
        $this->db->select();
        $this->db->distinct('i.id');
        $this->db->from('galeria g');
        $this->db->join('inmueble i', 'g.inmueble_id = i.id', 'JOIN');
        $this->db->join('asesor a', 'a.Id_asesor = i.Id_asesor', 'JOIN');
        $this->db->join('tipoprecio tp', 'i.tipoprecio_id = tp.id', 'JOIN');
        $this->db->join('desarrollo d', 'i.desarrollo_id = d.id', 'JOIN');
        $this->db->join('colonia col', 'd.colonia_id = col.id', 'JOIN');
        $this->db->join('municipio m', 'col.municipio_id= m.id', 'JOIN');
        $this->db->join('estado est', 'm.estado_id = est.id', 'JOIN');
        $this->db->join('tipo_producto tprod', 'i.tipo_producto_id = tprod.id', 'JOIN');
        $this->db->join('oferta o', 'o.inmueble_id = i.id', 'JOIN');
        $this->db->join('forma_inmueble forI', 'forI.inmueble_id = i.id', 'JOIN');
        $this->db->join('forma_pago forP', 'forI.forma_pago_id = forP.id', 'JOIN');
        $this->db->join('servicio_inmueble servI', 'servI.inmueble_id = i.id', 'JOIN');
        $this->db->join('servicio serv', 'servI.servicio_id = serv.id', 'JOIN');
        $this->db->where('i.Activo', 1);
        $this->db->where('serv.servicio', $AguaPotable);
        $this->db->group_by('i.id');

        $query =  $this->db->get();

        $resultado = $query->result();
        //print_r($resultado);
        return $resultado;
    }

    public function FiltroAvanzadoCaracteristicas2($cuartoServicio)
    {
        $this->db->select();
        $this->db->distinct('i.id');
        $this->db->from('galeria g');
        $this->db->join('inmueble i', 'g.inmueble_id = i.id', 'JOIN');
        $this->db->join('asesor a', 'a.Id_asesor = i.Id_asesor', 'JOIN');
        $this->db->join('tipoprecio tp', 'i.tipoprecio_id = tp.id', 'JOIN');
        $this->db->join('desarrollo d', 'i.desarrollo_id = d.id', 'JOIN');
        $this->db->join('colonia col', 'd.colonia_id = col.id', 'JOIN');
        $this->db->join('municipio m', 'col.municipio_id= m.id', 'JOIN');
        $this->db->join('estado est', 'm.estado_id = est.id', 'JOIN');
        $this->db->join('tipo_producto tprod', 'i.tipo_producto_id = tprod.id', 'JOIN');
        $this->db->join('oferta o', 'o.inmueble_id = i.id', 'JOIN');
        $this->db->join('forma_inmueble forI', 'forI.inmueble_id = i.id', 'JOIN');
        $this->db->join('forma_pago forP', 'forI.forma_pago_id = forP.id', 'JOIN');
        $this->db->join('servicio_inmueble servI', 'servI.inmueble_id = i.id', 'JOIN');
        $this->db->join('servicio serv', 'servI.servicio_id = serv.id', 'JOIN');
        $this->db->join('equipamiento_inmueble equipI', 'equipI.inmueble_id = i.id', 'JOIN');
        $this->db->join('equipamiento equip', 'equipI.equipamiento_id = serv.id', 'JOIN');
        $this->db->where('i.Activo', 1);
        $this->db->where('equip.equipamiento', $cuartoServicio);
        $this->db->group_by('i.id');

        $query =  $this->db->get();

        $resultado = $query->result();
        //print_r($resultado);
        return $resultado;
    }

    public function FiltroAvanzadoCaracteristicas3($alberca)
    {
        $this->db->select();
        $this->db->distinct('i.id');
        $this->db->from('galeria g');
        $this->db->join('inmueble i', 'g.inmueble_id = i.id', 'JOIN');
        $this->db->join('asesor a', 'a.Id_asesor = i.Id_asesor', 'JOIN');
        $this->db->join('tipoprecio tp', 'i.tipoprecio_id = tp.id', 'JOIN');
        $this->db->join('desarrollo d', 'i.desarrollo_id = d.id', 'JOIN');
        $this->db->join('colonia col', 'd.colonia_id = col.id', 'JOIN');
        $this->db->join('municipio m', 'col.municipio_id= m.id', 'JOIN');
        $this->db->join('estado est', 'm.estado_id = est.id', 'JOIN');
        $this->db->join('tipo_producto tprod', 'i.tipo_producto_id = tprod.id', 'JOIN');
        $this->db->join('oferta o', 'o.inmueble_id = i.id', 'JOIN');
        $this->db->join('forma_inmueble forI', 'forI.inmueble_id = i.id', 'JOIN');
        $this->db->join('forma_pago forP', 'forI.forma_pago_id = forP.id', 'JOIN');
        $this->db->join('servicio_inmueble servI', 'servI.inmueble_id = i.id', 'JOIN');
        $this->db->join('servicio serv', 'servI.servicio_id = serv.id', 'JOIN');
        $this->db->join('equipamiento_inmueble equipI', 'equipI.inmueble_id = i.id', 'JOIN');
        $this->db->join('equipamiento equip', 'equipI.equipamiento_id = serv.id', 'JOIN');
        $this->db->where('i.Activo', 1);
        $this->db->where('equip.equipamiento', $alberca);
        $this->db->group_by('i.id');

        $query =  $this->db->get();

        $resultado = $query->result();
        //print_r($resultado);
        return $resultado;
    }

    public function FiltroAvanzadoCaracteristicas4($seguridad)
    {
        $this->db->select();
        $this->db->distinct('i.id');
        $this->db->from('galeria g');
        $this->db->join('inmueble i', 'g.inmueble_id = i.id', 'JOIN');
        $this->db->join('asesor a', 'a.Id_asesor = i.Id_asesor', 'JOIN');
        $this->db->join('tipoprecio tp', 'i.tipoprecio_id = tp.id', 'JOIN');
        $this->db->join('desarrollo d', 'i.desarrollo_id = d.id', 'JOIN');
        $this->db->join('colonia col', 'd.colonia_id = col.id', 'JOIN');
        $this->db->join('municipio m', 'col.municipio_id= m.id', 'JOIN');
        $this->db->join('estado est', 'm.estado_id = est.id', 'JOIN');
        $this->db->join('tipo_producto tprod', 'i.tipo_producto_id = tprod.id', 'JOIN');
        $this->db->join('oferta o', 'o.inmueble_id = i.id', 'JOIN');
        $this->db->join('forma_inmueble forI', 'forI.inmueble_id = i.id', 'JOIN');
        $this->db->join('forma_pago forP', 'forI.forma_pago_id = forP.id', 'JOIN');
        $this->db->join('servicio_inmueble servI', 'servI.inmueble_id = i.id', 'JOIN');
        $this->db->join('servicio serv', 'servI.servicio_id = serv.id', 'JOIN');
        $this->db->join('equipamiento_inmueble equipI', 'equipI.inmueble_id = i.id', 'JOIN');
        $this->db->join('equipamiento equip', 'equipI.equipamiento_id = serv.id', 'JOIN');
        $this->db->where('i.Activo', 1);
        $this->db->where('serv.servicio', $seguridad);
        $this->db->group_by('i.id');

        $query =  $this->db->get();

        $resultado = $query->result();
        //print_r($resultado);
        return $resultado;
    }
}
