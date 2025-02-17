document.addEventListener('DOMContentLoaded', function() {
    const svgContainer = document.getElementById('map');
    const button = document.getElementById('btn-changecolor');

    let map;
    let memorial_overlay;
    let markers = [];
    
    const ROSELAWN = { lat: 10.708723254211796, lng: 122.97120235552195 };
    const DEFAULT_ZOOM = 18;
    const DEFAULT_TILT = 25;
    const DEFAULT_HEADING = -40;

    const NORTH_BOUND = 10.712408011651695;
    const SOUTH_BOUND = 10.706009446450304;
    const EAST_BOUND = 122.97356933277679;
    const WEST_BOUND = 122.9671846920831;

    const svgUrl = "views/global_assets/images/roselawnmap_edited_complete.svg";
   //  const svgUrl = "views/global_assets/images/roselawnmap_edited_complete_modified.svg";

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
         //  styles: [
         //    {
         //      "elementType": "geometry",
         //      "stylers": [
         //        {
         //          "color": "#f0f0f0"  // Background color (light grey for the map)
         //        }
         //      ]
         //    },
         //    {
         //      "elementType": "labels.icon",
         //      "stylers": [
         //        {
         //          "visibility": "off"
         //        }
         //      ]
         //    },
         //    {
         //      "elementType": "labels.text.fill",
         //      "stylers": [
         //        {
         //          "color": "#000000"
         //        }
         //      ]
         //    },
         //    {
         //      "elementType": "labels.text.stroke",
         //      "stylers": [
         //        {
         //          "color": "#ffffff"
         //        }
         //      ]
         //    }
         //  ]
        });
      //   loadWhiteOverlay();
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
                  map.setCenter({lat:10.710717276739038, lng:122.97158022186017});
                  map.setZoom(20);
                  break;
               case '0002':         // Court
                  map.setCenter({lat:10.707394852681466, lng:122.97139213166706});
                  map.setZoom(20);
                  break;   
               case '0003':         // Garden
                  map.setCenter({lat:10.709046890179243, lng:122.97058193180274});
                  map.setZoom(20);
                  break;   
               case '0008':         // Lawn 2
                  map.setCenter({lat:10.709058284134189, lng:122.97144171181529});
                  map.setZoom(20);
                  break;   
               default:
                  window.location = 'populatecolors';
                  // $("#btn-reset").click();
                  // map.setCenter(ROSELAWN);
                  // map.setZoom(DEFAULT_ZOOM);  
                  // deleteMarkers(); 
            }  

            map.setTilt(DEFAULT_TILT);
            map.setHeading(DEFAULT_HEADING);

            // var data = new FormData();
            // data.append("categorycode", categorycode);
      
            // $.ajax({
            //       url:"ajax/lot_category_list.ajax.php",   
            //       method: "POST",                
            //       data: data,                    
            //       cache: false,                  
            //       contentType: false,            
            //       processData: false,   
            //       async: false,         
            //       dataType:"json",               
            //       success:function(answer){
            //          fetch(svgUrl)
            //            .then(response => response.text())
            //            .then(svgText => {
            //                // Modify the SVG content to change the fill color
            //                let parser = new DOMParser();
            //                let svgDoc = parser.parseFromString(svgText, "image/svg+xml");

            //                for(var i = 0; i < answer.length; i++) {  
            //                   percent = Math.round(i/answer.length*100);
            //                   var options = {
            //                       text: percent + "% complete."
            //                   };   

            //                   let lc = answer[i];
            //                   let lotid = lc.lotid;
            //                   let lotstatus = lc.lotstatus;
            //                   const polygon = svgDoc.getElementById(lotid);
            //                   if (polygon){
            //                      switch(lotstatus){
            //                         case lotstatus = 'Sold':
            //                            polygon.setAttribute("fill", 'palegreen');
            //                            break;
            //                         case lotstatus = 'Cancelled':
            //                            polygon.setAttribute("fill", 'deeppink');
            //                            break;        
            //                         default:     
            //                            polygon.setAttribute("fill", 'azure');                             
            //                      }
            //                      // polygon.setAttribute("fill", 'lemonchiffon');
            //                      // polygon.addEventListener('click', function() {
            //                      //        alert('polygon');
            //                      //    });
            //                   }
            //                }

            //                notice.update(options);
            //                notice.remove();

            //                // Convert the SVG back to a data URL
            //                let serializer = new XMLSerializer();
            //                let newSvgText = serializer.serializeToString(svgDoc);
            //                let newSvgUrl = "data:image/svg+xml;base64," + btoa(newSvgText);

            //                loadGroundOverlay(newSvgUrl);
            //             });
            //       },
            //       beforeSend: function() {
            //       },  
            //       complete: function() {
            //       }, 
            // }) 
        });
        
        $("#btn-changecolor").click(function(){
            changeFillColor('lightyellow');
        });
    } // end async  

   function loadWhiteOverlay() {
      const imageBounds = {
          north: NORTH_BOUND,
          south: SOUTH_BOUND,
          east: EAST_BOUND,
          west: WEST_BOUND,
      };

      // Create a white image to overlay on the map
      const whiteOverlayUrl = "data:image/svg+xml;base64," + btoa(`
          <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
              <rect x="0" y="0" width="100%" height="100%" fill="red" opacity="0.8"/>
          </svg>
      `);

      const white_overlay = new google.maps.GroundOverlay(
          whiteOverlayUrl,
          imageBounds
      );

      white_overlay.setMap(map);
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
   
   // Function to handle click event for polygons
   function attachClickHandler(polygon) {
      polygon.addEventListener('click', function(event) {
         alert('mom');
         alert("Clicked on polygon with ID: " + event.target.id);
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

      // Wait for the overlay to be added to the map
      google.maps.event.addListenerOnce(map, 'idle', function() {
         addPolygonClickEvent();
      });
   }
  
    function addPolygonClickEvent() {
      fetch(svgUrl)
      .then(response => response.text())
      .then(svgText => {
        let parser = new DOMParser();
        let svgDoc = parser.parseFromString(svgText, "image/svg+xml");
    
        // Find all polygons and ensure pointer-events is enabled
        const polygons = svgDoc.querySelectorAll('polygon');
        polygons.forEach(polygon => {
          // Enable pointer events for interactivity
          polygon.setAttribute("style", "pointer-events: auto;");
          
          // Ensure each polygon has a unique ID (if not already present)
          if (!polygon.id) {
            polygon.id = 'polygon-' + Math.random().toString(36).substr(2, 9);  // Generate random ID if not present
          }
    
          // Add click event listener
          polygon.addEventListener('click', function() {
            // Print the polygon ID to the console
            console.log("Clicked on polygon with ID: " + polygon.id);
            
            // Optional: Alert the user with the polygon ID
            alert("Clicked on polygon with ID: " + polygon.id);
          });
          
          // Example of colorizing the polygons (you can change the color logic as per your need)
          polygon.setAttribute('fill', '#ff0000');  // Red fill color for all polygons
        });
    
        // You can insert the updated SVG back into the DOM
        document.getElementById('svgContainer').appendChild(svgDoc.documentElement);
      });    
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
       // alert(memorial_overlay.getBounds());
    }
 
    // Adds a marker to the map and push to the array.
    function addMarker(position,info) {
       const marker = new google.maps.Marker({
         position,
         map,
         title: info,
         animation: google.maps.Animation.DROP,
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

    function changeFillColor(newColor) {
        const svgUrl = "views/global_assets/images/roselawnmap_edited_complete.svg"; // Replace with your SVG file URL
        fetch(svgUrl)
          .then(response => response.text())
          .then(svgText => {
            // Modify the SVG content to change the fill color
            const parser = new DOMParser();
            const svgDoc = parser.parseFromString(svgText, "image/svg+xml");

            const polygon = svgDoc.getElementById("L3-010A");
            polygon.setAttribute("fill", newColor);

            const svg_Element = svgDoc.querySelectorAll('polygon');

            // svg_Element.addEventListener('click', () => {
            //     alert('Polygon clicked!');
            // });

            // svg_Element.forEach(polygons => {
            //    polygons.setAttribute("fill", "gold");
            //    //  alert(polygon.outerHTML);
            // });

            // display ID name of the polygon
            // alert(polygon.id);
      
            // Convert the SVG back to a data URL
            const serializer = new XMLSerializer();
            const newSvgText = serializer.serializeToString(svgDoc);
            const newSvgUrl = "data:image/svg+xml;base64," + btoa(newSvgText);
      
            // // Update the ground overlay with the new SVG
            const imageBounds = {
                north: 10.712408011651695,
                south: 10.706009446450304,
                east: 122.97356933277679,
                west: 122.9671846920831,
            };
      
            const newGroundOverlay = new google.maps.GroundOverlay(
              newSvgUrl,
              imageBounds
            );
      
            // Remove the old overlay and set the new one
            memorial_overlay.setMap(null);
            newGroundOverlay.setMap(map);
            memorial_overlay = newGroundOverlay; // Update the reference

            google.maps.event.addListener(memorial_overlay,'rightclick',getCoordinates); 
          });
    } 

    initMap();
});
