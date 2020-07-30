<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'C_home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['login'] = 'C_login';

/* Extras */ 
$route['amenidades']                        = 'Admin/C_amenidades/formaPago';
$route['formaPago']                         = 'Admin/C_formaPago/formaPago';
$route['servicio']                          = 'Admin/C_servicio/formaPago';
$route['tipoPrecio']                        = 'Admin/C_tipoPrecio/formaPago';
$route['caracteristicas']                   = 'Admin/C_caracteristicas/formaPago';
$route['equipamiento']                      = 'Admin/C_equipamiento/formaPago'; 
$route['financiamiento']                    = 'Admin/C_financiamiento/formaPago'; 
$route['detalle']                           = 'Admin/C_detalle/formaPago'; 
$route['tipoProducto']                      = 'Admin/C_tipoProducto/formaPago';

/* Empresa */
$route['empresa']                           = 'Admin/C_empresa/empresa';
$route['empresa/tabla']                     = 'Admin/C_empresa/tabla';
$route['empresa/nueva']                     = 'Admin/C_empresa/guardarEmpresa';
$route['empresa/guardar']                   = 'Admin/C_empresa/insertarEmpresa';
$route['empresa/eliminar']                  = 'Admin/C_empresa/eliminarEmpresa';
$route['empresa/modificar/(:num)']          = 'Admin/C_empresa/modificarEmpresa/$1';

/* Modelo */
$route['modelo']                           = 'Admin/C_modelo/modelo';
$route['modelo/tabla']                     = 'Admin/C_modelo/tabla';
$route['modelo/nuevo']                     = 'Admin/C_modelo/guardarModelo';
$route['modelo/guardar']                   = 'Admin/C_modelo/insertarModelo';
$route['modelo/eliminar']                  = 'Admin/C_modelo/eliminarModelo';
$route['modelo/modificar']                 = 'Admin/C_modelo/modificarModelo';

/* Tipo de inmueble */
$route['tipo/inmueble']                           = 'Admin/C_tipo/tipo';
$route['tipo/inmueble/tabla']                     = 'Admin/C_tipo/tabla';
$route['tipo/inmueble/nuevo']                     = 'Admin/C_tipo/guardarTipo';
$route['tipo/inmueble/guardar']                   = 'Admin/C_tipo/insertarTipo';
$route['tipo/inmueble/eliminar']                  = 'Admin/C_tipo/eliminarTipo';
$route['tipo/inmueble/modificar']                 = 'Admin/C_tipo/modificarTipo';

/* Inmueble */
$route['inmueble']                          = 'Admin/C_inmueble/inmueble';
$route['inmueble/tabla']                    = 'Admin/C_inmueble/tabla';
$route['inmueble/nuevo']                    = 'Admin/C_inmueble/guardarInmueble';
$route['inmueble/guardar']                  = 'Admin/C_inmueble/insertar';
$route['inmueble/eliminar']                 = 'Admin/C_inmueble/eliminarInmueble';
$route['inmueble/dropzone']                 = 'Admin/C_inmueble/dropzone';
$route['inmueble/dropzone/upload']          = 'Admin/C_inmueble/upload';
$route['inmueble/dropzone/galeria']         = 'Admin/C_inmueble/tablaGaleria';
$route['inmueble/dropzone/eliminar']        = 'Admin/C_inmueble/eliminarGaleria';
$route['inmueble/modificar']                = 'Admin/C_inmueble/modificarInmueble';

$route['inmueble/procesar']                 = 'Admin/C_inmueble/procesar';
$route['inmueble/eliminar/extras']          = 'Admin/C_inmueble/unset_element';

//Carritos
$route['inmueble/servicios']                = 'Admin/C_inmueble/findServicios';
$route['inmueble/methods']                  = 'Admin/C_inmueble/findMethods';

$route['inmueble/financiamiento']           = 'Admin/C_inmueble/findFinanciamientos';
$route['inmueble/equipamiento']             = 'Admin/C_inmueble/findEquipamientos';

//Carritos inmueble
$route['inmueble/tabla/servicios']          = 'Admin/C_inmueble/tablaServicios';
$route['inmueble/tabla/metodos']            = 'Admin/C_inmueble/tablaFormas';
$route['inmueble/nueva/oferta']             = 'Admin/C_inmueble/addOferta';

$route['inmueble/tabla/financiamientos']          = 'Admin/C_inmueble/tabla_financiamiento';
$route['inmueble/tabla/equipamientos']            = 'Admin/C_inmueble/tabla_equipamiento';
$route['inmueble/tabla/oferta']                   = 'Admin/C_inmueble/tabla_oferta';

/* Desarrolladora */
$route['desarrolladora']                    = 'Admin/C_desarrolladora/desarrolladora';
$route['desarrolladora/tabla']              = 'Admin/C_desarrolladora/tabla';
$route['desarrolladora/nueva']              = 'Admin/C_desarrolladora/guardarDesarrolladora';
$route['desarrolladora/guardar']            = 'Admin/C_desarrolladora/insertarDesarrolladora';
$route['desarrolladora/eliminar']           = 'Admin/C_desarrolladora/eliminarDesarrolladora';
$route['desarrolladora/modificar/(:num)']   = 'Admin/C_desarrolladora/modificarDesarrolladora/$1';

/* Desarrollo */
$route['desarrollo']                    = 'Admin/C_desarrollo/index';
$route['desarrollo/tabla']              = 'Admin/C_desarrollo/tabla';
$route['desarrollo/nuevo']              = 'Admin/C_desarrollo/nuevoDesarrollo';
$route['desarrollo/guardar']            = 'Admin/C_desarrollo/dataEntry';
$route['desarrollo/eliminar']           = 'Admin/C_desarrollo/delete';
$route['desarrollo/modificar']          = 'Admin/C_desarrollo/edit';

/* Localizacion */

$route['desarrollo/municipio']              = 'Admin/C_desarrollo/loadMunicipio';
$route['desarrollo/colonia']                = 'Admin/C_desarrollo/loadColonia';

$route['desarrollo/amenidades']             = 'Admin/C_desarrollo/findAmenidades';
$route['desarrollo/tbam']                   = 'Admin/C_desarrollo/tbam';

$route['desarrollo/caracteristicas']        = 'Admin/C_desarrollo/findcaracteristicas';
$route['desarrollo/tbca']                   = 'Admin/C_desarrollo/tbca';

$route['desarrollo/tp']                     = 'Admin/C_desarrollo/findTP';
$route['desarrollo/tbtp']                   = 'Admin/C_desarrollo/tbtp';

$route['desarrollo/td']                     = 'Admin/C_desarrollo/findTD';
$route['desarrollo/tbtd']                   = 'Admin/C_desarrollo/tbtd';

$route['desarrollo/eliminar/extras']        = 'Admin/C_desarrollo/unset_element';

$route['desarrollo/procesar']               = 'Admin/C_desarrollo/procesar';
$route['desarrollo/dropzone']               = 'Admin/C_desarrollo/dropzone';
$route['desarrollo/dropzone/upload']          = 'Admin/C_desarrollo/upload';
$route['desarrollo/dropzone/galeria']         = 'Admin/C_desarrollo/tablaGaleria';
$route['desarrollo/dropzone/eliminar']        = 'Admin/C_desarrollo/eliminarGaleria';

$route['planta']                            = 'Admin/C_planta/index';
$route['planta/tabla']                      = 'Admin/C_planta/tabla';
$route['planta/detalles']                   = 'Admin/C_planta/detalles';
$route['planta/insertar']                   = 'Admin/C_planta/dataEntry';
$route['planta/eliminar']                   = 'Admin/C_planta/deleteRecord';
