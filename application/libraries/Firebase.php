<?php
    require __DIR__.'/.././third_party/firebase/vendor/autoload.php';

    use Google\Cloud\Firestore\FirestoreClient;

    class Firebase
    {
        protected $db;
        protected $name;

        public function __construct($collection)
        {
            $this->db = new FirestoreClient([
                "projectId" => "holamundo-c16aa"
            ]);

            $this->name = $collection;
        }

        public function getDocumento(  $name )
        {
            return $this->db->collection($this->name)->document($name)->snapshot()->data();
        }
    }
?>