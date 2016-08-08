<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>
<link href='https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<style type="text/css">
@font-face {
  font-family: 'LeagueGothic';
  src: url('http://liga.parkdrei.de/wp-content/themes/blaskan/fonts/league_gothic-webfont.eot'); /* IE9 Compat Modes */
  src: url('http://liga.parkdrei.de/wp-content/themes/blaskan/fonts/league_gothic-webfont.eot?iefix') format('eot'), /* IE6-IE8 */
       url('http://liga.parkdrei.de/wp-content/themes/blaskan/fonts/league_gothic-webfont.woff') format('woff'), /* Modern Browsers */
       url('http://liga.parkdrei.de/wp-content/themes/blaskan/fonts/league_gothic-webfont.ttf')  format('truetype'), /* Safari, Android, iOS */
       url('http://liga.parkdrei.de/wp-content/themes/blaskan/fonts/league_gothic-webfont.svg#webfont3nLbXkSC') format('svg'); /* Legacy iOS */
}
</style>

<div id="page" role="main">
	<article class="main-content">
	<?php if ( have_posts() ) : ?>
		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
		<?php endwhile; ?>
		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; // End have_posts() check. ?>
		<?php /* Display navigation to next/previous pages when applicable */ ?>
		<?php if ( function_exists( 'foundationpress_pagination' ) ) { foundationpress_pagination(); } else if ( is_paged() ) { ?>
			<nav id="post-nav">
				<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
				<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
			</nav>
		<?php } ?>
	</article>
	<?php get_sidebar(); ?>

</div>

<?php get_footer();
