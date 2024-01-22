<?php

remove_filter('template_redirect','redirect_canonical');

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit;  

// functions.php is empty so you can easily track what code is needed in order to Vite + Tailwind JIT run well


// Main switch to get frontend assets from a Vite dev server OR from production built folder
// it is recommended to move it into wp-config.php
define('IS_VITE_DEVELOPMENT', false);


include "inc/inc.vite.php";

// Ajoute un menu dans l'administration
add_action('admin_menu', 'ajouter_ma_page_de_reglages');

function ajouter_ma_page_de_reglages() {
    add_menu_page(
        'Réglages Personnalisés',
        'Réglages Personnalisés',
        'manage_options',
        'reglages-personnalises',
        'ma_page_de_reglages_callback',
        'dashicons-admin-generic',
        99
    );
}

// Affiche le contenu de la page de réglages
function ma_page_de_reglages_callback() {
    ?>
    <div class="wrap">
        <h1>Réglages Personnalisés</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('mes_options_groupe');
            do_settings_sections('reglages-personnalises');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Enregistre les réglages
add_action('admin_init', 'enregistrer_mes_reglages');

function enregistrer_mes_reglages() {
    register_setting('mes_options_groupe', 'logo_site');
    // Répétez pour d'autres options comme lien_facebook, lien_linkedin, etc.
    register_setting('mes_options_groupe', 'numero_telephone');
    register_setting('mes_options_groupe', 'email_contact');
    register_setting('mes_options_groupe', 'shortcode_form_contact');
    register_setting('mes_options_groupe', 'image_contact');
    register_setting('mes_options_groupe', 'title_contact');
    register_setting('mes_options_groupe', 'description_contact');
    register_setting('mes_options_groupe', 'facebook_contact');
    register_setting('mes_options_groupe', 'instagram_contact');
    register_setting('mes_options_groupe', 'linkedin_contact');
    register_setting('mes_options_groupe', 'behance_contact');
    register_setting('mes_options_groupe', 'x_contact');
    register_setting('mes_options_groupe', 'text_button_header');
    register_setting('mes_options_groupe', 'url_button_header');
    register_setting('mes_options_groupe', 'text_footer');
    register_setting('mes_options_groupe', 'title_section_recommandation');
    register_setting('mes_options_groupe', 'content_section_recommandation');
    register_setting('mes_options_groupe', 'line_up_section_recommandation');
    register_setting('mes_options_groupe', 'line_down_section_recommandation');
    register_setting('mes_options_groupe', 'image_promotion_section_recommandation');


    add_settings_section(
        'section_logo',
        'Réglages identité',
        null,
        'reglages-personnalises'
    );

    add_settings_field(
        'logo_site',
        'Logo du Site',
        'logo_site_callback',
        'reglages-personnalises',
        'section_logo'
    );
    // Répétez pour d'autres champs


    add_settings_section(
        'section_contact',
        'Réglages des informations de contact',
        null,
        'reglages-personnalises'
    );

    add_settings_field(
        'numero_telephone',
        'Téléphone de contact',
        'generer_champ_texte_callback',
        'reglages-personnalises',
        'section_contact',
        array('name' => 'numero_telephone')
    );

    add_settings_field(
        'email_contact',
        'Email de Contact',
        'generer_champ_texte_callback',
        'reglages-personnalises',
        'section_contact',
        array('name' => 'email_contact')
    );

    add_settings_field(
        'shortcode_form_contact',
        'Shortcode formulaire de contact',
        'generer_champ_texte_callback',
        'reglages-personnalises',
        'section_contact',
        array('name' => 'shortcode_form_contact')
    );

    add_settings_field(
        'title_contact',
        'Titre sections de Contact',
        'generer_champ_texte_callback',
        'reglages-personnalises',
        'section_contact',
        array('name' => 'title_contact')
    );

    add_settings_field(
        'description_contact',
        'Description sections de Contact',
        'generer_champ_texte_large_callback',
        'reglages-personnalises',
        'section_contact',
        array('name' => 'description_contact')
    );

    add_settings_field(
        'image_contact',
        'Image background sections contact',
        'image_upload_callback',
        'reglages-personnalises',
        'section_contact',
        array(
            'option_name' => 'image_contact',
            'media_title' => 'Sélectionner une image'
        )
    );

    add_settings_field(
        'facebook_contact',
        'Lien Facebook',
        'generer_champ_texte_callback',
        'reglages-personnalises',
        'section_contact',
        array('name' => 'facebook_contact')
    );

    add_settings_field(
        'instagram_contact',
        'Lien Instagram',
        'generer_champ_texte_callback',
        'reglages-personnalises',
        'section_contact',
        array('name' => 'instagram_contact')
    );

    add_settings_field(
        'linkedin_contact',
        'Lien LinkedIn',
        'generer_champ_texte_callback',
        'reglages-personnalises',
        'section_contact',
        array('name' => 'linkedin_contact')
    );

    add_settings_field(
        'behance_contact',
        'Lien Behance',
        'generer_champ_texte_callback',
        'reglages-personnalises',
        'section_contact',
        array('name' => 'behance_contact')
    );

    add_settings_field(
        'x_contact',
        'Lien X',
        'generer_champ_texte_callback',
        'reglages-personnalises',
        'section_contact',
        array('name' => 'x_contact')
    );

    add_settings_section(
        'section_header',
        'Réglages du header',
        null,
        'reglages-personnalises'
    );

    add_settings_field(
        'text_button_header',
        'Texte bouton header',
        'generer_champ_texte_callback',
        'reglages-personnalises',
        'section_header',
        array('name' => 'text_button_header')
    );

    add_settings_field(
        'url_button_header',
        'Url bouton header',
        'generer_champ_texte_callback',
        'reglages-personnalises',
        'section_header',
        array('name' => 'url_button_header')
    );


    add_settings_section(
        'section_footer',
        'Réglages du footer',
        null,
        'reglages-personnalises'
    );

    add_settings_field(
        'text_footer',
        'Texte footer',
        'generer_champ_texte_callback',
        'reglages-personnalises',
        'section_footer',
        array('name' => 'text_footer')
    );

    add_settings_section(
        'section_recommandation',
        'Section recommandation',
        null,
        'reglages-personnalises'
    );

    add_settings_field(
        'title_section_recommandation',
        'Titre section recommandation',
        'generer_champ_texte_callback',
        'reglages-personnalises',
        'section_recommandation',
        array('name' => 'title_section_recommandation')
    );

    add_settings_field(
        'content_section_recommandation',
        'Contenu section recommandation',
        'generer_champ_texte_large_callback',
        'reglages-personnalises',
        'section_recommandation',
        array('name' => 'content_section_recommandation')
    );

    add_settings_field(
        'line_up_section_recommandation',
        'Texte réduction haut section recommandation',
        'generer_champ_texte_callback',
        'reglages-personnalises',
        'section_recommandation',
        array('name' => 'line_up_section_recommandation')
    );

    add_settings_field(
        'line_down_section_recommandation',
        'Texte réduction bas section recommandation',
        'generer_champ_texte_callback',
        'reglages-personnalises',
        'section_recommandation',
        array('name' => 'line_down_section_recommandation')
    );

    add_settings_field(
        'image_promotion_section_recommandation',
        'Image promotion section recommandation',
        'image_upload_callback',
        'reglages-personnalises',
        'section_recommandation',
        array(
            'option_name' => 'image_promotion_section_recommandation',
            'media_title' => 'Sélectionner une image'
        )
    );

    add_settings_section(
        'section_temoignages',
        'Section témoignages',
        null,
        'reglages-personnalises'
    );

    add_settings_field(
        'title_section_temoignages',
        'Titre section témoignages',
        'generer_champ_texte_callback',
        'reglages-personnalises',
        'section_temoignages',
        array('name' => 'title_section_temoignages')
    );

}

function generer_champ_texte_callback($args) {
    // Récupère la valeur actuelle de l'option depuis la base de données
    $option = get_option($args['name']);

    // Rend le champ de texte HTML
    echo '<input type="text" id="' . esc_attr($args['name']) . '" name="' . esc_attr($args['name']) . '" value="' . esc_attr($option) . '" />';
}

function generer_champ_texte_large_callback($args) {
    // Récupère la valeur actuelle de l'option depuis la base de données
    $option = get_option($args['name']);

    // Rend le champ de texte HTML
    echo '<textarea id="' . esc_attr($args['name']) . '" name="' . esc_attr($args['name']) . '">'. esc_attr($option) .'</textarea>';
}

// Callback pour le champ de téléchargement du logo
function logo_site_callback() {
    $logo = get_option('logo_site');
    ?>
    <input type="hidden" id="logo_site" name="logo_site" value="<?php echo esc_attr($logo); ?>"/>
    <button type="button" class="button" id="upload_logo_button">Choisir/Changer le logo</button>
    <div id="logo_preview"><?php if ($logo): ?><img src="<?php echo esc_url($logo); ?>" style="max-width: 100px;"><?php endif; ?></div>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('#upload_logo_button').click(function(e) {
                e.preventDefault();
                var custom_uploader = wp.media({
                    title: 'Sélectionner un logo',
                    button: { text: 'Utiliser ce logo' },
                    library : { type : 'image' },
                    multiple: false
                }).on('select', function() {
                    var attachment = custom_uploader.state().get('selection').first().toJSON();
                    $('#logo_site').val(attachment.url);
                    $('#logo_preview').html('<img src="' + attachment.url + '" style="max-width:100px;"/>');
                })
                    .open();
            });
        });
    </script>
    <?php
}

function image_upload_callback($args) {
    // Obtenez la valeur actuelle de l'option
    $option_value = get_option($args['option_name']);
    ?>
    <input type="hidden" id="<?php echo esc_attr($args['option_name']); ?>" name="<?php echo esc_attr($args['option_name']); ?>" value="<?php echo esc_attr($option_value); ?>"/>
    <button type="button" class="button" id="<?php echo esc_attr($args['option_name']) . '_button'; ?>">Choisir/Changer l'image</button>
    <div id="<?php echo esc_attr($args['option_name']) . '_preview'; ?>"><?php if ($option_value): ?><img src="<?php echo esc_url($option_value); ?>" style="max-width: 100px;"><?php endif; ?></div>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('#<?php echo esc_attr($args['option_name']) . '_button'; ?>').click(function(e) {
                e.preventDefault();
                var custom_uploader = wp.media({
                    title: '<?php echo esc_js($args['media_title']); ?>',
                    button: { text: 'Utiliser cette image' },
                    library : { type : 'image' },
                    multiple: false
                }).on('select', function() {
                    var attachment = custom_uploader.state().get('selection').first().toJSON();
                    $('#<?php echo esc_attr($args['option_name']); ?>').val(attachment.url);
                    $('#<?php echo esc_attr($args['option_name']) . '_preview'; ?>').html('<img src="' + attachment.url + '" style="max-width:100px;"/>');
                })
                    .open();
            });
        });
    </script>
    <?php
}

// Charge les scripts nécessaires pour la bibliothèque de médias
add_action('admin_enqueue_scripts', 'charger_scripts_admin');

function charger_scripts_admin($hook) {
    if ('toplevel_page_reglages-personnalises' !== $hook) {
        return;
    }
    wp_enqueue_media();
}


function register_my_menu() {
    register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

function register_my_footer_menu() {
    register_nav_menu('footer-menu',__( 'Footer Menu' ));
}
add_action( 'init', 'register_my_footer_menu' );
