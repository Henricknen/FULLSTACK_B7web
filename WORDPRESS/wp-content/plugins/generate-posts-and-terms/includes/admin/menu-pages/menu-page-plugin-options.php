<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Additional function to add new inputs for the admin panel for the plugin
function generate_posts_and_terms__multiple_form_inputs( $settings_options = array() ) {

	// Array
	$post_types_taxonomies = generate_posts_and_terms__get_post_types_and_taxonomies_array();

	// Terms args
	$terms_args = array(
		'hide_empty' => false
	);
	
	$first_post_type = key( $post_types_taxonomies );

	if ( ! empty( $post_types_taxonomies ) ) {
		foreach ( (array) $post_types_taxonomies as $post_type => $taxonomies ) {
			
			if ( (string) $first_post_type != (string) $post_type ) {
				$row_style = 'display: none;';
			} else {
				$row_style = 'display: block;';
			}
			
			if ( ! empty( $taxonomies ) ) {
				foreach ( (array) $taxonomies as $taxonomy => $taxonomy_arr ) {

					$get_taxonomy = get_taxonomy( $taxonomy );
					$get_terms = get_terms( $taxonomy, $terms_args );
					$all_terms_list = array();

					if ( ! empty( $get_terms ) ) {
						foreach( (array) $get_terms as $term ) {
							if ( (bool) $get_taxonomy->hierarchical ) {
								$all_terms_list[$term->term_id] = $term->name;
							} else {
								$all_terms_list[$term->slug] = $term->name;
							}
						}
						
						$all_terms_list_into_options = generate_posts_and_terms__join_array_into_options( $all_terms_list );

						$settings_options[0]['submenus'][0]['rows'][] = array(
							'description'  => 'Select the terms from "' . $taxonomy . '" taxonomy you would like to add to the posts.',
							'priority'     => 35,
							'class'        => 'hide-item show-item-' . $post_type,
							'style'        => $row_style,
							'tags'         => array(
							
								array(
									'tag'             => 'h3',
									'text'            => 'What terms to add from "' . $taxonomy . '" taxonomy'
								),
								array(
									'name'            => 'generate_posts_and_terms__post_type_values_' . $post_type . '_' . $taxonomy . '[]',
									'tag'             => 'select',
									'options'         => $all_terms_list_into_options,
									'multiple'        => 'multiple'
								)
							)

						);
					}
				}
			}
		}
	}

	return $settings_options;
}

// Main function with tags for admin panel of the plugin
function generate_posts_and_terms__admin_panel_settings( $settings_options = array() ) {
	
	// Settings ID
	$s_id_                            = 'generate_posts_and_terms__settings_';

	// Get post types
	$get_post_types_args = array(
		'_builtin' => false
	);
	
	$post_types_post                  = array( 'post' => 'post' );
	
	$get_post_types                   = array_merge( $post_types_post, get_post_types( $get_post_types_args ) );
	$get_post_types_into_options      = generate_posts_and_terms__join_array_into_options( $get_post_types );

	// Get taxonomies
	$get_taxonomies_args              = array(
		'_builtin' => false
	);
	
	$taxonomies_inlcude               = array( 
		'category' => 'category',
		'post_tag' => 'post_tag'
	);
	
	$taxonomies_types                 = array_merge( $taxonomies_inlcude, get_taxonomies( $get_taxonomies_args ) );
	$taxonomies_types_into_options    = generate_posts_and_terms__join_array_into_options( $taxonomies_types );
	
	// Site info
	$site_info                        = generate_posts_and_terms__settings_site_info();

	$settings_options[] = array(
		'name'          => __( 'Quick Start', 'generate_posts_and_terms' ),
		'priority'      => 10,
		'submenus'      => array(
		
			array(
				'name'         => __( 'Generate Posts', 'generate_posts_and_terms' ),
				'priority'     => 10,
				'rows'         => array(
				
					array(
						'description'   => __( 'Select the number of posts you would like to be generated.', 'generate_posts_and_terms' ),
						'priority'      => 10,
						'tags'          => array(

							array(
								'tag'             => 'h3',
								'text'            => __( 'Number of posts', 'generate_posts_and_terms' )
							),
							array(
								'tag'             => 'input',
								'type'            => 'number',
								'name'            => $s_id_ . 'generate_posts_number',
								'value'           => '10',
								'min'             => '1',
								'max'             => '2000',
								'step'            => '1'
							)
						)
					),
					
					array(
						'description'   => __( 'Check this to set an image from the Media Library as a featured image for the post. If you select to generate 10 posts, the first 10 images from the Media Library will be used as featured images.' ),
						'priority'      => 20,
						'tags'          => array(

							array(
								'tag'             => 'h3',
								'text'            => __( 'Include a featured image?', 'generate_posts_and_terms' )
							),
							array(
								'tag'             => 'input',
								'type'            => 'checkbox',
								'name'            => $s_id_ . 'generate_posts_images_checkbox'
							)
						)
					),
				
					array(
						'description'   => __( 'Select the the post type you want to generate new dummy posts for.', 'generate_posts_and_terms' ),
						'priority'      => 30,
						'tags'          => array(

							array(
								'tag'             => 'h3',
								'text'            => __( 'Select Post Type', 'generate_posts_and_terms' )
							),
							array(
								'tag'             => 'select',
								'name'            => $s_id_ . 'generate_posts_post_type',
								'options'         => $get_post_types_into_options,
								'onchange'        => "jQuery(this).closest( '.generate_posts_and_terms-submenu-content' ).find( '.hide-item' ).hide().filter( '.show-item-' + jQuery(this).val() ).show();"
							)
						)
					),

					array(
						'priority'      => 40,
						'tags'          => array(

							array(
								'tag'             => 'input',
								'type'            => 'submit',
								'class'           => 'button-primary button',
								'value'           => __( 'Start', 'generate_posts_post_type' )
							)
						)
					) 
				)
			),
			
			array(
				'name'         => __( 'Generate Terms', 'generate_posts_and_terms' ),
				'priority'     => 20,
				'rows'         => array(

					array(
						'description'   => __( 'Select the number of terms you would like to be generated.', 'generate_posts_and_terms' ),
						'priority'      => 10,
						'tags'          => array(

							array(
								'tag'             => 'h3',
								'text'            => __( 'Number of terms', 'generate_posts_and_terms' )
							),
							array(
								'tag'             => 'input',
								'type'            => 'number',
								'name'            => $s_id_ . 'generate_terms_number',
								'min'             => '1',
								'max'             => '2000',
								'step'            => '1',
								'value'           => '10'
							)
						)
					),
				
					array(
						'description'   => __( 'Select from the list the taxonomy you would like to create terms for.', 'generate_posts_and_terms' ),
						'priority'      => 5,
						'tags'          => array(

							array(
								'tag'             => 'h3',
								'text'            => __( 'Select Taxonomy', 'generate_posts_and_terms' )
							),
							array(
								'tag'             => 'select',
								'name'            => $s_id_ . 'generate_terms_select_taxonomy',
								'options'         => $taxonomies_types_into_options
							)
						)
					),

					array(
						'priority'      => 30,
						'tags'          => array(

							array(
								'tag'             => 'input',
								'type'            => 'submit',
								'class'           => 'button-primary button',
								'name'            => $s_id_ . 'generate_terms_start',
								'no_save'         => 'no_save',
								'value'           => __( 'Start', 'generate_posts_post_type' )
							)
						)
					),
				)
			),

			array(
				'name'          => __( 'Info', 'generate_posts_and_terms' ),
				'priority'      => 90,
				'rows'          => array(

					array(
						'description'   => __( 'View information about your site.', 'generate_posts_and_terms' ),
						'priority'      => 10,
						'tags'          => array(

							array(
								'tag'             => 'h3',
								'text'            => __( 'Site information', 'generate_posts_and_terms' )
							),
							array(
								'tag'             => 'textarea',
								'class'           => 'code-text',
								'readonly'        => 'readonly',
								'name'            => $s_id_ . 'site_info',
								'text'            => $site_info
							)
						)
					)
				)
			)
		)
	);

	return $settings_options;
}