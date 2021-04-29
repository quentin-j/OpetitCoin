<?php
namespace OpetitCoin\Taxonomy;

class DepartmentTaxonomy extends Taxonomy
{
    const TAXONOMY_LABELS = [
        'name' => 'département',
        'singular_name' => 'département',
        'add_new_item' => 'Ajouter un département'
    ];

    const TAXONOMY_KEY = 'department';

    const CAPABILITIES = [
        'manage_terms' => 'manage_departments',
        'edit_terms' => 'edit_departments',
        'delete_terms' => 'delete_departments',
        'assign_terms' => 'assign_departments'
    ];

    const REST_BASE = self::TAXONOMY_KEY;

    const HIERARCHICAL = false;
}