<?php
 /**
  * Title: Main Header
  * Slug: gym-enthusiast/main-header
  */

?>
<!-- wp:group {"className":"header-section","style":{"dimensions":{"minHeight":"0px"}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group header-section" style="min-height:0px"><!-- wp:columns {"verticalAlignment":"center","align":"full","className":"head-top-box","style":{"spacing":{"blockGap":{"left":"0"},"padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-columns alignfull are-vertically-aligned-center head-top-box" style="margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0"><!-- wp:column {"verticalAlignment":"center","width":"35%","className":"logo-box","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|60"}}},"backgroundColor":"third-color"} -->
<div class="wp-block-column is-vertically-aligned-center logo-box has-third-color-background-color has-background" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--60);flex-basis:35%"><!-- wp:group {"style":{"spacing":{"padding":{"left":"var:preset|spacing|80"}}},"layout":{"type":"constrained","justifyContent":"center"}} -->
<div class="wp-block-group" style="padding-left:var(--wp--preset--spacing--80)"><!-- wp:site-logo {"shouldSyncIcon":true,"align":"center","style":{"layout":{"selfStretch":"fixed","flexSize":"10px"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}}} /-->

<!-- wp:site-title {"textAlign":"center","style":{"typography":{"fontSize":"32px","fontStyle":"normal","fontWeight":"700"},"spacing":{"padding":{"bottom":"var:preset|spacing|50","top":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background","fontFamily":"inter"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"65%","className":"contact-box","style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"backgroundColor":"primary"} -->
<div class="wp-block-column is-vertically-aligned-center contact-box has-primary-background-color has-background" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:65%"><!-- wp:group {"className":"contacts","style":{"spacing":{"padding":{"right":"5em","bottom":"0","left":"0","top":"0"}},"typography":{"fontSize":"15px","fontStyle":"normal","fontWeight":"700"}},"backgroundColor":"tertiary","fontFamily":"inter","layout":{"type":"constrained","contentSize":"90%","wideSize":"100%"}} -->
<div class="wp-block-group contacts has-tertiary-background-color has-background has-inter-font-family" style="padding-top:0;padding-right:5em;padding-bottom:0;padding-left:0;font-size:15px;font-style:normal;font-weight:700"><!-- wp:columns {"verticalAlignment":"center","className":"contact-info","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"0%","left":"0","bottom":"0","top":"20px"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center contact-info" style="margin-top:0;margin-bottom:0;padding-top:20px;padding-right:0%;padding-bottom:0;padding-left:0"><!-- wp:column {"verticalAlignment":"center","width":"35%","className":"topbar-mail"} -->
<div class="wp-block-column is-vertically-aligned-center topbar-mail" style="flex-basis:35%"><!-- wp:group {"className":"mail-box-header","style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group mail-box-header"><!-- wp:html -->
<i class="fas fa-envelope-open-text"></i>
<!-- /wp:html -->

<!-- wp:paragraph {"className":"has-background-color has-text-color has-link-color has-inter-font-family","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"fontStyle":"normal","fontWeight":"700","fontSize":"15px","textAlign":"center"}},"textColor":"secondary"} -->
<p class="has-text-align-center has-background-color has-text-color has-link-color has-inter-font-family has-secondary-color" style="font-size:15px;font-style:normal;font-weight:700"><a href="mailto: disinfestation@example.com"><?php esc_html_e('disinfestation@example.com','gym-enthusiast'); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"40%","className":"top-location"} -->
<div class="wp-block-column is-vertically-aligned-center top-location" style="flex-basis:40%"><!-- wp:group {"className":"location-row","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"blockGap":"8px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group location-row" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:html -->
<i class="fas fa-map-marker-alt"></i>
<!-- /wp:html -->

<!-- wp:paragraph {"className":"top-location","style":{"typography":{"fontSize":"15px","fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"layout":{"selfStretch":"fit","flexSize":null}},"textColor":"secondary","fontFamily":"inter"} -->
<p class="top-location has-secondary-color has-text-color has-link-color has-inter-font-family" style="font-size:15px;font-style:normal;font-weight:700"><?php esc_html_e('88 Broklyn Golden Street. New York','gym-enthusiast'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"25%","className":"topbar-phone"} -->
<div class="wp-block-column is-vertically-aligned-center topbar-phone" style="flex-basis:25%"><!-- wp:group {"className":"phone-box-head","style":{"spacing":{"blockGap":"8px"},"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontFamily":"inter","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group phone-box-head has-inter-font-family" style="font-style:normal;font-weight:300"><!-- wp:html -->
<i class="fas fa-phone-alt"></i>
<!-- /wp:html -->

<!-- wp:paragraph {"className":"has-background-color has-text-color has-link-color has-inter-font-family","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"fontStyle":"normal","fontWeight":"700","fontSize":"15px","textAlign":"center"}},"textColor":"secondary","fontFamily":"inter"} -->
<p class="has-text-align-center has-background-color has-text-color has-link-color has-inter-font-family has-secondary-color" style="font-size:15px;font-style:normal;font-weight:700"><a href="tel: +112233445566"><?php esc_html_e('+112233445566','gym-enthusiast'); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained","contentSize":"80%","wideSize":"100%"}} -->
<div class="wp-block-group"><!-- wp:columns {"className":"menu-box","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"8px","right":"12px"},"blockGap":{"top":"0","left":"0"},"margin":{"top":"0","bottom":"0"}},"border":{"width":"0px","style":"none","radius":"10px"}},"backgroundColor":"background"} -->
<div class="wp-block-columns menu-box has-background-background-color has-background" style="border-style:none;border-width:0px;border-radius:10px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:12px;padding-bottom:0;padding-left:8px"><!-- wp:column {"width":"70%","className":"menu-box-col"} -->
<div class="wp-block-column menu-box-col" style="flex-basis:70%"><!-- wp:navigation {"textColor":"third-color","className":"main-navigation","style":{"typography":{"fontSize":"16px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"700"},"spacing":{"blockGap":"var:preset|spacing|70"}},"fontFamily":"inter","layout":{"type":"flex","justifyContent":"left"}} -->
<!-- wp:navigation-link {"label":"Home","url":"#","kind":"custom","isTopLevelLink":true,"className":"home-page"} /-->

<!-- wp:navigation-link {"label":"About Us","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-submenu {"label":"Page","type":"","url":"#","kind":"custom"} -->
<!-- wp:navigation-link {"label":"Page 1","type":"","url":"#","kind":"custom","className":""} /-->

<!-- wp:navigation-link {"label":"Page 2","type":"","url":"#","kind":"custom","className":""} /-->
<!-- /wp:navigation-submenu -->

<!-- wp:navigation-link {"label":"Blog","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Contact Us","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Buy Now","type":"link","opensInNewTab":true,"url":"https://www.themepixels.net/products/gym-wordpress-theme","kind":"custom","isTopLevelLink":true,"className":"buy-now-btn"} /-->
<!-- /wp:navigation --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"30%","className":"menu-right-btn"} -->
<div class="wp-block-column is-vertically-aligned-center menu-right-btn" style="flex-basis:30%"><!-- wp:group {"className":"search-block","style":{"spacing":{"padding":{"right":"3rem"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group search-block" style="padding-right:3rem"><!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Seach placeholder","width":100,"widthUnit":"%","buttonText":"Search","buttonPosition":"button-only","buttonUseIcon":true,"isSearchFieldHidden":true,"className":"search-btn","style":{"spacing":{"margin":{"top":"0","bottom":"0","left":"1.7rem","right":"0.6em"}},"layout":{"selfStretch":"fixed","flexSize":"100%"},"typography":{"fontSize":"15px","fontStyle":"normal","fontWeight":"400"}},"fontFamily":"inter"} /--></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"header-btn","style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","justifyContent":"right"}} -->
<div class="wp-block-buttons header-btn" style="margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0"><!-- wp:button {"backgroundColor":"third-color","textColor":"background","className":"is-style-outline","style":{"spacing":{"padding":{"left":"25px","right":"25px","top":"7px","bottom":"7px"}},"border":{"radius":"8px"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"500"}},"fontFamily":"inter"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-background-color has-third-color-background-color has-text-color has-background has-link-color has-inter-font-family has-custom-font-size wp-element-button" href="#" style="border-radius:8px;padding-top:7px;padding-right:25px;padding-bottom:7px;padding-left:25px;font-size:16px;font-style:normal;font-weight:500"><?php esc_html_e('Book Now','gym-enthusiast'); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->