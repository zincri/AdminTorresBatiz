$(document).ready(function(){
function initMap() {
         /* var map = new google.maps.Map(document.getElementById('map'), {
           zoom: 19,
           center: {lat: 16.756454, lng: -93.119989},
           
        });*/

        var latlng = new google.maps.LatLng(16.756454, -93.119989);
        map = new google.maps.Map(document.getElementById('map'), {
        center: latlng,
        zoom: 19
        });
          
          var image = 'images/layout_img/location_icon_map_cont.png';
          var beachMarker = new google.maps.Marker({
           position: {lat: 16.756454, lng: -93.119989},
           map: map,
           icon: image
        });
       }
       initMap();
})
       