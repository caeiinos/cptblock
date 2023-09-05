<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

$context = Timber::context();
$context['posts'] = new Timber\PostQuery();

$args = array(
	'post_type'              => array( 'page' ),
);
$context['pages'] = new Timber\PostQuery($args);

$blockArgs = array(
// Get post type project
'post_type' => 'block',
// Get all posts
'posts_per_page' => -1,

// Order by post date
'orderby' => array(
	'date' => 'DESC'
));

$context['blocks'] = new Timber\PostQuery($blockArgs);

$templates = array( 'index.twig' );
if ( is_home() ) {
	array_unshift( $templates, 'front-page.twig', 'home.twig' );
}
Timber::render( $templates, $context );
