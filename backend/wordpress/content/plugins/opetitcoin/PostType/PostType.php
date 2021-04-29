<?php

namespace OpetitCoin\PostType;

class PostType
{
    static public function register()
    {
        $labels = static::POST_TYPE_LABELS;

        register_post_type(
            static::POST_TYPE_KEY,
            [
                'labels' => $labels,
                'public' => true,
                'hierarchical' => false,
                'menu_icon' => 'dashicons-welcome-write-blog',
                'show_in_rest' => true,
                'supports' => [
                    'title',
                    'editor',
                    'author',
                    'thumbnail',
                    'custom-fields',
                    'comments',
                    'excerpt'
                ],
                'capabilities' => static::CAPABILITIES
            ]
        );
    }

    static public function registerMetas()
    {
        if (static::POST_TYPE_META_KEYS)
        {
            foreach(static::POST_TYPE_META_KEYS as $post_meta_key)
            register_post_meta(
                static::POST_TYPE_KEY,
                $post_meta_key,
                [
                    'show_in_rest' => true
                ]
                );
        }
    }

        /**
     * Add admin caps for the CPT
     
     */
    static public function addAdminCaps()
    {
        // récupération du rôle administrateur
        $adminRole = get_role('administrator');

        // pour chaque capability, on l'ajoute pour l'admin
        foreach(static::CAPABILITIES as $cap => $cptCap) {
            $adminRole->add_cap($cptCap);
        }
    }

    /**
     * Remove admin caps for the CPT
     *
     */
    static public function removeAdminCaps()
    {
        // récupération du rôle administrateur
        $adminRole = get_role('administrator');

        // pour chaque capability, on la supprime pour l'admin
        foreach(static::CAPABILITIES as $cap => $cptCap) {
            $adminRole->remove_cap($cptCap);
        }
    }
    static public function new_excerpt_length($length)
    {
        return 10;
    }
       
}