var map;
jQuery(document).ready(function(){

    map = new GMaps({
        div: '#map',
        lat: 3.6163847,
        lng: 98.6971577,
    });
    map.addMarker({
        lat: 3.6163847,
        lng: 98.6971577,
        title: 'Address',      
        infoWindow: {
            content: '<h5 class="title">Perguruan Islam Al-Ulum Terpadu</h5><p><span class="region">Jalan Tuasan No. 35</span><br><span class="postal-code">Medan 2022</span><br><span class="country-name">Indonesia</span></p>'
        }
        
    });

});