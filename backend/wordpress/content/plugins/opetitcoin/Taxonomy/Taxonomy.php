<?php

namespace OpetitCoin\Taxonomy;

use OpetitCoin\PostType\ToilettePostType;

class Taxonomy
{

    /**
     * Register a taxonomy
     *
     */
    static public function register()
    {

        $labels = static::TAXONOMY_LABELS;

        register_taxonomy(
            static::TAXONOMY_KEY,
            // pour le moment, on a qu'un CPT principal, on l'appel direct ici, demain, si on a des taxos pour plusieurs CPT, on remplace par une constante
            ToilettePostType::POST_TYPE_KEY,
            [
                'labels' => $labels,
                'public' => true,
                'show_in_rest' => true,
                'capabilities' => static::CAPABILITIES,
                'rest_base' => static::REST_BASE,
                'hierarchical' => static::HIERARCHICAL 
            ]
        );

    }

    /**
     * Add admin caps
     *
     */
    static public function addAdminCapabilities()
    {
        $adminRole = get_role('administrator');
        foreach(static::CAPABILITIES as $cap => $custom_cap){
            $adminRole->add_cap($custom_cap);
        }
    }

    /**
     * Remove admin caps
     *
     */
    static public function removeAdminCapabilities()
    {
        $adminRole = get_role('administrator');
        foreach(static::CAPABILITIES as $cap => $custom_cap){
            $adminRole->remove_cap($custom_cap);
        }
    }

}