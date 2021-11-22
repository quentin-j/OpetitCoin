<?php

namespace OpetitCoin\Taxonomy;

use OpetitCoin\PostType\ToilettePostType;

class PlaceTaxonomy extends Taxonomy
{
    const TAXONOMY_LABELS = [
        'name' => 'places',
        'singular_name' => 'place',
        'add_new_item' => 'Ajouter une place'
    ];

    const TAXONOMY_KEY = 'place';

    const CAPABILITIES = [
        'manage_terms' => 'manage_places',
        'edit_terms' => 'edit_places',
        'delete_terms' => 'delete_places',
        'assign_terms' => 'assign_places'
    ];

    const REST_BASE = self::TAXONOMY_KEY;

    const RELATED_CPT_LIST = [ToilettePostType::POST_TYPE_KEY];

    const HIERARCHICAL = false;
}