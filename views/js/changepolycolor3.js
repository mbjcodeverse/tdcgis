document.addEventListener('DOMContentLoaded', function() {
    const svgContainer = document.getElementById('svgContainer');
    const button = document.getElementById('changeColorButton');

    // Function to load the SVG file
    function loadSVG(url, callback) {
        fetch(url)
            .then(response => response.text())
            .then(data => {
                svgContainer.innerHTML = data;
                callback();
            })
            .catch(error => console.error('Error loading the SVG file:', error));
    }

    // Function to change the fill color of the polygon
    function changePolygonFill() {
        const polygon = document.querySelector('#svgContainer #mom');
        if (polygon) {
            polygon.setAttribute('fill', 'yellow');
        } else {
            console.error('Polygon element not found');
        }
    }

    // Load the SVG file and then attach the event listener to the button
    loadSVG('views/global_assets/images/roselawnmap_edited_complete.svg', function() {
        button.addEventListener('click', changePolygonFill);
    });
});