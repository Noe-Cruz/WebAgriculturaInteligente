<?php

require_once '.././libraries/Firebase.php';

class Frontend extends CI_Controller {

    public function __construct(){
        parent::__construct();
        //$this->load->library('firebase');
    }

    public function index() {

        $fs = new Firebase('users');

        $data["name"] = $fs->getDocumento('JCaETdllwwdQClyMP55H');

        //die(print_r($data));

        $this->load->view("inicio_view", $data);
    }
}

?>