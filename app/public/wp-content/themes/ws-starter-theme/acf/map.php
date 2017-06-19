<?php

  if( class_exists( 'acf' ) && $map = get_field( MAP_MAIN_FIELD ) ) :

    $ID           = get_the_id();                                                           // acf_dump('$ID', $ID);
    $addr         = $map['address'];                                                        // acf_dump('$addr', $addr);
    $lat          = $map['lat'];                                                            // acf_dump('$lat', $lat);
    $lng          = $map['lng'];                                                            // acf_dump('$lng', $lng);
    $zoom         = get_acf_option( MAP_OPTIONS_FIELD . '_zoom', 14 );                      // acf_dump( '$zoom', $zoom );
    $ui           = get_acf_option( MAP_OPTIONS_FIELD . '_ui', 'true', 'false' );           // acf_dump( '$ui', $ui );
    $click_zoom   = get_acf_option( MAP_OPTIONS_FIELD . '_click_zoom', 'true', 'false' );   // acf_dump( '$click_zoom', $click_zoom );
    $draggable    = get_acf_option( MAP_OPTIONS_FIELD . '_draggable', 'false', 'true' );    // acf_dump( '$draggable', $draggable );
    $scrollwheel  = get_acf_option( MAP_OPTIONS_FIELD . '_scrollwheel', 'false', 'true' );  // acf_dump( '$scrollwheel', $scrollwheel );

?>

    <div id="map-<?php echo $ID ?>" class="acf-map hidden-xs">
  		<div class="marker" data-lat="<?php echo $lat ?>" data-lng="<?php echo $lng ?>"></div>
  	</div>

  <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo GOOGLE_MAPS_API_KEY ?>"></script>
  <script type="text/javascript">!function(e){function o(o){var t=o.find(".marker"),l={disableDefaultUI:<?php echo $ui ?>,disableDoubleClickZoom:<?php echo $click_zoom ?>,draggable:<?php echo $draggable ?>,scrollwheel:<?php echo $scrollwheel ?>,zoom:<?php echo $zoom ?>,center:new google.maps.LatLng(0,0),mapTypeId:google.maps.MapTypeId.ROADMAP},r=new google.maps.Map(o[0],l);return r.markers=[],t.each(function(){n(e(this),r)}),a(r),r}function n(e,o){var n=new google.maps.LatLng(e.attr("data-lat"),e.attr("data-lng")),a=new google.maps.Marker({position:n,map:o});if(o.markers.push(a),e.html()){var t=new google.maps.InfoWindow({content:e.html()});google.maps.event.addListener(a,"click",function(){t.open(o,a)})}}function a(o){var n=new google.maps.LatLngBounds;e.each(o.markers,function(e,o){var a=new google.maps.LatLng(o.position.lat(),o.position.lng());n.extend(a)}),1==o.markers.length?(o.setCenter(n.getCenter()),o.setZoom(<?php echo $zoom ?>)):o.fitBounds(n)}var t=null;e(document).ready(function(){e(".acf-map").each(function(){t=o(e(this))})})}(jQuery);</script>

<?php
  endif;
?>
