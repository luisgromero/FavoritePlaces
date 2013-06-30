<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of places
 *
 * @author Sammy Guergachi <sguergachi at gmail.com>
 */
class Places extends CI_Model {
    //put your code here
    
    public function index(){
        echo "hi there index";
       
    }
    
    public function getAllPlaces(){
        $query = $this->db->query('SELECT * FROM places');
        return $query->result();     
    }
    
    public function insertPlace($place){
        //echo $place . "from model insertPlace";
        $data=  array("place"=>$place);
        $this->db->insert('places',$data);
    }
    
    public function deletePlace(){
        
    }
    
    public function updatePlace(){
        
    }
}

?>
