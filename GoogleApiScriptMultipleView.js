var map;

function initMap() {
    // Opprett kartet uten innledende stil angitt.
    // Det har derfor standard styling.
    map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: 59.917,
            lng: 10.759
        },
        zoom: 16,
        mapTypeControl: false
    });

    //
    //Marker start
    //


    //forskjellige marker pins
    var icons = {
        parking: {
            icon: 'https://tek.westerdals.no/~bjojar16/WesterdalsSocial/bilder/MapIcons/Parking.png'
        },
        Wskoler: {
            icon: 'https://tek.westerdals.no/~bjojar16/WesterdalsSocial/bilder/MapIcons/Education.png'
        },
        Lege: {
            icon: 'https://tek.westerdals.no/~bjojar16/WesterdalsSocial/bilder/MapIcons/Health.png'
        },
        Butikker: {
            icon: 'https://tek.westerdals.no/~bjojar16/WesterdalsSocial/bilder/MapIcons/Shopping.png'
        },
        Restauranter: {
            icon: 'https://tek.westerdals.no/~bjojar16/WesterdalsSocial/bilder/MapIcons/Restaurants.png'
        },
        Transport: {
            icon: 'https://tek.westerdals.no/~bjojar16/WesterdalsSocial/bilder/MapIcons/Transport.png'
        },
        Barer: {
            icon: 'https://tek.westerdals.no/~bjojar16/WesterdalsSocial/bilder/MapIcons/Bars.png'
        }

    };


    //Marker Array

    var features = [
        {
            position: new google.maps.LatLng(59.916881, 10.758840),
            type: 'Lege',
            title: 'Legevakten',
            url: 'http://www.osloakutten.no/legevakt/?gclid=CJeMxueh4NMCFRrPsgodgYIOww'
        }, {
            position: new google.maps.LatLng(59.916556, 10.756723),
            type: 'Lege',
            title: 'Sentrum Tannlegevakt',
            url: 'http://www.sentrumtannlegevakt.no/'
        },

        //Parkeringshus
        {
            position: new google.maps.LatLng(59.914105, 10.756900),
            type: 'parking',
            title: 'Q-park Specrtum',
            url: 'http://www.q-park.no'
        }, {
            position: new google.maps.LatLng(59.915040, 10.761727),
            type: 'parking',
            title: 'Q-park Urtehagen',
            url: 'http://www.q-park.no'
        }, {
            position: new google.maps.LatLng(59.915900, 10.759330),
            type: 'parking',
            title: 'Christian Krohgskvartalet P-hus',
            url: 'http://www.q-park.no/no/parker-hos-q-park-/finn-parkering/parkering-per-by-sted/oslo/chr-kroghs-gate-35/37'
        },

        //Parkeringhus slutt
        //Campuser
        {
            //Fjerdingen
            position: new google.maps.LatLng(59.9160764, 10.7597162),
            type: 'Wskoler',
            title: 'Fjerdingen',
            url: 'https://www.westerdals.no/artikkel/campus-fjerdingen/'

        }, {
            //Vulkan
            position: new google.maps.LatLng(59.9232845, 10.752226),
            type: 'Wskoler',
            title: 'Vulkan',
            url: 'https://www.westerdals.no/artikkel/campus-vulkan/'
        }, {
            //Brenneriveien
            position: new google.maps.LatLng(59.920403, 10.752641),
            type: 'Wskoler',
            title: 'Brenneriveien',
            url: 'https://www.westerdals.no/artikkel/campus-brenneriveien/'
        },
        //Campuser slutt
        {
            //Buss og trikke holdeplass
            position: new google.maps.LatLng(59.916319, 10.757229),
            type: 'Transport',
            title: 'Hausmannsgate',
            url: 'https://ruter.no/'
        }, {
            //barer
            position: new google.maps.LatLng(59.916003, 10.760409),
            type: 'Barer',
            title: 'Skjenkestua Studentbar',
            url: 'https://www.facebook.com/SkjenkestuaStudentbar/'
        }, {
            position: new google.maps.LatLng(59.918359, 10.759566),
            type: 'Barer',
            title: 'Bettola',
            url: 'https://m.facebook.com/bettolacocktailbar/'
        }, {
            position: new google.maps.LatLng(59.918362, 10.760306),
            type: 'Barer',
            title: 'Schouskjelleren Mikrobryggeri',
            url: 'http://schouskjelleren.no/'
        }, {
            position: new google.maps.LatLng(59.915700, 10.760154),
            type: 'Restauranter',
            title: 'Rokkekokker',
            url: 'www.rokkekokker.no'
        }, {
            position: new google.maps.LatLng(59.918129, 10.760591),
            type: 'Restauranter',
            title: 'Sudöst',
            url: 'http://sudost.no/no/'
        }, {
            position: new google.maps.LatLng(59.918732, 10.758259),
            type: 'Restauranter',
            title: 'Delicatessen',
            url: 'http://delicatessen.no'
        },






    ];

    // Lage markers.
    features.forEach(function (feature)

        {
            var marker = new google.maps.Marker({
                position: feature.position,
                icon: icons[feature.type].icon,
                title: feature.title,
                url: feature.url,
                map: map

            });
            google.maps.event.addListener(marker, 'click', function () {
                window.open(this.url, '_blank');
            });
        });
    //Marker Array slutt


    //
    //marker Slutt
    //



    //
    //Styles begynner
    //


    // Legg til en stilvelgerkontroll på kartet.
    var styleControl = document.getElementById('style-selector-control');
    map.controls[google.maps.ControlPosition.TOP_RIGHT].push(styleControl);

    // Sett kartets stil til den innledende verdien til velgeren
    var styleSelector = document.getElementById('style-selector');
    map.setOptions({
        styles: styles[styleSelector.value]
    });

    // Bruk ny JSON når brukeren velger en annen stil.
    styleSelector.addEventListener('change', function () {
        map.setOptions({
            styles: styles[styleSelector.value]
        });
    });

} //Funksjon init slutt

var styles = {

    silver: [

        {
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#f5f5f5"
                }
            ]
        },
        {
            "elementType": "labels.icon",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#616161"
                }
            ]
        },
        {
            "elementType": "labels.text.stroke",
            "stylers": [
                {
                    "color": "#f5f5f5"
                }
            ]
        },
        {
            "featureType": "administrative.land_parcel",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#bdbdbd"
                }
            ]
        },
        {
            "featureType": "poi",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#eeeeee"
                }
            ]
        },
        {
            "featureType": "poi",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#757575"
                }
            ]
        },
        {
            "featureType": "poi.park",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#e5e5e5"
                }
            ]
        },
        {
            "featureType": "poi.park",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#9e9e9e"
                }
            ]
        },
        {
            "featureType": "road",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#ffffff"
                }
            ]
        },
        {
            "featureType": "road.arterial",
            "elementType": "labels",
            "stylers": [
                {
                    "visibility": "on"
                }
            ]
        },
        {
            "featureType": "road.arterial",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#757575"
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#dadada"
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "labels",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#616161"
                }
            ]
        },
        {
            "featureType": "road.local",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#9e9e9e"
                }
            ]
        },
        {
            "featureType": "road.local",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#9e9e9e"
                }
            ]
        },
        {
            "featureType": "transit.line",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#e5e5e5"
                }
            ]
        },
        {
            "featureType": "transit.station",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#eeeeee"
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#000080"
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#9e9e9e"
                }
            ]
        }

    ],

    night: [
        {
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#242f3e"
                }
            ]
        },
        {
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#746855"
                }
            ]
        },
        {
            "elementType": "labels.text.stroke",
            "stylers": [
                {
                    "color": "#242f3e"
                }
            ]
        },
        {
            "featureType": "administrative",
            "elementType": "geometry",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "administrative.locality",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#d59563"
                }
            ]
        },
        {
            "featureType": "poi",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "poi",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#d59563"
                }
            ]
        },
        {
            "featureType": "poi.park",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#263c3f"
                }
            ]
        },
        {
            "featureType": "poi.park",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#6b9a76"
                }
            ]
        },
        {
            "featureType": "road",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#38414e"
                }
            ]
        },
        {
            "featureType": "road",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#212a37"
                }
            ]
        },
        {
            "featureType": "road",
            "elementType": "labels.icon",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "road",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#9ca5b3"
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#746855"
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#1f2835"
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#f3d19c"
                }
            ]
        },
        {
            "featureType": "transit",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "transit",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#2f3948"
                }
            ]
        },
        {
            "featureType": "transit.station",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#d59563"
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#17263c"
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#515c6d"
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "labels.text.stroke",
            "stylers": [
                {
                    "color": "#17263c"
                }
            ]
        }
    ],

    retro: [
        {
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#ebe3cd"
                }
            ]
        },
        {
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#523735"
                }
            ]
        },
        {
            "elementType": "labels.text.stroke",
            "stylers": [
                {
                    "color": "#f5f1e6"
                }
            ]
        },
        {
            "featureType": "administrative",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#c9b2a6"
                }
            ]
        },
        {
            "featureType": "administrative.land_parcel",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "administrative.land_parcel",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#dcd2be"
                }
            ]
        },
        {
            "featureType": "administrative.land_parcel",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#ae9e90"
                }
            ]
        },
        {
            "featureType": "administrative.neighborhood",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "landscape.natural",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#dfd2ae"
                }
            ]
        },
        {
            "featureType": "poi",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#dfd2ae"
                }
            ]
        },
        {
            "featureType": "poi",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#93817c"
                }
            ]
        },
        {
            "featureType": "poi.business",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "poi.park",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "#a5b076"
                }
            ]
        },
        {
            "featureType": "poi.park",
            "elementType": "labels.text",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "poi.park",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#447530"
                }
            ]
        },
        {
            "featureType": "road",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#f5f1e6"
                }
            ]
        },
        {
            "featureType": "road",
            "elementType": "labels",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "road.arterial",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#fdfcf8"
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#f8c967"
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#e9bc62"
                }
            ]
        },
        {
            "featureType": "road.highway.controlled_access",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#e98d58"
                }
            ]
        },
        {
            "featureType": "road.highway.controlled_access",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#db8555"
                }
            ]
        },
        {
            "featureType": "road.local",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#806b63"
                }
            ]
        },
        {
            "featureType": "transit.line",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#dfd2ae"
                }
            ]
        },
        {
            "featureType": "transit.line",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#8f7d77"
                }
            ]
        },
        {
            "featureType": "transit.line",
            "elementType": "labels.text.stroke",
            "stylers": [
                {
                    "color": "#ebe3cd"
                }
            ]
        },
        {
            "featureType": "transit.station",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#dfd2ae"
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "#b9d3c2"
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "labels.text",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#92998d"
                }
            ]
        }
    ]
};
