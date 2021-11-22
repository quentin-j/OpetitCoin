<?php

namespace OpetitCoin\PostType;

class LocationPostType extends PostType
{
    const POST_TYPE_LABELS = [
        'name' => 'localisation',
        'singular_name' => 'localisation',
        'edit_item' => 'Modifier une localisation',
        'search_item' => 'Rechercher une localisation'
    ];

    const POST_TYPE_KEY = 'location';

    const CAPABILITIES = [
        'edit_posts' => 'edit_locations',
        'publish_posts' => 'publish_locations',
        'read_post' => 'read_location',
        'delete_post' => 'delete_location',
        'edit_others_posts' => 'edit_others_locations',
        'delete_others_posts' => 'delete_others_locations',
        'edit_post' => 'edit_location'
    ];

    const POST_TYPE_META_KEYS = [
        'local'
    ];
}