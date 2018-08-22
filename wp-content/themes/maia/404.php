<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Maia
 */

get_header();
?>
<div id="primary" class="typography_info">
	<div class="container">	
		<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'maia' ); ?></h1>
		<div class="not-found_404">404</div>
	</div>
</div>	
<?php
get_footer();
