<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
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


    public function showupload(){
        $this->load->view("upload");


    }

    public function uploadfile(){
        //upload file
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'pdf|docx';
        $config['max_filename'] = '255';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = 1024*50; //1 MB
        $config['remove_spaces'] = TRUE;
       
        if (isset($_FILES['file']['name'])) {           /// ตรวจสอบมี ชื่อไหม 
            if (0 < $_FILES['file']['error']) {         // ตรวจสอบ ไฟล์ มีอยู่จริงไหม หรือ มี Error ไหม 
                echo 'Error during file upload' . $_FILES['file']['error'];
            } else {
                if (file_exists('uploads/' . $_FILES['file']['name'])) {
                    $msg["status"] = "error";
                    $msg["msg"] = 'File already exists : uploads/' . $_FILES['file']['name'];
                    echo json_encode($msg);
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        $msg["status"] = "error";
                        $msg["msg"] = $this->upload->display_errors();
                        echo json_encode($msg);
                    } else {
                        $filename = $this->upload->data('file_name');  
                        $stringMsg = "File successfully uploaded : <a href=".base_url()."/uploads/".$filename.">" . $_FILES['file']['name']."</a>";
                        $msg["status"] = "success";
                        $msg["msg"]  = $stringMsg;
                        $msg["filename"] = $filename;
                        echo json_encode($msg);
                    }
                }
            }
        } else {
            // echo 'Please choose a file';
            $msg["status"] = "error";
            $msg["msg"] = 'Please choose a file';
            echo json_encode($msg);
        }
    }


}