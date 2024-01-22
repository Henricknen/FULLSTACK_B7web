var generate_posts_and_terms__admin_panel;
( function( $ ) {
	generate_posts_and_terms__admin_panel = {
		init : function() {

			$( '#generate_posts_and_terms-admin-panel-menu > ul' ).accordion( {
				heightStyle: 'content',
				animate: 100,
				activate: function( event, ui ) {
					ui.oldHeader.parent().removeClass( 'open' );
					
					var menu_id = ui.newHeader.attr( 'id' ).replace( 'generate_posts_and_terms-admin-panel-menu-', '' );
					
					$( '#generate_posts_and_terms-admin-panel-content .generate_posts_and_terms-menu-content' ).removeClass( 'open' );
					
					$( '#generate_posts_and_terms-menu-content-' + menu_id ).addClass( 'open' );
				},
				beforeActivate: function( event, ui ) {
					ui.newHeader.parent().addClass( 'open' );
				}
			} );
			
			
			$( '#generate_posts_and_terms-admin-panel-menu .generate_posts_and_terms-submenu' ).click( function() {
				var t = $( this );
				if ( ! t.hasClass( 'submenu_open' ) ) {
				
					t.siblings().removeClass( 'submenu_open' );
					t.addClass().addClass( 'submenu_open' );
					
					var menu_id = t.children( '.accordion-section-title' ).parent().parent().parent().children( '.accordion-section-title' ).attr( 'id' ).replace( 'generate_posts_and_terms-admin-panel-menu-', '' );
					var submenu_id = t.children( '.accordion-section-title' ).attr( 'id' ).replace( 'generate_posts_and_terms-admin-panel-submenu-', '' );
					
					$( '#generate_posts_and_terms-menu-content-' + menu_id + ' .generate_posts_and_terms-submenu-content' ).removeClass( 'submenu_open' );
					$( '#generate_posts_and_terms-submenu-content-' + menu_id + '-' + submenu_id ).addClass( 'submenu_open' );
					
				}
			} );
			
		
			//on form submit function
			$( '#generate_posts_and_terms-admin-panel' ).find( 'form' ).submit( function() {
				var t = $( this );
				var submit_button = t.find( '.generate_posts_and_terms__input_submit' );
				var function_id = t.attr( 'id' );

				if ( ! t.hasClass( 'noclick' ) ) {
				
					submit_button.removeClass( 'button-primary' );
					submit_button.addClass( 'button-disabled' );
				
					t.addClass( 'noclick' );
					
					var serializedReturn = t.serialize();
					
					var data = {
						function_id:                       function_id,
						action:                            'generate_posts_and_terms__generate_new_posts',
						data:                              serializedReturn,
						generate_posts_and_terms__nonce:   $( '#generate_posts_and_terms__nonce' ).val(),
					};

					$.post( ajaxurl, data, function( response ) {
						if ( response.success == true ) {
							if ( response.data.action == 'refresh' ) {
								location.reload();
							}
						} else if ( response.success == false ) {
							alert( response.data );
						} else {
							alert( "Can't save!" );
						}

					}, 'json' ).fail( function() {
						alert( 'AJAX failed! (No internet connection?)' );
					} ).always( function() {
						t.removeClass( 'noclick' );
						submit_button.removeClass( 'button-disabled' );
						submit_button.addClass( 'button-primary' );
					} );
					
					
					// $.post( ajaxurl, data, function( response ) {

							// alert( response );
		

					// } ).fail( function() {
						// alert( 'AJAX failed! (No internet connection?)' );
					// } ).always( function() {
						// t.removeClass( 'noclick' );
						// submit_button.removeClass( 'button-disabled' );
						// submit_button.addClass( 'button-primary' );
					// } );
				}
				
				return false;
			} );   

		}
		
		
	};

	$( document ).ready( function( $ ) { generate_posts_and_terms__admin_panel.init(); } );
} ) ( jQuery );