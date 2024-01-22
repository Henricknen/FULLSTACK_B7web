<?php

require_once 'sdk_resolver.php';

/**
 * Initialize analyst "private"
 *
 * @param array $options
*/
if (!function_exists('___analyst_init')) {
  function ___analyst_init($options) {
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
      return;
    }
    
    // Try resolve latest supported SDK
    // In case resolving is failed exit the execution
    try {
      analyst_resolve_sdk($options['base-dir']);
    } catch (Exception $exception) {
      // error_log('[ANALYST] Cannot resolve any supported SDK');
      return;
    }

    try {
      global /** @var Analyst\Analyst $analyst */
      $analyst;

      // Set global instance of analyst
      if (!$analyst) {
        $analyst = Analyst\Analyst::getInstance();
      }

      $analyst->registerAccount(new Account\Account($options['client-id'], $options['client-secret'], $options['base-dir']));
    } catch (Exception $e) {
      // error_log('Analyst SDK receive an error: [' . $e->getMessage() . '] Please contact our support at support@analyst.com');
    }
  }
}
  
  
if (!function_exists('analyst_init')) {
	function analyst_init($__options) {
    if (did_action('init') > 0 && function_exists('current_user_can')) ___analyst_init($__options);
    else {
      add_action('init', function () use ($__options) {
        ___analyst_init($__options);
      }, -1000);
    }
	}
}
