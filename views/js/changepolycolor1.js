$(function() {
    function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 17,
            center: { lat: 10.710416713422166, lng: 122.96919103392132 },
        });

        const imageBounds = {
            north: 10.712408011651695,
            south: 10.706009446450304,
            east: 122.97356933277679,
            west: 122.9671846920831,
          };

        const groundOverlay = new google.maps.GroundOverlay(
            'data:image/svg+xml;charset=UTF-8,' + encodeURIComponent(`
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100">
              <polygon points="50,15 10,80 90,80" style="fill:lime;stroke:purple;stroke-width:1" />
            </svg>`),
            imageBounds
        );

        groundOverlay.setMap(map);

        google.maps.event.addListenerOnce(map, 'idle', function () {
            setTimeout(() => {
              changePolygonColor(groundOverlay, 'red');
            }, 2000); // Change color after 2 seconds
        });
    }  

    function changePolygonColor(overlay, color) {
        const svgElement = overlay.getElement();
        if (svgElement) {
          const polygon = svgElement.querySelector('polygon');
          if (polygon) {
            polygon.setAttribute('fill', color);
          }
        }
    }

    initMap();
}); 