<div class="wrap">
	<h1><?php esc_html_e( 'Generate Dummy Posts with featured images', 'generate-dummy-posts' ); ?></h1>
	<div id='gdpmain_parent'>
		<label><?php esc_html_e( 'Enter no. of posts you want to generate', 'generate-dummy-posts' ); ?></label>
		<input type='number' value="10" id='gdp_count' placeholder="<?php esc_html_e( 'Enter number', 'generate-dummy-posts' ); ?>" />
	</div>
	<button class="button button-primary dsxmlrpc_button" id="generate_posts"><?php esc_html_e( 'Generate', 'generate-dummy-posts' ); ?></button> <div id="generating_message"></div>
	<div class="gdpmain_buy_paypal">
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="AF5FFTLYGZDMW">
			<input type="image" src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/buy-coffee.gif'; ?>" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
		</form>
	</div>
</div>