<?php

	// edit: wenn kein featued image und home nimm http://liga.parkdrei.de/wp-content/uploads/2016/08/img_6075.jpg

	$image = '';

	// If a feature image is set, get the id, so it can be injected as a css background property
	if ( has_post_thumbnail( $post->ID ) ) {
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
		$image = $image[0];
	}
	elseif (is_home()) {
		$image = 'http://liga.parkdrei.de/wp-content/uploads/2016/08/img_6075.jpg';
	}

	if ($image){
	?>
	<header id="featured-hero" role="banner" style="background-image: url('<?php echo $image ?>')">
	</header>
	<? } ?>
