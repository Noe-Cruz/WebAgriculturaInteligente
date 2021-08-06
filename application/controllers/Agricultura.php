<?php
//require __DIR__."/.././config/firebase.php";
class Agricultura extends CI_Controller {


    public function __construct(){
        parent::__construct();
        $this->load->library('firestore');
        $this->load->library('Authentication');
        $this->load->library('Realtime');
        $this->load->helper('session');
    }
    /**VISTAS */

        /**PUBLIC */
        public function index() {
            $this->load->view("inicio_view");
        }
        public function iniciosesion(){
            $this->load->view("login_view");
        }
        public function registro(){
            $this->load->view("registro_view");
        }

        /**PRIVATE */
        public function inicio(){
            verifica_sesion();
            $this->load->view("panel_view");
          
        }
        public function miscultivos(){
            verifica_sesion();
            $this->load->view("cultivos_view");
        }
        public function catalogo(){
            verifica_sesion();
            $this->load->view("catalogo_view");
        }

    /**ADMINISTRACIÓN BD */

        /**Control de inicio de sesión*/
        public function registrousuario(){
            $correo         = $this->input->post("correo");
            $contrasenia    = $this->input->post("contrasenia");
            $nombre         = $this->input->post("nombre");
            
            $auth      = new Authentication();
            $firestore = new Firestore();
            $realtime  = new Realtime();

            $data = $auth->createUser( $contrasenia, $correo, $nombre );

            if( $data[ "mensaje" ] && $data[ "uid" ] != NULL){

                $response   = $firestore->createUser( $data[ "uid" ], $nombre );

                if( $response ){
                    $obj[ "mensaje" ] = $realtime->createUser( $data[ "uid" ] );
                }
                else{
                    $obj[ "mensaje" ] = $response;
                }
            }
            else{
                $obj = $data;
            }

            echo json_encode ( $obj );
        }

        public function creasesion(){
            $correo      = $this->input->post( "correo" );
            $contrasenia = $this->input->post( "contrasenia" );

            $auth      = new Authentication();
            $obj[ "response" ]    = $auth->iniciaSesion( $correo, $contrasenia ); 

            echo json_encode( $obj );
        }

        public function creasession( $uid, $correo, $idToken){
            $dataUser = array (
                "uid"       => $uid,
                "correo"    => $correo,
                "idToken"   => $idToken
            );

            $this->session->set_userdata( $dataUser );

            redirect( base_url(). "agricultura/inicio" );
        }

        public function getusuario(){
            verifica_sesion();
            $auth = new Authentication();
            $obj[ "nombre" ] = $auth->getUser( $this->session->uid );

            echo json_encode( $obj );
        }

        public function cerrarsesion (){
            verifica_sesion();
            $this->session->sess_destroy();
			redirect( base_url());
        }

        /**Catálogo */
        public function getcatalogo(){
            verifica_sesion();
            $firestore = new Firestore();
            $obj[ "cultivos" ] = $firestore->getCatalogo();

            echo json_encode( $obj );
        }

        /**Mis Cultivos */
        public function insertacultivo(){
            verifica_sesion();
            $uid            = $this->input->post("uid");
            $producto       = $this->input->post("producto");

            $data = [
                $uid => [
                    "temperatura" => [
                        "maximo" => (float)$this->input->post("maxt"),
                        "minimo" => (float)$this->input->post("mint")
                    ],
                    "humedad" => [
                        "maximo" => (float)$this->input->post("maxh"),
                        "minimo" => (float)$this->input->post("minh")
                    ],
                    "suelo" => [
                        "maximo" => (float)$this->input->post("maxs"),
                        "minimo" => (float)$this->input->post("mins")
                    ],
                    "agua" => [
                        "maximo" => (float)$this->input->post("maxa"),
                        "minimo" => (float)$this->input->post("mina")
                    ],
                    "luz" => [
                        "maximo" => (float)$this->input->post("maxl"),
                        "minimo" => (float)$this->input->post("minl")
                    ],
                    "user" => $uid
                ]
            ];

            $firestore = new Firestore();
            $obj[ "mensaje" ] = $firestore->insertaCultivo( $uid, $producto, $data ); 

            echo json_encode ( $obj );
        }

        public function getcultivos(){
            verifica_sesion();
            $uid = $this->input->post("uid");

            $firestore = new Firestore();
            $obj[ "cultivos" ] = $firestore->getCultivos( $uid );

            echo json_encode( $obj );
        }

        public function actualizacultivo(){
            verifica_sesion();
            $uid            = $this->input->post("uid");
            $producto       = $this->input->post("producto");
            $image          = $this->input->post("image");

            $data = [
                [ 'path' => "$uid.temperatura.maximo",  'value'  => (float)$this->input->post("maxt") ],
                [ 'path' => "$uid.temperatura.minimo",  'value'  => (float)$this->input->post("mint") ],
                [ 'path' => "$uid.humedad.maximo",      'value'  => (float)$this->input->post("maxh") ],
                [ 'path' => "$uid.humedad.minimo",      'value'  => (float)$this->input->post("minh") ],
                [ 'path' => "$uid.suelo.maximo",        'value'  => (float)$this->input->post("maxs") ],
                [ 'path' => "$uid.suelo.minimo",        'value'  => (float)$this->input->post("mins") ],
                [ 'path' => "$uid.agua.maximo",         'value'  => (float)$this->input->post("maxa") ],
                [ 'path' => "$uid.agua.minimo",         'value'  => (float)$this->input->post("mina") ],
                [ 'path' => "$uid.luz.maximo",          'value'  => (float)$this->input->post("maxl") ],
                [ 'path' => "$uid.luz.minimo",          'value'  => (float)$this->input->post("minl") ]
            ];

            $firestore = new Firestore();
            $obj[ "mensaje" ] = $firestore->actualizaCultivo( $producto, $data ); 

            echo json_encode ( $obj );
        }

        public function insertdocultivo(){
            verifica_sesion();
            $uid            = $this->input->post("uid");
            $producto       = $this->input->post("producto");
            $image          = $this->input->post("image");
            $descripcion    = $this->input->post("descripcion");

            $data = [
                "longitudes" => [
                    "temperatura" => [
                        "maximo" => (float)$this->input->post("maxt"),
                        "minimo" => (float)$this->input->post("mint")
                    ],
                    "humedad" => [
                        "maximo" => (float)$this->input->post("maxh"),
                        "minimo" => (float)$this->input->post("minh")
                    ],
                    "suelo" => [
                        "maximo" => (float)$this->input->post("maxs"),
                        "minimo" => (float)$this->input->post("mins")
                    ],
                    "agua" => [
                        "maximo" => (float)$this->input->post("maxa"),
                        "minimo" => (float)$this->input->post("mina")
                    ],
                    "luz" => [
                        "maximo" => (float)$this->input->post("maxl"),
                        "minimo" => (float)$this->input->post("minl")
                    ]
                ],
                $uid => [
                    "temperatura" => [
                        "maximo" => (float)$this->input->post("maxt"),
                        "minimo" => (float)$this->input->post("mint")
                    ],
                    "humedad" => [
                        "maximo" => (float)$this->input->post("maxh"),
                        "minimo" => (float)$this->input->post("minh")
                    ],
                    "suelo" => [
                        "maximo" => (float)$this->input->post("maxs"),
                        "minimo" => (float)$this->input->post("mins")
                    ],
                    "agua" => [
                        "maximo" => (float)$this->input->post("maxa"),
                        "minimo" => (float)$this->input->post("mina")
                    ],
                    "luz" => [
                        "maximo" => (float)$this->input->post("maxl"),
                        "minimo" => (float)$this->input->post("minl")
                    ],
                    "user" => $uid
                ],
                "producto"      => $producto,
                "descripcion"   => $descripcion,
                "image"         => $image
            ];

            $firestore = new Firestore();
            $obj[ "mensaje" ] = $firestore->insertDoCultivo( $producto, $data ); 

            echo json_encode ( $obj );
        }

        public function borrarcultivo(){
            verifica_sesion();
            $uid            = $this->input->post("uid");
            $producto       = $this->input->post("producto");

            $firestore = new Firestore();
            $obj[ "mensaje" ] = $firestore->dropCultivo( $producto, $uid ); 

            echo json_encode ( $obj );
        }
        
        public function agregamodulo(){
            verifica_sesion();
            $uid     = $this->input->post("uid");
            $modulo  = $this->input->post("modulo");

            $realtime = new Realtime();
            $obj[ "response" ] = $realtime->updateModulo( $uid, $modulo );

            echo json_encode( $obj );
        }

        public function verificamodulo(){
            verifica_sesion();
            $uid     = $this->input->post("uid");

            $realtime = new Realtime();
            $obj[ "response" ] = $realtime->verificaModulo( $uid );

            echo json_encode( $obj );
        }
}
?>

