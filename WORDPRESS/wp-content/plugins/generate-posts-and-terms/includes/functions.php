<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


// Create the array with all post types and taxonomies
function generate_posts_and_terms__get_post_types_and_taxonomies_array() {

	$post_types_taxonomies = array();
	
	// Post types
	$post_types_add = array( 
		'post' => 'post'
	);
	
	$post_types_args = array(
		'_builtin' => false
	);
	
	$post_types = array();
	$post_types = array_merge( $post_types_add, get_post_types( $post_types_args ) );

	if ( ! empty( $post_types ) ) {
		foreach ( (array) $post_types as $post_type ) {
			$taxonomies = get_object_taxonomies( $post_type, 'objects' );
	
			// Remove post format taxonomy
			unset( $taxonomies['post_format'] );

			if ( ! empty( $taxonomies ) ) {
				foreach ( (array) $taxonomies as $tax_id => $tax_arr ) {
					$post_types_taxonomies[$post_type][$tax_id] = array();
				}
			}
		}
	}

	return $post_types_taxonomies;
}

// Display content in a table style if needed
function generate_posts_and_terms__content_display( $array_content = array(), $table_or_normal = 'table', $cell_or_row = 'cell' ) {
	$content = '';
	$style = ' style="';
	
	if ( (string) $table_or_normal == 'table' ) {
		foreach ( (array) $array_content as $element => $element_arr ) {
		
			// Content
			if ( isset( $element_arr['content'] ) ) {
				$element_content = $element_arr['content'];
			} else {
				$element_content = '';
			}
			
			// ID
			if ( isset( $element_arr['id'] ) ) {
				$element_id = ' id="' . $element_arr['id'] . '"';
			} else {
				$element_id = '';
			}
			
			// Class
			if ( isset( $element_arr['class'] ) ) {
				$element_class = ' class="generate_posts_and_terms__table_' . $cell_or_row . ' ' . $element_arr['class'] . '"';
			} else {
				$element_class = ' class="generate_posts_and_terms__table_' . $cell_or_row . '"';
			}

			// Style
			$element_style = ' style="display: table-' . $cell_or_row . ';';
			
			if ( isset( $element_arr['style'] ) ) {
				$element_style .= ' ' . $element_arr['style'];
			} else {
				$element_style .= '';
			}
			
			$element_style .= '"';
		
			$content .= '<div' . $element_id . $element_class . $element_style . '>' . "\n";
				$content .= $element_content;
			$content .= '</div>' . "\n";
		}
	} else if ( (string) $table_or_normal == 'normal' ) {
		foreach ( (array) $array_content as $element => $element_arr ) {
		
			// Content
			if ( isset( $element_arr['content'] ) ) {
				$element_content = $element_arr['content'];
			} else {
				$element_content = '';
			}
			
			$content .= $element_content . "\n";
		}
	}
	
	return $content;
}

// This function will help generate a new query with instance settings
function generate_posts_and_terms__generate_wp_query_start( $widget_args = array(), $instance = array() ) {
	global $wp_query;

	$defaults = array(
		'use_custom_query'             => false,
		'posts_per_page'               => 3,
		'use_pagenation'               => false,
		'number_pagination'            => 0,
		'multi_post_types'             => array(),
		'select_muliple_post_types'    => false,
		'show_related_posts'           => false,
		'post_type_related'            => 'post',
		'use_offset'                   => false,
		'offset'                       => 0
	);

	$args = wp_parse_args( $instance, $defaults );
	
	$post_types_taxonomies = array();
	$post_types_related_taxonomies = array();
	
	$get_post_types_args = array(
		'_builtin' => false
	);
	
	$post_types_post = array( 'post' => 'post' );
	
	$get_post_types = array_merge( $post_types_post, get_post_types( $get_post_types_args ) );

	if ( ! empty ( $get_post_types ) ) {
		foreach ( (array) $get_post_types as $get_post_type ) {
			$taxonomies = get_object_taxonomies( $get_post_type );

			if ( (string) $get_post_type == 'post' ) {
				if ( ! empty ( $taxonomies ) ) {
					foreach ( (array) $taxonomies as $tax_key => $tax_array ) {
						if ( (string) $tax_array == 'post_format' ) {
							unset( $taxonomies[$tax_key] );
						}
					}
				}
			}
			
			if ( ! empty ( $taxonomies ) ) {
				foreach ( (array) $taxonomies as $tax ) {
					$post_types_taxonomies[$get_post_type][$tax] = empty( $instance[$get_post_type . '_' . $tax] ) ? array() : $instance[$get_post_type . '_' . $tax];
				}
			}
			
			$post_types_related_taxonomies[$get_post_type]['related_tax'] = empty( $instance[$get_post_type . '_related_tax'] ) ? 'category' : $instance[$get_post_type . '_related_tax'];
		}
	}

	// Only for new custom query
	if ( (bool) $args['use_custom_query'] ) {

		// Filter taxonomies and post types
		$tax_query = array();

		if ( ! (bool) $args['show_related_posts'] ) {
			if ( (bool) $args['select_muliple_post_types'] ) {
				$post_type_arr = array();
				
				if ( ! empty ( $post_types_taxonomies ) ) {
					foreach ( (array) $post_types_taxonomies as $post_type_taxonomies => $post_types_taxonomies_arr ) {
						if ( ! empty ( $args['multi_post_types'] ) ) {
							foreach ( (array) $args['multi_post_types'] as $multi_post_type ) {
								if ( (string) $post_type_taxonomies == (string) $multi_post_type ) {
									if ( ! empty ( $post_types_taxonomies_arr ) ) {
										foreach ( (array) $post_types_taxonomies_arr as $post_type_taxonomy => $post_type_taxonomy_arr ) {
											if ( ! empty( $post_type_taxonomy_arr ) ) {
												$new_array_query = array();
												
												$new_array_query['taxonomy']   = $post_type_taxonomy;
												$new_array_query['field']      = 'slug';
												$new_array_query['terms']      = $post_type_taxonomy_arr;
												$new_array_query['operator']   = 'NOT IN';

												$tax_query[] = $new_array_query;
											}
										}
									}
								}
							}
						}
					}
				}
				
				if ( ! empty ( $args['multi_post_types'] ) ) {
					foreach ( (array) $args['multi_post_types'] as $multi_post_type ) {
						$post_type_arr[] = $multi_post_type;
						
						// Check if post type exists
						if ( post_type_exists( $multi_post_type ) ) {
							$post_type_arr[] = $multi_post_type;
						}
					}
				}
			} else {
				if ( ! empty ( $post_types_taxonomies ) ) {
					foreach ( (array) $post_types_taxonomies as $post_type_taxonomies => $post_types_taxonomies_arr ) {
						if ( (string) $post_type_taxonomies == (string) $args['post_type'] ) {
							if ( ! empty ( $post_types_taxonomies_arr ) ) {
								foreach ( (array) $post_types_taxonomies_arr as $post_type_taxonomy => $post_type_taxonomy_arr ) {
									if ( ! empty( $post_type_taxonomy_arr ) ) {
										$new_array_query = array();
										
										$new_array_query['taxonomy']   = $post_type_taxonomy;
										$new_array_query['field']      = 'slug';
										$new_array_query['terms']      = $post_type_taxonomy_arr;

										$tax_query[]                   = $new_array_query;
									}
								}
							}
						}
					}
				}
			}

			$args['tax_query'] = $tax_query;

		} else {
			$post_id = get_the_ID();
		
			$post_type_taxonomy = $post_types_related_taxonomies[$args['post_type_related']]['related_tax'];
			$get_the_terms = get_the_terms( $post_id, $post_type_taxonomy );
			
			$all_terms = array();
			$tax_query = array();
			
			if ( ! empty( $get_the_terms ) ) {
				foreach ( (array) $get_the_terms as $term ) {
					$all_terms[] = $term->slug;
				}
				
				$tax_query[] = array( 
					'taxonomy'   => $post_type_taxonomy,
					'field'      => 'slug',
					'terms'      => $all_terms
				);
			}

			// Check if post type exists
			if ( isset( $args['post_type'] ) and post_type_exists( $args['post_type'] ) ) {
				$args['post_type'] = $args['post_type_related'];
			}

			$args['tax_query'] = $tax_query;
			$args['post__not_in'] = array( $post_id );
		}
	}

	// If custom query
	if ( (bool) $args['use_custom_query'] ) {

		// If is paged
		if ( (bool) $args['use_pagenation'] and is_singular() ) {
			$use_paged = true;
		
			// If is home page or front page - disable paged
			if ( is_home() or is_front_page() ) {
				$use_paged = false;
			
			// If is not home page or front page - get paged
			} else {
				$args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
			}

		} else {
			$use_paged = false;
		}

		// The query with custom parameters
		$the_query = new WP_Query( $args );

		$the_query->set( 'use_custom_query', true );

	} else {
	
		// If is paged
		if ( (bool) $args['use_pagenation'] ) {
			$use_paged = true;
		} else {
			$use_paged = false;
		}

		$the_query = $wp_query;
		
		$the_query->set( 'use_custom_query', false );
	}

	return $the_query;
}


function generate_posts_and_terms__generate_wp_query_end( $the_query ) {

	$use_custom_query = $the_query->get( 'use_custom_query' );

	//If custom query
	if ( (bool) $use_custom_query ) {
	
		//Reset Query
		wp_reset_postdata();
	} 
}

