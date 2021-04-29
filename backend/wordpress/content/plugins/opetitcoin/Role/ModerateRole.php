<?php

namespace OpetitCoin\Role;

class ModerateRole extends Role
{
    const ROLE_KEY = 'moderator';  
    const ROLE_NAME = 'moderateur'; 
    const ROLE_CAPABILITIES = [
        'read' => true,
        'edit_posts' => true,   // capabilities à redéfinir
        'upload_files' => true,
        'edit_other_posts' => true,
        'edit_comment' => true,
        'delete_posts' => true,
        'list_users' => true,
        'manage_utilisateurs' => true,
        'remove_users' => true,
        'delete_users' => true,

        'edit_utilisateurs' => true,
        'delete_utilisateurs' => true,
        'assign_utilisateurs' => true,
        'manage_places' => true,
        'edit_places' => true,
        'delete_places' => true,
        'assign_places' => true,
        'manage_cuvettes' => true,
        'edit_cuvettes' => true,
        'delete_cuvettes' => true,
        'assign_cuvettes' => true,

        'edit_toilettes' => true,
        'publish_toilettes'=> true,
        'read_toilette' => true,
        'delete_toilette' => true,
        'edit_others_toilettes' => true,
        'delete_others_toilettes' => true,
        'edit_toilette' => true
    ];
}