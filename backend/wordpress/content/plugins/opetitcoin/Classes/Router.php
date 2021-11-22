<?php

namespace OpetitCoin\Classes;

use OpetitCoin\Taxonomy\DepartmentTaxonomy;

class Router
{

    static public function init()
    {
        // si l'URL courante est /moderator/dashboard, afficher le template moderator-location.php
        // 2e argument : URL réelle correspondant à la "fausse URL" de l'argument 1 
        // ajout de la réécriture = on permet à WP de reconnaître notre URL custom :  
        // le $ à la fin de la regex du 1e argument signifie la fin de la chaîne = on veut traiter les url contenant "developer/dashboard" EN FIN DE CHAÎNE seulement
        add_rewrite_rule('moderator/dashboard$', 'index.php?opetitcoin-page=moderator-dashboard', 'top');
        add_rewrite_rule('moderator/dashboard/update-department$', 'index.php?opetitcoin-page=update-department', 'top');
        add_rewrite_rule('moderator/dashboard/delete-department$', 'index.php?opetitcoin-page=delete-department', 'top');

        // on réécrit les url de type /author/xxx par /developer/xxx
        global $wp_rewrite;
        $wp_rewrite->author_base = 'moderator';

        // Autoriser notre query var (paramètre d'URL) custom dans WP
        add_filter('query_vars', function ($query_vars) {
            $query_vars[] = 'opetitcoin-page'; // on rajoute notre propre query var en tant que query var autorisée

            // on return le tableau $query_vars
            return $query_vars;
        });

        // Surcharger le choix de template fait par WP
        // $template contient le chemin vers le fichier de template que WP comptait charger si on ne l'avait pas interrompu
        add_action('template_include', function ($template) {
            // on vérifie si notre query var custom est présente et a une valeur qu'on connaît
            // pour lire une query var, on utilise get_query_var()

            if (get_query_var('opetitcoin-page') == 'developer-dashboard') {

                // on récupère le user connecté
                $user = wp_get_current_user();

                // si il n'est pas développeur ou s'il n'est pas connecté
                if (!in_array('moderator', $user->roles) || !is_user_logged_in()) {
                    wp_redirect(wp_login_url());
                    exit;
                }

                // si la méthode HTTP (= le verbe de la requête) est POST => on vient de soumettre le formulaire, on doit traiter les données transmises
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // enregistrer les données de l'utilisateur fournies par $_POST
                    wp_update_user([
                        'ID' => get_current_user_id(), // on donne l'id de l'utilisateur à modifier
                        'first_name' => $_POST['user_firstname'],
                        'last_name' => $_POST['user_lastname'],
                        'description' => $_POST['user_bio'],
                        'user_url' => $_POST['user_url'],
                        'nickname' => $_POST['user_username'],
                        'user_email' => $_POST['user_email']
                    ]);

                    update_user_meta(
                        get_current_user_id(),
                        'github_url',
                        $_POST['user_github_url']
                    );

                    // on redirige vers la page developer/dashboard (mais en GET) => si l'utilisateur rafraîchit, on ne resoumettra pas le formulaire (on rafraîchira la requête GET et non POST)
                    wp_redirect(home_url('moderator/dashboard'));
                    exit(); // on empêche le reste du code de s'exécuter, on laisse la redirection se faire tout de suite.
                }

                // pas de POST donc GET (affichage de la page)
                global $oProfileCurrentUser;
                // on récupère l'utilisateur connecté et on le place dans une variable globale (=> utilisable dans le template)
                $oProfileCurrentUser = wp_get_current_user();
                // si c'est le cas, on réagit en conséquence
                return plugin_dir_path(OPETITCOIN_TEMPLATES_DIR) . '/templates/moderator-location.php';
            } else if (get_query_var("opetitcoin-page") == "update-department") {

                // on récupère le user connecté
                $user = wp_get_current_user();
                // si il n'est pas développeur ou s'il n'est pas connecté
                if (!in_array('moderator', $user->roles) || !is_user_logged_in()) {
                    wp_redirect(wp_login_url());
                    exit;
                }

                // si notre requête est de type POST => on soumet le formulaire d'ajout de techno sur le dashboard
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    // prendre en charge le formulaire => ajouter la techno au dev

                    // on récupère l'id du developer associé à l'utilisateur courant
                    $userObject = get_userdata(get_current_user_id());

                    Database::addLocationByModerator(
                        $userObject->ID,
                        $_POST['department_id'],
                        $_POST['postal_code']
                    );
                }

                // liste de toutes les technos
                global $technologiesList;
                $technologiesList = get_terms(
                    [
                        'taxonomy' => 'département',
                        'hide_empty' => false
                    ]
                );

                // liste des technos du dev connecté
                global $currentDeveloperTechnologies;
                $currentDeveloperTechnologies = Database::getLocationForModerator(get_current_user_id());

                return plugin_dir_path(OPETITCOIN_TEMPLATES_DIR) . '/templates/moderator-department.php';
            } else if (get_query_var("opetitcoin-page") == "delete-department") {
                // il faut vérifier que les données attendues sont présentes, ici l'id de la techno
                if (!isset($_GET['department_id'])) {
                    // on redirige vers le dashboard
                    wp_redirect(home_url('moderator/dashboard'));
                    exit();
                }

                // on récupère l'id du post du developer associé à l'utilisateur courant
                $userObject = get_userdata(get_current_user_id());
                $departmentId = $_GET['department_id'];
                // on fait la suppression en base en fournissant l'id de la techno et l'id du post de developer
                Database::deleteLocationFromModerator(
                    $userObject->ID,
                    $departmentId
                );

                // on redirige vers le dashboard
                wp_redirect(home_url('moderator/dashboard/update-technologies'));
                exit();
            } else {
                // sinon, on laisse WP faire
                return $template;
            }
        });
    }
}
