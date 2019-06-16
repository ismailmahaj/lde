<?php
/**
 * @package 	WordPress
 * @subpackage 	Dance Studio
 * @version		1.1.3
 * 
 * Blog Post Image Post Format Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = dance_studio_get_global_options();

$cmsmasters_post_post_options = get_post_meta(get_the_ID(), 'cmsmasters_post_post_options', true);



if ($cmsmasters_post_post_options == 'custom') {
	$cmsmasters_post_title = get_post_meta(get_the_ID(), 'cmsmasters_post_title', true);
	
	$cmsmasters_post_sharing_box = get_post_meta(get_the_ID(), 'cmsmasters_post_sharing_box', true);
} else {
	$cmsmasters_post_title = $cmsmasters_option['dance-studio' . '_blog_post_title'] ? 'true' : 'false';
	
	$cmsmasters_post_sharing_box = $cmsmasters_option['dance-studio' . '_blog_post_share_box'] ? 'true' : 'false';
}


$cmsmasters_post_image_link = get_post_meta(get_the_ID(), 'cmsmasters_post_image_link', true);

$cmsmasters_heading = get_post_meta(get_the_ID(), 'cmsmasters_heading', true);

?>

<!--_________________________ Start Image Article _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="cmsmasters_post_cont">
	<?php 
		if (!post_password_required()) {
			if ($cmsmasters_post_image_link != '') {
				dance_studio_thumb(get_the_ID(), 'cmsmasters-full-masonry-thumb', false, 'img_' . get_the_ID(), false, false, false, true, $cmsmasters_post_image_link);
			} elseif (has_post_thumbnail()) {
				dance_studio_thumb(get_the_ID(), 'cmsmasters-full-masonry-thumb', false, 'img_' . get_the_ID(), false, false, false, true, false);
			}
		}
		echo '<div class="cmsmasters_post_cont_inner">';
			if ($cmsmasters_option['dance-studio' . '_blog_post_date']) {
				echo '<div class="cmsmasters_post_cont_date_wrap">';
					echo '<div class="cmsmasters_post_cont_date entry-meta' . ((get_the_content() == '') ? ' no_bdb' : '') . '">';
						
						cmsmasters_post_date_mod('post');
						
					echo '</div>';
				echo '</div>';
			}
			echo '<div class="cmsmasters_post_content_wrap">';
			if ($cmsmasters_post_title == 'true' && $cmsmasters_heading == 'disabled') {
				dance_studio_post_title_nolink(get_the_ID(), 'h2');
			}
		
			if (get_the_content() != '') {
				echo '<div class="cmsmasters_post_content entry-content">';
					
					the_content();
					
					
					wp_link_pages(array( 
						'before' => '<div class="subpage_nav" role="navigation">' . '<strong>' . esc_html__('Pages', 'dance-studio') . ':</strong>', 
						'after' => '</div>', 
						'link_before' => ' <span> ', 
						'link_after' => ' </span> ' 
					));
					
				echo '<div class="cl"></div>' . 
				'</div>';
			}
			
			
		
			if ( 
				$cmsmasters_option['dance-studio' . '_blog_post_author'] || 
				$cmsmasters_option['dance-studio' . '_blog_post_cat'] || 
				$cmsmasters_option['dance-studio' . '_blog_post_tag'] || 
				$cmsmasters_option['dance-studio' . '_blog_post_like'] || 
				$cmsmasters_option['dance-studio' . '_blog_post_comment'] 
			) {
				echo '<div class="cmsmasters_post_cont_info entry-meta' . ((get_the_content() == '') ? ' no_bdb' : '') . '">';
					
					if ( 
						$cmsmasters_option['dance-studio' . '_blog_post_like'] || 
						$cmsmasters_option['dance-studio' . '_blog_post_comment'] 
					) {
						echo '<div class="cmsmasters_post_meta_info">';
							
							dance_studio_get_post_like('post');
							
							dance_studio_get_post_comments('post');
							
						echo '</div>';
					}
					
					
					dance_studio_get_post_author('post');
					
					dance_studio_get_post_category(get_the_ID(), 'category', 'page');
					
					dance_studio_get_post_tags('post');
					
				echo '</div>';
			}
			
			if ($cmsmasters_post_sharing_box == 'true' && CMSMASTERS_CONTENT_COMPOSER) {
				dance_studio_sharing_box(esc_html__('Share this post?', 'dance-studio'), 'h6');
			}
			
		echo '</div>';	
	echo '</div>';
	?>
	</div>
</article>
<!--_________________________ Finish Image Article _________________________ -->

