<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?= get_option("logo_site") ?>" />
    <?php wp_head() ?>
</head>
<body <?php body_class('flex flex-col h-screen bg-[#E5E5E5]') ?>>
<?php wp_body_open(); ?>

    <header class="h-16 flex-0 bg-transparent fixed top-0 left-0 w-screen z-50">
        <div class="container mx-auto flex sm:grid sm:grid-cols-[1fr,3fr,1fr] items-center justify-between sm:justify-center min-h-[40px] px-4 sm:px-0">
            <div class="w-16">
                <a href="<?php echo home_url() ?>"><img class="w-full" src="<?= get_option("logo_site") ?>" alt="Logo du site"></a>
            </div>
            <div class="hidden sm:block">
                <?php
                if (has_nav_menu('header-menu')) {
                    wp_nav_menu(array(
                        'theme_location' => 'header-menu',
                        'menu_class'     => 'header-menu-class', // Ajoutez votre classe personnalisée ici
                        // Autres paramètres selon vos besoins
                    ));
                }
                ?>

            </div>
            <div class="hidden sm:flex justify-end">
                <a class="btn before:block before:border before:border-primary before:rounded-full before:bg-primary before:blur-[2px] before:transition-all before:transition-200 ease-in hover:before:blur-[6px] before:absolute before:w-full before:top-1/2 before:left-1/2 before:-translate-y-1/2 before:-translate-x-1/2 before:z-[-1] before:h-full relative py-3 px-6 block w-fit mt-3 text-white uppercase text-xs"
                   href="<?= get_option("url_button_header") ?>"><?= get_option("text_button_header") ?></a>
            </div>

            <div class="toggle-mobile block sm:hidden">
                <svg  class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="26" height="20" viewBox="0 0 26 20" fill="none">
                    <path d="M2.65193e-08 9.88235C-0.000158307 9.00002 0.7087 8.28448 1.58317 8.28448L23.7498 8.2832C24.6243 8.2832 25.3332 8.99827 25.3333 9.8806C25.3335 10.7629 24.6246 11.4785 23.7502 11.4785L1.58349 11.4797C0.709017 11.4799 0.00015836 10.7647 2.65193e-08 9.88235Z" fill="black"/>
                    <path d="M2.65193e-08 1.89505C-0.000158307 1.01272 0.7087 0.297177 1.58317 0.297177L23.7498 0.295898C24.6243 0.295898 25.3332 1.01096 25.3333 1.89329C25.3335 2.77562 24.6246 3.49116 23.7502 3.49116L1.58349 3.49244C0.709017 3.4926 0.00015836 2.77738 2.65193e-08 1.89505Z" fill="black"/>
                    <path d="M2.65193e-08 17.8706C-0.000158307 16.9883 0.7087 16.2728 1.58317 16.2728L23.7498 16.2715C24.6243 16.2715 25.3332 16.9865 25.3333 17.8689C25.3335 18.7512 24.6246 19.4667 23.7502 19.4667L1.58349 19.468C0.709017 19.4682 0.00015836 18.753 2.65193e-08 17.8706Z" fill="black"/>
                </svg>
            </div>

            <div class="menu-mobile hidden fixed top-0 right-0 w-svw flex-col items-center justify-center gap-6 px-12 py-12 h-auto bg-[#0000003B] backdrop-blur-xl text-black">
               <div class="toggle-mobile absolute top-4 right-4 w-6">
                   <svg class="w-6 h-6"  height="512" viewBox="0 0 320.591 320.591" width="512" xmlns="http://www.w3.org/2000/svg"><g><g id="close_1_"><path fill="#fff" d="m30.391 318.583c-7.86.457-15.59-2.156-21.56-7.288-11.774-11.844-11.774-30.973 0-42.817l257.812-257.813c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875l-259.331 259.331c-5.893 5.058-13.499 7.666-21.256 7.288z"></path><path fill="#fff" d="m287.9 318.583c-7.966-.034-15.601-3.196-21.257-8.806l-257.813-257.814c-10.908-12.738-9.425-31.908 3.313-42.817 11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414-6.35 5.522-14.707 8.161-23.078 7.288z"></path></g></g></svg>
               </div>

                <div class="">
                    <?php
                    if (has_nav_menu('header-menu')) {
                        wp_nav_menu(array(
                            'theme_location' => 'header-menu',
                            'menu_class'     => 'header-menu-class header-menu-class-mobile', // Ajoutez votre classe personnalisée ici
                            // Autres paramètres selon vos besoins
                        ));
                    }
                    ?>

                </div>
                <div class="flex justify-center">
                    <a class="btn before:block before:border before:border-primary before:rounded-full before:bg-primary before:blur-[2px] before:hover:blur-[8px] before:absolute before:w-full before:top-1/2 before:left-1/2 before:-translate-y-1/2 before:-translate-x-1/2 before:z-[-1] before:h-full relative py-3 px-6 block w-fit mt-3 text-white uppercase text-xs"
                       href="<?= get_option("url_button_header") ?>"><?= get_option("text_button_header") ?></a>
                </div>
            </div>

        </div>
    </header>

    <main class="flex-grow pt-16">

