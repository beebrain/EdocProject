<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usercontroller extends CI_Controller {


    public function index(){
        $this->showalluser();

    }

    public function showalluser(){
        $this->load->model("memberModel");
        $result = $this->memberModel->getalluser();

        $data["userdata"] = $result;
        $this->load->view("showalluser",$data);
        $this->load->view("insertuser");
    }

    public function showinsertForm(){
        $this->load->view("insertuser");
    }

    public function insert(){
       $data = array(
            'first' => $_REQUEST["first"],
            'last' => $_REQUEST["last"],
       );

        $this->load->model("memberModel");
        $this->memberModel->insert($data);

        redirect('/Usercontroller/showalluser', 'location');

    }

    public function delete($userid){
    //    echo $userid;
       $data = array(
        'userid' => $userid
        );
       $this->load->model("memberModel");
       $this->memberModel->delete($data);
       redirect('/Usercontroller/showalluser', 'location');
    }

    public function deactivate($id){
        $data = array(
            'status' => 0
            );
        $this->load->model("memberModel");
        $this->memberModel->update($id,$data);
        redirect('/Usercontroller/showalluser', 'location');

    }


}