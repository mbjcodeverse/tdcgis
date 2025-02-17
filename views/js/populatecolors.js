document.addEventListener('DOMContentLoaded', function() {
    const svgContainer = document.getElementById('map');
    const button = document.getElementById('btn-changecolor');

    let map;
    let memorial_overlay;
    let markers = [];
    
    const ROSELAWN = { lat: 10.708723254211796, lng: 122.97120235552195 };
   //  const ROSELAWN = { lat: 10.708153991308484, lng: 122.9717372921579 };
    const DEFAULT_ZOOM = 20;
    const DEFAULT_TILT = 25;
    const DEFAULT_HEADING = -40;

    const NORTH_BOUND = 10.709901938631898;
    const SOUTH_BOUND = 10.707156510822154;
    const EAST_BOUND = 122.97331767235437;
    const WEST_BOUND = 122.969285524896;

    const svgUrl = "views/global_assets/images/roselawnmap_edited_complete.svg";
   //  const svgUrl = "views/global_assets/images/roselawnmap_edited_complete_expanded1.svg";

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

      //   var bounds = {
      //       north: 10.709981515934437, // northernmost latitude
      //       south: 10.707837658871524, // southernmost latitude
      //       east: 122.97259548873082, // easternmost longitude
      //       west: 122.9686734703537 // westernmost longitude
      //   };
        
      //   // Restrict panning to the defined bounds
      //   map.setOptions({
      //       restriction: {
      //           latLngBounds: bounds,
      //           strictBounds: false // If true, the user cannot pan outside the bounds
      //       }
      //   });
      
        loadGroundOverlay(svgUrl);
        colorizeLots();
  
        $("#btn-reset").click(function(){
           map.setCenter(ROSELAWN);
           map.setZoom(DEFAULT_ZOOM);
           map.setTilt(DEFAULT_TILT);
           map.setHeading(DEFAULT_HEADING);
           $("#nav-categorycode").val('< All >').trigger('change');
           deleteMarkers();
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
        
        $("#btn-clearmarkers").click(function(){
          deleteMarkers();
        });
        // ------------------------------------          
  
        $("#btn-restore-overlay").click(function(){
           restoreOverlay();
        });  
        
        $("#btn-remove-overlay").click(function(){
           removeOverlay();
        });  
  
        $(".salesTransactionTable tbody").on("click", "button.btnSale", function(){
            $("#modal-search-sales").modal("hide");
            var latitude = Number($(this).attr("latitude"));
            var longitude = Number($(this).attr("longitude"));
            var lotid = $(this).attr("lotid");
            var location = { lat: latitude, lng: longitude };
            map.setCenter(location);
            map.setZoom(22);
            deleteMarkers();
            addMarker(location,lotid);
        }); 
        
        // Select Lot category from navigational bar
        $('#nav-categorycode').on("change", function(){
            let categorycode = $("#nav-categorycode").val();
            switch(categorycode) {
               case '0001':         // Lawn 3
                  map.setCenter({lat:10.708361145214257, lng:122.97178867542586});
                  map.setZoom(25);
                  break;
               case '0002':         // Court
                  map.setCenter({lat:10.708284343693744, lng:122.97087192552905});
                  map.setZoom(21);
                  break;   
               case '0003':         // Garden
                  map.setCenter({lat:10.70910615126373, lng:122.97046759815683});
                  map.setZoom(21);
                  break;   
               case '0008':         // Lawn 2
                  map.setCenter({lat:10.708751443167795, lng:122.97038500633582});
                  map.setZoom(20);
                  break;   
               default:
                  window.location = 'populatecolors';
            }  

            map.setTilt(DEFAULT_TILT);
            map.setHeading(DEFAULT_HEADING);
        });
        
        $("#btn-changecolor").click(function(){
            changeFillColor('lightyellow');
        });
    } // end async  

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
                  // Modify the SVG content to change the fill color
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
                    //  alert(polygon.id);
                     if (polygon) {
                        // Set the fill color based on the lot status
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

                        // Attach the click event handler for the polygon
                        polygon.addEventListener('click', function(event) {
                           const lotId = this.id; // This will get the id of the clicked polygon
                           alert("Polygon clicked with ID: " + lotId); // You can replace this with any function or action
                           
                           // Optionally, center the map on the clicked polygon
                           const bounds = this.getBBox(); // Get the bounding box of the polygon
                           const polygonCenter = {
                              lat: map.getProjection().fromPointToLatLng(new google.maps.Point(bounds.x + bounds.width / 2, bounds.y + bounds.height / 2)).lat(),
                              lng: map.getProjection().fromPointToLatLng(new google.maps.Point(bounds.x + bounds.width / 2, bounds.y + bounds.height / 2)).lng()
                           };
                           map.setCenter(polygonCenter);
                           map.setZoom(22); // Adjust zoom level as needed
                        });
                     }
                  }
   
                  notice.update(options);
                  notice.remove();
   
                  // Convert the SVG back to a data URL
                  let serializer = new XMLSerializer();
                  let newSvgText = serializer.serializeToString(svgDoc);
                  let newSvgUrl = "data:image/svg+xml;base64," + btoa(newSvgText);
   
                  loadGroundOverlay(newSvgUrl);
               });
         },
         beforeSend: function() {
         },
         complete: function() {
         },
      });
   }
    
   function loadGroundOverlay(url){
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

      if (memorial_overlay != null){
         memorial_overlay.setMap(null);
      }
      
      mapGroundOverlay.setMap(map);
      memorial_overlay = mapGroundOverlay;
      
      google.maps.event.addListener(memorial_overlay,'rightclick',getCoordinates);
   }
  
    function restoreOverlay() {
        memorial_overlay.setMap(map);
    }
       
    function removeOverlay() {
        memorial_overlay.setMap(null);
    }
 
    // change Overlay image with another SVG
    function changeOverlay(){
       if (memorial_overlay) {
         memorial_overlay.setMap(null); // Remove the old overlay
       }
 
       const imageBounds = {
         north: 10.712408011651695,
         south: 10.706009446450304,
         east: 122.97356933277679,
         west: 122.9671846920831,
       };
 
       memorial_overlay = new google.maps.GroundOverlay(
         "views/global_assets/images/roselawn_edited_first.svg",
         imageBounds,
       );  
       
       memorial_overlay.setMap(map);
    }
 
    function getCoordinates(event){
       alert(event.latLng);
       alert("north:" + map.getBounds().getNorthEast().lng() + " west:" + map.getBounds().getSouthWest().lng()  + " east:" + map.getBounds().getNorthEast().lng()   + " south:" + map.getBounds().getSouthWest().lng());
    }
 
    // Adds a marker to the map and push to the array.
    function addMarker(position,info) {
       const marker = new google.maps.Marker({
         position,
         map,
         title: info,
         animation: google.maps.Animation.BOUNCE,
         icon: {
            url: 'views/global_assets/images/cemetery_marker4.png', // Replace with your PNG image URL
            scaledSize: new google.maps.Size(90, 90),  // Optional: Adjust size as needed
            origin: new google.maps.Point(0, 0),      // Optional: Use for cropping the image
            anchor: new google.maps.Point(25, 50),     // Optional: Set anchor point for marker positioning
            rotation: 90
          }
       });

       markers.push(marker);
       // Add a click listener for each marker, and set up the info window.
       marker.addListener("click", ({ domEvent, position }) => {
         const { target } = domEvent;
         alert("Lot info here...");
       });

       // Stop bouncing when mouse hovers over the marker
       marker.addListener('mouseover', function() {
         marker.setAnimation(null); // Stop the bounce animation when mouse hovers
       });
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
