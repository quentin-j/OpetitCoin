<?php

namespace OpetitCoin\Taxonomy;

class GoldenBowlTaxonomy extends Taxonomy
{
    const TAXONOMY_LABELS = [
        'name' => 'cuvettes',
        'singular_name' => 'cuvette',
        'add_new_item' => 'Ajouter une cuvette'
    ];

    const TAXONOMY_KEY = 'cuvette';

    const CAPABILITIES = [
        'manage_terms' => 'manage_cuvettes',
        'edit_terms' => 'edit_cuvettes',
        'delete_terms' => 'delete_cuvettes',
        'assign_terms' => 'assign_cuvettes'
    ];

    const REST_BASE = self::TAXONOMY_KEY;

    const HIERARCHICAL = false;
}