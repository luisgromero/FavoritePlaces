<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	
	public function index()
	{
            $this->load->model('places');
            $data['googleMapsQuery']="http://maps.google.com/?q=";
            $data['placeAddress']=$this->places->getAllPlaces();
            $this->load->view("index",$data);
                   
	}
        
        public function addPlace(){
            $this->load->model('places');
            $place=$_POST['place'];
            $this->places->insertPlace($place);
            //echo "You are adding a Place!" . $place;
            //echo( $data[0]->id + "<br>");
            //echo($data[0]->place);
        }
}

/* End of file site.php */
/* Location: ./application/controllers/site.php */