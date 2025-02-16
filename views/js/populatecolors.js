document.addEventListener('DOMContentLoaded', function() {
    const svgContainer = document.getElementById('map');
    const button = document.getElementById('btn-changecolor');

    let map;
    let memorial_overlay;
    let markers = [];
    let whitePolygon;

    const ROSELAWN = { lat: 10.708723254211796, lng: 122.97120235552195 };
    const DEFAULT_ZOOM = 18;
    const DEFAULT_TILT = 25;
    const DEFAULT_HEADING = -40;

    const NORTH_BOUND = 10.712408011651695;
    const SOUTH_BOUND = 10.706009446450304;
    const EAST_BOUND = 122.97356933277679;
    const WEST_BOUND = 122.9671846920831;

    const svgUrl = "views/global_assets/images/roselawnmap_edited_complete.svg";

    async function initMap() {
        const { Map, InfoWindow } = await google.maps.importLibrary("maps");
        const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
        map = new google.maps.Map(document.getElementById("map"), {
            center: ROSELAWN,
            zoom: DEFAULT_ZOOM,
            disableDefaultUI: true,
            heading: 320,
            tilt: DEFAULT_TILT,
            heading: DEFAULT_HEADING,
            mapId: "90f87356969d889c",
        });

        loadGroundOverlay(svgUrl);
        colorizeLots();

        // Reset functionality
        $("#btn-reset").click(function() {
            map.setCenter(ROSELAWN);
            map.setZoom(DEFAULT_ZOOM);
            map.setTilt(DEFAULT_TILT);
            map.setHeading(DEFAULT_HEADING);
            $("#nav-categorycode").val('< All >').trigger('change');
            deleteMarkers();
        });

        // Category-based map view
        $('#nav-categorycode').on("change", function() {
            let categorycode = $("#nav-categorycode").val();
            switch (categorycode) {
                case '0001': map.setCenter({ lat: 10.710717276739038, lng: 122.97158022186017 }); map.setZoom(20); break;
                case '0002': map.setCenter({ lat: 10.707394852681466, lng: 122.97139213166706 }); map.setZoom(20); break;
                case '0003': map.setCenter({ lat: 10.709046890179243, lng: 122.97058193180274 }); map.setZoom(20); break;
                case '0008': map.setCenter({ lat: 10.709058284134189, lng: 122.97144171181529 }); map.setZoom(20); break;
                default: window.location = 'populatecolors';
            }
            map.setTilt(DEFAULT_TILT);
            map.setHeading(DEFAULT_HEADING);
        });

        $("#btn-changecolor").click(function() { changeFillColor('lightyellow'); });
    }

    function colorizeLots() {
        var percent = 0;
        var notice = new PNotify({
            text: "Codifying map..",
            addclass: 'stack-left-right bg-primary border-primary',
            type: 'info',
            icon: 'icon-spinner4 spinner',
            hide: false,
            buttons: {
                closer: false,
                sticker: false
            },
            opacity: .9,
            width: "190px"
        });

        $.ajax({
            url: "ajax/lot_all_list.ajax.php",
            method: "POST",
            cache: false,
            contentType: false,
            processData: false,
            async: false,
            dataType: "json",
            success: function(answer) {
                fetch(svgUrl)
                    .then(response => response.text())
                    .then(svgText => {
                        let parser = new DOMParser();
                        let svgDoc = parser.parseFromString(svgText, "image/svg+xml");

                        // Iterate over all lots and colorize polygons based on status
                        for (var i = 0; i < answer.length; i++) {
                            percent = Math.round(i / answer.length * 100);
                            var options = {
                                text: percent + "% complete."
                            };

                            let lc = answer[i];
                            let lotid = lc.lotid;
                            let lotstatus = lc.lotstatus;
                            const polygon = svgDoc.getElementById(lotid);

                            if (polygon) {
                                switch (lotstatus) {
                                    case 'Sold':
                                        polygon.setAttribute("fill", 'palegreen');
                                        break;
                                    case 'Cancelled':
                                        polygon.setAttribute("fill", 'deeppink');
                                        break;
                                    default:
                                        polygon.setAttribute("fill", 'azure');
                                }

                                // Add click event listener for each polygon
                                polygon.addEventListener('click', function() {
                                    alert('Lot ID: ' + lotid + '\nStatus: ' + lotstatus);
                                });
                            }
                        }

                        notice.update(options);
                        notice.remove();

                        let serializer = new XMLSerializer();
                        let newSvgText = serializer.serializeToString(svgDoc);
                        let newSvgUrl = "data:image/svg+xml;base64," + btoa(newSvgText);

                        loadGroundOverlay(newSvgUrl);
                    });
            },
            beforeSend: function() {},
            complete: function() {},
        });
    }

    function loadGroundOverlay(url) {
        const imageBounds = {
            north: NORTH_BOUND,
            south: SOUTH_BOUND,
            east: EAST_BOUND,
            west: WEST_BOUND,
        };

        const mapGroundOverlay = new google.maps.GroundOverlay(
            url,
            imageBounds
        );

        if (memorial_overlay != null) {
            memorial_overlay.setMap(null);
        }

        mapGroundOverlay.setMap(map);
        memorial_overlay = mapGroundOverlay;

        // After adding the ground overlay, inject event listeners into the SVG polygons
        google.maps.event.addListenerOnce(map, 'idle', function() {
            injectSvgEventListeners();
        });
    }

    // Inject event listeners into the SVG polygons after the overlay is loaded
    function injectSvgEventListeners() {
        setTimeout(function() {
            const svgElements = document.querySelectorAll('svg path, svg polygon'); // Assuming polygons are path or polygon elements
            svgElements.forEach(function(polygon) {
                const lotid = polygon.id;
                const lotstatus = polygon.getAttribute('data-status'); // Or any other attribute you store

                polygon.addEventListener('click', function() {
                    alert('Lot ID: ' + lotid + '\nStatus: ' + lotstatus);
                });
            });
        }, 100); // Delay for 100ms to ensure the SVG is loaded into the DOM
    }

    function deleteMarkers() {
        setMapOnAll(null);
        markers = [];
    }

    initMap();
});
