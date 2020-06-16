var setPeta = {
    center:new google.maps.LatLng(-3.319959, 114.594214),
    zoom:13,
    disableDefaultUI: true
    //mapTypeId:google.maps.MapTypeId.ROADMAP
}

var area;

function setArea(map, posisiTitik, luasArea) {
    if ( area ) {
        area.setCenter(posisiTitik)
        area.setRadius((luasArea*100)+235)
    } else {
        area = new google.maps.Circle({
            strokeColor: '#EEEEEE',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#EEEEEE',
            fillOpacity: 0.35,
            map: map,
            center: posisiTitik,
            radius: (luasArea*100)+235
        });
    }
}

function createCircle(map, center, color, radius) {
    return new google.maps.Circle({
        strokeColor: color,
        strokeOpacity: 0.35,
        strokeWeight: 2,
        fillColor: color,
        fillOpacity: 0.35,
        map: map,
        center: center,
        radius: (radius*100)+235
    })
}

function createInfoWindow(map, html, center) {
    let info = new google.maps.InfoWindow({
        content: html,
        position: center,
    })
    info.open(map)
}


