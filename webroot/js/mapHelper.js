/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var watchID;
var geo;    // for the geolocation object
var map;    // for the google map object
var mapMarker;  // the google map marker object

// position options
var MAXIMUM_AGE = 200; // miliseconds
var TIMEOUT = 300000;
var HIGHACCURACY = true;

// Locatons
var locations = [
                  ['2645', 'Kaushal Nihathamana', 7.075375, 79.994975, 4],
                  ['2468', 'Nadeesha Thilakarathne',7.074193, 79.996005, 5],
                  ['2465', 'Kasun Kodagoda',7.074874, 79.996672, 3],
                  ['2481', 'Shifan Mohomad',7.073011, 79.994279, 2],
                  ['2568', 'Oreliya Fernando',7.074917, 79.992681, 1]
                ];

function getGeoLocation() {
    try {
        if( !! navigator.geolocation ) return navigator.geolocation;
        else return undefined;
    } catch(e) {
        return undefined;
    }
}

function show_map(position) {
    //var lat = position.coords.latitude;
    var lat = 7.073874;
    //var lon = position.coords.longitude;
    var lon = 79.994526;
    var latlng = new google.maps.LatLng(lat, lon);

    if(map) {
        map.panTo(latlng);
        mapMarker.setPosition(latlng);
    } else {
        var myOptions = {
            zoom: 16,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
        map.setTilt(0); // turns off the annoying default 45-deg view

        var infowindow = new google.maps.InfoWindow();

        for (var i = 0; i < locations.length; i++) {
            mapMarker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][2], locations[i][3]),
               title: locations[i][0] + " : " + locations[i][1]
            });
            mapMarker.setMap(map);
        };
    }
}

function geo_error(error) {
    stopWatching();
    switch(error.code) {
        case error.TIMEOUT:
            alert('Geolocation Timeout');
            break;
        case error.POSITION_UNAVAILABLE:
            alert('Geolocation Position unavailable');
            break;
        case error.PERMISSION_DENIED:
            alert('Geolocation Permission denied');
            break;
        default:
            alert('Geolocation returned an unknown error code: ' + error.code);
    }
}

function stopWatching() {
    if(watchID) geo.clearWatch(watchID);
    watchID = null;
}

function startWatching() {
    watchID = geo.watchPosition(show_map, geo_error, {
        enableHighAccuracy: HIGHACCURACY,
        maximumAge: MAXIMUM_AGE,
        timeout: TIMEOUT
    });
}

window.onload = function() {
    if((geo = getGeoLocation())) {
        startWatching();
    } else {
        alert('Geolocation not supported.')
    }
}

