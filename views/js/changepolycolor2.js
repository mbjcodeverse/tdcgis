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
            "views/global_assets/images/sample.svg",
            imageBounds
        );

        groundOverlay.setMap(map);

        $("#btn-changecolor").click(function(){
            changeFillColor('red');
        });
  }

    // function changeFillColor(newColor) {
    //     alert("change..");
    //     const svgUrl = "views/global_assets/images/sample.svg"; // Replace with your SVG file URL
      
    //     fetch(svgUrl)
    //       .then(response => response.text())
    //       .then(svgText => {
    //         // Modify the SVG content to change the fill color
    //         const parser = new DOMParser();
    //         const svgDoc = parser.parseFromString(svgText, "image/svg+xml");
    //         const polygon = svgDoc.getElementById("myPolygon");
    //         polygon.setAttribute("fill", newColor);
      
    //         // Convert the SVG back to a data URL
    //         const serializer = new XMLSerializer();
    //         const newSvgText = serializer.serializeToString(svgDoc);
    //         const newSvgUrl = "data:image/svg+xml;base64," + btoa(newSvgText);
      
    //         // Update the ground overlay with the new SVG
    //         const imageBounds = {
    //             north: 10.712408011651695,
    //             south: 10.706009446450304,
    //             east: 122.97356933277679,
    //             west: 122.9671846920831,
    //         };
      
    //         const newGroundOverlay = new google.maps.GroundOverlay(
    //           newSvgUrl,
    //           imageBounds
    //         );
      
    //         // Remove the old overlay and set the new one
    //         groundOverlay.setMap(null);
    //         newGroundOverlay.setMap(map);
    //         groundOverlay = newGroundOverlay; // Update the reference
    //       });
    // }

  function changeFillColor(newColor) {
      alert("change..");
      const svgUrl = "views/global_assets/images/sample.svg"; // Replace with your SVG file URL
    
      fetch(svgUrl)
        .then(response => response.text())
        .then(svgText => {
          // Modify the SVG content to change the fill color
          const parser = new DOMParser();
          const svgDoc = parser.parseFromString(svgText, "image/svg+xml");
          const polygon = svgDoc.getElementById("myPolygon");
          polygon.setAttribute("fill", newColor);
    
          // Convert the SVG back to a data URL
          const serializer = new XMLSerializer();
          const newSvgText = serializer.serializeToString(svgDoc);
          const newSvgUrl = "data:image/svg+xml;base64," + btoa(newSvgText);
    
          // Update the ground overlay with the new SVG
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
          groundOverlay.setMap(null);
          newGroundOverlay.setMap(map);
          groundOverlay = newGroundOverlay; // Update the reference
        });
  }  

    initMap();
}); 