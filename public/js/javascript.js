var map, infoWindow;
var marker, i;


var locations = [
	['Anthony Lakes', 44.9993663,-118.0542452],
	['Bogus Basin', 43.7640563,-116.1026168],
	['Brundage', 45.0054038,-116.1566008],
	['Grand Targhee', 43.7871169,-110.9614847],
	['Jackson Hole', 43.587533,-110.8300428],
	['Kelly Canyon', 43.6445379,-111.6330716],
	['Lookout Pass', 47.4554998,-115.7055781],
	['Pebble Creek', 42.7785623,-112.1614681],
	['Pomerelle', 42.317991,-113.609941],
	['Schweitzer', 48.3669718,-116.6250057],
	['Silver Mountain', 47.5407314,-116.2029851],
	['Snowbird', 40.5819102,-111.6639572],
	['Soldier Mountain', 43.4847347,-114.8379248],
	['Sun Valley', 43.6947547,-114.3565446],
	['Tamarack', 44.6680848,-116.1197586],
];

function initMap(){
	//set default map to Idaho center.
	var uluru = {lat: 45.0909, lng: -113.773};
	map = new google.maps.Map(document.getElementById('map'), {
		center: uluru ,
		zoom: 5
	});
	infoWindow = new google.maps.InfoWindow;

	//plot all coordinates on the map.
	for (i = 0; i < locations.length; i++) {
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(locations[i][1], locations[i][2]),
			map:map
		});
	
	google.maps.event.addListener(marker, 'click', (function(marker, i) {
		return function() {
			infoWindow.setContent(locations[i][0]);
			infoWindow.open(map, marker);
		}
	})(marker, i));
	}
	
  // get location
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };

      infoWindow.setPosition(pos);
      infoWindow.setContent('Location found.');
      infoWindow.open(map);
      map.setCenter(pos);
    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }
}
//handles geolocation errors.
function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
  infoWindow.open(map);
}

function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("resorts");
  switching = true;
  
  dir = "asc"; 
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
   
   
    for (i = 1; i < (rows.length - 1); i++) {

	shouldSwitch = false;

	x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      }
    }
    if (shouldSwitch) {

	rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++; 
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}


