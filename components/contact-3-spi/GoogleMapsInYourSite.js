var initLat=36.4649196740962; var initLng=52.3546171188354; var initZoom=11; var initidObjectMap=69205;
        
        function initialize() { 
            var latlng = new google.maps.LatLng(initLat, initLng); 
            var myOptions = { 
              zoom: initZoom, 
              center: latlng, 
              mapTypeId: google.maps.MapTypeId.ROADMAP 
            }; 
            var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions); 
            
             marker = new google.maps.Marker({ 
                            position: latlng,  
                            map: map ,
                            draggable:false
              });
        } 
          
window.onload=function(){ initialize();}