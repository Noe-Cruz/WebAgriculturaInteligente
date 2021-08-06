<?php
    require __DIR__.'/.././third_party/firebase/vendor/autoload.php';

    use Kreait\Firebase\Factory;

    class Realtime 
    {
        protected $db;

        public function __construct()
        {
            $factory = (new Factory)
                ->withServiceAccount(__DIR__.'/.././config/huertoint-firebase-adminsdk-ikhza-b1fa434927.json')
                ->withDatabaseUri('https://huertoint-default-rtdb.firebaseio.com/');

            $this->db = $factory->createDatabase();
        }
            
        public function createUser( $uid ){

            try {
                $longitud = $this->db->getReference('datos/longitud')->getValue();

                $this->db->getReference("datos")
                    ->set([
                        "longitud" => $longitud + 1
                    ]);
                
                $this->db->getReference("usuarios")
                    ->update([
                        $longitud => $uid
                    ]);

                $this->db->getReference("sensores")
                    ->update([
                        $uid => [
                            "temperatura"   => 0,
                            "humedad"       => 0,
                            "agua"          => 0,
                            "suelo"         => 0,
                            "luz"           => 0,
                            "modulo"        => "nulo"      
                        ]
                    ]);
                return true;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }

        public function updateModulo( $uid, $modulo ){
            try {
                $this->db->getReference("sensores/".$uid)
                    ->update([
                            "modulo"  => $modulo      
                    ]);
                return true;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }

        public function verificaModulo( $uid ){
            try {
                $idModulo = $this->db->getReference("sensores/".$uid."/modulo")->getValue();
                return $idModulo;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }
    }
?>