var initLat=35.767146; var initLng= 51.476297; var initZoom=16; var initidObjectMap=69205;
        
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