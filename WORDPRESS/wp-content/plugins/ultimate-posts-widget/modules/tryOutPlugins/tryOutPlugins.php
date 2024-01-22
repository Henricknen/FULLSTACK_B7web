<?php

  /**
   * File for our cool try it out module
   * That allows people to try out any plugin within WP directory
   * Before they install it on their real website, this feature
   * Is completely free and available for everyone
   *
   * @category Child Plugin
   * @version v0.1.3
   * @since v0.1.0
   * @author iClyde <kontakt@iclyde.pl>
   */

  // Namespace
  namespace Inisev\Subs;

  // Disallow direct access
  if (defined('ABSPATH')) {

    /**
     * Main class for handling the Review
     */
    if (!class_exists('Inisev\Subs\Inisev_Try_Out_Plugins')) {
      class Inisev_Try_Out_Plugins {
        
        public $pluginDir;
        public $pluginFile;
        public $pluginName;
        public $pluginPageURL;

        function __construct($plugin_file, $plugin_dir, $plugin_name, $plugin_menu_page) {

          if (!is_admin() || !current_user_can('install_plugins')) return;
          if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            add_action('wp_ajax_tifm_notice_actions', [&$this, 'noticeAjax']);
          }
          
          if (get_option('_tifm_feature_enabled') == 'enabled') {
            update_option('_tifm_force_disable_feature_update', true);
          } else if (get_option('_tifm_force_disable_feature_update', 'no') === 'no') {
            delete_option('_tifm_feature_enabled');
            delete_option('_tifm_hide_notice_forever');
            delete_option('_tifm_disable_feature_forever');
            update_option('_tifm_force_disable_feature_update', true);
          }

          global $pagenow;
          if (!($pagenow == 'plugin-install.php' || $pagenow == 'admin-ajax.php')) return;
          if (get_option('_tifm_disable_feature_forever', false) != false) return;

          $this->pluginDir = $plugin_dir;
          $this->pluginFile = $plugin_file;
          $this->pluginName = $plugin_name;
          $this->pluginPageURL = admin_url($plugin_menu_page) . '&scrollToSection=testPlugins';

          $this->showInformativeNotice();
          $this->insertActionButton();

        }

        public function showInformativeNotice() {

          add_action('in_admin_footer', [&$this, 'tryItOutScript']);

          if (get_option('_tifm_hide_notice_forever', false) != false) return;

          add_action('admin_notices', [&$this, 'informativeAdminNoticeHandler']);
          add_action('admin_head', [&$this, 'noticeStyles']);
          add_action('in_admin_footer', [&$this, 'noticeScripts']);

        }

        public function noticeStyles() {
          ?>

          <style media="screen">
            #tifm_new_feature_notice {
              margin-bottom: 32px;
            }
            
            #tifm_paragraph_notice {
              display: flex;
              flex-direction: row;
              justify-content: space-between;
            }
            
            #tifm_new_feature_notice span {
              line-height: 30px;
            }

            #tifm_new_feature_notice .tifm_poweredby {
              line-height: 30px;
              position: absolute;
              right: 0;
            }

            #tifm_paragraph_notice .tifm_darker_a, #tifm_paragraph_notice .tifm_darker_a_preview {
              color: #555;
            }

            #tifm_paragraph_notice .tifm_darker_a_muted {
              color: #999;
            }

            #tifm_new_feature_notice .tifm_brought_url {
              color: #00a32a;
              text-decoration: none;
            }

            #tifm_paragraph_notice .tifm-grow-1 {
              flex-grow: 1;
            }

            #tifm_paragraph_notice .tifm-grow-2 {
              flex-grow: 2;
              text-align: right;
              padding-right: 15px;
            }

            #tifm_paragraph_notice .tifm-grow-5 {
              flex-grow: 5;
            }
            
            #tifm_paragraph_notice .tifm_btn {
              padding: 6px 18px;
              border-radius: 4px;
              font-size: 14px;
              font-weight: 400;
              text-decoration: none;
              border: 1px solid black;
              transition: 0.3s all;
              opacity: 1;
            }
            
            #tifm_paragraph_notice .tifm_btn_green {
              background: #00a32a;
              color: white;
            }
            
            #tifm_paragraph_notice .tifm_btn_grey {
              background: #d9e3f4;
              margin-left: 15px;
              color: black;
            }
            
            #tifm_paragraph_notice .tifm_btn_green:hover, #tifm_paragraph_notice .tifm_btn_grey:hover {
              opacity: 0.8;
            }
            
            #tifm_paragraph_notice .tifm_btn_green:active, #tifm_paragraph_notice .tifm_btn_grey:active {
              transition: 0 all !important;
              opacity: 0.5;
            }

            @media screen and (max-width: 1400px) {
              #tifm_paragraph_notice {
                flex-direction: column;
              }
            }
          </style>

          <?php
        }

        public function noticeScripts() {
          ?>
          <script type="text/javascript">
            jQuery(document).ready(function($) {

              $('#tifm_new_feature_notice').on('click', '.notice-dismiss', hideAndDismissNotice);

              $('#tifm_new_feature_notice').on('click', '.tifm_darker_a', enableAndDismissNotice);
              
              $('#tifm_new_feature_notice').on('click', '.tifm_darker_a_preview', previewNotice);

              $('#tifm_new_feature_notice').on('click', '.tifm_darker_a_muted', disableFeatureAndDismiss);

              let nonce = "<?php echo wp_create_nonce('tifm_notice_nonce') ?>";

              function hideAndDismissNotice(e) {

                let dismiss = false;
                let enable = false;
                if (typeof e != 'string') {
                  e.preventDefault();
                } else if (e == 'dismiss') {
                  dismiss = true;
                } else if (e == 'enable') {
                  enable = true;
                }

                $('#tifm_new_feature_notice').hide(300);
                setTimeout(function () {
                  $('#tifm_new_feature_notice').remove();
                }, 350);

                let method = 'dismiss_notice';
                if (dismiss == true) {
                  method = 'dismiss_notice_and_disable';
                }
                
                if (enable == true) {
                  method = 'dismiss_notice_and_enable';
                }
                
                if (method == 'dismiss_notice') return;

                $.post(ajaxurl, { action: 'tifm_notice_actions', nonce: nonce, method: method }).done(function () {
                  if (method == 'dismiss_notice_and_disable') {
                    window.location.reload();
                  }
                }).fail(function (e) {
                  alert('Error occurred, please refresh and try again.' + JSON.stringify(e));
                });

              }
              
              let isDisplayed = false;
              function previewNotice(e) {
                
                e.preventDefault();
                if (isDisplayed) return hideNotice(e);
                
                $('#tifmPreviewCSS').remove();
                
                let $style = document.createElement('style');
                    $style.setAttribute('media', 'screen');
                    $style.setAttribute('id', 'tifmPreviewCSS');
                
                $style.innerText = '.tifm-btn{transform:scale(1.0)!important;opacity:1!important;max-height:60px!important;}';
                
                $('head').append($style);
                
                $('.tifm_darker_a_preview').text('Hide preview');
                isDisplayed = true;
                window.tifmObserver = true;
                
              }
              
              function hideNotice(e) {
                
                e.preventDefault();
                if (!isDisplayed) return previewNotice(e);
                
                $('#tifmPreviewCSS').remove();
                
                $('.tifm_darker_a_preview').text('Show me a preview');
                isDisplayed = false;
                window.tifmObserver = false;
                
              }

              function disableFeatureAndDismiss(e) {

                e.preventDefault();
                hideNotice(e);
                hideAndDismissNotice('dismiss');

              }
              
              function enableAndDismissNotice(e) {

                e.preventDefault();
                previewNotice(e);
                hideAndDismissNotice('enable');

              }

            });
          </script>
          <?php
        }

        public function tryItOutScript() {
          ?>
          <script type="text/javascript">
            <?php if (get_option('_tifm_feature_enabled') == 'enabled'): ?>
            window.tifmObserver = true;
            <?php endif; ?>
            jQuery(document).ready(function($) {
              
              function makeButton(slug) {
                
                if (typeof window.tifmObserver == 'undefined' || window.tifmObserver == false) return;

                let a = document.createElement('A');
                    a.classList.add('button');
                    a.classList.add('button-primary');
                    a.classList.add('tifm-btn-iframe');
                    a.classList.add('right');
                    a.style.color = '#fff';
                    a.style.background = '#2d9418';
                    a.style.borderColor = '#2d9418';
                    a.style.boxShadow = 'none';
                    a.style.marginRight = '15px';
                    a.setAttribute('href', 'https://tastewp.com/plugins/' + slug);
                    a.setAttribute('target', '_blank');
                    a.innerText = 'Try it first';

                return a;

              }

              const observer = new MutationObserver(function (mutations_list) {
                mutations_list.forEach(function (mutation) {
                  mutation.addedNodes.forEach(function (added_node) {
                    if (added_node.id == 'TB_window') {
                      $('#TB_window #TB_iframeContent')[0].onload = function () {
                        let iframe = $('#TB_iframeContent').contents();
                        let footer = iframe.find('#plugin-information-footer');
                        let slug = footer.find('#plugin_install_from_iframe').data('slug');
                        let btn = makeButton(slug);
                        footer.append(btn);
                      }
                    }
                  });
                });
              });

              observer.observe(document.querySelector('body'), { subtree: false, childList: true });
              
            });
          </script>
          <?php
        }

        public function informativeAdminNoticeHandler() {

          ?>

            <div class="notice notice-success is-dismissible" id="tifm_new_feature_notice">
              <p id="tifm_paragraph_notice">
                <span class="tifm-grow-1">
                  <b>New: </b> Add a&nbsp;
                  <a class="button" style="color:#2d9418;border-color:#2d9418;text-align:center;width:88px" href="#!">Try it first</a>
                  &nbsp;button to try out plugins before installing on your site.
                </span>

                <span class="tifm-grow-5">
                  <a class="tifm_darker_a tifm_btn tifm_btn_green" href="#">Sounds cool!</a>
                  <a class="tifm_darker_a_preview tifm_btn tifm_btn_grey" href="#">Show me a preview</a>
                </span>

                <span class="tifm-grow-2">
                  <a class="tifm_darker_a_muted" href="#">Not needed, I'm good</a>
                </span>

              </p>
              <span class="tifm_poweredby">
                Brought to you by <a class="tifm_brought_url" href="<?php echo esc_html($this->pluginPageURL); ?>"><?php echo esc_html($this->pluginName); ?></a>
              </span>
            </div>

          <?php

        }

        public function insertActionButton() {

          add_filter('plugin_install_action_links', [&$this, 'actionButtonHandler'], 10, 2);

        }

        public static function noticeAjax() {

          // Nonce verification
          if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field($_POST['nonce']), 'tifm_notice_nonce')) {
            wp_send_json_error();
            return;
          }

          $method = '';
          if (isset($_POST['method'])) {

            $method = sanitize_text_field($_POST['method']);

          }

          if ($method == 'dismiss_notice') {

            update_option('_tifm_hide_notice_forever', true);
            wp_send_json_success();
            exit;

          } else if ($method == 'dismiss_notice_and_enable') {
            
            update_option('_tifm_feature_enabled', 'enabled');
            update_option('_tifm_hide_notice_forever', true);
            delete_option('_tifm_disable_feature_forever');
            wp_send_json_success();
            exit;
            
          } else if ($method == 'dismiss_notice_and_disable') {

            update_option('_tifm_hide_notice_forever', true);
            update_option('_tifm_disable_feature_forever', true);
            update_option('_tifm_feature_enabled', 'disabled');
            wp_send_json_success();
            exit;

          } else {

            wp_send_json_error();
            exit;

          }

        }

        public function actionButtonHandler($links, $plugin) {

          $url = 'https://tastewp.com/plugins/' . $plugin['slug'] . '/?anchor=wpsite';
          $css = 'style="transition: 0.4s all;transform: scale(0.0);opacity:0;max-height:0px;"';
          
          if (get_option('_tifm_feature_enabled') == 'enabled') {
            $css = '';
          }
          
          $button = ['<div class="tifm-btn" ' . $css . '><a class="button" style="color:#2d9418;border-color:#2d9418;text-align:center;width:88px;" target="_blank" href="' . $url . '">Try it first</a></div>'];
          array_splice($links, 1, 0, $button);

          return $links;

        }

      }
    }

  }
