document.addEventListener('DOMContentLoaded', function() {
// $('#plotForm').show();

   const svgContainer = document.getElementById('map');
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
   // const svgUrl = "views/global_assets/images/roselawnmap_edited_complete.svg?v=1.0";

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

       // Hand cursor
       map.setOptions({
         draggableCursor: 'pointer'
       });

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
                    var lotid = lc.lotid;
                    let lotstatus = lc.lotstatus;
                    const polygon = svgDoc.getElementById(lotid);
  
                    if (polygon) {
                       // Set the fill color based on the lot status
                       switch (lotstatus) {
                           case 'Sold':
                              polygon.setAttribute("fill", '#d8ffba');
                              // polygon.setAttribute("opacity", "0.9");
                              break;
                           case 'Cancelled':
                              polygon.setAttribute("fill", '#ffd4e1');
                              break;
                           case 'Used':
                              polygon.setAttribute("fill", 'yellow');
                              break;   
                          default:
                              polygon.setAttribute("fill", 'white');
                              break;
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
      
      // google.maps.event.addListener(memorial_overlay,'rightclick',getCoordinates);
      google.maps.event.addListener(memorial_overlay,'rightclick',plotLotID);
      google.maps.event.addListener(memorial_overlay,'click',highlightGraveArea);
      
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

         // alert(polygon.id);
   
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

   function plotLotID(event){
      alert("mom");
      $('#plotForm').show();
      let latLng = event.latLng;
      let latitude = latLng.lat();
      let longitude = latLng.lng();
      $("#sel-lotid").val("").trigger('change');
      $("#lat_value").val(latitude);
      $("#lng_value").val(longitude);
   }

   $("#saveLotID").click(function (e) {
      let latitude = $("#lat_value").val();
      let longitude = $("#lng_value").val();
      let lotid = $("#sel-lotid").val();

      // alert(latitude + '  ' + longitude + '  ' + lotid);

      var save_lotid = new FormData();
      save_lotid.append("lotid", lotid);
      save_lotid.append("latitude", latitude);
      save_lotid.append("longitude", longitude);

      $.ajax({
         url:"ajax/save_lotid.ajax.php",
         method: "POST",
         data: save_lotid,
         cache: false,
         contentType: false,
         processData: false,
         async: false,
         dataType:"text",
         success:function(answer){
            swal.fire({
               title: 'Location ' + lotid + ' successfully saved!',
               type: 'success',
               allowOutsideClick: false,
               showConfirmButton: false,
               timer: 1500
            });
            $("#sel-lotid").val("").trigger('change');
            $("#lat_value").val("");
            $("#lng_value").val("");
            $('#plotForm').hide();
         }
      }) 
   });

   $("#closeForm").click(function (e) {
      e.stopPropagation();
      $("#plotForm").hide();
   });

   let id = 8095;  // L2-625J [ pp 324 ]
   function getCoordinates(event){
      id++;
      // // alert('Right-click count: ' + id);
      var latLng = event.latLng;
      var latitude = latLng.lat();
      var longitude = latLng.lng();

      var save_location = new FormData();
      save_location.append("id", id);
      save_location.append("latitude", latitude);
      save_location.append("longitude", longitude);

      $.ajax({
         url:"ajax/save_location.ajax.php",
         method: "POST",
         data: save_location,
         cache: false,
         contentType: false,
         processData: false,
         async: false,
         dataType:"text",
         success:function(answer){
            swal.fire({
               title: 'Location ' + id + ' successfully saved!',
               type: 'success',
               allowOutsideClick: false,
               showConfirmButton: false,
               timer: 1500
            })
         }
      })   

      // alert("latitude:" + latitude + " longitude:" + longitude);
      // alert(event.latLng);
      // alert("north:" + map.getBounds().getNorthEast().lng() + " west:" + map.getBounds().getSouthWest().lng()  + " east:" + map.getBounds().getNorthEast().lng()   + " south:" + map.getBounds().getSouthWest().lng());
      // alert(memorial_overlay.getBounds());
   }


   // ====== Lot Grave Square click - displays info ==========================================
   // Global variables to store the previous marker and circle
   let previousMarker = null;
   let previousCircle = null;

   function highlightGraveArea(event) {
      deleteMarkers();                          // remove all markers
  
      var latLng = event.latLng;                // get coordinates
      var latitude = latLng.lat();
      var longitude = latLng.lng();
  
      var nearest_lot = new FormData();
      nearest_lot.append("latitude", latitude);
      nearest_lot.append("longitude", longitude);
  
      $.ajax({
          url: "ajax/get_nearest_lot.ajax.php", // Haversine formula to detect nearest marked location
          method: "POST",
          data: nearest_lot,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function (answer) {          // Sales information retrieved
              let latitude = parseFloat(answer["latitude"]);
              let longitude = parseFloat(answer["longitude"]);
              let lname = answer["lname"].toUpperCase();
              let fname = answer["fname"].toUpperCase();
              let mi = answer["mi"];
              let lotid = answer["lotid"];
              let client_name = (mi != '') ? lname + ', ' + fname + ' ' + mi + '.' : lname + ', ' + fname;
  
              let purdate = answer["purdate"].split("-");
              purdate = purdate[1] + "/" + purdate[2] + "/" + purdate[0];
              if (purdate == '00/00/0000') {      
                  purdate = '';
              }
  
              let salestatus = answer["salestatus"];
              let beneficiary = answer["beneficiary"];
  
              let saleid = answer["saleid"];
              var deceased_list = new FormData();
              deceased_list.append("saleid", saleid);
  
              $.ajax({
                  url: "ajax/get_decedent_list.ajax.php",   // get all decedentlist - interment - json
                  method: "POST",
                  data: deceased_list,
                  cache: false,
                  contentType: false,
                  processData: false,
                  dataType: "json",
                  success: function (deceased) {
                     var allDecedentRows = "";             // Initialize an empty string to hold all the rows
                     var prevInterdate = "";               // Track the previous interdate

                     for (var i = 0; i < deceased.length; i++) { 
                        var dl = deceased[i];
                      
                        let inter_date = dl.interdate;
                        let dateParts = inter_date.split('-');
                        let interdate = dateParts[1] + '/' + dateParts[2] + '/' + dateParts[0];

                        var decedent_list = dl.decedentlist;
                          
                        if (decedent_list != '') {
                           JSON.parse(decedent_list).forEach((item, index) => {
                               let interdateDisplay = (interdate !== prevInterdate) ? interdate : ''; // Only show if different
                               prevInterdate = interdate; // Update previous interdate tracker
                                  
                               allDecedentRows += `<tr>
                                                       <td style="padding: 4px 8px; color: black;">${interdateDisplay}</td>
                                                       <td style="padding: 4px 8px; color: black;">${item.decedent}</td>
                                                       <td style="padding: 4px 8px; color: black;">${item.datedied}</td>
                                                   </tr>`;
                           });
                        }
                     }
  
                     // Wrap the rows in a single table structure after the loop
                     var decedentlist = "";
                     if (allDecedentRows !== ""){
                     decedentlist = `<table style="width: 100%; border: collapse;border: 2px solid rgba(177, 194, 222, 0.7);">
                          <thead style="border: 1px solid rgba(177, 194, 222, 0.7);">
                              <tr>
                                  <th style="background-color: white; color: indigo; padding: 8px; text-align: left;">Interment</th>
                                  <th style="background-color: white; color: indigo; padding: 8px; text-align: left;">Deceased</th>
                                  <th style="background-color: white; color: indigo; padding: 8px; text-align: left;">Date Died</th>
                              </tr>
                          </thead>
                          <tbody>
                              ${allDecedentRows}
                          </tbody>
                      </table>`;
                      }
  
                      // Once we have the decedent list, create the marker and info window
                      if (latitude && longitude) {
                          let nearestLot = { lat: latitude, lng: longitude };
  
                          // Remove previous marker if it exists
                          if (previousMarker) {
                              previousMarker.setMap(null);
                          }
  
                          // Remove previous circle if it exists
                          if (previousCircle) {
                              previousCircle.setMap(null);
                          }
  
                          // Add new marker
                          previousMarker = new google.maps.Marker({
                              position: nearestLot,
                              map: map,
                              title: "",
                              animation: google.maps.Animation.DROP,
                              icon: {
                                  url: 'views/global_assets/images/lot_marker.png',
                                  scaledSize: new google.maps.Size(40, 54),
                                  origin: new google.maps.Point(0, 0),
                                  anchor: new google.maps.Point(25, 50),
                                  rotation: 45,
                              }
                          });
  
                          // Create and open info window
                          const info_Window = new google.maps.InfoWindow({
                              content: generateInfoWindowContent(client_name, lotid, purdate, salestatus, beneficiary, decedentlist),
                              disableAutoPan: true,
                          });
  
                          info_Window.open(map, previousMarker);
  
                          // Apply styling to info window
                          google.maps.event.addListener(info_Window, 'domready', function () {
                              styleInfoWindow();
                          });
  
                          // Keep info window open on mouseover
                          previousMarker.addListener('mouseover', () => {
                              info_Window.open(map, previousMarker);
                          });
  
                          // Close info window on mouseout
                          previousMarker.addListener('dblclick', () => {
                              info_Window.close();
                          });
  
                          markers.push(previousMarker);
                          // map.setCenter(nearestLot);
                      } else {
                          console.error("No lot found:", answer.error);
                      }
                  },
                  error: function (xhr, status, error) {
                      console.error("AJAX Error:", error);
                  }
              });
          },
          error: function (xhr, status, error) {
              console.error("AJAX Error:", error);
          }
      });
   }
  
   function generateInfoWindowContent(client_name, lotid, purdate, salestatus, beneficiary, decedentlist) {
      // Initialize the content with sales information
      let content = `
         <div style="position: relative; padding: 15px; color: white; font-family: Arial, sans-serif;">
            <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-image: url('views/global_assets/images/gravetile1.jpg'); background-size: cover; background-position: center; opacity: 0.5; z-index: -1; box-shadow: inset 0 0 15px rgba(0, 0, 0, 0.6); opacity: 0.4; margin-left: 4px; margin-bottom: 4px; border: 2px solid #000; border-radius: 5px;"></div>
            <div style="position: relative; z-index: 1;">
               <h5 style="margin: 0; font-size: 1.2em; color: #212121; font-weight: bold; padding-bottom: 10px;">LOT OWNER INFORMATION</h5>
               <p style="color: maroon;font-weight: bold;">Lot ID: <span style="color: darkslategray; font-size: 1.4em;">${lotid}</span></p>
               <p style="color: maroon;">Client: <span style="color: darkslategray; font-size: 1.1em;">${client_name}</span></p>
               <p style="color: maroon;">Date: <span style="color: darkslategray; font-size: 1.1em;">${purdate}</span></p>
               <p style="color: maroon;">Status: <span style="color: darkslategray; font-size: 1.1em;">${salestatus}</span></p>
               <p style="color: maroon;">Beneficiary: <span style="color: darkslategray; font-size: 1.1em;">${beneficiary}</span></p>
      `;
      
      // Only include the INTERMENT DETAILS section if decedentlist is not empty
      if (decedentlist !== '') {
         content += `
               <h5 style="color: #212121; font-weight: bold; font-size: 1.2em;">INTERMENT DETAILS</h5>
               <p style="color: maroon;"><span style="color: darkslategray; font-size: 1.1em;">${decedentlist}</span></p>
         `;
      }
      
      // Close the div elements
      content += `
            </div>
         </div>
      `;
   
      return content;
   }
   
   
   // Function to style the info window (prevents repeated shadow)
   function styleInfoWindow() {
      setTimeout(() => {  
         const iw_Outer = document.querySelector(".gm-style-iw");
         if (iw_Outer && !iw_Outer.dataset.styled) {
            iw_Outer.style.boxShadow = "5px 5px 10px rgba(0, 0, 0, 0.3)";
            iw_Outer.style.borderRadius = "10px";
            iw_Outer.style.border = "0.5px solid rgba(0, 0, 0, 0.5)";
            iw_Outer.dataset.styled = "true"; // Mark as styled
         }
      }, 100);

      // Hide the close button
      const close_Button = document.querySelector('.gm-ui-hover-effect');
      if (close_Button) {
         close_Button.style.display = 'none';
      }
   }

   // ========================================================================================

   // Adds a marker to the map and push to the array.
   function addMarker(position, info) {
      var lotid = info;
      var data = new FormData();
      data.append("lotid", lotid);
      $.ajax({
         url: "ajax/sale_get_lot_info.ajax.php",
         method: "POST",
         data: data,
         cache: false,
         contentType: false,
         processData: false,
         dataType: "json",
         success: function (answer) {
            let lname = answer["lname"].toUpperCase();
            let fname = answer["fname"].toUpperCase();
            let mi = answer["mi"];
            let client_name = (mi != '') ? lname + ', ' + fname + ' ' + mi + '.' : lname + ', ' + fname;
            let lotid = answer["lotid"];

            let purdate = answer["purdate"].split("-");
            purdate = purdate[1] + "/" + purdate[2] + "/" + purdate[0];
            if (purdate == '00/00/0000') {
               purdate = '';
            }
   
            let salestatus = answer["salestatus"];
            let beneficiary = answer["beneficiary"];

            let saleid = answer["saleid"];
            var deceased_list = new FormData();
            deceased_list.append("saleid", saleid);
  
            $.ajax({
               url: "ajax/get_decedent_list.ajax.php",   // get all decedentlist - interment - json
               method: "POST",
               data: deceased_list,
               cache: false,
               contentType: false,
               processData: false,
               dataType: "json",
               success: function (deceased) {
                  var allDecedentRows = "";             // Initialize an empty string to hold all the rows
                  var prevInterdate = "";               // Track the previous interdate

                  for (var i = 0; i < deceased.length; i++) { 
                     var dl = deceased[i];

                     let inter_date = dl.interdate;
                     let dateParts = inter_date.split('-');
                     var interdate = dateParts[1] + '/' + dateParts[2] + '/' + dateParts[0];
                      
                     // let inter_date = dl.interdate;
                     // var interdate = inter_date.split('-').reverse().join('/').replace(/(\d{4})\/(\d{2})\/(\d{2})/, '$2/$3/$1');
                      
                     var decedent_list = dl.decedentlist;
                          
                     if (decedent_list != '') {
                        JSON.parse(decedent_list).forEach((item, index) => {
                           let interdateDisplay = (interdate !== prevInterdate) ? interdate : ''; // Only show if different
                           prevInterdate = interdate; // Update previous interdate tracker
                                  
                           allDecedentRows += `<tr>
                                                   <td style="padding: 4px 8px; color: black;">${interdateDisplay}</td>
                                                   <td style="padding: 4px 8px; color: black;">${item.decedent}</td>
                                                   <td style="padding: 4px 8px; color: black;">${item.datedied}</td>
                                                </tr>`;
                        });
                     }
                  }

                  // Wrap the rows in a single table structure after the loop
                  var decedentlist = "";
                  if (allDecedentRows !== ""){
                     decedentlist = `<table style="width: 100%; border-collapse: collapse;border: 2px solid rgba(177, 194, 222, 0.7);">
                                       <thead style="border: 1px solid rgba(177, 194, 222, 0.7);">
                                             <tr>
                                                <th style="background-color: white; color: indigo; padding: 8px; text-align: left;">Interment</th>
                                                <th style="background-color: white; color: indigo; padding: 8px; text-align: left;">Deceased</th>
                                                <th style="background-color: white; color: indigo; padding: 8px; text-align: left;">Date Died</th>
                                             </tr>
                                       </thead>
                                       <tbody>
                                             ${allDecedentRows}
                                       </tbody>
                                    </table>`;
                  }
   
                  const marker = new google.maps.Marker({
                     position,
                     map,
                     animation: google.maps.Animation.DROP,
                     icon: {
                        url: 'views/global_assets/images/lot_marker.png',
                        scaledSize: new google.maps.Size(40, 54),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(25, 50),
                        rotation: 45,
                     }
                  });
   
                  // Use generateInfoWindowContent to create the content for the info window
                  const infoWindowContent = generateInfoWindowContent(client_name, lotid, purdate, salestatus, beneficiary, decedentlist);
         
                  const infoWindow = new google.maps.InfoWindow({
                     content: infoWindowContent,
                     disableAutoPan: true,  // Prevents the map from panning when opened
                  });

                  infoWindow.open(map, marker);
         
                  // Apply custom styling when the info window is opened
                  google.maps.event.addListener(infoWindow, 'domready', function () {
                     styleInfoWindow(); // Apply the custom styling
                  });
         
                  // Add event listeners for marker hover
                  marker.addListener('mouseover', () => {
                     infoWindow.open(map, marker);
                  });
   
                  marker.addListener('dblclick', () => {
                     infoWindow.close();
                  });
         
                  markers.push(marker);
         
                  // Stop bouncing when hovering over the marker
                  google.maps.event.addListener(marker, 'mouseover', () => {
                     marker.setAnimation(null);
                  });
               }
            });      
         }
      });
   }
   
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
