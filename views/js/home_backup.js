$(function() {
  let map;
  let memorial_overlay;
  let markers = [];
  // const NEW_ZEALAND_BOUNDS = {
  //   north: -34.36,
  //   south: -47.35,
  //   west: 166.28,
  //   east: -175.81,
  // };

  const ROSELAWN = { lat: 10.71088406106822, lng: 122.96987966675007 };
  // const ROSELAWN = { lat: 10.709888832993528, lng: 122.97029582991922 };
  const DEFAULT_ZOOM = 20;

  async function initMap() {
    // const { Map } = await google.maps.importLibrary("maps");
    const { Map, InfoWindow } = await google.maps.importLibrary("maps");
    const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
    map = new google.maps.Map(document.getElementById("map"), {
      center: ROSELAWN,
      // restriction: {
      //   latLngBounds: NEW_ZEALAND_BOUNDS,
      //   strictBounds: false,
      // },
      zoom: DEFAULT_ZOOM,
      disableDefaultUI: true,
      heading: 320,
      tilt: 25,
      heading: -40,
      mapId: "90f87356969d889c",
    });

    // ------------------------------- GROUND OVERLAY -------------------------------
    const imageBounds = {
      north: 10.712408011651695,
      south: 10.706009446450304,
      east: 122.97356933277679,
      west: 122.9671846920831,
    };

    memorial_overlay = new google.maps.GroundOverlay(
      // "views/global_assets/images/testimg.png",
      // "views/global_assets/images/roselawnmap_edited.svg",
      // "views/global_assets/images/roselawn_edited_first.svg",
      "views/global_assets/images/roselawnmap_html.svg",
      imageBounds,
      // {opacity:1.0,zIndex:-1}
    );

    // google.maps.event.addDomListener(memorial_overlay, 'click', function() {
    //   alert('wify');
    // });     
  
    memorial_overlay.setMap(map);

    // function handleClick(event) {
    //   alert("Polygon clicked!", event);
    //   // Add your click handling logic here
    // }

    // memorial_overlay.setOpacity(0.2);
    google.maps.event.addListener(memorial_overlay,'click',getCoordinates);

    $("#btn-reset").click(function(){
      map.setCenter(ROSELAWN);
      map.setZoom(DEFAULT_ZOOM);
      map.setTilt(25);
      map.setHeading(-40);
    });
    
    // Rotate and Tilt --------------------
    $("#btn-rotateleft").click(function(){
      map.setHeading(map.getHeading() +20);
    });      

    $("#btn-rotateright").click(function(){
      map.setHeading(map.getHeading() -20);
    });       

    $("#btn-tiltdown").click(function(){
      map.setTilt(map.getTilt() +20);
    });      

    $("#btn-tiltup").click(function(){
      map.setTilt(map.getTilt() -20);
    }); 
    // ------------------------------------          

    $("#btn-restore-overlay").click(function(){
      restoreOverlay();
    });  
    
    $("#btn-remove-overlay").click(function(){
      removeOverlay();
    });  

    // get Latitude and Longitude value
    map.addListener("rightclick", (mapsMouseEvent) => {
      // alert(JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2));
      alert(mapsMouseEvent.latLng);
    });  

    $(".salesTransactionTable tbody").on("click", "button.btnSale", function(){
      $("#modal-search-sales").modal("hide");
      var latitude = Number($(this).attr("latitude"));
      var longitude = Number($(this).attr("longitude"));
      var location = { lat: latitude, lng: longitude };
      map.setCenter(location);
      map.setZoom(22);
      deleteMarkers();
      addMarker(location);

      // var marker = new AdvancedMarkerElement({
      //   map,
      //   position: { lat: latitude, lng: longitude },
      //   title:'L3-001A',
      // });
    });
    
  //   ------------------------------- DRAWING MANAGER -------------------------------
    // const drawingManager = new google.maps.drawing.DrawingManager({
    //   drawingMode: google.maps.drawing.OverlayType.MARKER,
    //   drawingControl: true,
    //   drawingControlOptions: {
    //     position: google.maps.ControlPosition.TOP_CENTER,
    //     drawingModes: [
    //       google.maps.drawing.OverlayType.MARKER,
    //       google.maps.drawing.OverlayType.CIRCLE,
    //       google.maps.drawing.OverlayType.POLYGON,
    //       google.maps.drawing.OverlayType.POLYLINE,
    //       google.maps.drawing.OverlayType.RECTANGLE,
    //     ],
    //   },
    //   markerOptions: {
    //     icon: "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png",
    //   },
    //   circleOptions: {
    //     fillColor: "#ffff00",
    //     fillOpacity: 1,
    //     strokeWeight: 5,
    //     clickable: false,
    //     editable: true,
    //     zIndex: 1,
    //   },
    // });
  
    // drawingManager.setMap(map);   
  }

  function restoreOverlay() {
     memorial_overlay.setMap(map);
  }
    
  function removeOverlay() {
     memorial_overlay.setMap(null);
  }

  function getCoordinates(event){
    alert(event.latLng);
    // alert(memorial_overlay.getBounds());
  }

  // Adds a marker to the map and push to the array.
  function addMarker(position) {
    const marker = new google.maps.Marker({
      position,
      map,
      animation: google.maps.Animation.DROP,
    });
    markers.push(marker);
    // Add a click listener for each marker, and set up the info window.
    marker.addListener("click", ({ domEvent, position }) => {
      const { target } = domEvent;
      alert("Lot info here...");
      // infoWindow.close();
      // infoWindow.setContent(marker.title);
      // infoWindow.open(marker.map, marker);
    });
    // markers.addListener("click", toggleBounce);
  }

  // Sets the map on all markers in the array.
  function setMapOnAll(map) {
    for (let i = 0; i < markers.length; i++) {
      markers[i].setMap(map);
    }
  }

  // Removes the markers from the map, but keeps them in the array.
  function hideMarkers() {
    setMapOnAll(null);
  }

  // Shows any markers currently in the array.
  function showMarkers() {
    setMapOnAll(map);
  }

  // Deletes all markers in the array by removing references to them.
  function deleteMarkers() {
    hideMarkers();
    markers = [];
  }    

  initMap();
});