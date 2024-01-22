<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Admin panel HTML data
function generate_posts_and_terms__get_admin_panel( $function_id, $function_variables ) {
	global $title; 
	
	$data = '<div id="generate_posts_and_terms-admin-panel">' . "\n";
	
		$data .= '<div id="generate_posts_and_terms-admin-panel-header" class="wp-ui-primary">' . "\n";
			$data .= '<div id="generate_posts_and_terms-admin-header-overlay">' . "\n";
				$data .= '<span>' . $title . '</span>' . "\n";
			$data .= '</div>' . "\n";
		$data .= '</div>' . "\n";
		
		$data .= '<div id="generate_posts_and_terms-admin-panel-main">' . "\n";
		
			$menus = '<div id="generate_posts_and_terms-admin-panel-menu">' . "\n";
				$menus .= generate_posts_and_terms__machine_menu( $function_variables );
			$menus .= '</div>' . "\n";

			$content = '<div id="generate_posts_and_terms-admin-panel-content">' . "\n";
				$content .= generate_posts_and_terms__machine_content( $function_variables );
			$content .= '</div>' . "\n";
			
			$content_array = array(
				array(
					'content'    => $menus,
					'class'      => 'generate_posts_and_terms-admin-panel-menu',
					'style'      => 'vertical-align: top;'
				),
				array(
					'content'    => $content,
					'class'      => 'generate_posts_and_terms-admin-panel-content',
				)
			);
			
			$data .= generate_posts_and_terms__content_display( $content_array, 'table', 'cell' );
			
			$data .= '<div style="clear: both;"></div>' . "\n";
		$data .= '</div>' . "\n";

		$data .= wp_nonce_field( 'wp_ajax_generate_posts_and_terms__ajax', 'generate_posts_and_terms__nonce', true, false ) . "\n";

	$data .= '</div>' . "\n";
	
	return $data;
}

// Function to show admin panel
function generate_posts_and_terms__admin_panel( $function_id, $function_variables ) { 
	echo generate_posts_and_terms__get_admin_panel( $function_id, $function_variables );
}

// Function for adding menu tab
function generate_posts_and_terms__machine_menu( $settings ) {

	if ( ! empty ( $settings ) ) {
		
		$menu_number = 0;
		$menu_count = count( $settings );
		
		$output = '<ul>' . "\n";
		
		foreach( (array) $settings as $key => $arr ) {
			$menu_number = $menu_number + 1;

			if ( (int) $menu_number == 1 ) {
				$add_class = ' open menu_first';
			} else {
				$add_class = '';
			}
			
			if ( (int) $menu_count == (int) $menu_number ) {
				$add_class .= ' menu_last';
			}

			if ( ! empty ( $arr['submenus'] ) ) {
				$submenu_number = 0;
				$submenu_count = count( (array) $arr['submenus'] );
				
				$output .= '<li class="control-section accordion-section' . $add_class . '">' . "\n";
					$output .= '<h3 class="accordion-section-title" title="' . $arr['name'] . '" id="generate_posts_and_terms-admin-panel-menu-' . $key . '">' . $arr['name'] . '</h3>' . "\n";
				
					if ( (int) $menu_number != 1 ) {
						$ul_style = ' style="display: none;" ';
					} else {
						$ul_style = '';
					}
				
					$output .= '<ul' . $ul_style . '>' . "\n";
					
					foreach( (array) $arr['submenus'] as $submenu_id => $submenu_arr ) {
						$submenu_number = $submenu_number + 1;
					
						if ( (int) $submenu_number == 1 ) {
							$submenu_add_class = ' submenu_open submenu_first';
						} else {
							$submenu_add_class = '';
						}
						
						if ( (int) $submenu_count == (int) $submenu_number ) {
							$submenu_add_class .= ' submenu_last';
						}
					
						$output .= '<li class="generate_posts_and_terms-submenu' . $submenu_add_class . '">' . "\n" .  
							'<h3 class="accordion-section-title" title="' . $submenu_arr['name'] . '" id="generate_posts_and_terms-admin-panel-submenu-' . $submenu_id . '">' . $submenu_arr['name'] . '<span class="wp-ui-highlight"></span></h3>' . "\n";
						$output .= '</li>' . "\n";
					}
					
					$output .= '</ul>' . "\n";
				$output .= '</li>' . "\n";
			}
		}
		$output .= '</ul>' . "\n";
	}

	return $output;
}

// Function for generating inputs
function generate_posts_and_terms__machine_content( $settings ) {
	$output = '';

	if ( ! empty ( $settings ) ) {
		
		$menu_number = 0;
		$menu_count = count( $settings );
		
		foreach( (array) $settings as $menu_id => $menu ) {
			$menu_number = $menu_number + 1;
			
			if ( isset( $menu['class'] ) ) {
				$menu_class = ' ' . $menu['class'];
			} else {
				$menu_class = '';
			}

			if ( (int) $menu_number == 1 ) {
				$menu_class .= ' open menu_first';
			}
			
			if ( (int) $menu_count == (int) $menu_number ) {
				$menu_class .= ' menu_last';
			}
		
			$output .= '<div class="generate_posts_and_terms-menu-content' . $menu_class . '" id="generate_posts_and_terms-menu-content-' . $menu_id . '">' . "\n";

			if ( ! empty ( $menu['submenus'] ) ) {
				
				$submenu_number = 0;
				$submenu_count = count( (array) $menu['submenus'] );
				
				foreach( (array) $menu['submenus'] as $submenu_id => $submenu_arr ) {
				
					$submenu_number = $submenu_number + 1;

					if ( isset( $submenu_arr['class'] ) ) {
						$submenu_class = ' ' . $submenu_arr['class'];
					} else {
						$submenu_class = '';
					}
					
					if ( (int) $submenu_number == 1 ) {
						$submenu_class .= ' submenu_open submenu_first';
					}
					
					if ( (int) $submenu_count == (int) $submenu_number ) {
						$submenu_class .= ' submenu_last';
					}

					$output .= '<form enctype="multipart/form-data" class="generate_posts_and_terms-submenu-content' . $submenu_class . '" id="generate_posts_and_terms-submenu-content-' . $menu_id . '-' . $submenu_id . '">' . "\n";
				
					if ( ! empty ( $submenu_arr['rows'] ) ) {
						foreach( (array) $submenu_arr['rows'] as $row ) {

							// ======= ROW =======

							// Description
							if ( ! empty( $row['description'] ) ) {
								$row_description = $row['description'];
							} else {
								$row_description = '';
							}

							// Row class
							if ( ! empty( $row['class'] ) ) {
								$row_class = ' ' . $row['class'];
							} else {
								$row_class = '';
							}
							
							// Row style
							if ( ! empty( $row['style'] ) ) {
								$row_style = ' style="' . $row['style'] . '"';
							} else {
								$row_style = '';
							}

							$output .= '<div class="generate_posts_and_terms-row' . $row_class . '"' . $row_style . '>' . "\n";
								
								// Inside table
								$output .= '<div class="generate_posts_and_terms-tags-group generate_posts_and_terms-inside-table">' . "\n";

									$row_output = array();
	
									if ( ! empty ( $row['tags'] ) ) {
										foreach ( (array) $row['tags'] as $tag_id => $tag_args ) {
											$output_1 = generate_posts_and_terms__machine_tag( $tag_args, 'admin_panel' );
											
											$classes_str = '';
											$classes_arr = array();
											
											if ( empty( $tag_args['class'] ) and isset( $tag_args['tag'] ) ) {
												$tag_args['class'] = 'generate_posts_and_terms__' . $tag_args['tag'];
											} else if ( ! empty( $tag_args['class'] ) and isset( $tag_args['tag'] ) ) {
												$tag_args['class'] = $tag_args['class'] . ' generate_posts_and_terms__' . $tag_args['tag'];
											}
											
											if ( ! empty( $tag_args['class'] ) ) {
												$classes_arr = explode( ' ', (string) $tag_args['class'] );
												
												foreach ( (array) $classes_arr as $class_id => $class ) {
													$classes_arr[$class_id] = 'table_cell_' . $class;
												}
												
												$classes_str = implode( ' ', $classes_arr );
											}

											$row_output[] = array(
												'content'    => $output_1,
												'class'      => $classes_str
											);
										}
									}

									// Table
									$output .= generate_posts_and_terms__content_display( $row_output, 'table', 'cell' );

								$output .= '</div>' . "\n";

								$output .= '<div class="clear"></div>' . "\n";
				
								if ( ! empty( $row_description ) ) {
									$output .= '<div class="generate_posts_and_terms-row-description"><small>' . $row_description . '</small></div>' . "\n";
								}
								
							$output .= '</div>' . "\n";
						}
					}
					
					$output .= '</form>' . "\n";
				}
			}

			$output .= '</div>' . "\n";
		}
	}
	
	return $output;
}


function generate_posts_and_terms__machine_tag( $tag_args = array(), $admin_panel_or_meta_box = 'admin_panel', $post = null ) {

	$tag_id = '';
	$merge_tag_id = '';
	$select_value = '';

	// ======= Tag =======
	if ( is_array( $tag_args ) and ! empty( $tag_args['tag'] ) ) {

		$tag = $tag_args['tag'];
		unset( $tag_args['tag'] );
		
		// Adding name attribute if empty for input, textarea, button and select tags
		$form_elements = array( 'input', 'textarea', 'button', 'select' );
		if ( in_array( $tag, $form_elements ) ) {
			if ( ! isset( $tag_args['name'] ) and ! empty( $tag_args['id'] ) ) {
				$tag_args['name'] = $tag_args['id'];
			}
		}

		// Adding class
		$tag_class = 'generate_posts_and_terms__' . $tag; 
		if ( ! empty( $tag_args['type'] ) ) {
			$tag_class .= ' generate_posts_and_terms__' . $tag . '_' . $tag_args['type']; 
		}
		if ( ! empty( $tag_args['class'] ) ) {
			$tag_class .= ' ' . $tag_args['class'];
		}
		$tag_args['class'] = $tag_class;

		// Check if is array element
		if ( ! empty( $tag_args['merge_into'] ) ) {
			$merge_tag_id = $tag_args['merge_into'];
			unset( $tag_args['merge_into'] );
			$array_values = true;
		} else {
			$array_values = false;
		}
		
		if ( isset( $tag_args['id'] ) ) {
			$tag_id = $tag_args['id'];
		} else {
			$tag_id = '';
		}
		
		// Adding value attribute
		if ( ! isset( $tag_args['value'] ) and ! empty( $tag_id ) ) {
			if ( (bool) $array_values ) {
				if ( (string) $admin_panel_or_meta_box == 'admin_panel' ) {
					$generate_posts_and_terms__get_option = generate_posts_and_terms__get_option( $merge_tag_id );
					
					if ( $generate_posts_and_terms__get_option !== false ) {
						$element_arr_val = $generate_posts_and_terms__get_option;
					}
				} else if ( (string) $admin_panel_or_meta_box == 'meta_box' ) {
					$element_arr_val = get_post_meta( $post->ID, $merge_tag_id, true );
				}
				
				if ( isset( $element_arr_val[$tag_id] ) ) {
					$tag_args['value'] = $element_arr_val[$tag_id];
				}
			} else {
				if ( (string) $admin_panel_or_meta_box == 'admin_panel' ) {
					$generate_posts_and_terms__get_option = generate_posts_and_terms__get_option( $tag_id );
					
					if ( $generate_posts_and_terms__get_option !== false ) {
						$tag_args['value'] = generate_posts_and_terms__get_option( $tag_id );
					}
					
				} else if ( (string) $admin_panel_or_meta_box == 'meta_box' ) {
					$tag_args['value'] = get_post_meta( $post->ID, $tag_id, true );
				}
			}
		}

		if ( isset( $tag_args['type']  ) ) {
			
			// If checkbox
			if ( (string) $tag_args['type'] == (string) 'checkbox' ) {
				if ( ! empty( $tag_args['value'] ) ) {
					$tag_args['checked'] = 'checked';
				}
				
				if ( isset( $tag_args['value'] ) ) {
					unset( $tag_args['value'] );
				}
			}
		}

		// If textarea
		if ( (string) $tag == (string) 'textarea' ) {
			if ( isset( $tag_args['value'] ) ) {
				$tag_args['text'] = $tag_args['value'];
				unset( $tag_args['value'] );
			}
		}
		
		// If select
		else if ( (string) $tag == (string) 'select' ) {
			if ( ! empty( $tag_args['value'] ) ) {
				$select_value = $tag_args['value'];
				unset( $tag_args['value'] );
			}
		}
		
		// If option
		else if ( (string) $tag == (string) 'option' ) {
			if ( ! empty( $tag_args['id'] ) ) {
				unset( $tag_args['id'] );
				
				if ( ! empty( $tag_args['select_value'] ) ) {
					if ( ! empty( $tag_args['value'] ) ) {
						if ( (string) $tag_args['select_value'] == (string) $tag_args['value'] ) {
							$tag_args['selected'] = 'selected';
						}
					}
					
					unset( $tag_args['select_value'] );
				}
			}
		}

		// Tag text
		if ( isset( $tag_args['text'] ) ) {
			$tag_text = $tag_args['text'];
			$tag_close = true;
			unset( $tag_args['text'] );
		} else {
			$tag_text = '';
			$tag_close = false;
		}
		
		// No save
		if ( isset( $tag_args['no_save'] ) ) {
			unset( $tag_args['no_save'] );
		}

		// Start tag
		$tag_html = '<' . $tag;
		
		// Adding attributes
		if ( ! empty( $tag_args ) ) {
			foreach ( (array) $tag_args as $attr_id => $attr_value ) {
				if ( is_array( $attr_value ) ) {
					$tag_close = true;
					if ( ! empty( $attr_value ) ) {
						foreach ( (array) $attr_value as $new_tag_args ) {

							if ( is_array( $new_tag_args ) ) {
								if ( ! empty( $new_tag_args ) ) {
									
									if ( (string) $tag == (string) 'select' ) {
										if ( ! empty( $tag_id ) ) {
											$new_tag_args['id'] = $tag_id;
										}

										if ( ! empty( $select_value ) ) {
											$new_tag_args['select_value'] = $select_value;
										}
									}

									$tag_text .= "\n";
									$tag_text .= generate_posts_and_terms__machine_tag( $new_tag_args, $admin_panel_or_meta_box, $post );
								}
							}
						}
					}
				} else {
					$tag_html .= ' ' . $attr_id . '="' . $attr_value . '"';
				}
			}
		}
		
		// End tag
		$tag_html .= '>';
		
		if ( (bool) $tag_close ) {
			$tag_html .= $tag_text . '</' . $tag . '>' . "\n";
		}

	} else {
		$tag_html = '';
	}

	return $tag_html;
}