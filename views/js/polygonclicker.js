document.addEventListener('DOMContentLoaded', function() {
    const svgContainer = document.getElementById('map');

    let map;
    // let memorial_overlay;
    let markers = [];
    
    const ROSELAWN = { lat: 10.709866448650494, lng: 122.97002282780065 };
    const DEFAULT_ZOOM = 18;
    const DEFAULT_TILT = 25;
    const DEFAULT_HEADING = -40;

    const NORTH_BOUND = 10.712408011651695;
    const SOUTH_BOUND = 10.706009446450304;
    const EAST_BOUND = 122.97356933277679;
    const WEST_BOUND = 122.9671846920831;

    const svgUrl = "views/global_assets/images/roselawnmap_edited_complete.svg";

    function initMap() {
        // const { Map, InfoWindow } = await google.maps.importLibrary("maps");
        // const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
        const map = new google.maps.Map(document.getElementById("map"), {
          center: ROSELAWN,
          zoom: DEFAULT_ZOOM,
          disableDefaultUI: true,
          heading: 320,
          tilt: DEFAULT_TILT,
          heading: DEFAULT_HEADING,
          mapId: "90f87356969d889c",
        });

        const imageBounds = {
            north: NORTH_BOUND,
            south: SOUTH_BOUND,
            east: EAST_BOUND,
            west: WEST_BOUND,
        };

        const overlay = new google.maps.GroundOverlay(svgUrl, imageBounds);
        overlay.setMap(map);

        // Fetch the SVG document
        fetch(svgUrl)
        .then(response => response.text())
        .then(svgText => {
            const parser = new DOMParser();
            const svgDoc = parser.parseFromString(svgText, 'image/svg+xml');
            
            // Get the SVG element by id (assuming the id is known and exists in the SVG)
            const svgElementId = 'L3-001A';
            const svgElement = svgDoc.getElementById(svgElementId);
            
            if (svgElement) {
                // Add an event listener to the SVG element
                svgElement.addEventListener('click', () => {
                    alert('SVG element clicked!');
                });

                alert(svgElement.id);                       // Tag Name: polygon.L3-001A
                alert(svgElement.getAttribute('points'));   // Polygon points
            } else {
                alert(`Element with id ${svgElementId} not found in the SVG.`);
            }
        })
        .catch(error => {
            console.error('Error fetching the SVG document:', error);
        });

        google.maps.event.addListener(svgElement, 'click', function(event) {
            alert('Polygon point clicked at: ' + event.latLng.lat() + ', ' + event.latLng.lng());
        });
    }

    initMap();
    // google.maps.event.addDomListener(window, 'load', initMap);
});
