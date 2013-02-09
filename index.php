<?php get_header(); ?>
	
		<div class="row">
			
			<div class="span8">
				
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
					<?php the_title( '<h1><a href="' . get_permalink() .'">', '</a></h1>' ); ?>
					
					<?php the_content(); ?>
				
				<?php endwhile; ?>
					<?php comments_template(); ?>
				<?php else: ?>
				<!-- no posts found -->
				<?php endif; ?>
				
			</div>
			
			<?php get_sidebar(); ?>
			
		</div>

	</div>
	
	<script>
		jQuery(document).ready(function(){
			jQuery('.topper .nav ul').addClass('nav');
		});
	</script>
	<?php wp_footer(); ?>
  </body>
</html>
