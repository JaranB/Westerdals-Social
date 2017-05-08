

function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 14,
        center: {lat: 59.919, lng: 10.758}

    });

    setMarkers(map);
}
//TEST START
    // Add a style-selector control to the map.
    var mapPinsControl = document.getElementById('style-selector-control');
    map.controls[google.maps.ControlPosition.TOP_RIGHT].push(styleControl);

    // Set the map's style to the initial value of the selector.
    var mapPinsSelector = document.getElementById('style-selector');
    map.setOptions({mapPins: mapPins[styleSelector.value]});

    // Apply new JSON when the user selects a different style.
    styleSelector.addEventListener('change', function() {
        map.setOptions({mapPins: mapPins[mapPinsSelector.value]});
    });


//TEST SLUTT

var mapPins = {

    Campuses: [
        ['Fjerdingen', 59.9160764, 10.7597162, 1],
        ['Brenneriveien', 59.920403, 10.752641, 3],
        ['Vulkan', 59.9232845, 10.752426, 2],
    ],

    kongeRiket: [
        ['Slottet', 59.917113, 10.727528],
        ['Stortinget', 59.913079, 10.739931],
        ['Festningen', 59.906501, 10.736224],
    ]
};

function setMarkers(map) {
    // Adds markers to the map.

    var image = {
        url: 'http://gamesync.us/wp-content/uploads/2017/04/google-map-icon.png'
    };

    for (var i = 0; i < mapPins.length; i++) {
        var LocOslo = mapPins[i];
        var marker = new google.maps.Marker({
            position: {lat: LocOslo[1], lng: LocOslo[2]},
            map: map,
            icon: image,
            title: LocOslo[0],
            zIndex: LocOslo[3]
        });
    }
}