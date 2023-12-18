<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit;  

// functions.php is empty so you can easily track what code is needed in order to Vite + Tailwind JIT run well


// Main switch to get frontend assets from a Vite dev server OR from production built folder
// it is recommended to move it into wp-config.php
define('IS_VITE_DEVELOPMENT', true);


include "inc/inc.vite.php";

function enregistrer_parametres_logo() {
    register_setting('logo_theme', 'logo_image');
}
add_action('admin_init', 'enregistrer_parametres_logo');

function afficher_page_configuration_theme() {
    ?>
    <div class="wrap">
        <h2>Configuration du thème</h2>
        <form method="post" action="options.php">
            <?php
            settings_fields('logo_theme');
            do_settings_sections('logo_theme');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

function ajouter_page_configuration_theme() {
    $logo_image = get_option('logo_image');
    ?>
    <input type="hidden" id="logo_image" name="logo_image" value="<?php echo esc_attr($logo_image); ?>" />
    <input type="button" id="uploader_button" class="button" value="Sélectionner une image" />
    <span id="logo_preview">
        <?php if ($logo_image) : ?>
            <img src="<?php echo esc_url(wp_get_attachment_url($logo_image)); ?>" alt="Logo" style="max-width: 200px; height: auto;" />
        <?php endif; ?>
    </span>
    <script>
        jQuery(document).ready(function($) {
            $('#uploader_button').click(function(e) {
                e.preventDefault();
                var custom_uploader = wp.media({
                    title: 'Sélectionner une image',
                    button: {
                        text: 'Choisir une image'
                    },
                    multiple: false
                });
                custom_uploader.on('select', function() {
                    var attachment = custom_uploader.state().get('selection').first().toJSON();
                    $('#logo_image').val(attachment.id);
                    $('#logo_preview').html('<img src="' + attachment.url + '" alt="Logo" style="max-width: 200px; height: auto;" />');
                });
                custom_uploader.open();
            });
        });
    </script>
    <?php
}


function ajouter_page_configuration_theme_menu() {
    add_menu_page(
        'Configuration du thème',   // Titre de la page
        'Configuration du thème',   // Texte du menu
        'manage_options',           // Capacité requise pour accéder à la page
        'configuration-theme',      // Slug de la page
        'afficher_page_configuration_theme' // Fonction pour afficher la page
    );

    add_settings_field('logo_image', 'Logo du site', 'afficher_champ_logo', 'logo_theme', 'logo_theme');
}

function ajouter_page_configuration_theme_settings() {
    add_settings_field('logo_image', 'Logo du site', 'afficher_champ_logo', 'logo_theme', 'logo_theme');
}

add_action('admin_menu', 'ajouter_page_configuration_theme_menu');
add_action('admin_menu', 'ajouter_page_configuration_theme_settings');
