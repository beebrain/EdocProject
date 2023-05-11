<?php
class memberModel extends CI_Model{

    public function getalluser(){
        $result = $this->db->get("member");
        return $result->result();
    }

    public function insert($data){
        $this->db->insert("member",$data);

    }

    
    public function delete($data){
        // $data = array(
        //     'userid' => 1,
        // );
        $this->db->delete('member',$data);

    }

}