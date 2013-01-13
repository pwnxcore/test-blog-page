<section class="content-fullwidth"> <!-- Open content-fullwidth -->

			<div class="container-blog" id="masonry"> <!-- Open container -->
			
					<?php
						global $post;
						$tmp_post = $post;
						$args = array( 'numberposts' => 1);
						$myposts = get_posts( $args );
						foreach( $myposts as $post ) :	setup_postdata($post); 
							$post_thumbnail_id = get_post_thumbnail_id();
							$featured_src = wp_get_attachment_image_src( $post_thumbnail_id, 'blog' );
					?>
					
					<article role="article">
						
						<div class="panel-blog-featured">
							
							<div>
									
								<h2 class="semibold"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
								
								<?php the_excerpt(); ?>
								
								<hr/>
										
								<p class="postmetadata">filed under: <?php the_category(', ') ?> | tagged: <?php the_tags('tagged: ', ', ', '<br />'); ?> <?php edit_post_link('Edit', '', ' | '); ?> </p>
								
							</div>
							
						</div>
						
					</article>
					
					<?php endforeach; ?>
					
			</div> <!-- end container -->
				
			<div class="container-blog" role="main"> <!-- open container -->
			
					<?php
						global $post;
						$tmp_post = $post;
						$args = array( 'numberposts' => 5);
						$myposts = get_posts( $args );
						$count = -1;
						foreach( $myposts as $post ) :	setup_postdata($post); 
							if($count == -1) { $count = 0; continue; }
							$post_thumbnail_id = get_post_thumbnail_id();
							$featured_src = wp_get_attachment_image_src( $post_thumbnail_id, 'blog' );
					?>
					
					<?PHP if($count % 2 == 0) { ?>
					
				<div class="row"> <!-- open row -->	
					<? } ?>
						<div class="six columns"> <!-- open six columns -->
						
							<div class="panel-blog-recent" style="clear:both;"> <!-- open panel -->
							
								<div>
									
									<article role="article">
									
										<h2 class="semibold"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
										<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
										
										<?php the_excerpt(); ?>
										
										<hr/>
										
										<p class="postmetadata">filed under: <?php the_category(', ') ?> | tagged: <?php the_tags('tagged: ', ', ', '<br />'); ?> <?php edit_post_link('Edit', '', ' | '); ?> </p>
										
									</article>
									
								</div>
								
							</div> <!-- end panel -->
							
						</div> <!-- end six columns -->
							
					<?PHP if($count % 2 == 1) { ?>
					
				</div> <!-- end row -->

				<? } ?>
				<?php $count++; endforeach; ?>

			</div> <!-- end container -->
			
			<div class="clearfix"></div>
				
			          <?php get_template_part('inc/pagination'); ?>
		
		</section> <!-- end content-fullwidth -->