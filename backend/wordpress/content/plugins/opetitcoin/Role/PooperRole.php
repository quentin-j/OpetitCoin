<?php

namespace OpetitCoin\Role;

class PooperRole extends Role
{
    const ROLE_KEY = 'pooper';  
    const ROLE_NAME = 'pooper'; 
    const ROLE_CAPABILITIES = [
        // 'read' => true,
        // 'edit_posts' => true,   // capabilities à redéfinir
        // 'upload_files' => true,
        // 'edit_others_posts' => false,
        // 'edit_comment' => true,
        // 'delete_posts' => false,
        // TEST
        'read' => true,
        'edit_posts' => true, // cette capability concerne l'ensemble des posts (tous les types), à true si on souhaite utiliser Gutenberg
        'upload_files' => true,
        'edit_others_posts' => true,

        'manage_utilisateurs' => false,
        'edit_utilisateurs' => false,
        'delete_utilisateurs' => false,
        'assign_utilisateurs' => true,

        'manage_places' => false,
        'edit_places' => false,
        'delete_places' => false,
        'assign_places' => true,

        'manage_departments' => false,
        'edit_departments' => false,
        'delete_departments' => false,
        'assign_departments' => true,

        'edit_toilettes' => true,
        'publish_toilettes'=> false,
        'read_toilette' => true,
        'delete_toilette' => false,
        'edit_others_toilettes' => false,
        'delete_others_toilettes' => false,
        'edit_toilette' => true
    ];

    public static function user_registered($user)
    {
        $user->set_role(self::ROLE_KEY);
    }
}