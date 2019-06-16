<?php
/**
 * @package 	WordPress
 * @subpackage 	Dance Studio
 * @version		1.0.7
 * 
 * Profile Standard Format Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = dance_studio_get_global_options();


$cmsmasters_profile_title = get_post_meta(get_the_ID(), 'cmsmasters_profile_title', true);

$cmsmasters_profile_subtitle = get_post_meta(get_the_ID(), 'cmsmasters_profile_subtitle', true);

$cmsmasters_profile_features = get_post_meta(get_the_ID(), 'cmsmasters_profile_features', true);

$cmsmasters_profile_social = get_post_meta(get_the_ID(), 'cmsmasters_profile_social', true);


$cmsmasters_profile_details_title = get_post_meta(get_the_ID(), 'cmsmasters_profile_details_title', true);


$cmsmasters_profile_features_one_title = get_post_meta(get_the_ID(), 'cmsmasters_profile_features_one_title', true);
$cmsmasters_profile_features_one = get_post_meta(get_the_ID(), 'cmsmasters_profile_features_one', true);

$cmsmasters_profile_features_two_title = get_post_meta(get_the_ID(), 'cmsmasters_profile_features_two_title', true);
$cmsmasters_profile_features_two = get_post_meta(get_the_ID(), 'cmsmasters_profile_features_two', true);

$cmsmasters_profile_features_three_title = get_post_meta(get_the_ID(), 'cmsmasters_profile_features_three_title', true);
$cmsmasters_profile_features_three = get_post_meta(get_the_ID(), 'cmsmasters_profile_features_three', true);


$profile_details = '';

if (
	$cmsmasters_option['dance-studio' . '_profile_post_cat'] || 
	$cmsmasters_option['dance-studio' . '_profile_post_comment'] || 
	(
		!empty($cmsmasters_profile_features[0][0]) && 
		!empty($cmsmasters_profile_features[0][1])
	) || (
		!empty($cmsmasters_profile_features[1][0]) && 
		!empty($cmsmasters_profile_features[1][1])
	)
) {
	$profile_details = 'true';
}


$profile_sidebar = '';

if (
	$profile_details == 'true' || 
	$cmsmasters_profile_social != '' || 
	(
		!empty($cmsmasters_profile_features_one[0][0]) && 
		!empty($cmsmasters_profile_features_one[0][1])
	) || (
		!empty($cmsmasters_profile_features_one[1][0]) && 
		!empty($cmsmasters_profile_features_one[1][1])
	) || (
		!empty($cmsmasters_profile_features_two[0][0]) && 
		!empty($cmsmasters_profile_features_two[0][1])
	) || (
		!empty($cmsmasters_profile_features_two[1][0]) && 
		!empty($cmsmasters_profile_features_two[1][1])
	) || (
		!empty($cmsmasters_profile_features_three[0][0]) && 
		!empty($cmsmasters_profile_features_three[0][1])
	) || (
		!empty($cmsmasters_profile_features_three[1][0]) && 
		!empty($cmsmasters_profile_features_three[1][1])
	)
) {
	$profile_sidebar = 'true';
}

?>

<!--_________________________ Start Standard Profile _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if ($cmsmasters_profile_title == 'true') {
		echo '<header class="cmsmasters_profile_header entry-header">';
			dance_studio_profile_title_nolink(get_the_ID(), 'h2', $cmsmasters_profile_subtitle, 'h5');
		echo '</header>';
	}
	
	
	echo '<div class="profile_content' . (($profile_sidebar == 'true') ? ' with_sidebar' : '') . '">' . 
		'<div class="cmsmasters_profile_content entry-content">' . "\n";
		
			the_content();
			
			wp_link_pages(array( 
				'before' => '<div class="subpage_nav" role="navigation">' . '<strong>' . esc_html__('Pages', 'dance-studio') . ':</strong>', 
				'after' => '</div>', 
				'link_before' => ' <span> ', 
				'link_after' => ' </span> ' 
			));
			
	echo '<div class="cl"></div>' . 
		'</div>' . 
	'</div>';
	
	
	if ($profile_sidebar == 'true') {
		echo '<div class="profile_sidebar">';
		
			if ($profile_details == 'true') {
				echo '<div class="profile_details entry-meta">' . 
				
					'<h4 class="profile_details_title">' . esc_html($cmsmasters_profile_details_title) . '</h4>';
					
					dance_studio_get_profile_features('details', $cmsmasters_profile_features, false, 'h4', true);
					
					dance_studio_get_profile_category(get_the_ID(), 'pl-categs', 'post');
					
					dance_studio_get_profile_comments('post');
					
					cmsmasters_profile_like('post');
					
				echo '</div>';
			}
			
			
			dance_studio_get_profile_features('features', $cmsmasters_profile_features_one, $cmsmasters_profile_features_one_title, 'h4', true);
			
			dance_studio_get_profile_features('features', $cmsmasters_profile_features_two, $cmsmasters_profile_features_two_title, 'h4', true);
			
			dance_studio_get_profile_features('features', $cmsmasters_profile_features_three, $cmsmasters_profile_features_three_title, 'h4', true);
			
			
			dance_studio_profile_social_icons($cmsmasters_profile_social);
		
		echo '</div>';
	}
	?>
	<div class="cl"></div>
</article>
<!--_________________________ Finish Standard Profile _________________________ -->

