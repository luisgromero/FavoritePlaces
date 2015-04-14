<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {
	
	public function index(){
            $this->load->model('places');
            $data['googleMapsQuery']="http://maps.google.com/?q=";
            $data['placeAddress']=$this->places->getAllPlaces();
            $this->load->view("index",$data);
	}
        
        public function addPlace(){
            $this->load->model('places');
            $place=$_POST['place'];
            $this->places->insertPlace($place);
        }
        
        public function removePlace(){
            $this->load->model('places');
            $place=$_POST['place'];
            $this->places->deletePlace($place);
        }
}
