<?php

namespace OpetitCoin\Rest;

use OpetitCoin\CommentType\CommentType;
use OpetitCoin\PostType\ToilettePostType;


class RestFields
{
    static public function registerFeaturedMediaUrlField()
    {
        register_rest_field(
            ToilettePostType::POST_TYPE_KEY,
            'featured_media_url',
            [
                'get_callback' => [self::class, 'getFeaturedMediaUrl'] 
                
                // 'update_callback' => ... // méthode pour la modification
            ]
        );
    }

    static public function getFeaturedMediaUrl($post)
    {
        if (!get_the_post_thumbnail_url($post['id'])) {

            $picture = 'https://images.assetsdelivery.com/compings_v2/iimages/iimages1812/iimages181200641.jpg';
        }

        else {

            $picture = get_the_post_thumbnail_url($post['id']);
        }
        return $picture;
    }

    static public function registerMetaFields()
    {
        // si on a des meta
        if (ToilettePostType::POST_TYPE_META_KEYS) {
            // pour chaque meta
            foreach (ToilettePostType::POST_TYPE_META_KEYS as $post_meta_key) {
                register_rest_field(
                    // la meta courante
                    ToilettePostType::POST_TYPE_KEY,
                    $post_meta_key,
                    [
                        // callback d'ajout / édition de toilette
                        'update_callback' => function ($value, $post, $meta_key) {
                            // $value => valeur de la meta
                            // $post => objet de la toilette courante
                            // $meta_key => clé de la meta
                            update_post_meta($post->ID, $meta_key, $value);
                        }
                    ]
                );
            }
        }
    }
        static public function registerMetaCommentsFields()
        {
            // si on a des meta
            if (CommentType::COMMENT_TYPE_META_KEYS) {
                // pour chaque meta
                foreach (CommentType::COMMENT_TYPE_META_KEYS as $post_meta_key) {
                    register_rest_field(
                        // la meta courante
                        CommentType::COMMENT_TYPE_KEY,
                        $post_meta_key,
                        [
                            // callback d'ajout / édition de toilette
                            'update_callback' => function ($value, $post, $meta_key) {
                                // $value => valeur de la meta
                                // $post => objet de la toilette courante
                                // $meta_key => clé de la meta
                                update_post_meta($post->ID, $meta_key, $value);
                            }
                        ]
                    );
                }
            }
    }


}