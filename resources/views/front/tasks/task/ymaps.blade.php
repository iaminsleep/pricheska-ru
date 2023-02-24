<script type="text/javascript">
    ymaps.ready(init);
    var myMap;
    const latitude = @json($coordinates[0]);
    const longitude = @json($coordinates[1]); // modern way of passing the php variable to javascript

    function init() {

        myMap = new ymaps.Map("map", {
            center: [latitude, longitude], // coordinates of the location (center map)
            zoom: 16 // map scale
        });

        myMap.controls.add(
            new ymaps.control.ZoomControl() // add a zoom control to the map
        );

        myPlacemark = new ymaps.Placemark([latitude, longitude], { // coordinates of the placemark obj
            balloonContent: "<div class='ya_map'>Место встречи</div>" // placemark baloon tip content
        }, {
            preset: "twirl#redDotIcon" // placemark type
        });

        myMap.geoObjects.add(myPlacemark); // add a placemark

    };
</script>
