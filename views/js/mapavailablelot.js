document.addEventListener('DOMContentLoaded', function() {
    const svgContainer = document.getElementById('maplocator');
    const button = document.getElementById('btn-changecolor');
 
    let map;
    let memorial_overlay;
    let markers = [];
    
    const ROSELAWN = { lat: 10.708723254211796, lng: 122.97120235552195 };
    const DEFAULT_ZOOM = 19;
    const DEFAULT_TILT = 25;
    const DEFAULT_HEADING = -40;
 
    const NORTH_BOUND = 10.712408011651695;
    const SOUTH_BOUND = 10.706009446450304;
    const EAST_BOUND = 122.97356933277679;
    const WEST_BOUND = 122.9671846920831;
 
    const svgUrl = "views/global_assets/images/roselawnmap_edited_complete.svg";

    // When google map is displayed inside modal form
    $('#modal-search-lot').on('shown.bs.modal',function(){
        setTimeout(function(){
          initMap();
        },400);  
    });
 
    async function initMap() {
        const { Map, InfoWindow } = await google.maps.importLibrary("maps");
        const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
        map = new google.maps.Map(document.getElementById("maplocator"), {
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
  
        $(".availableLotTable tbody").on("click", "button.btnLocate", function(){
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
      //   $('#nav-categorycode').on("change", function(){
      //       let categorycode = $("#nav-categorycode").val();
      //       switch(categorycode) {
      //          case '0001':         // Lawn 3
      //             map.setCenter({lat:10.710717276739038, lng:122.97158022186017});
      //             map.setZoom(20);
      //             break;
      //          case '0002':         // Court
      //             map.setCenter({lat:10.707394852681466, lng:122.97139213166706});
      //             map.setZoom(20);
      //             break;   
      //          case '0003':         // Garden
      //             map.setCenter({lat:10.709046890179243, lng:122.97058193180274});
      //             map.setZoom(20);
      //             break;   
      //          case '0008':         // Lawn 2
      //             map.setCenter({lat:10.709058284134189, lng:122.97144171181529});
      //             map.setZoom(20);
      //             break;   
      //          default:
      //             window.location = 'populatecolors';
      //       }  
 
      //       map.setTilt(DEFAULT_TILT);
      //       map.setHeading(DEFAULT_HEADING);
      //   });
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
   
                     if (polygon) {
                        // Set the fill color based on the lot status
                        switch (lotstatus) {
                           case 'Sold':
                              polygon.setAttribute("fill", 'palegreen');
                              // polygon.setAttribute("opacity", "0.9");
                              break;
                           case 'Cancelled':
                              polygon.setAttribute("fill", 'deeppink');
                              break;
                           default:
                              polygon.setAttribute("fill", 'azure');
                        }
   
                        // Attach the click event handler for the polygon
                        // attachClickHandler(polygon); // External function
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
         imageBounds,
       );
 
       if (memorial_overlay != null){
         memorial_overlay.setMap(null);
       }
      
       mapGroundOverlay.setMap(map);
       memorial_overlay = mapGroundOverlay;
       
      
      //  google.maps.event.addListener(memorial_overlay,'rightclick',getCoordinates);
 
       // Wait for the overlay to be added to the map
      //  google.maps.event.addListenerOnce(map, 'idle', function() {
      //    addPolygonClickEvent();
      //  });
       // rectangle.setMap(map);
    }
 
   //  let id = 0;
   //  function getCoordinates(event){
   //     // Last id saved = 40;
   //     id++;
   //     // // alert('Right-click count: ' + id);
   //     var latLng = event.latLng;
   //     var latitude = latLng.lat();
   //     var longitude = latLng.lng();
 
   //     var save_location = new FormData();
   //     save_location.append("id", id);
   //     save_location.append("latitude", latitude);
   //     save_location.append("longitude", longitude);
 
   //     $.ajax({
   //        url:"ajax/save_location.ajax.php",
   //        method: "POST",
   //        data: save_location,
   //        cache: false,
   //        contentType: false,
   //        processData: false,
   //        async: false,
   //        dataType:"text",
   //        success:function(answer){
   //           swal.fire({
   //              title: 'Location ' + id + ' successfully saved!',
   //              type: 'success',
   //              allowOutsideClick: false,
   //              showConfirmButton: false,
   //              timer: 1500
   //           })
   //        }
   //     })   
   //  }
 
    // Adds a marker to the map and push to the array.
    function addMarker(position,info) {
       const marker = new google.maps.Marker({
         position,
         map,
         title: info,
         animation: google.maps.Animation.DROP,
       //   animation: google.maps.Animation.BOUNCE,
         icon: {
            url: 'views/global_assets/images/lot_marker.png',   // Replace with your PNG image URL
            scaledSize: new google.maps.Size(40, 54),           // Optional: Adjust size as needed
            origin: new google.maps.Point(0, 0),                // Optional: Use for cropping the image
            anchor: new google.maps.Point(25, 50),              // Optional: Set anchor point for marker positioning
            rotation: 45,          
            //   rotation: 90
          }
       });
 
       const infoWindow = new google.maps.InfoWindow({
          content: "<div><h3 style='color:red;'>Custom Info Window</h3><p style='color:green;'>This is a description.</p></div>",
          disableAutoPan: true,  // Prevents the map from panning when opened
       });
 
       // Remove the close button when the info window is opened
       google.maps.event.addListener(infoWindow, 'domready', function () {
          // Select the close button and remove it
          const closeButton = document.querySelector('.gm-ui-hover-effect');
          if (closeButton) {
             closeButton.style.display = 'none'; // Hide the close button
          }
       });
 
       marker.addListener('mouseover', () => {
          infoWindow.open(map, marker);
          // Apply custom shadow to the info window
          const iwOuter = document.querySelector(".gm-style-iw"); // This targets the info window outer element
          // Apply a shadow to the outer element
          iwOuter.style.boxShadow = "10px 10px 15px rgba(0, 0, 0, 0.5)";
          // Optional: You can adjust the shadow effect by changing the values
          iwOuter.style.borderRadius = "10px"; // Optional: make the info window corners rounded
       });
 
       marker.addListener('mouseout', () => {
          infoWindow.close();
       });
 
       markers.push(marker);
       // Add a click listener for each marker, and set up the info window.
 
       // marker.addListener("click", ({ domEvent, position }) => {
       //   const { target } = domEvent;
       //   alert("Lot info here...");
       // });
 
       google.maps.event.addListener(marker, 'mouseover', () => {
          marker.setAnimation(null); // Stop bouncing on hover
       });
 
       // google.maps.event.addListener(marker, 'mouseout', () => {
       //    marker.setAnimation(google.maps.Animation.BOUNCE); // Resume bouncing when hover ends
       // });
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
 });
 
