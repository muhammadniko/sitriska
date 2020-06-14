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

var area;

function setArea(map, posisiTitik, luasArea) {
    if ( area ) {
        area.setCenter(posisiTitik)
        area.setRadius((luasArea*100)+235)
    } else {
        area = new google.maps.Circle({
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#FF0000',
            fillOpacity: 0.35,
            map: map,
            center: posisiTitik,
            radius: (luasArea*100)+235
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


