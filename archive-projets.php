<?php
get_header();


// lets get all the projets posts

$projects_particuliers = get_posts(array(
    "post_type" => "projets",
    "numberposts" => -1,
    'tax_query' => array(           // Début de la requête de taxonomie
        array(
            'taxonomy' => 'type-projet',  // Nom de la taxonomie
            'field'    => 'slug',         // Type de champ pour filtrer (ici, le slug de la taxonomie)
            'terms'    => 'particuliers' // Le terme de taxonomie à filtrer
        )
    )
));

$projects_professionnels = get_posts(array(
    "post_type" => "projets",
    "numberposts" => -1,
    'tax_query' => array(           // Début de la requête de taxonomie
        array(
            'taxonomy' => 'type-projet',  // Nom de la taxonomie
            'field'    => 'slug',         // Type de champ pour filtrer (ici, le slug de la taxonomie)
            'terms'    => 'professionnels' // Le terme de taxonomie à filtrer
        )
    )
));

$testimonials = get_posts(array(
    "post_type" => "temoignages",
    "numberposts" => -1
));

$termes_type_projet = get_terms(array(
    'taxonomy' => 'type-projet',
    'hide_empty' => false, // Mettez à true si vous voulez seulement les termes qui sont assignés à des posts
));

?>

    <section class="bg-cover bg-center" style="background-image: url(<?= get_field("image_fond_slider")["sizes"]["large"] ?>)">


            <div class="w-full h-[50svh] sm:h-[75svh] flex gap-6 flex-col items-center justify-center">

            <h1 class="text-xl sm:text-6xl flex justify-center items-center gap-4 font-extrabold mt-12 text-center projects-filter">
                <?php if (!is_wp_error($termes_type_projet)) {
                    foreach ($termes_type_projet as $terme_index => $terme) {
                        ?>
                        <span data-type="<?= $terme->slug ?>" class="<?= $terme_index === 1 ? "active" : "inactive" ?> selector-type hover:cursor-pointer"><?= esc_html($terme->name) ?></span>

                        <?php
                        if (count($termes_type_projet) !== $terme_index + 1) {
                            echo '<span class="separator inline-block w-px h-5 sm:h-12 bg-primary"></span>';
                        }
                    }
                } ?>
            </h1>

            <div class="swiper w-full overflow-y-visible hidden pt-16 pb-8 sm:pb-0 slider-projects-home slider-projects-home-particuliers">
                <div class="swiper-wrapper overflow-visible">
                    <?php
                    foreach ($projects_particuliers as $projet_slider_home) {
                        //var_dump($projet_slider_home);

                        ?>

                        <a href="<?= get_permalink($projet_slider_home->ID) ?>" class="swiper-slide">
                            <img class="rounded-xl sm:rounded-3xl"
                                 src="<?= get_field("image_miniature", $projet_slider_home->ID)["sizes"]["large"] ?>"
                                 alt="<?= get_field("image_miniature", $projet_slider_home->ID)["alt"] ?>">
                            <h3 class="mt-4 text-center text-lg font-semibold uppercase"><?= get_the_title($projet_slider_home->ID) ?></h3>
                            <p class="text-center text-sm italic"><?= get_field("type", $projet_slider_home->ID) ?>
                                - <?= get_field("date", $projet_slider_home->ID) ?></p>
                        </a>

                        <?php

                    }
                    ?>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            <div class="swiper w-full overflow-y-visible pt-16 pb-8 sm:pb-0 slider-projects-home slider-projects-home-professionnels">
                <div class="swiper-wrapper overflow-visible">
                    <?php
                    foreach ($projects_professionnels as $projet_slider_home) {
                        //var_dump($projet_slider_home);

                        ?>

                        <a href="<?= get_permalink($projet_slider_home->ID) ?>" class="swiper-slide">
                            <img class="rounded-xl sm:rounded-3xl"
                                 src="<?= get_field("image_miniature", $projet_slider_home->ID)["sizes"]["large"] ?>"
                                 alt="<?= get_field("image_miniature", $projet_slider_home->ID)["alt"] ?>">
                            <h3 class="mt-4 text-center text-lg font-semibold uppercase"><?= get_the_title($projet_slider_home->ID) ?></h3>
                            <p class="text-center text-sm italic"><?= get_field("type", $projet_slider_home->ID) ?>
                                - <?= get_field("date", $projet_slider_home->ID) ?></p>
                        </a>

                        <?php

                    }
                    ?>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>

            </div>


    </section>

    <section id="free-visual" class="flex justify-center items-center py-12 sm:py-24"
             style="background: linear-gradient(180deg, #CDCDCD 0%, rgba(243, 243, 243, 0.46) 54.17%, #FFF 100%);">
        <div class="container grid sm:grid-cols-2 gap-12 px-4 sm:px-0">
            <div class="w-full max-h-[25vh] overflow-hidden rounded-3xl">
                <img class="object-cover object-center" src="<?= esc_url(get_option("image_section_premier_visuel")) ?>" alt="Image exemple visuel">
            </div>


            <div>
                <h2 class="text-3xl sm:text-6xl font-extrabold mb-8 uppercase"><?= esc_html(get_option("title_section_premier_visuel", "1er visuel <span style='color: rgb(236, 90, 58);'>gratuit.</span>")) ?></h2>
                <p class="mb-8">
                    <?= esc_html(get_option("content_section_premier_visuel", "Découvrez notre expertise en design 3D : Cliquez ici pour obtenir votre premier visuel offert ! Si vous êtes intéressé, envoyez-moi simplement un plan accompagné d'une description de vos attentes en termes de visuels. Je vous enverrai votre première création sous un délai d'une semaine, vous permettant ainsi d'apprécier la qualité et le réalisme de mes réalisations, et de voir en quoi nos services peuvent transformer vos espaces et booster vos ventes immobilières.")) ?>
                </p>
                <a class="btn before:block before:border uppercase before:border-primary before:rounded-full before:bg-primary before:blur-[2px] before:transition-all before:transition-200 ease-in hover:before:blur-[8px] before:absolute before:w-full before:top-1/2 before:left-1/2 before:-translate-y-1/2 before:-translate-x-1/2 before:z-0 before:h-full relative py-3 px-6 block w-fit mt-3 text-white uppercase text-xs"
                   href="<?= esc_url(get_option("url_section_premier_visuel", site_url()."#contact")) ?>/projets"><span
                            class="relative z-10"><?= esc_html(get_option("btn_section_premier_visuel", "ME CONTACTER")) ?></span></a>
            </div>

        </div>
    </section>

    <section class="flex justify-center items-center py-12 sm:py-24"
             style="background: linear-gradient(180deg, #CDCDCD 0%, rgba(243, 243, 243, 0.46) 54.17%, #FFF 100%);">
        <div class="container grid sm:grid-cols-[1fr,auto] gap-12 px-4 sm:px-0">
            <div>
                <h2 class="text-3xl sm:text-6xl font-extrabold mb-8"><?= esc_html(get_option("title_section_recommandation", "Recommandations.")) ?></h2>
                <p>
                    <?= esc_html(get_option("content_section_recommandation", "Nous  avons mis en place  un programme de recommandation exclusif pour nos clients . Pour chaque recommandantion sérieuse, nous vous offrons une réduction de 5% sur votre devis . Mieux encore, vous pouvez cumuler ses réductions jusqu’à trois recommandations . C’est notre façon de vous remercier et de favoriser une croissance mutuelle.")) ?>
                </p>
            </div>


            <div class="grid grid-cols-[64px,1fr] gap-4 sm:gap-6 rounded-3xl py-6 sm:py-12 px-6 sm:px-16 bg-white">
                <img src="<?= esc_url(get_option("image_promotion_section_recommandation")) ?>" alt="Icône promotion">
                <div class="flex flex-col">
                    <p class="uppercase text-lg sm:text-3xl font-bold"><?= esc_html(get_option("line_up_section_recommandation", "")) ?></p>
                    <p class="uppercase text-sm sm:text-base font-semibold"><?= esc_html(get_option("line_down_section_recommandation", "")) ?></p>
                </div>
            </div>
        </div>
    </section>

    <section class="flex justify-center items-center py-12 sm:py-24"
             style="background: linear-gradient(180deg, #CDCDCD 0%, rgba(243, 243, 243, 0.46) 54.17%, #FFF 100%);">
        <div class="container flex flex-col px-4 sm:px-0">
            <h2 class="text-3xl sm:text-6xl font-extrabold mb-12"><?= esc_html(get_option("title_section_temoignages", "Témoignages.")) ?></h2>

            <div class="slider-testimonial swiper w-full h-fit flex flex-col gap-6">
                <div class="swiper-wrapper">

                    <?php
                    foreach ($testimonials as $testimonial) {
                        setup_postdata($testimonial);
                        ?>

                        <div class="swiper-slide bg-white p-12 rounded-3xl">
                            <div class="mb-6 text-xs">
                                <?= get_field("contenu", $testimonial->ID) ?>
                            </div>
                            <div class="flex gap-4 items-center">
                                <div class="line h-px w-12 bg-primary"></div>
                                <p><strong><?= get_field("nom_prenom", $testimonial->ID) ?>
                                        ,</strong> <?= get_field("fonction", $testimonial->ID) ?></p>
                            </div>
                        </div>
                        <?php
                        wp_reset_postdata();
                    }
                    ?>


                </div>

                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section>


<?php get_footer(); ?>