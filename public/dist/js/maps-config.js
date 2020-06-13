var setPeta = {
    center:new google.maps.LatLng(-3.319959, 114.594214),
    zoom:15,
    mapTypeId:google.maps.MapTypeId.ROADMAP
}

function addMarker(map, lat, lang) {
	var xy = new google.maps.LatLng(lat, lang);
	// membuat Marker
	var marker=new google.maps.Marker({
		position: xy,
		map: map
	});

	// event saat marker diklik
	marker.addListener('click', function() {
    	setInfoWindow("Okekekeke", xy, map)
 	});

}

var marker;

function setMarker(map, posisiTitik){
    if ( marker ) {
        marker.setPosition(posisiTitik);
    } else {
        marker = new google.maps.Marker({
        position: posisiTitik,
        map: map
    });
  }
}

function setInfoWindow(content,position,map) {
	var infowindow = new google.maps.InfoWindow({
    	content: content,
    	position: position
	});

	infowindow.open(map);
}


