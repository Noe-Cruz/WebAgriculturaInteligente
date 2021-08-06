<?php
    require __DIR__.'/.././third_party/firebase/vendor/autoload.php';

    use Google\Cloud\Firestore\FirestoreClient;
    use Google\Cloud\Firestore\FieldValue;
    use Google\Cloud\Firestore\FieldPath;

    class Firestore
    {
        protected $db;

        public function __construct()
        {
            $this->db = new FirestoreClient([
                "projectId" => "huertoint"
            ]);
        }

        public function getCatalogo(){
            $arr = [];

            $query = $this->db->collection('cultivos')->documents()->rows();
            
            if(!empty($query)){
                foreach( $query as $item ){
                    $arr[] = $item->data(); 
                }
            }

            return $arr;


        }

        public function insertaCultivo( $uid, $producto, $data ){
            try {
                $this->db
                    ->collection('cultivos')
                    ->document($producto)
                    ->set($data, ['merge' => true]);

                return true;

            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }

        public function getCultivos( $uid ){
            $arr = [];

            $query = $this->db->collection('cultivos')->where("$uid.user", '==', "$uid");

            $documents = $query->documents()->rows();
            
            if(!empty($documents)){
                foreach( $documents as $item ){
                    $arr[] = $item->data(); 
                }
            }

            return $arr;

        }
        
        public function actualizaCultivo( $producto, $data ){
            try {
                $this->db
                    ->collection('cultivos')
                    ->document($producto)
                    ->update($data);
                return true;

            } catch (\Throwable $e) {
                return $e->getMessage();
            }
        }

        public function insertDoCultivo( $producto, $data ){
            try {
                $this->db
                    ->collection('cultivos')
                    ->document($producto)
                    ->create($data);
                return true;

            } catch (\Throwable $e) {
                return $e->getMessage();
            }
        }

        public function dropCultivo( $producto, $uid ){

            $data = [
                'path' => $uid, 'value' => FieldValue::deleteField()
            ];

            try {
                $this->db
                    ->collection('cultivos')
                    ->document($producto)
                    ->update([$data]);
                return true;

            } catch (\Throwable $e) {
                return $e->getMessage();
            }
        }

        public function createUser( $uid, $nombre ){
            try {
                $this->db
                    ->collection('usuarios')
                    ->add([
                        "authId"        => $uid,
                        "nombreCompleto" => $nombre
                    ]);

                return true;

            } catch (\Throwable $e) {
                return $e->getMessage();
            }
        }
    }
?>