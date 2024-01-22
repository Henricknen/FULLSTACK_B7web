<?php 

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// AJAX function that is called from the admin panel
function generate_posts_and_terms__generate_new_posts_action() {
	$json_success                  = array();
	$json_error                    = array();
	
	$g_p_a_t_s_                    = 'generate_posts_and_terms__settings_';
	
	$minimum_number_of_paragraphs  = 3;
	$maximum_number_of_paragraphs  = 8;
	
	$maximum_of_dummy_paragraphs   = 14;
	
	$post_types_taxonomies         = generate_posts_and_terms__get_post_types_and_taxonomies_array();
	
	if ( ! check_ajax_referer( 'wp_ajax_generate_posts_and_terms__ajax', 'generate_posts_and_terms__nonce', false ) ) {
		$json_error[] = __( 'Invalid nonce.', 'generate_posts_and_terms' );
	}
	
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		$json_error[] = __( "Current user can't change options.", 'generate_posts_and_terms' );
	}

	if ( empty( $json_error ) ) {

		// If we have function id and data
		if ( ! empty( $_POST['function_id'] ) ) {
			if ( ! empty( $_POST['data'] ) ) {

				$data = $_POST['data'];
		
				wp_parse_str( $data, $ajax_data );
	
				// Generate posts
				if ( (string) $_POST['function_id'] == 'generate_posts_and_terms-submenu-content-0-0' ) {
					
					$post_type                       = (string) $ajax_data[$g_p_a_t_s_ . 'generate_posts_post_type'];
					$number_of_posts                 = (int) $ajax_data[$g_p_a_t_s_ . 'generate_posts_number'];
					
					if ( isset( $ajax_data[$g_p_a_t_s_ . 'generate_posts_images_checkbox'] ) ) {
						$include_featured_image      = (bool) $ajax_data[$g_p_a_t_s_ . 'generate_posts_images_checkbox'];
					} else {
						$include_featured_image      = false;
					}
					
					$all_dummy_titles                = generate_posts_and_terms__new_post_dummy_titles();
					$all_dummy_titles_count          = count( $all_dummy_titles ) - 1;
					$all_dummy_text                  = generate_posts_and_terms__new_post_dummy_text();

					if ( (bool) $include_featured_image ) {
						$widget_args = array();
						
						$instance = array(
							'use_custom_query'    => true,
							'post_type'           => 'attachment',
							'post_status'         => 'any',
							'post_mime_type'      => 'image',
							'posts_per_page'      => $number_of_posts
						);

						$the_query = generate_posts_and_terms__generate_wp_query_start( $widget_args, $instance );
						
						$attachments = $the_query->posts;
					} else {
						$attachments = array();
					}
					
					$wp_set_post_terms = array();

					if ( isset( $post_types_taxonomies[$post_type] ) ) {
						foreach ( (array) $post_types_taxonomies[$post_type] as $taxonomy => $taxonomy_arr ) {
							if ( isset( $ajax_data['generate_posts_and_terms__post_type_values_' . $post_type . '_' . $taxonomy] ) ) {
								$wp_set_post_terms[$taxonomy] = $ajax_data['generate_posts_and_terms__post_type_values_' . $post_type . '_' . $taxonomy];
							}
						}
					}
					
					for ( $a = 0; $a < $number_of_posts; $a++ ) {

						$number_of_paragraphs = rand ( $minimum_number_of_paragraphs, $maximum_number_of_paragraphs );
						
						$post_content = '';
						
						for ( $c = 0; $c < $number_of_paragraphs; $c++ ) {
							$paragraph_random_number = rand ( 0, $maximum_of_dummy_paragraphs );

							if ( isset( $all_dummy_text[$paragraph_random_number] ) ) {
								
								if ( isset( $all_dummy_text[$paragraph_random_number]['data'] ) ) {
									$post_content .= $all_dummy_text[$paragraph_random_number]['data'] . "\n";
								}
							}
						}
					
						$title_random_number = rand ( 0, $all_dummy_titles_count );
					
						if ( ! empty( $all_dummy_titles[$title_random_number] ) ) {
							$title = $all_dummy_titles[$title_random_number];
						} else {
							$title = __( 'Empty Title', 'generate_posts_and_terms' );
						}

						$random_date = date( 'Y-m-d H:i:s', strtotime( '-' . mt_rand( 1, 90 ).' days ' . mt_rand( 0, 24 ).' hours ' . mt_rand( 0, 60 ).' minutes ' ) );
						
						$new_post = array(
							'post_title'    => $title,
							'post_content'  => $post_content,
							'post_status'   => 'publish',
							'post_date'     => $random_date,
							'post_type'     => $post_type,
							'tax_input'     => $wp_set_post_terms
						);

						$post_id = wp_insert_post( $new_post );
						
						if ( isset( $attachments[$a] ) ) {
							
							$attachment = $attachments[$a];
							$thumbnail_id = $attachment->ID;
							
							set_post_thumbnail( $post_id, $thumbnail_id );
						}
					}

				// Generate terms
				} else if ( (string) $_POST['function_id'] == 'generate_posts_and_terms-submenu-content-0-1' ) {
					$taxonomy                        = (string) $ajax_data[$g_p_a_t_s_ . 'generate_terms_select_taxonomy'];
					$number_of_terms                 = (int) $ajax_data[$g_p_a_t_s_ . 'generate_terms_number'];
					
					$get_taxonomy                    = get_taxonomy( $taxonomy );

					if ( ! empty( $get_taxonomy ) ) {
						$taxonomy_labels = $get_taxonomy->labels;

						$singular_label = $taxonomy_labels->singular_name;

						for ( $b = 1; $b < $number_of_terms + 1; $b++ ) {
							$term = $singular_label . $b;

							if ( ! term_exists( $term, $taxonomy ) ) {
								wp_insert_term( $term, $taxonomy );
							}
						}
					} else {
						$json_error[] = __( 'Taxonomy is empty.', 'generate_posts_and_terms' );
					}
				}

			} else {
				$json_error[] = __( 'Data is empty.', 'generate_posts_and_terms' );
			}
		} else {
			$json_error[] = __( 'Empty function ID value.', 'generate_posts_and_terms' );
		}
	}
	
	if ( empty( $json_error ) ) {
		wp_send_json_success( $json_success );
	} else {
		wp_send_json_error( implode( "\n", $json_error ) );
	}
}

// Registering scripts and sryles for later
function generate_posts_and_terms__register_scripts_and_styles_admin_action() {
	$generate_posts_and_terms                  = generate_posts_and_terms();
	$includes_url                              = $generate_posts_and_terms->includes_url;
	$version                                   = $generate_posts_and_terms->version;
	
	// Admin Panel
	wp_register_script( 'generate_posts_and_terms-admin-panel',      $includes_url . 'admin/js/admin-menu.js',               array(), $version, true ); 
	wp_register_style( 'generate_posts_and_terms-admin-panel',       $includes_url . 'admin/css/admin-default.css',          array(), $version );
}

// Function for sorting the menu panels options
function generate_posts_and_terms__function_call_admin_panel() {
	global $plugin_page;

	$function_id = '';

	$settings = apply_filters( 'generate_posts_and_terms__add_menu_page_settings', array() );

	if ( ! empty ( $settings ) ) {
		foreach ( (array) $settings as $setting_arr ) {
			if ( in_array( $plugin_page, $setting_arr, true ) ) {
				if ( ! empty( $setting_arr['function'] ) ) {
					$function_id = $setting_arr['function'];
				}
			}
		}
	}

	// Does function exist?
	if ( function_exists( $function_id ) ) {
		$function_options = call_user_func( $function_id );
		
		// Filter the options
		$data = apply_filters( 'generate_posts_and_terms__filter_admin_menu_options_' . $function_id, $function_options );

		$priority = array();

		if ( ! empty ( $data ) ) {
			foreach ( (array) $data as $key => $row ) {
				if ( isset( $row['priority'] ) ) {
					$priority[$key] = (int) $row['priority'];
				} else {
					$priority[$key] = 50;
				}
				
				$submenu_priority = array();
				
				if ( ! empty( $row['submenus'] ) ) {
					$submenus = $row['submenus'];
					foreach ( (array) $submenus as $submenu_key => $submenu ) {
						if ( isset( $submenu['priority'] ) ) {
							$submenu_priority[$submenu_key] = (int) $submenu['priority'];
						} else {
							$submenu_priority[$submenu_key] = 50;
						}

						$option_priority = array();

						if ( ! empty( $submenu['rows'] ) ) {
							$rows = $submenu['rows'];
							foreach ( (array) $rows as $option_key => $option ) {
								if ( isset( $option['priority'] ) ) {
									$option_priority[$option_key] = (int) $option['priority'];
								} else {
									$option_priority[$option_key] = 50;
								}
							}

							array_multisort( $option_priority, SORT_ASC, $rows );

							$submenus[$submenu_key]['rows'] = $rows;
						}
					}
					
					array_multisort( $submenu_priority, SORT_ASC, $submenus );

					$data[$key]['submenus'] = $submenus;
				}
			}
		}

		array_multisort( $priority, SORT_ASC, $data );

		generate_posts_and_terms__admin_panel( $function_id, $data );
	}
}

// This function is called to add admin menus in the WordPress left menu
function generate_posts_and_terms__admin_menu_action() {
	$settings = apply_filters( 'generate_posts_and_terms__add_menu_page_settings', array() );

	if ( ! empty ( $settings ) ) {
		foreach ( (array) $settings as $wpi ) {
			if ( isset( $wpi['page_title'], $wpi['menu_title'], $wpi['capability'], $wpi['menu_slug'], $wpi['function'] ) ) {
			
				if ( isset( $wpi['use_admin_panel'] ) and (bool) $wpi['use_admin_panel'] ) {
					$function = 'generate_posts_and_terms__function_call_admin_panel';
				} else {
					$function = $wpi['function'];
				}

				$admin_suffix = add_plugins_page( $wpi['page_title'], $wpi['menu_title'], $wpi['capability'], $wpi['menu_slug'], $function );

				// Add help data and sidebar
				add_action( 'load-' . $admin_suffix, 'generate_posts_and_terms__admin_add_help_and_sidebar_action' );				
			}
		}
	}
}

// Function for adding help data and sidebar to the help tab
function generate_posts_and_terms__admin_add_help_and_sidebar_action() {
	global $plugin_page;
	
	$screen = get_current_screen();
	$settings = apply_filters( 'generate_posts_and_terms__add_menu_page_settings', array() );
	
	// Default admin panel help text
	$generate_posts_and_terms__admin_panel_help = generate_posts_and_terms__admin_panel_help();
	
	// Default sidebar text
	$sidebar_tab_help = generate_posts_and_terms__sidebar_tab_help();
	
	if ( ! empty ( $settings ) ) {
		foreach ( (array) $settings as $sub_settings ) {
		
			// Filter the admin_panel_help
			$generate_posts_and_terms__admin_panel_help_filtered = apply_filters( 'generate_posts_and_terms__filter_admin_panel_help', $generate_posts_and_terms__admin_panel_help, $plugin_page );
			
			// Filter the sidebar help tab text
			$sidebar_tab_help_filtered = apply_filters( 'generate_posts_and_terms__filter_admin_panel_help', $sidebar_tab_help, $plugin_page );
		
			// If is the current page we need
			if ( (string) $sub_settings['menu_slug'] == (string) $plugin_page ) {

				// Get help data
				if ( ! empty( $sub_settings['content'] ) and (string) $sub_settings['content'] == 'data' ) {
					if ( ! empty( $sub_settings['help'] ) ) {
						$admin_panel_help = array_merge( $generate_posts_and_terms__admin_panel_help_filtered, $sub_settings['help'] );
					} else {
						$admin_panel_help = $generate_posts_and_terms__admin_panel_help_filtered;
					}
				} else if ( ! empty( $sub_settings['help'] ) ) {
					$admin_panel_help = $sub_settings['help'];
				} else {
					$admin_panel_help = array();
				}
				
				// Add help bdata to admin page
				if ( ! empty( $admin_panel_help ) ) {
					foreach ( (array) $admin_panel_help as $key => $tab ) {
						$screen->add_help_tab( array(
							'id'	    => $key,
							'title'	    => $tab['title'],
							'content'	=> $tab['content']
						) );
						
						$screen->set_help_sidebar( $sidebar_tab_help_filtered );
					}
				}
			}
		}
	}
}

// Function for printing styles in the header for Admin Panel
function generate_posts_and_terms__enqueue_style_scripts_action() {
	global $plugin_page;

	$styles = array();
	$scripts = array();

	$settings = apply_filters( 'generate_posts_and_terms__add_menu_page_settings', array() );
	
	if ( ! empty ( $settings ) ) {
		foreach ( (array) $settings as $setting ) {
			if ( ! empty( $setting['menu_slug'] ) ) {
		
				if ( ! empty( $setting['styles'] ) ) {
					if ( (string) $plugin_page == (string) $setting['menu_slug'] ) {
						foreach ( (array) $setting['styles'] as $style ) {
							wp_enqueue_style( $style );
						}
						
					}
				}
				
				if ( ! empty( $setting['scripts'] ) ) {
					if ( (string) $plugin_page == (string) $setting['menu_slug'] ) {
						foreach ( (array) $setting['scripts'] as $script ) {
							wp_enqueue_script( $script );
						}
					}
				}
			
			}
		}
	}
}

// Admin Panel help default text
function generate_posts_and_terms__admin_panel_help() {
	$admin_panel_help = array(
		'id_1'   => array(
			'title'      => __( 'About Admin Panel', 'generate_posts_and_terms' ),
			'content'    => '<p>' . __( 'Admin Panel will help you to change the settings of the theme.', 'generate_posts_and_terms' ) . '</p>' . 
			'<p>' . __( 'To save the settings after change - click "Apply Changes".', 'generate_posts_and_terms' ) . '</p>' .
			'<p>' . __( 'To reset all settings click "Default Values To All" button and save.', 'generate_posts_and_terms' ) . '</p>'
		)
	);
	
	return $admin_panel_help;
}

// Sidebar tab help default text
function generate_posts_and_terms__sidebar_tab_help() {
	$sidebar_tab_help = '<p><strong>' . __( 'For more information:', 'generate_posts_and_terms' ) . '</strong></p>' .
		'<p>' . __( '<a href="https://wordpress.org/plugins/generate-posts-and-terms/" target="_blank">' . __( 'Documentation', 'generate_posts_and_terms' ) . '</a>' ) . '</p>' .
		'<p>' . __( '<a href="https://wordpress.org/support/plugin/generate-posts-and-terms/" target="_blank">' . __( 'Support Forum', 'generate_posts_and_terms' ) . '</a>' ) . '</p>';
	
	return $sidebar_tab_help;
}


function generate_posts_and_terms__settings_site_info() {
	$wpi = generate_posts_and_terms();
	
	$site_info = __( 'Theme:', 'generate_posts_and_terms' ) . ' ' . wp_get_theme()->get( 'Name' ) . "\n";

	$site_info .= __( 'Versions:', 'generate_posts_and_terms' ) . "\n";
	
	$site_info .= '- WordPress:' . ' ' . get_bloginfo( 'version' ) . "\n";
	$site_info .= '- PHP:' . ' ' . phpversion() . "\n";
	if ( function_exists( 'mysql_get_server_info' ) ) {
		$site_info .= '- MySQL:' . ' ' . mysql_get_server_info();
	}
	
	return $site_info;
}


function generate_posts_and_terms__join_array_into_options( $arr = array() ) {
	
	$result = array();
	
	if ( is_array( $arr ) ) {
		if ( ! empty( $arr ) ) {
			foreach ( $arr as $key => $value ) {
				$result[] = array(
					'tag'      => 'option',
					'value'    => $key,
					'text'     => $value
				);
			}
		}
	}
	
	return $result;
}