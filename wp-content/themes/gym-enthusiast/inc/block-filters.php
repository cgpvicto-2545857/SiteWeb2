<?php
/**
 * Block Filters
 *
 * @package gym_enthusiast
 * @since 1.0
 */

function gym_enthusiast_block_wrapper( $gym_enthusiast_block_content, $gym_enthusiast_block ) {

	if ( 'core/button' === $gym_enthusiast_block['blockName'] ) {
		
		if( isset( $gym_enthusiast_block['attrs']['className'] ) && strpos( $gym_enthusiast_block['attrs']['className'], 'has-arrow' ) ) {
			$gym_enthusiast_block_content = str_replace( '</a>', gym_enthusiast_get_svg( array( 'icon' => esc_attr( 'caret-circle-right' ) ) ) . '</a>', $gym_enthusiast_block_content );
			return $gym_enthusiast_block_content;
		}
	}

	if( ! is_single() ) {
	
		if ( 'core/post-terms'  === $gym_enthusiast_block['blockName'] ) {
			if( 'post_tag' === $gym_enthusiast_block['attrs']['term'] ) {
				$gym_enthusiast_block_content = str_replace( '<div class="taxonomy-post_tag wp-block-post-terms">', '<div class="taxonomy-post_tag wp-block-post-terms flex">' . gym_enthusiast_get_svg( array( 'icon' => esc_attr( 'tags' ) ) ), $gym_enthusiast_block_content );
			}

			if( 'category' ===  $gym_enthusiast_block['attrs']['term'] ) {
				$gym_enthusiast_block_content = str_replace( '<div class="taxonomy-category wp-block-post-terms">', '<div class="taxonomy-category wp-block-post-terms flex">' . gym_enthusiast_get_svg( array( 'icon' => esc_attr( 'category' ) ) ), $gym_enthusiast_block_content );
			}
			return $gym_enthusiast_block_content;
		}
		if ( 'core/post-date' === $gym_enthusiast_block['blockName'] ) {
			$gym_enthusiast_block_content = str_replace( '<div class="wp-block-post-date">', '<div class="wp-block-post-date flex">' . gym_enthusiast_get_svg( array( 'icon' => esc_attr( 'calendar' ) ) ), $gym_enthusiast_block_content );
			return $gym_enthusiast_block_content;
		}
		if ( 'core/post-author' === $gym_enthusiast_block['blockName'] ) {
			$gym_enthusiast_block_content = str_replace( '<div class="wp-block-post-author">', '<div class="wp-block-post-author flex">' . gym_enthusiast_get_svg( array( 'icon' => esc_attr( 'user' ) ) ), $gym_enthusiast_block_content );
			return $gym_enthusiast_block_content;
		}
	}
	if( is_single() ){

		// Add chevron icon to the navigations
		if ( 'core/post-navigation-link' === $gym_enthusiast_block['blockName'] ) {
			if( isset( $gym_enthusiast_block['attrs']['type'] ) && 'previous' === $gym_enthusiast_block['attrs']['type'] ) {
				$gym_enthusiast_block_content = str_replace( '<span class="post-navigation-link__label">', '<span class="post-navigation-link__label">' . gym_enthusiast_get_svg( array( 'icon' => esc_attr( 'prev' ) ) ), $gym_enthusiast_block_content );
			}
			else {
				$gym_enthusiast_block_content = str_replace( '<span class="post-navigation-link__label">Next Post', '<span class="post-navigation-link__label">Next Post' . gym_enthusiast_get_svg( array( 'icon' => esc_attr( 'next' ) ) ), $gym_enthusiast_block_content );
			}
			return $gym_enthusiast_block_content;
		}
		if ( 'core/post-date' === $gym_enthusiast_block['blockName'] ) {
            $gym_enthusiast_block_content = str_replace( '<div class="wp-block-post-date">', '<div class="wp-block-post-date flex">' . gym_enthusiast_get_svg( array( 'icon' => 'calendar' ) ), $gym_enthusiast_block_content );
            return $gym_enthusiast_block_content;
        }
		if ( 'core/post-author' === $gym_enthusiast_block['blockName'] ) {
            $gym_enthusiast_block_content = str_replace( '<div class="wp-block-post-author">', '<div class="wp-block-post-author flex">' . gym_enthusiast_get_svg( array( 'icon' => 'user' ) ), $gym_enthusiast_block_content );
            return $gym_enthusiast_block_content;
        }

	}
    return $gym_enthusiast_block_content;
}
	
add_filter( 'render_block', 'gym_enthusiast_block_wrapper', 10, 2 );
