<?
/*
* parkdrei specific functions
* loaded in functions.php
*
* V1.0 09.08.16
*/


/* reset of the tagcloud sizes */
add_filter('widget_tag_cloud_args','set_tag_cloud_sizes');
function set_tag_cloud_sizes($args) {
$args['smallest'] = 8;
$args['largest'] = 11;
return $args; }

?>
