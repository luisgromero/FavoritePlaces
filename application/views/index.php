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
                    <h1 id="app-title">Favorite Places</h1> 
                </div>
            </div>
         
            <div class="row-fluid" style="background: #d3d3d3;">
                <div class="span12">
                    <div id="wrapper-search">
                        <input id="autocomplete" class="input-large" type="text" name="auto" size="100">
                        <button id="btn-add" class="btn"><i class='icon-plus-sign icon-white'></i>Add Place</button>

                        <h4 id="selected"></h4>
                    </div>
                </div>
           </div>
                <div class="row-fluid">    
                    <div class="span12">                   
                        <h2>My list</h2>
                            <table id="table-places" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Place address:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach ($placeAddress as $row){
                                            $googleMapsQueryLink="<a class='btn btn-info' href='". $googleMapsQuery.$row->place ."'><i class='icon-map-marker icon-white'></i>Map</a>";
                                            echo ("<tr><td>" . "<span id='address'>" . $row->place . "</span> " . "\t <div id='table-data-options'>". $googleMapsQueryLink . "<button id='btn-delete' class='btn btn-danger'><i class='icon-trash icon-white'></i>Delete</button></div>" ."</td></tr>");
                                        }

                                    ?>
                                </tbody>
                            </table>
                    </div>
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
                //$('#selected').text("Place selected: " +place.formatted_address);
            });    
        }
           
        $('button#btn-add').click(function(){
           var addressInputData=$('input').val();
           var googleMapsQuery="http://maps.google.com/?q="+addressInputData;
           var googleMapsButton="<a class='btn btn-info' href='"+ googleMapsQuery +"'><i class='icon-map-marker icon-white'></i>Map</a>";
           var deleteButton="<button id='btn-delete' class='btn btn-danger'><i class='icon-trash icon-white'></i>Delete</button>";
             $('table').append("<tr><td>"+ "<span id='address'>"+ addressInputData+ "</span> \t <div id='table-data-options'>"+ googleMapsButton + deleteButton + "</div></td></tr>");          
             savePlace(addressInputData);
        });
        
        
                  
        $('button#btn-delete').click(function(){
           var row =$(this).parent().parent().parent();
           var address=$(this).offsetParent().siblings().text();
           row.remove();
           removePlace(address);
           //console.log(test);                      
        });
        
        function savePlace(addressInputData) { 
            var data = $('input').val();
            $.post('http://localhost/FavoritePlaces/index.php/site/addPlace', {'place':data} /*, function(response) { alert(response);} */); 
        }  
        
        function removePlace(address){
            $.post('http://localhost/FavoritePlaces/index.php/site/removePlace', {'place':address} /*, function(response) { alert(response);} */); 
        }             
        
    </script>
   
    </body>
</html>
