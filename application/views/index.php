<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Favorite Places</title>
          <!-- Bootstrap -->
          <?php $this->asset->stylesheet('bootstrap.min'); ?>
          <?php $this->asset->stylesheet('bootstrap-responsive.min'); ?>
          <?php $this->asset->stylesheet('/styles/style'); ?>
    </head>
    <body>
        <div id="wrapper" class="container-fluid">   
            <div class="row-fluid">
                <div class="span12">
                       <h1>Favorite Places</h1> 
                </div>
            </div>
         
            <div class="row-fluid" style='background: #d3d3d3;'>
                <div class="span4">
                    <input id="autocomplete" type="text" name="auto" size="100">
                    <button id="btn-add" class="btn">Add Place</button>
          
                    <h4 id="selected"></h4>
                </div>
                <div class="span8">
                   
                    <h2>My places</h2>
                    
                        <table id="table-places" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name:</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
               
                </div>
                <?php
                // put your code here
                ?>
            </div>
        </div>
    
  
        
        
    <!-- Google API and extra Javascript  -->    
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
    <script src="http://code.jquery.com/jquery.js"></script>
      <?php $this->asset->javascript('bootstrap.min') ?>
    <script>
        var geocoder;
        var place; 
      
        
        $(document).ready(function(){
            initialize();
        });
        
        function initialize(){
            geocoder=new google.maps.Geocoder();
            var input = (document.getElementById('autocomplete'));
            var autocomplete = new google.maps.places.Autocomplete(input);
            
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                place = autocomplete.getPlace();
                $('#selected').text("Place selected: " +place.formatted_address);
            });    
        }
           
        $('button#btn-add').click(function(){
           var data=(place.formatted_address);
           var data2=$('input').val();
           alert(data2);
             //$('#table-places > tbody:last').append('<tr><td>'+ place.formatted_address + '</td></tr>');
             $('table').append("<tr><td>"+ data2+ "</td></tr>");
        });
        
        
        
    </script>
   
    </body>
</html>
