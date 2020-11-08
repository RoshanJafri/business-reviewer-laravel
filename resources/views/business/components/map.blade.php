@section('head')
<script>
    const business = @JSON($business);

</script>
<script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js"></script>
<link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css" />
<script type="text/javascript" defer>
    window.onload = function () {
        L.mapquest.key = 'lYrP4vF3Uk5zgTiGGuEzQGwGIVDGuy24';

        const coordinates = JSON.parse(business.geo_location);
        var map = L.mapquest.map('map', {
            center: coordinates,
            layers: L.mapquest.tileLayer('map'),
            zoom: 15
        });

        marker = L.marker(coordinates, {
            draggable: true
        }).addTo(map);
    }

</script>
@endsection

<div id="map" style="width: 100%; height: 250px;" class="mb-5"></div>
