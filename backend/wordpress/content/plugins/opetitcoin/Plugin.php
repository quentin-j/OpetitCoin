<?php

namespace OpetitCoin;

use OpetitCoin\PostType\ToilettePostType;

use OpetitCoin\Taxonomy\PlaceTaxonomy;
use OpetitCoin\Taxonomy\UtilTaxonomy;
use OpetitCoin\Taxonomy\GoldenBowlTaxonomy;

use OpetitCoin\Role\ModerateRole;
use OpetitCoin\Role\PooperRole;

define('TOILETTE_POST_TYPE_CLASS', 'OpetitCoin\PostType\ToilettePostType');
define('REST_FIELD_CLASS', 'OpetitCoin\Rest\RestFields');
define('COMMENT_TYPE_CLASS', 'OpetitCoin\CommentType\CommentType');

class Plugin
{
    /**
     * run the plugin
     *
     * @return void
     */
    static public function run()
    {
        // activate/deactivate plugin
       register_activation_hook(OPETITCOIN_PLUGIN_FILE, [self::class, 'onPluginActivation']);
       register_deactivation_hook(OPETITCOIN_PLUGIN_FILE, [self::class, 'onPluginDeactivation']);
        // relate PostType
       add_action('init', [TOILETTE_POST_TYPE_CLASS, 'register']);
       add_action('init', [TOILETTE_POST_TYPE_CLASS, 'registerMetas']);
       add_filter('excerpt_length', [TOILETTE_POST_TYPE_CLASS, 'new_excerpt_length']);
       // relate restfield/meta(acf ?)
       add_action('rest_api_init', [REST_FIELD_CLASS, 'registerFeaturedMediaUrlField']);
       add_action('rest_api_init', [REST_FIELD_CLASS, 'registerMetaFields']);
       add_action('acf/save_post', [REST_FIELD_CLASS, 'registerMetaCommentsFields']);
       // CommentType
       add_action('init', [COMMENT_TYPE_CLASS, 'registerMetas']);
       add_action('acf/save_post', [COMMENT_TYPE_CLASS, 'register_comment_field']);

       // relate Taxonomy
       add_action('init', [self::class, 'registerTaxonomies']);
       // relate user (plugin)
       add_action('wp_rest_user_user_register', ['\OpetitCoin\Role\PooperRole', 'user_registered']);
       
    }

    /**
     * add rôle
     *
     * @return void
     */
    static public function addRoles()
    {
        ModerateRole::add();
        PooperRole::add();
        ToilettePostType::addAdminCaps();
    }

    /**
     * remove rôle
     *
     * @return void
     */
    static public function removeRoles()
    {
        ModerateRole::remove();
        PooperRole::remove();
    }

    static public function registerTaxonomies()
    {
        PlaceTaxonomy::register();
        UtilTaxonomy::register();
        GoldenBowlTaxonomy::register();
    }

    static public function addCaps()
    {
        ToilettePostType::addAdminCaps();
        PlaceTaxonomy::addAdminCapabilities();        
        UtilTaxonomy::addAdminCapabilities();
        GoldenBowlTaxonomy::addAdminCapabilities();
    }

    static public function removeCaps()
    {
        ToilettePostType::removeAdminCaps();
        PlaceTaxonomy::removeAdminCapabilities();        
        UtilTaxonomy::removeAdminCapabilities();
        GoldenBowlTaxonomy::removeAdminCapabilities();
    }

        /**
     * on activation plugins
     *
     * @return void
     */
    static public function onPluginActivation()
    {
        self::addRoles();
        self::registerTaxonomies();
        self::addCaps();
        flush_rewrite_rules();
    }

    /**
     * on deactivation plugin
     *
     * @return void
     */
    static public function onPluginDeactivation()
    {
        self::removeRoles();
        self::removeCaps();
        flush_rewrite_rules();

    }

}