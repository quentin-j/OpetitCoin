<?php

namespace OpetitCoin;

/**
 * Plugin Name: O'petitCoin
 * Plugin URI: https://oclock.io
 * Version: 1.0
 * Author: WordPress MM
 * Description: Un projet qui sent bon la rose en spray !
 */

 require __DIR__ . '/vendor/autoload.php';

 define('OPETITCOIN_PLUGIN_FILE', __FILE__);
 define('OPETITCOIN_TEMPLATES_DIR', __DIR__.'/templates/');

 Plugin::run();