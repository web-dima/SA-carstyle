<?php
/* divider */

function shortcode_dividerline( $atts, $content = null ) {
	extract(shortcode_atts(
		array( 'type' => ''), $atts
	));	
	$html = '<div class="'.$type.'"></div>';

	return $html;
}
add_shortcode('dividerline', 'shortcode_dividerline');

/* ---------------------------------------------- */
/** Box **/
function shortcode_box( $atts, $content = null) {
	extract(shortcode_atts(
		array( 'url' => '' ,'button' => '' ,'icon' => '' , 'title' => '' , 'content' => ''), 
		$atts
	));

	$html = '<div class="box"><div class="box-gray aligncenter">
				<h4>'.$title.'</h4>
				<div class="icon"><i class="fa '.$icon.' fa-3x"></i></div>
				<p>'.$content.'</p>
			</div>
			<div class="box-bottom"><a href="'.$url.'">'.$button.'</a></div>
			</div>';
	
	return $html;
}
add_shortcode('box', 'shortcode_box');
/* -----------------------------------------------------------------

/** latest work slider **/
function shortcode_latestworks( $atts ) {
	extract(shortcode_atts(
		array( 'title' => '','count' => ''), 
		$atts
	));
	
		global $post;
			$title = wp_trim_words($title,$num_words =3);
			$title=explode(' ',$title);
			$title[0]='<strong>'.$title[0].'</strong>';
			$title=implode(' ',$title);	
        $type = 'portfolio';
        $args=array(
            'post_type' => $type,
			'showposts' => $count
          );
         query_posts($args);	
		$return_string = '<h4 class="heading">' . $title . '</h4>';		 

	   if (have_posts()) :
	   $return_string .= '<div class="row"><section id="projects"><ul id="thumbs" class="portfolio">';
		
		while (have_posts()) : the_post();
			$project_overview = get_post_meta($post->ID, 'iweb_project_overview', true);
			$permalink=get_permalink();
			$normaltitle=get_the_title();
			$title=get_the_title();
			$title = wp_trim_words($title,$num_words =3);
			$title=explode(' ',$title);
			$title[0]='<span class="bold">'.$title[0].'</span>';
			$title=implode(' ',$title);
			$trimcontent=get_the_content();
			$shortexcerpt = wp_trim_words($trimcontent,$num_words = 6);
			
			if (has_post_thumbnail()) {					
						$thumb = get_post_thumbnail_id();
						$thumb_w = '800';
						$thumb_h = '600';
						$image_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
						$image_url = $image_src [0];
						$attachment_url = wp_get_attachment_url($thumb, 'full');
						$image = aq_resize($attachment_url, $thumb_w, $thumb_h, true);							
			}	
			
			$terms = get_the_terms( $post->ID, 'portfolio_categories' );
				foreach ( $terms as $term ) {
					$cats[0] = $term->name;
					$catname = join($cats);		
					$catname = preg_replace('/\s/', '', $catname);											
				}
		  
			$return_string .= '<li class="col-lg-3 col-md-3 col-sm-3 col-xs-6">';

			$return_string .= '<div class="item-thumbs">';
			$return_string .= '<a class="hover-wrap fancybox" data-fancybox-group="gallery" title="'.$normaltitle.'" href="'.$image_url.'">';
			$return_string .= '<span class="overlay-img"></span>';
			$return_string .= '<span class="overlay-img-thumb font-icon-plus"></span>';
			$return_string .= '</a>';
			$return_string .= '<img src="'.$image.'" alt="'.$project_overview.'" />';
			$return_string .= '</div>';
			$return_string .= '</li>';

		  endwhile;
		  
		$return_string .= '</ul></section></div>';
	   endif;
	   wp_reset_query();
	   return $return_string;
}
add_shortcode('latestworks', 'shortcode_latestworks');
/* -------------------------------------------------------------------------------------------------------

/* pricing table */
function shortcode_pricingtable( $atts, $content = null ) {
	extract(shortcode_atts(
		array( 'type' => '',), $atts
	));

		return '<div class="pricing-box-alt '.$type.'">' . do_shortcode($content) . '</div>';

}
add_shortcode('pricingtable', 'shortcode_pricingtable');


/** pricing body **/
function shortcode_pricing_heading( $atts, $content = null ) {
	extract(shortcode_atts(
		array('title' => '','price' => '','period' => '','curr' => ''), $atts
	));


		$titleWords = explode(' ', $title);
	$wordCount = count($titleWords)-1;
	if ($wordCount > 0)
	{
	$i = 0;
	$title = '';
	// wrap the last word in span (change this to whatever you want it wrapped in)
	foreach ($titleWords as $word):
	if ($i == $wordCount) :
	$title .= '<strong>'.$titleWords[$i].'</strong>';
	else :
	$title .= $titleWords[$i] . ' ';
	endif;
	$i++;
	endforeach;
	}
	else
	{
	$title .= '<strong>'.$titleWords[0].'</strong>';
	}
	
	return '<div class="pricing-heading"><h3>'.$title.'</h3></div>
	<div class="pricing-terms"><h6>'.$curr.''.$price.' / '.$period.'</h6></div>';

}
add_shortcode('pricing-heading', 'shortcode_pricing_heading');


/** pricing title wrapper **/
function shortcode_pricing_features( $atts, $content = null ) {

		return '<div class="pricing-content"><ul>' . do_shortcode($content) . '</ul></div>';	
	
}
add_shortcode('pricing-features', 'shortcode_pricing_features');

/** pricing title **/
function shortcode_pricing_list( $atts, $content = null ) {
	return '<li><i class="fa fa-check"></i> ' . $content . '</li>';		
}
add_shortcode('pricing-list', 'shortcode_pricing_list');

/** pricing button **/
function shortcode_pricing_button( $atts, $content = null ) {
	extract(shortcode_atts(
		array( 'text' => '', 'url' => ''), $atts
	));

		return '<div class="pricing-action"><a href="'.$url.'" class="btn btn-medium btn-theme">'.$text.'</a></div>';

}
add_shortcode('pricing-button', 'shortcode_pricing_button');

/* ---------------------------------------------------------------- */


/* break */
function shortcode_break( $atts, $content = null ) {
	
	$html .= '<br>';	

	return $html;
}
add_shortcode('break', 'shortcode_break');
?>