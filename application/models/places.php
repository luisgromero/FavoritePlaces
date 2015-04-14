<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of places
 */
class Places extends CI_Model {

    public function getAllPlaces(){
        $query = $this->db->query('SELECT * FROM places');
        return $query->result();     
    }
    
    public function insertPlace($place){
        $data=  array("place"=>$place);
        $this->db->insert('places',$data);
    }
    
    public function deletePlace($place){
        $this->db->where('place',$place);
        $this->db->delete('places');        
    }
}
?>
