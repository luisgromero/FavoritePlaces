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
        <div id="wrapper" class="container">   
            <div class="row-fluid">
                <div class="span12">
                       <h1>Favorite Places</h1> 
                </div>
            </div>
         
            <div class="row-fluid" style='background: #d3d3d3;'>
                <div class="span4">
                    <input id="autocomplete" type="text" name="auto" size="100">
                    <a id="btn-add" class="btn btn-primary" href="">Add Place</a>
                    <h4 id="selected"></h4>
                </div>
                <div class="span8">
                   
                    <h2>My places</h2>
                    <div id="table-wrapper">
                        <table id="table-places" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name:</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <tr>
                                    <td>information here...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
                // put your code here
                ?>
            </div>
        </div>
    
        
        
        
        
        
        
        
        
        
        
    <!-- Google API and extra Javascript  -->    
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
    <script src="http://code.jquery.com/jquery.js"></script>
    
    <script>
        var geocoder;
        var place;
        
        $('#btn-add').click(function(){
            //alert(place.formatted_address);
             $('#table-places > tbody:last').append('<tr><td>'+ place.formatted_address + '</td></tr>');
             
        });
        
        
        
        
        
        
        function initialize()
        {
            geocoder=new google.maps.Geocoder();
            var input = (document.getElementById('autocomplete'));
            var autocomplete = new google.maps.places.Autocomplete(input);
            
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                place = autocomplete.getPlace();
                $('#selected').text("Place selected: " +place.formatted_address);
            });
        }
        
        $(document).ready(function(){
            initialize();
            /*
            $("#autocomplete").autocomplete({
                source:function(request,response){
                    geocoder.geocode({'address':request.term},function(results){
                       response($.map(results,function(item){
                           return{
                               label:item.formatted_address,
                               value:item.formatted_address,
                               latitude:item.geometry.location.lat(),
                               longitude:item.geometry.location.lng()
                          };
                       }));
             
                    });
                },
                select:function(){}
            });
            */
        });
        
    </script>
     <?php $this->asset->javascript('bootstrap.min') ?>
    </body>
</html>
