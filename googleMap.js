 var map;
 var geocoder;
 function initMap(){
 	var LatLong = {lat: 12.9716, lng: 77.5946};
        map = new google.maps.Map(document.getElementById('map'), {
          center: LatLong,
          zoom: 17
        });
        var marker = new google.maps.Marker({
        position: LatLong,
        map: map,
        
      });
      geocoder = new google.maps.Geocoder();
      coreAddress();
 }
 function coreAddress() {
  
  var address = document.getElementById('addr').innerHTML;
  geocoder.geocode({ 'address': address}, function(results, status) {
    if(status == 'OK') {
      map.setCenter(results[0].geometry.location);
      console.log(results[0].geometry.location);
      console.log(results[0].geometry.location.lat());
      var marker = new google.maps.Marker({
        position: {lat: results[0].geometry.location.lat(), lng: results[0].geometry.location.lng()},
        map: map,
        
      });
    } 
  })
 }