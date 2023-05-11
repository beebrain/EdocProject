<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class First extends CI_Controller {

    public function index(){
        echo "Hello First";

    }

    public function plus(){
        echo 7+4;
    }

}

?>