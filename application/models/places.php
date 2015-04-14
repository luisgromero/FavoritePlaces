<?php
class Places extends CI_Model {
    
    // Gets all places from DB
    public function getAllPlaces(){
        $query = $this->db->query('SELECT * FROM places');
        return $query->result();     
    }
    
    // Saves place to DB
    public function insertPlace($place){
        $data=  array("place"=>$place);
        $this->db->insert('places',$data);
    }
    
    // Deletes place from DB
    public function deletePlace($place){
        $this->db->where('place',$place);
        $this->db->delete('places');        
    }
}
?>
