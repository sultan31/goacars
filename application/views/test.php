<!DOCTYPE html>
<html>
<head>
    <title>Search Nearby Locations</title>
    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script>
    <script>
        let map, service, infowindow;

        function initMap() {
            const location = { lat: -33.867, lng: 151.195 };

            map = new google.maps.Map(document.getElementById('map'), {
                center: location,
                zoom: 15
            });

            infowindow = new google.maps.InfoWindow();
        }

        function performSearch() {
            const keyword = document.getElementById('keyword').value;
            const request = {
                location: map.getCenter(),
                radius: '500',
                query: keyword
            };

            service = new google.maps.places.PlacesService(map);
            service.textSearch(request, (results, status) => {
                if (status === google.maps.places.PlacesServiceStatus.OK) {
                    for (let i = 0; i < results.length; i++) {
                        createMarker(results[i]);
                    }
                }
            });
        }

        function createMarker(place) {
            if (!place.geometry || !place.geometry.location) return;

            const marker = new google.maps.Marker({
                map: map,
                position: place.geometry.location
            });

            google.maps.event.addListener(marker, 'click', () => {
                infowindow.setContent(place.name || '');
                infowindow.open(map, marker);
            });
        }
    </script>
</head>
<body onload="initMap()">
    <input id="keyword" type="text" placeholder="Enter a keyword">
    <button onclick="performSearch()">Search</button>
    <div id="map"></div>
</body>
</html>
