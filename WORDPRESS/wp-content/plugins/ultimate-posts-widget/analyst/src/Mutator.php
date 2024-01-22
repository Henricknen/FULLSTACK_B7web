<?php

namespace Analyst;

use Analyst\Cache\DatabaseCache;
use Analyst\Contracts\CacheContract;
use Analyst\Notices\NoticeFactory;

/**
 * Class Mutator mutates (modifies) UX with additional
 * functional
 */
class Mutator
{
	protected $notices = [];

	/**
	 * @var NoticeFactory
	 */
	protected $factory;

	/**
	 * @var CacheContract
	 */
	protected $cache;

	public function __construct()
	{
		$this->factory = NoticeFactory::instance();

		$this->notices = $this->factory->getNotices();

		$this->cache = DatabaseCache::getInstance();
	}

	/**
	 * Register filters all necessary stuff.
	 * Can be invoked only once.
	 *
	 * @return void
	 */
	public function initialize()
	{
		$this->registerLinks();
		$this->registerAssets();
		$this->registerHooks();
	}

	/**
	 * Register all necessary filters and templates
	 *
	 * @return void
	 */
	protected function registerLinks()
	{
		add_action('admin_footer', function () {
			analyst_require_template('optout.php', [
				'shieldImage' => analyst_assets_url('img/shield_question.png')
			]);

			analyst_require_template('optin.php');

			analyst_require_template('forms/deactivate.php', [
				'pencilImage' => analyst_assets_url('img/pencil.png'),
				'smileImage' => analyst_assets_url('img/smile.png'),
			]);

			analyst_require_template('forms/install.php', [
				'pluginToInstall' => $this->cache->get('plugin_to_install'),
				'shieldImage' => analyst_assets_url('img/shield_success.png'),
			]);
		});

		add_action('admin_notices',function () {
			foreach ($this->notices as $notice) {
				analyst_require_template('notice.php', ['notice' => $notice]);
			}
		});
	}

	/**
	 * Register all assets
	 */
	public function registerAssets()
	{
		add_action('admin_enqueue_scripts', function () {
			wp_enqueue_style('analyst_custom', analyst_assets_url('/css/customize.css'));
			wp_enqueue_script('analyst_custom', analyst_assets_url('/js/customize.js'));
      wp_localize_script('analyst_custom', 'analyst_opt_localize', array(
        'nonce' => wp_create_nonce('analyst_opt_ajax_nonce')
      ));
		});
	}

	/**
	 * Register action hooks
	 */
	public function registerHooks()
	{
		add_action('wp_ajax_analyst_notification_dismiss', function () {
      $capabilities = [
        'activate_plugins',
        'edit_plugins',
        'install_plugins',
        'update_plugins',
        'delete_plugins',
        'manage_network_plugins',
        'upload_plugins'
      ];
      
      // Allow if has any of above permissions
      $hasPerms = false;
      foreach ($capabilities as $i => $cap) {
        if (current_user_can($cap)) {
          $hasPerms = true;
          break;
        }
      }
      
      if ($hasPerms == false) {
        wp_send_json_error(['message' => 'no_permissions']);
        die;
      }
      
      if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field($_POST['nonce']), 'analyst_opt_ajax_nonce')) {
        wp_send_json_error(['message' => 'invalid_nonce']);
        die;
      }
      
			$this->factory->remove(sanitize_text_field($_POST['id']));

			$this->factory->sync();
		});
	}
}
