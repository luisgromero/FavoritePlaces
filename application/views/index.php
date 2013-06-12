<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>My Favorite Places</title>
       
    </head>
    <body>
        <h1>Favorite Places</h1> 
        <input id="autocomplete" type="text" name="auto">
        <?php
        // put your code here
        ?>
        
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script>
        var geocoder;
        
        function initialize()
        {
            geocoder=new google.maps.Geocoder();
            var input = (document.getElementById('autocomplete'));
            var autocomplete = new google.maps.places.Autocomplete(input);
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
    
    </body>
</html>
