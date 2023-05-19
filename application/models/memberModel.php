<?php
class memberModel extends CI_Model{

    public function getalluser(){
        $this->db->where("status",'1');
        $result = $this->db->get("member");
        return $result->result();
    }

    public function insert($data){
        $this->db->insert("member",$data);

    }

    public function delete($data){
        $this->db->delete('member',$data);

    }

    public function update($id,$data){
        $this->db->set($data);
        $this->db->where('userid',$id);
        $this->db->update('member');
    }


    

}