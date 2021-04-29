<?php

namespace OpetitCoin\PostType;

class ToilettePostType extends PostType
{
    const POST_TYPE_LABELS = [
        'name' => 'Toilettes',
        'singular_name' => 'Toilette',
        'edit_item' => 'Modifier une toilette',
        'search_item' => 'Rechercher une toilette'
    ];

    const POST_TYPE_KEY = 'toilette';

    const CAPABILITIES = [
        'edit_posts' => 'edit_toilettes',
        'publish_posts' => 'publish_toilettes',
        'read_post' => 'read_toilette',
        'delete_post' => 'delete_toilette',
        'edit_others_posts' => 'edit_others_toilettes',
        'delete_others_posts' => 'delete_others_toilettes',
        'edit_post' => 'edit_toilette'
    ];

    const POST_TYPE_META_KEYS = [
        'local'
    ];
}