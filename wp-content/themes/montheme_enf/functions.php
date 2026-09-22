<?php
/**
 * Fonctions à mettre dans le fichier functions.php
 * du dossier de thème enfant.
 *
 * Ceci charge correctement les styles du thème parent et enfant
 */

// Empêcher l'accès direct au fichier
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Enqueue les styles du thème parent et enfant
 * Méthode recommandée par WordPress
 */
function charger_styles_theme_enfant() {
    // Obtenir le nom du répertoire du thème parent
    $theme_parent = get_template();

    // Charger le style du thème parent
    wp_enqueue_style(
        $theme_parent . '-style',
        get_template_directory_uri() . '/style.css',
        array(),
        wp_get_theme()->parent()->get('Version') // Version du thème parent
    );

    // Charger le style du thème enfant (dépend du style parent)
    wp_enqueue_style(
        get_stylesheet() . '-style',
        get_stylesheet_uri(),
        array($theme_parent . '-style'), // Dépendance du style parent
        wp_get_theme()->get('Version') // Version du thème enfant
    );
}

// Hook pour charger les styles avec la bonne priorité
add_action('wp_enqueue_scripts', 'charger_styles_theme_enfant', 15);

/**
 * Version alternative si le thème parent utilise un nom de handle spécifique
 * Décommentez cette fonction si la méthode ci-dessus ne fonctionne pas
 */

function charger_styles_theme_enfant_alternatif() {
    // Charger le style du thème parent avec un handle générique
    wp_enqueue_style(
        'parent-style',
        get_template_directory_uri() . '/style.css',
        array(),
        filemtime(get_template_directory() . '/style.css') // Timestamp pour le cache
    );

    // Charger le style du thème enfant
    wp_enqueue_style(
        'child-style',
        get_stylesheet_uri(),
        array('parent-style'),
        filemtime(get_stylesheet_directory() . '/style.css') // Timestamp pour le cache
    );
}
add_action('wp_enqueue_scripts', 'charger_styles_theme_enfant_alternatif', 15);


/**
 * Fonction pour vérifier que le thème enfant est correctement configuré
 * Utile pour le débogage
 */
function verifier_theme_enfant() {
    if (is_child_theme()) {
        // Le thème enfant est actif
        $theme_enfant = wp_get_theme();
        $theme_parent = $theme_enfant->parent();

        // Ajouter des informations en commentaire HTML (visible dans le code source)
        echo "\n<!-- Thème enfant actif: " . $theme_enfant->get('Name') . " v" . $theme_enfant->get('Version') . " -->\n";
        echo "<!-- Thème parent: " . $theme_parent->get('Name') . " v" . $theme_parent->get('Version') . " -->\n";
    }
}
add_action('wp_head', 'verifier_theme_enfant');

/**
 * Support pour les fonctionnalités du thème
 * Ajoutez ici les supports nécessaires si le thème parent ne les inclut pas
 */
function support_theme_enfant() {
    // Exemples de supports (décommentez selon vos besoins)
    // add_theme_support('post-thumbnails');
    // add_theme_support('custom-logo');
    // add_theme_support('title-tag');
    // add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
}
add_action('after_setup_theme', 'support_theme_enfant');
?>