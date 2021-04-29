<?php

namespace OpetitCoin\Taxonomy;

class UtilTaxonomy extends Taxonomy
{
    const TAXONOMY_LABELS = [
        'name' => 'Utilisateurs',
        'singular_name' => 'utilisateur',
        'add_new_item' => 'Ajouter un nouveau utilisateur'
    ];

    const TAXONOMY_KEY = 'utilisateur';

    const CAPABILITIES = [
        'manage_terms' => 'manage_utilisateurs',
        'edit_terms' => 'edit_utilisateurs',
        'delete_terms' => 'delete_utilisateurs',
        'assign_terms' => 'assign_utilisateurs'
    ];

    const REST_BASE = 'toilette_utilisateurs';

    const HIERARCHICAL = true;
}