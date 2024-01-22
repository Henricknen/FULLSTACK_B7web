<?php

  /**
   * Main renderer for the Carousel
   *
   * @category Child Plugin
   * @author iClyde <kontakt@iclyde.pl>
   */

  // Namespace
  namespace Inisev\Subs;

  // Disallow direct access
  if (!defined('ABSPATH')) exit;
?>
<div class="etw-carousel-ad-wrapper" style="display: none;">
  <div class="etw-carousel-ad-close-element">
    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
       viewBox="0 0 252 252" style="enable-background:new 0 0 252 252;" xml:space="preserve" fill="white">
    <g>
      <path d="M126,0C56.523,0,0,56.523,0,126s56.523,126,126,126s126-56.523,126-126S195.477,0,126,0z M126,234
        c-59.551,0-108-48.449-108-108S66.449,18,126,18s108,48.449,108,108S185.551,234,126,234z"/>
      <path d="M164.612,87.388c-3.515-3.515-9.213-3.515-12.728,0L126,113.272l-25.885-25.885c-3.515-3.515-9.213-3.515-12.728,0
        c-3.515,3.515-3.515,9.213,0,12.728L113.272,126l-25.885,25.885c-3.515,3.515-3.515,9.213,0,12.728
        c1.757,1.757,4.061,2.636,6.364,2.636s4.606-0.879,6.364-2.636L126,138.728l25.885,25.885c1.757,1.757,4.061,2.636,6.364,2.636
        s4.606-0.879,6.364-2.636c3.515-3.515,3.515-9.213,0-12.728L138.728,126l25.885-25.885
        C168.127,96.601,168.127,90.902,164.612,87.388z"/>
    </g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    <g></g>
    </svg>
  </div>
  <div class="etw-carousel-ad-element">
    <section class="ci-carrinis-wrapper" id="top_level_carrinis">
      <section class="ci-carrinis" id="carrinis">
        <div class="ci-carousel">
          <?php $this->_include('static/tabs'); ?>
          <div class="ci-project-content">
            <?php

              $bmi_free = $this->is_plugin_installed($this->bmi_slug);
              $bmi_pro = $this->is_plugin_installed($this->bmi_premium);
              $bmi_state = (!$bmi_free || (!$bmi_free && $bmi_pro)) ? 'install' : (($bmi_free && !$bmi_pro) ? 'upgrade' : 'already-installed')

            ?>
            <div class="ci-project ci-project-BackupMigration <?php echo 'ci-'.$bmi_state.'-state-visible'; ?>">
              <?php

                if (!$bmi_free || (!$bmi_free && $bmi_pro)) {
                  $this->_include('projects/bmi/install');
                } elseif ($bmi_free && !$bmi_pro) {
                  $this->_include('projects/bmi/upgrade');
                } elseif ($bmi_free && $bmi_pro) {
                  $this->_include('projects/bmi/installed');
                }

              ?>
              <div class="ci-right-part">
                <img src="<?php $this->_asset('/projects/bmi/imgs/background-images.png'); ?>" class="ci-main-image">
              </div>
            </div>
            <?php

              $mpu_plugin = $this->is_plugin_installed($this->mpu_slug);
              $mpu_state = $mpu_plugin ? 'already-installed' : 'install';

            ?>
            <div class="ci-project ci-project-MyPopups <?php echo 'ci-'.$mpu_state.'-state-visible'; ?>">
              <?php

                if ($mpu_plugin) {
                  $this->_include('projects/mpu/installed');
                } else {
                  $this->_include('projects/mpu/install');
                }

              ?>
              <div class="ci-right-part">
                <img src="<?php $this->_asset('/projects/mpu/imgs/background-images.png'); ?>" class="ci-main-image">
                <img src="<?php $this->_asset('/projects/mpu/imgs/background-texture-green.png'); ?>" class="ci-secondary-image">
              </div>
            </div>
            <?php

              $cdp_free = $this->is_plugin_installed($this->cdp_slug);
              $cdp_pro = $this->is_plugin_installed($this->cdp_premium);
              $cdp_state = (!$cdp_free || (!$cdp_free && $cdp_pro)) ? 'install' : (($cdp_free && !$cdp_pro) ? 'upgrade' : 'already-installed');

            ?>
            <div class="ci-project ci-project-CopyDeletePosts <?php echo 'ci-'.$cdp_state.'-state-visible'; ?>">
              <?php

                if (!$cdp_free || (!$cdp_free && $cdp_pro)) {
                  $this->_include('projects/cdp/install');
                } elseif ($cdp_free && !$cdp_pro) {
                  $this->_include('projects/cdp/upgrade');
                } elseif ($cdp_free && $cdp_pro) {
                  $this->_include('projects/cdp/installed');
                }

              ?>
              <div class="ci-right-part">
                <img src="<?php $this->_asset('/projects/cdp/imgs/secondary-background-image.svg'); ?>" class="ci-secondary-image">
                <img src="<?php $this->_asset('/projects/cdp/imgs/main-background-image.png'); ?>" class="ci-main-image">
              </div>
            </div>
            <?php

              $redi_plugin = $this->is_plugin_installed($this->redi_slug);
              $redi_state = $redi_plugin ? 'already-installed' : 'install';

            ?>
            <div class="ci-project ci-project-redRed ci-<?php echo $redi_state; ?>-state-visible">
              <?php
                if ($redi_state == 'install') {
                  $this->_include('projects/red/install');
                } else {
                  $this->_include('projects/red/installed');
                }
              ?>
            </div>
            <div class="ci-project ci-project-TasteWP ci-install-state-visible">
              <?php $this->_include('projects/twp/install'); ?>
              <div class="ci-right-part">
                <img src="<?php $this->_asset('/projects/twp/imgs/background-image-1.svg'); ?>">
                <img src="<?php $this->_asset('/projects/twp/imgs/background-image-2.svg'); ?>">
                <img src="<?php $this->_asset('/projects/twp/imgs/background-image-3.svg'); ?>">
              </div>
            </div>
            <?php

              $usm_free = $this->is_plugin_installed($this->usm_slug);
              $usm_pro = $this->is_plugin_installed($this->usm_premium);
              $usm_state = (!$usm_free || (!$usm_free && $usm_pro)) ? 'install' : (($usm_free && !$usm_pro) ? 'upgrade' : 'already-installed');

            ?>
            <div class="ci-project ci-project-SocialShare <?php echo 'ci-'.$usm_state.'-state-visible'; ?>">
              <?php

                if (!$usm_free || (!$usm_free && $usm_pro)) {
                  $this->_include('projects/usm/install');
                  $this->_include('projects/usm/part-install');
                } elseif ($usm_free && !$usm_pro) {
                  $this->_include('projects/usm/upgrade');
                  $this->_include('projects/usm/part-upgrade');
                } elseif ($usm_free && $usm_pro) {
                  $this->_include('projects/usm/part-install');
                  $this->_include('projects/usm/installed');
                }

              ?>
            </div>
            <div class="ci-project ci-project-followIt ci-install-state-visible">
              <?php $this->_include('projects/fit/install'); ?>
            </div>
          </div>
        </div>
        <div class="ci-all-projects">
          <a class="ci-see-all-projects" href="https://inisev.com/?utm_source=plugin_widgets&utm_campaign=ETW&utm_medium=carrousel" target="_blank">See all projects</a>
        </div>
      </section>
    </section>
  </div>
</div>
