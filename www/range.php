
</html>
<!doctype html>
<html lang = "en">
   <head>
      <meta charset = "utf-8">
      <title>jQuery UI Slider functionality</title>
      <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      
      <!-- Javascript -->
      <script>
         $(function() {
            $( "#slider-range" ).slider({
               range:true,
               min: 1,
               max: 6000,
               values: [ 250, 2000 ],
               start: function( event, ui ) {
                  $( "#minv" ) .val( ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
               },
              /* stop: function( event, ui ) {
                  $( "#minv" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
               }*/
           });
		   
         });
		 
      </script>
   </head>
   
   <body>
      <!-- HTML --> 
      <div id = "slider-range"></div>
      <p>
         <label for = "startvalue">min:</label>
         <input type = "text" id = "minv" >
      </p>
      <p>
         <label for = "stopvalue">max:</label>
         <input type = "text" id = "maxv" >
      </p>
     <p id="area"></p>
   </body>
</html>