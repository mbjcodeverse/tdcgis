document.addEventListener('DOMContentLoaded', function() {
    const svgContainer = document.getElementById('map');
    const button = document.getElementById('btn-changecolor');

    let map;
    let memorial_overlay;
    let markers = [];
    
    const ROSELAWN = { lat: 10.710416713422166, lng: 122.96919103392132 };
    const DEFAULT_ZOOM = 20;

    async function initMap() {
        const { Map, InfoWindow } = await google.maps.importLibrary("maps");
        const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
        map = new google.maps.Map(document.getElementById("map"), {
          center: ROSELAWN,
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
          "views/global_assets/images/roselawnmap_edited_complete.svg",
          imageBounds,
        );   
      
        memorial_overlay.setMap(map);
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
           alert(mapsMouseEvent.latLng);
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
        
        $("#btn-changecolor").click(function(){
            changeFillColor('lightgreen');
        });
    } // end async    

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
       // alert(memorial_overlay.getBounds());
    }
 
    // Adds a marker to the map and push to the array.
    function addMarker(position,info) {
       const marker = new google.maps.Marker({
         position,
         map,
         title: info,
         animation: google.maps.Animation.DROP,
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

    // Function to load the SVG file
    function loadSVG(url) {
        fetch(url)
            .then(response => response.text())
            .then(data => {
                svgContainer.innerHTML = data;
            })
            .catch(error => console.error('Error loading the SVG file:', error));
    }

    // Function to change the fill color of the polygon
    function changePolygonFill() {
        const polygon = document.querySelector('#map #mom');
        if (polygon) {
            polygon.setAttribute('fill', 'yellow');
        } else {
            console.error('Polygon element not found');
        }
    }

    function changeFillColor(newColor) {
        const svgUrl = "views/global_assets/images/roselawnmap_edited_complete.svg"; // Replace with your SVG file URL
      
        fetch(svgUrl)
          .then(response => response.text())
        //   .then(data => {
        //         svgContainer.innerHTML = data;
        //         const polygon = document.querySelector('#map #mom');
        //         if (polygon) {
        //             polygon.setAttribute('fill', newColor);
        //         } else {
        //             console.error('Polygon element not found');
        //         }

                
                // restoreOverlay();

                // const imageBounds = {
                //     north: 10.712408011651695,
                //     south: 10.706009446450304,
                //     east: 122.97356933277679,
                //     west: 122.9671846920831,
                // };

                // memorial_overlay = new google.maps.GroundOverlay(
                //     "views/global_assets/images/roselawnmap_edited_complete.svg",
                //     imageBounds,
                // );   
                
                // memorial_overlay.setMap(map);


          .then(svgText => {
            // Modify the SVG content to change the fill color
            // svgContainer.innerHTML = svgText;
            const parser = new DOMParser();
            const svgDoc = parser.parseFromString(svgText, "image/svg+xml");
            const polygon = svgDoc.getElementById("mom");
            polygon.setAttribute("fill", newColor);
      
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
          });
    } 

    initMap();

    // Load the SVG file and then attach the event listener to the button
    // loadSVG('views/global_assets/images/roselawnmap_edited_complete.svg');

    // $("#btn-changecolor").click(function(){
    //     // changePolygonFill();
    //     changeFillColor('red');
    // });
});




// Without Callback function
// --------------------------------------------------------------
// document.addEventListener('DOMContentLoaded', function() {
//     const svgContainer = document.getElementById('map');
//     const button = document.getElementById('btn-changecolor');

//     let map;
//     let memorial_overlay;
//     let markers = [];
    
//     const ROSELAWN = { lat: 10.710416713422166, lng: 122.96919103392132 };
//     const DEFAULT_ZOOM = 20;

//     async function initMap() {
//         const { Map, InfoWindow } = await google.maps.importLibrary("maps");
//         const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
//         map = new google.maps.Map(document.getElementById("map"), {
//           center: ROSELAWN,
//           zoom: DEFAULT_ZOOM,
//           disableDefaultUI: true,
//           heading: 320,
//           tilt: 25,
//           heading: -40,
//           mapId: "90f87356969d889c",
//         });
  
//         // ------------------------------- GROUND OVERLAY -------------------------------
//         const imageBounds = {
//           north: 10.712408011651695,
//           south: 10.706009446450304,
//           east: 122.97356933277679,
//           west: 122.9671846920831,
//         };
  
//         memorial_overlay = new google.maps.GroundOverlay(
//           "views/global_assets/images/roselawnmap_edited_complete.svg",
//           imageBounds,
//         );   
      
//         memorial_overlay.setMap(map);
//         google.maps.event.addListener(memorial_overlay,'click',getCoordinates);        
  
//         $("#btn-reset").click(function(){
//            map.setCenter(ROSELAWN);
//            map.setZoom(DEFAULT_ZOOM);
//            map.setTilt(25);
//            map.setHeading(-40);
//         });
        
//         // Rotate and Tilt --------------------
//         $("#btn-rotateleft").click(function(){
//            map.setHeading(map.getHeading() +20);
//         });      
  
//         $("#btn-rotateright").click(function(){
//            map.setHeading(map.getHeading() -20);
//         });       
  
//         $("#btn-tiltdown").click(function(){
//            map.setTilt(map.getTilt() +20);
//         });      
  
//         $("#btn-tiltup").click(function(){
//            map.setTilt(map.getTilt() -20);
//         }); 
//         // ------------------------------------          
  
//         $("#btn-restore-overlay").click(function(){
//            restoreOverlay();
//         });  
        
//         $("#btn-remove-overlay").click(function(){
//            removeOverlay();
//         });  
  
//         // get Latitude and Longitude value
//         map.addListener("rightclick", (mapsMouseEvent) => {
//            alert(mapsMouseEvent.latLng);
//         });  
  
//         $(".salesTransactionTable tbody").on("click", "button.btnSale", function(){
//             $("#modal-search-sales").modal("hide");
//             var latitude = Number($(this).attr("latitude"));
//             var longitude = Number($(this).attr("longitude"));
//             var lotid = $(this).attr("lotid");
//             var location = { lat: latitude, lng: longitude };
//             map.setCenter(location);
//             map.setZoom(22);
//             deleteMarkers();
//             addMarker(location,lotid);
//         });    

//         // loadSVG('views/global_assets/images/roselawnmap_edited_complete.svg', function() {
//         // });
//     } // end async    

//     function restoreOverlay() {
//         memorial_overlay.setMap(map);
//     }
       
//     function removeOverlay() {
//         memorial_overlay.setMap(null);
//     }
 
//     // change Overlay image with another SVG
//     function changeOverlay(){
//        if (memorial_overlay) {
//          memorial_overlay.setMap(null); // Remove the old overlay
//        }
 
//        const imageBounds = {
//          north: 10.712408011651695,
//          south: 10.706009446450304,
//          east: 122.97356933277679,
//          west: 122.9671846920831,
//        };
 
//        memorial_overlay = new google.maps.GroundOverlay(
//          "views/global_assets/images/roselawn_edited_first.svg",
//          imageBounds,
//        );  
       
//        memorial_overlay.setMap(map);
//     }
 
//     function getCoordinates(event){
//        alert(event.latLng);
//        // alert(memorial_overlay.getBounds());
//     }
 
//     // Adds a marker to the map and push to the array.
//     function addMarker(position,info) {
//        const marker = new google.maps.Marker({
//          position,
//          map,
//          title: info,
//          animation: google.maps.Animation.DROP,
//        });
//        markers.push(marker);
//        // Add a click listener for each marker, and set up the info window.
//        marker.addListener("click", ({ domEvent, position }) => {
//          const { target } = domEvent;
//          alert("Lot info here...");
//        });
//     }
 
//     // Sets the map on all markers in the array.
//     function setMapOnAll(map) {
//        for (let i = 0; i < markers.length; i++) {
//          markers[i].setMap(map);
//        }
//     }
 
//     // Removes the markers from the map, but keeps them in the array.
//     function hideMarkers() {
//        setMapOnAll(null);
//     }
 
//     // Shows any markers currently in the array.
//     function showMarkers() {
//        setMapOnAll(map);
//     }
 
//     // Deletes all markers in the array by removing references to them.
//     function deleteMarkers() {
//        hideMarkers();
//        markers = [];
//     }    

//     // Function to load the SVG file
//     function loadSVG(url) {
//         fetch(url)
//             .then(response => response.text())
//             .then(data => {
//                 svgContainer.innerHTML = data;
//             })
//             .catch(error => console.error('Error loading the SVG file:', error));
//     }

//     // Function to change the fill color of the polygon
//     function changePolygonFill() {
//         const polygon = document.querySelector('#map #mom');
//         if (polygon) {
//             polygon.setAttribute('fill', 'yellow');
//         } else {
//             console.error('Polygon element not found');
//         }
//     }

//     initMap();

//     // Load the SVG file and then attach the event listener to the button
//     loadSVG('views/global_assets/images/roselawnmap_edited_complete.svg');

//     $("#btn-changecolor").click(function(){
//         changePolygonFill();
//     });
// });




// With Callback function
// --------------------------------------------------------------
// document.addEventListener('DOMContentLoaded', function() {
//     const svgContainer = document.getElementById('map');
//     const button = document.getElementById('btn-changecolor');

//     let map;
//     let memorial_overlay;
//     let markers = [];
    
//     const ROSELAWN = { lat: 10.710416713422166, lng: 122.96919103392132 };
//     const DEFAULT_ZOOM = 20;

//     async function initMap() {
//         const { Map, InfoWindow } = await google.maps.importLibrary("maps");
//         const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
//         map = new google.maps.Map(document.getElementById("map"), {
//           center: ROSELAWN,
//           zoom: DEFAULT_ZOOM,
//           disableDefaultUI: true,
//           heading: 320,
//           tilt: 25,
//           heading: -40,
//           mapId: "90f87356969d889c",
//         });
  
//         // ------------------------------- GROUND OVERLAY -------------------------------
//         const imageBounds = {
//           north: 10.712408011651695,
//           south: 10.706009446450304,
//           east: 122.97356933277679,
//           west: 122.9671846920831,
//         };
  
//         memorial_overlay = new google.maps.GroundOverlay(
//           "views/global_assets/images/roselawnmap_edited_complete.svg",
//           imageBounds,
//         );   
      
//         memorial_overlay.setMap(map);
//         google.maps.event.addListener(memorial_overlay,'click',getCoordinates);        
  
//         $("#btn-reset").click(function(){
//            map.setCenter(ROSELAWN);
//            map.setZoom(DEFAULT_ZOOM);
//            map.setTilt(25);
//            map.setHeading(-40);
//         });
        
//         // Rotate and Tilt --------------------
//         $("#btn-rotateleft").click(function(){
//            map.setHeading(map.getHeading() +20);
//         });      
  
//         $("#btn-rotateright").click(function(){
//            map.setHeading(map.getHeading() -20);
//         });       
  
//         $("#btn-tiltdown").click(function(){
//            map.setTilt(map.getTilt() +20);
//         });      
  
//         $("#btn-tiltup").click(function(){
//            map.setTilt(map.getTilt() -20);
//         }); 
//         // ------------------------------------          
  
//         $("#btn-restore-overlay").click(function(){
//            restoreOverlay();
//         });  
        
//         $("#btn-remove-overlay").click(function(){
//            removeOverlay();
//         });  
  
//         // get Latitude and Longitude value
//         map.addListener("rightclick", (mapsMouseEvent) => {
//            alert(mapsMouseEvent.latLng);
//         });  
  
//         $(".salesTransactionTable tbody").on("click", "button.btnSale", function(){
//             $("#modal-search-sales").modal("hide");
//             var latitude = Number($(this).attr("latitude"));
//             var longitude = Number($(this).attr("longitude"));
//             var lotid = $(this).attr("lotid");
//             var location = { lat: latitude, lng: longitude };
//             map.setCenter(location);
//             map.setZoom(22);
//             deleteMarkers();
//             addMarker(location,lotid);
//         });    

//         // loadSVG('views/global_assets/images/roselawnmap_edited_complete.svg', function() {
//         // });
//     } // end async    

//     function restoreOverlay() {
//         memorial_overlay.setMap(map);
//     }
       
//     function removeOverlay() {
//         memorial_overlay.setMap(null);
//     }
 
//     // change Overlay image with another SVG
//     function changeOverlay(){
//        if (memorial_overlay) {
//          memorial_overlay.setMap(null); // Remove the old overlay
//        }
 
//        const imageBounds = {
//          north: 10.712408011651695,
//          south: 10.706009446450304,
//          east: 122.97356933277679,
//          west: 122.9671846920831,
//        };
 
//        memorial_overlay = new google.maps.GroundOverlay(
//          "views/global_assets/images/roselawn_edited_first.svg",
//          imageBounds,
//        );  
       
//        memorial_overlay.setMap(map);
//     }
 
//     function getCoordinates(event){
//        alert(event.latLng);
//        // alert(memorial_overlay.getBounds());
//     }
 
//     // Adds a marker to the map and push to the array.
//     function addMarker(position,info) {
//        const marker = new google.maps.Marker({
//          position,
//          map,
//          title: info,
//          animation: google.maps.Animation.DROP,
//        });
//        markers.push(marker);
//        // Add a click listener for each marker, and set up the info window.
//        marker.addListener("click", ({ domEvent, position }) => {
//          const { target } = domEvent;
//          alert("Lot info here...");
//        });
//     }
 
//     // Sets the map on all markers in the array.
//     function setMapOnAll(map) {
//        for (let i = 0; i < markers.length; i++) {
//          markers[i].setMap(map);
//        }
//     }
 
//     // Removes the markers from the map, but keeps them in the array.
//     function hideMarkers() {
//        setMapOnAll(null);
//     }
 
//     // Shows any markers currently in the array.
//     function showMarkers() {
//        setMapOnAll(map);
//     }
 
//     // Deletes all markers in the array by removing references to them.
//     function deleteMarkers() {
//        hideMarkers();
//        markers = [];
//     }    

//     // Function to load the SVG file
//     function loadSVG(url, callback) {
//         fetch(url)
//             .then(response => response.text())
//             .then(data => {
//                 svgContainer.innerHTML = data;
//                 callback();
//             })
//             .catch(error => console.error('Error loading the SVG file:', error));
//     }

//     // Function to change the fill color of the polygon
//     function changePolygonFill() {
//         const polygon = document.querySelector('#map #mom');
//         if (polygon) {
//             polygon.setAttribute('fill', 'yellow');
//         } else {
//             console.error('Polygon element not found');
//         }
//     }

//     initMap();

//     // Load the SVG file and then attach the event listener to the button
//     loadSVG('views/global_assets/images/roselawnmap_edited_complete.svg', function() {
//     });

//     $("#btn-changecolor").click(function(){
//         changePolygonFill();
//     });
// });