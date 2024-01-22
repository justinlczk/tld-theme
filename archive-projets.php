<?php
get_header();


// lets get all the projets posts

$projects = get_posts(array(
    "post_type" => "projets"
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

    <section class="flex justify-center items-center mb-20">

        <div class="container flex flex-col gap-12 px-4 sm:px-0">

            <h1 class="text-xl sm:text-6xl flex justify-center items-center gap-4 font-extrabold mt-12 text-center projects-filter">
                <?php if (!is_wp_error($termes_type_projet)) {
                    foreach ($termes_type_projet as $terme_index => $terme) {
                        ?>
                        <span data-type="<?= $terme->slug ?>" class="<?= $terme_index === 0 ? "active" : "inactive" ?> selector-type hover:cursor-pointer"><?= esc_html($terme->name) ?></span>

                        <?php
                        if (count($termes_type_projet) !== $terme_index + 1) {
                            echo '<span class="separator inline-block w-px h-5 sm:h-12 bg-primary"></span>';
                        }
                    }
                } ?>
            </h1>

            <div class="grid sm:grid-cols-3 gap-x-6 gap-y-12">

                <?php

                foreach ($projects as $project) {
                    setup_postdata($project);
                    $project_tax = wp_get_post_terms($project->ID,"type-projet");
                    ?>

                    <a href="<?= get_permalink($project) ?>" class="flex flex-col gap-6 project-filtered project-<?= $project_tax[0]->slug ?>">

                        <div class="grid gap-3" style="grid-template-columns: 1fr 24px;">
                            <img class="shadow-xl rounded-[40px]" src="<?= get_field("image_miniature")['url'] ?>"
                                 alt="<?= get_field("image_miniature")['alt'] ?>">
                            <div class="return-text"><p class="uppercase"><?= get_field("date") ?></p></div>
                        </div>

                        <div>
                            <h2 class="font-semibold mt-4 sm:mt-0 text-xl uppercase"><?= the_title() ?></h2>
                            <p class="italic text-sm"><?= get_field("sous_titre_miniature") ?></p>
                        </div>

                    </a>

                    <?php
                    wp_reset_postdata();
                }
                ?>
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