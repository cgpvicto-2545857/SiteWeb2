<?php
 /**
  * Title: Post Header With Background
  * Slug: gym-enthusiast/post-header-with-background
  */
?>

<!-- wp:group {"metadata":{"patternName":"gym-enthusiast/default-header","name":"Default Header"},"align":"full","className":"banner alignfull","style":{"spacing":{"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}}},"layout":{"inherit":false}} -->
<div class="wp-block-group alignfull banner" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:cover {"url":"<?php echo esc_url(get_parent_theme_file_uri( '/assets/images/banner-img.png' )); ?>","hasParallax":true,"dimRatio":40,"isDark":false,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-cover is-light has-parallax" style="margin-bottom:var(--wp--preset--spacing--60)"><div class="wp-block-cover__image-background has-parallax" style="background-position:50% 50%;background-image:url(<?php echo esc_url(get_parent_theme_file_uri( '/assets/images/banner-img.png' )); ?>)"></div><span aria-hidden="true" class="wp-block-cover__background has-background-dim-40 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:post-title {"textAlign":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontSize":"50px","fontStyle":"Regular","fontWeight":"700"}},"textColor":"background","fontFamily":"epilogue"} /--></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->