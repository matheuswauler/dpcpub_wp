<?php get_header(); ?>

<?php
while ( have_posts() ) : the_post(); ?>

	<header class="gray_header">
		<div class="content">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</div>
	</header>

	<div class="content_medium main_content" id="post-<?php the_ID(); ?>">

		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );
			?>
		</div>

	</div>

<?php
endwhile;
?>

<?php get_footer(); ?>
