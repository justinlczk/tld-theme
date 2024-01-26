<?php
/**
 * Template Name: HomePage
 *
 * Description : Ceci est un modèle personnalisé pour afficher une page spécifique avec une mise en page personnalisée.
 * Utilisez ce modèle en attribuant la page à "Mon Modèle Personnalisé" dans l'éditeur de pages WordPress.
 *
 */

get_header();
?>



<section class="hero relative mx-auto min-h-[calc(100svh-64px)] flex flex-col sm:justify-center items-center"
         style="background: linear-gradient(180deg, #E4E4E4 0%, rgba(243, 243, 243, 0.46) 54.17%, #FFF 100%);">
    <div class="w-svw max-w-none">
        <div class="w-[calc(100%-32px)] mx-auto sm:mx-0 sm:w-fit  bg-[#ffffff80] py-4 px-4 sm:py-20 sm:px-24 rounded-3xl sm:rounded-r-3xl backdrop-blur-sm relative z-20">

            <?php
            $title_hero = get_field("titre");
            $array_hero = explode(",", $title_hero["liste_de_mots"]);
            $end_hero = $title_hero["fin_de_phrase"];
            foreach ($array_hero as &$value) {
                $value = trim($value);
            }
            ?>

            <h1 class="sm:text-6xl flex flex-row gap-2 sm:gap-0 sm:flex-row text-2xl font-extrabold pb-8 sm:pb-6 uppercase text-center sm:text-left justify-center sm:justify-start homepage_title">
                <span class="start-title"><?= $end_hero ?></span>
                <span class="start-title-space hidden sm:block">&nbsp;</span>
                <span class="container-words">
                <?php
                foreach ($array_hero as $key => $value_word) {
                    if ($key === 0) {
                        echo "<span class='word active'>$value_word</span>";
                    } else {
                        echo "<span class='word'>$value_word</span>";
                    }
                }
                ?>
                    </span>
            </h1>

            <div class="text-xl sm:text-2xl text-center sm:text-left font-extrabold pb-4 uppercase ">
                <?= get_field("sous-titre") ?>
            </div>

            <div class="sm:w-2/3 text-sm font-normal sm:text-base flex flex-col items-center justify-center sm:block text-center sm:text-left">
                <?= get_field("description") ?>

                <?php $btn_hero = get_field("bouton_hero") ?>
                <a class="btn border border-primary rounded-full py-3 px-6 block w-fit mt-3 text-primary uppercase text-xs"
                   href="<?= $btn_hero["lien"] ?>"><?= $btn_hero["texte"] ?></a>
            </div>

        </div>
        <div class="w-[calc(100%-16px)] sm:w-3/4 h-[50%] sm:h-3/4 rounded-l-3xl overflow-hidden absolute right-0 top-[63%] sm:top-1/2 -translate-y-1/2 z-10">
            <?php

            $images_slider_hero = get_field("background_hero");
            $count_images_slider_hero = count($images_slider_hero);


            foreach ($images_slider_hero as $index_image_slider_hero => $image_slider_hero) {
                var_dump($image_slider_hero);
                ?>
                <img class="image-slider-hero <?= $index_image_slider_hero === 0 ? "active" : "hidden" ?> object-cover object-center min-h-full min-w-full"
                     src="<?= $image_slider_hero["sizes"]["large"]["url"] ?>"
                     alt="<?= $image_slider_hero["alt"] ?>">
                <?php
            }

            ?>

            <div class="absolute flex flex-col gap-2 top-1/2 -translate-y-1/2 right-4">
                <?php
                for ($i = 0; $i < $count_images_slider_hero; $i++) {
                    ?>
                    <div class="dot-slider-hero <?= $i == 0 ? "bg-primary active" : "bg-[#E5E5E5]" ?> w-4 h-4 rounded-full hover:cursor-pointer"></div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <svg class="w-16 h-16 sm:w-24 sm:h-24 absolute bottom-4 sm:bottom-10 left-4 sm:left-10" xmlns="http://www.w3.org/2000/svg"
         width="96" height="96"
         viewBox="0 0 96 96" fill="none">
        <g clip-path="url(#clip0_440_317)">
            <path d="M95.7272 10.0274L23.1783 82.4293L96 82.4256L96 96L0.00373723 96L-4.19629e-06 7.62939e-06L13.6016 7.03485e-06L13.5979 72.8662L86.4308 0.186489"
                  fill="black"/>
        </g>
        <defs>
            <clipPath id="clip0_440_317">
                <rect width="96" height="96" fill="white" transform="translate(0 96) rotate(-90)"/>
            </clipPath>
        </defs>
    </svg>

    <div class="socials flex gap-6 justify-end items-center absolute bottom-4 sm:bottom-10 right-4 sm:right-10">

        <?php

        if (get_option("facebook_contact")) {
            ?>
            <a href="<?= esc_url(get_option("facebook_contact")) ?>">
                <svg class="w-6" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" id="fi_1051309">
                    <path fill="#000"
                          d="m437 0h-362c-41.351562 0-75 33.648438-75 75v362c0 41.351562 33.648438 75 75 75h151v-181h-60v-90h60v-61c0-49.628906 40.371094-90 90-90h91v90h-91v61h91l-15 90h-76v181h121c41.351562 0 75-33.648438 75-75v-362c0-41.351562-33.648438-75-75-75zm0 0"></path>
                </svg>
            </a>
            <?php
        }


        if (get_option("instagram_contact")) {
            ?>
            <a href="<?= esc_url(get_option("instagram_contact")) ?>">
                <svg class="w-6" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"
                     fill="none">
                    <g clip-path="url(#clip0_440_55)">
                        <path d="M17.3952 4.07129C17.1007 4.07129 16.8611 4.31093 16.8611 4.60539C16.8611 4.89986 17.1007 5.13949 17.3952 5.13949C17.6897 5.13949 17.9293 4.8999 17.9293 4.60539C17.9293 4.31088 17.6897 4.07129 17.3952 4.07129Z"
                              fill="black"/>
                        <path d="M11.0001 6.26465C8.38925 6.26465 6.26514 8.38877 6.26514 10.9996C6.26514 13.6105 8.38925 15.7347 11.0001 15.7347C13.611 15.7347 15.7351 13.6105 15.7351 10.9997C15.7351 8.38881 13.611 6.26465 11.0001 6.26465Z"
                              fill="black"/>
                        <path d="M15.969 0H6.03096C2.70548 0 0 2.70548 0 6.03101V15.969C0 19.2946 2.70548 22 6.03096 22H15.969C19.2946 22 22 19.2945 22 15.969V6.03101C22 2.70548 19.2946 0 15.969 0ZM11 17.0342C7.67272 17.0342 4.96586 14.3273 4.96586 11C4.96586 7.67272 7.67276 4.9659 11 4.9659C14.3272 4.9659 17.0342 7.67276 17.0342 11C17.0342 14.3272 14.3272 17.0342 11 17.0342ZM17.3951 6.43827C16.3842 6.43827 15.5618 5.61584 15.5618 4.60496C15.5618 3.59408 16.3842 2.77161 17.3951 2.77161C18.406 2.77161 19.2284 3.59404 19.2284 4.60492C19.2284 5.6158 18.406 6.43827 17.3951 6.43827Z"
                              fill="black"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_440_55">
                            <rect width="22" height="22" fill="black"/>
                        </clipPath>
                    </defs>
                </svg>
            </a>
            <?php
        }


        if (get_option("linkedin_contact")) {
            ?>
            <a href="<?= esc_url(get_option("linkedin_contact")) ?>">
                <svg class="w-6" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"
                     fill="none">
                    <g clip-path="url(#clip0_440_65)">
                        <path d="M19.8 0H2.2C0.99 0 0 0.99 0 2.2V19.8C0 21.01 0.99 22 2.2 22H19.8C21.01 22 22 21.01 22 19.8V2.2C22 0.99 21.01 0 19.8 0ZM6.6 18.7H3.3V8.8H6.6V18.7ZM4.95 6.93C3.85 6.93 2.97 6.05 2.97 4.95C2.97 3.85 3.85 2.97 4.95 2.97C6.05 2.97 6.93 3.85 6.93 4.95C6.93 6.05 6.05 6.93 4.95 6.93ZM18.7 18.7H15.4V12.87C15.4 11.99 14.63 11.22 13.75 11.22C12.87 11.22 12.1 11.99 12.1 12.87V18.7H8.8V8.8H12.1V10.12C12.65 9.24 13.86 8.58 14.85 8.58C16.94 8.58 18.7 10.34 18.7 12.43V18.7Z"
                              fill="black"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_440_65">
                            <rect width="22" height="22" fill="black"/>
                        </clipPath>
                    </defs>
                </svg>
            </a>
            <?php
        }


        if (get_option("behance_contact")) {
            ?>
            <a href="<?= esc_url(get_option("behance_contact")) ?>">
                <svg class="w-6" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"
                     fill="none">
                    <g clip-path="url(#clip0_440_69)">
                        <path d="M7.88761 10.0916H5.98511V8.15534H7.88761C7.88761 8.15534 9.01261 8.12909 9.01261 9.12409C9.01261 10.1191 7.88761 10.0916 7.88761 10.0916Z"
                              fill="black"/>
                        <path d="M9.34386 12.5571C9.34386 13.7434 8.00386 13.7134 8.00386 13.7134H5.98511V11.4034H8.00011C8.00011 11.4034 9.34386 11.3746 9.34386 12.5571Z"
                              fill="black"/>
                        <path d="M14.7875 10.1088C14.1013 10.1088 13.5375 10.6225 13.425 11.4275H16.15C16.0425 10.625 15.4725 10.1088 14.7875 10.1088ZM14.7875 10.1088C14.1013 10.1088 13.5375 10.6225 13.425 11.4275H16.15C16.0425 10.625 15.4725 10.1088 14.7875 10.1088ZM19 0H3C2.20435 0 1.44129 0.31607 0.87868 0.87868C0.31607 1.44129 0 2.20435 0 3L0 19C0 19.7956 0.31607 20.5587 0.87868 21.1213C1.44129 21.6839 2.20435 22 3 22H19C19.7956 22 20.5587 21.6839 21.1213 21.1213C21.6839 20.5587 22 19.7956 22 19V3C22 2.20435 21.6839 1.44129 21.1213 0.87868C20.5587 0.31607 19.7956 0 19 0ZM13.0575 7.25H16.5V8.1075H13.0575V7.25ZM9.77375 14.8413C9.3 15.075 8.705 15.1488 8.14875 15.1488H4.125V6.6975H8.54875C9.09625 6.6975 10.7913 7.02375 10.7987 8.6525C10.7987 9.7775 10.1737 10.2925 9.635 10.54C9.635 10.54 11.04 10.9575 11.1525 12.2C11.265 13.4425 11.0425 14.215 9.77375 14.8413ZM17.8563 12.51H13.425C13.3825 13.4862 14.0963 14.0688 14.9075 14.0688C15.1898 14.0694 15.4669 13.9931 15.7091 13.8482C15.9513 13.7033 16.1495 13.4952 16.2825 13.2463H17.7337C17.335 14.6988 16.1663 15.3038 14.785 15.3038C12.9762 15.3038 11.69 13.8538 11.69 12.0638C11.69 10.2738 13.0763 8.8225 14.785 8.8225C16.4937 8.8225 17.875 10.2738 17.875 12.0638C17.875 12.2188 17.875 12.3663 17.8563 12.51ZM14.7875 10.1088C14.1013 10.1088 13.5375 10.6225 13.425 11.4275H16.15C16.0425 10.625 15.4725 10.1088 14.7875 10.1088Z"
                              fill="black"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_440_69">
                            <rect width="22" height="22" fill="black"/>
                        </clipPath>
                    </defs>
                </svg>
            </a>
            <?php
        }


        if (get_option("x_contact")) {
            ?>
            <a href="<?= esc_url(get_option("x_contact")) ?>">
                <svg class="w-6" viewBox="0 0 1227 1227" xmlns="http://www.w3.org/2000/svg">
                    <path fill="#000"
                          d="m654.53 592.55 276.12 394.95h-113.32l-225.32-322.28v-.02l-33.08-47.31-263.21-376.5h113.32l212.41 303.85z"></path>
                    <path fill="#000"
                          d="m1094.42 0h-961.84c-73.22 0-132.58 59.36-132.58 132.58v961.84c0 73.22 59.36 132.58 132.58 132.58h961.84c73.22 0 132.58-59.36 132.58-132.58v-961.84c0-73.22-59.36-132.58-132.58-132.58zm-311.8 1040.52-228.01-331.84-285.47 331.84h-73.78l326.49-379.5-326.49-475.17h249.02l215.91 314.23 270.32-314.23h73.78l-311.33 361.9h-.02l338.6 492.77z"></path>
                </svg>
            </a>
            <?php
        }

        ?>

    </div>
</section>
<section id="projects" class="bg-cover bg-center" style="background-image: url(<?= get_field("image_fond_slider")["url"] ?>)">
    <div class="container px-4 sm:px-0 mx-auto py-12">
        <h2 class="text-xl sm:text-6xl font-extrabold pb-6">
            <?= get_field("titre_projets") ?>
        </h2>
        <div class="sm:w-1/2">
            <?= get_field("description_projets") ?>
        </div>
    </div>


    <div class="w-full h-auto flex gap-6 flex-col items-center justify-center">


        <?php
        $termes_type_projet = get_terms(array(
            'taxonomy' => 'type-projet',
            'hide_empty' => false, // Mettez à true si vous voulez seulement les termes qui sont assignés à des posts
        ));

        $projets_slider_home = get_field("projets_slider");

        $projects_particuliers = get_posts(array(
            "post_type" => "projets",
            "numberposts" => -1,
            'tax_query' => array(           // Début de la requête de taxonomie
                array(
                    'taxonomy' => 'type-projet',  // Nom de la taxonomie
                    'field' => 'slug',         // Type de champ pour filtrer (ici, le slug de la taxonomie)
                    'terms' => 'particuliers' // Le terme de taxonomie à filtrer
                )
            )
        ));

        $projects_professionnels = get_posts(array(
            "post_type" => "projets",
            "numberposts" => -1,
            'tax_query' => array(           // Début de la requête de taxonomie
                array(
                    'taxonomy' => 'type-projet',  // Nom de la taxonomie
                    'field' => 'slug',         // Type de champ pour filtrer (ici, le slug de la taxonomie)
                    'terms' => 'professionnels' // Le terme de taxonomie à filtrer
                )
            )
        ));

        ?>

        <h3 class="text-xl sm:text-3xl flex justify-center items-center gap-4 font-extrabold mt-2 text-center projects-filter"><?php if (!is_wp_error($termes_type_projet)) {
                foreach ($termes_type_projet as $terme_index => $terme) {
                    ?>
                    <span data-type="<?= $terme->slug ?>"
                          class="<?= $terme_index === 1 ? "active" : "inactive" ?> selector-type hover:cursor-pointer"><?= esc_html($terme->name) ?></span>

                    <?php
                    if (count($termes_type_projet) !== $terme_index + 1) {
                        echo '<span class="separator inline-block w-px h-5 sm:h-12 bg-primary"></span>';
                    }
                }
            } ?></h3>

        <div class="swiper w-full overflow-y-visible hidden pt-16 pb-8 sm:pb-0 slider-projects-home slider-projects-home-particuliers">
            <div class="swiper-wrapper overflow-visible">
                <?php
                foreach ($projects_particuliers as $projet_slider_home) {
                    //var_dump($projet_slider_home);

                    ?>

                    <a href="<?= get_permalink($projet_slider_home->ID) ?>" class="swiper-slide">
                        <img class="rounded-xl sm:rounded-3xl"
                             src="<?= get_field("image_miniature", $projet_slider_home->ID)["url"] ?>"
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
                             src="<?= get_field("image_miniature", $projet_slider_home->ID)["url"] ?>"
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


        <!--<div class="swiper pt-16 slider-projects-home">
            <div class="swiper-wrapper">
                <?php
        foreach ($projets_slider_home as $projet_slider_home) {
            //var_dump($projet_slider_home);

            ?>

                    <a href="<?= get_permalink($projet_slider_home->ID) ?>" class="swiper-slide">
                        <img class="rounded-xl sm:rounded-3xl"
                             src="<?= get_field("image_miniature", $projet_slider_home->ID)["url"] ?>"
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
        </div> -->


    </div>

    <div class="flex items-center justify-center pb-12">
        <a class="btn before:block before:border uppercase before:border-primary before:rounded-full before:bg-primary before:blur-[2px] before:transition-all before:transition-200 ease-in hover:before:blur-[8px] before:absolute before:w-full before:top-1/2 before:left-1/2 before:-translate-y-1/2 before:-translate-x-1/2 before:z-0 before:h-full relative py-3 px-6 block w-fit mt-3 text-white uppercase text-xs"
           href="<?= site_url() ?>/projets"><span
                    class="relative z-10">Tous les projets</span></a>
    </div>


</section>

<section class="container mx-auto px-4 sm:px-0 pt-6 sm:pt-12">
    <div class="grid grid-cols-12 gap-4">
        <div class="hidden col-span-1"></div>
        <div class="hidden col-span-2"></div>
        <div class="hidden col-span-3"></div>
        <div class="hidden col-span-4"></div>
        <div class="hidden col-span-5"></div>
        <div class="hidden col-span-6"></div>
        <div class="hidden col-span-7"></div>
        <div class="hidden col-span-8"></div>
        <div class="hidden col-span-9"></div>
        <div class="hidden col-span-11"></div>
        <div class="hidden col-span-12"></div>
        <?php
        $images_section = get_field("images");

        foreach ($images_section as $index => $image_section) {
            $size = $image_section["taille"];
            $url = $image_section["image"]["url"];
            $alt = $image_section["image"]["alt"];

            echo "<img class='col-span-$size max-h-[50vh] w-full object-cover' src='$url' alt='$alt' />";
        }

        ?>
    </div>


</section>

<section id="expertise" class="py-12"
         style="background: linear-gradient(0deg, #CDCDCD 0%, rgba(243, 243, 243, 0.46) 54.17%, #E5E5E5 100%);">
    <div class="container my-12 mx-auto px-4 sm:px-0">
        <div class="sm:w-1/2">
            <h2 class="text-3xl sm:text-6xl font-extrabold mb-8"><?= get_field("titre_expertise") ?></h2>
            <div><?= get_field("description_expertise") ?></div>
        </div>

        <div class="bg-white grid sm:grid-cols-2 rounded-3xl p-4 sm:p-12 gap-6 mt-10 sm:mt-16">
            <?php
            $contents_expertise = get_field("expertise_contenu");
            foreach ($contents_expertise as $content_expertise) {
                ?>

                <div class="grid grid-cols-[48px,auto] sm:grid-cols-[64px,auto] gap-4 sm:gap-8">
                    <div class="w-full bg-[#D9D9D9] rounded-full p-4 flex items-center justify-center aspect-square">
                        <img class="w-full" src="<?= $content_expertise["icone"]["url"] ?>"
                             alt="<?= $content_expertise["icone"]["alt"] ?>">
                    </div>
                    <div>
                        <h3 class="uppercase sm:text-xl font-bold mb-2 sm:mb-4"><?= $content_expertise["titre"] ?></h3>
                        <div class="text-xs sm:text-base"><?= $content_expertise["texte"] ?></div>
                    </div>

                </div>

                <?php
            }
            ?>
        </div>

        <div class="flex gap-4 sm:gap-6 mt-6 flex-wrap">
            <?php
            $btn_expertise_contact = get_field("bouton_contact_expertise");
            $btn_expertise_projects = get_field("bouton_projets_expertise");
            ?>

            <a class="btn before:block before:border before:border-primary before:rounded-full before:bg-primary before:blur-[2px] before:transition-all before:transition-200 ease-in hover:before:blur-[8px] before:absolute before:w-full before:top-1/2 before:left-1/2 before:-translate-y-1/2 before:-translate-x-1/2 before:z-0 before:h-full relative py-3 px-6 block w-fit mt-3 text-white uppercase text-xs"
               href="<?= $btn_expertise_contact["lien"] ?>"><span
                        class="relative z-10"><?= $btn_expertise_contact["texte"] ?></span></a>
            <a class="btn border border-black rounded-full py-3 px-6 block w-fit mt-3 text-black uppercase text-xs"
               href="<?= $btn_expertise_projects["lien"] ?>"><?= $btn_expertise_projects["texte"] ?>
            </a>
        </div>
    </div>
</section>

<section id="about" class="pb-6">
    <div class="container mt-16 mx-auto px-4 sm:px-0">
        <h2 class="text-3xl sm:text-6xl font-extrabold mb-12"><?= get_field("titre_about") ?></h2>

        <div class="grid sm:grid-cols-2 gap-24">
            <div class="flex flex-col justify-between">
                <div><?= get_field("texte_colonne_1") ?></div>
                <div class="flex items-end">
                    <?php $image_about = get_field("image_about"); ?>
                    <img class="sm:w-2/3 object-contain object-bottom" src="<?= $image_about["url"] ?>"
                         alt="<?= $image_about["alt"] ?>">
                </div>
            </div>
            <div class="flex flex-col gap-12">
                <div>
                    <?= get_field("texte_colonne_2") ?>
                </div>


                <div>
                    <div class="w-full px-6 sm:px-0 grid grid-cols-2 sm:grid-cols-3 place-content-between gap-y-12 mb-8">
                        <?php

                        $abilities = get_field("competences");
                        $count = 1;

                        foreach ($abilities as $ability_index => $ability) {
                            //TODO : Fix l'align pour que tout soit poussé sur les bords
                            // On est dans une grille de trois et il faut que 1


                            ?>
                            <div class="<?= $count == 1 ? "sm:justify-self-start " : "" ?><?= $count == 2 ? "sm:justify-self-center " : "" ?><?= $count == 3 ? "sm:justify-self-end " : "" ?><?= $ability_index % 2 == 0 ? "justify-self-start " : "justify-self-end " ?>flex w-32 items-center justify-center gap-2 flex-col">
                                <div class="bg-[#D9D9D9] p-8 rounded-full">
                                    <img class="w-8" src="<?= $ability["image"]["url"] ?>"
                                         alt="<?= $ability["image"]["alt"] ?>">
                                </div>

                                <p class="w-32 text-center font-bold"><?= $ability["titre"] ?></p>
                            </div>
                            <?php
                            $count++;
                            if ($count > 3) {
                                $count = 1;
                            }
                        }

                        ?>
                    </div>
                    <div class="flex gap-6 mb-12 justify-center sm:justify-start">
                        <?php
                        $btn_about_contact = get_field("bouton_contact_about");
                        $btn_about_cv = get_field("bouton_cv_about");
                        ?>

                        <a class="btn before:block before:border before:border-primary before:rounded-full before:bg-primary before:blur-[2px] before:transition-all before:transition-200 ease-in hover:before:blur-[8px] before:absolute before:w-full before:top-1/2 before:left-1/2 before:-translate-y-1/2 before:-translate-x-1/2 before:z-0 before:h-full relative py-3 px-6 block w-fit mt-3 text-white uppercase text-xs"
                           href="<?= $btn_about_contact["lien"] ?>"><span
                                    class="relative z-10"><?= $btn_about_contact["texte"] ?></span></a>
                        <?php if ($btn_about_cv != null && isset($btn_about_cv["lien"]) && $btn_about_cv["lien"] != null && isset($btn_about_cv["icone"]) && isset($btn_about_cv["texte"]) && $btn_about_cv["texte"] != null) : ?>
                            <a
                            class="flex gap-2 btn border border-black rounded-full py-3 px-6 block w-fit mt-3 text-black uppercase text-xs"
                            href="<?= $btn_about_cv["lien"] ?>"><span><img src="<?= $btn_about_cv["icone"]["url"] ?>"
                                                                           alt="<?= $btn_about_cv["icone"]["alt"] ?>">
                            </span><?= $btn_about_cv["texte"] ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>



<section class="container mx-auto py-16 sm:py-0 sm:min-h-[66vh] flex justify-center items-center bg-center bg-cover"
         style="background-image: linear-gradient(90deg, #222222, #00000000), url(<?= get_field("image_background")["url"] ?>);">
    <div class="px-4 sm:px-12">
        <div class="sm:w-1/2 flex flex-col sm:px-6">
            <h2 class="text-3xl sm:text-6xl text-white font-extrabold mb-8"><?= get_field("titre_pro_particulier") ?></h2>
            <div class="text-white">
                <?= get_field("description_pro_particulier") ?>
            </div>
        </div>
    </div>
</section>


<section class="flex justify-center items-center py-12 sm:py-24">
    <div class="container flex flex-col px-4 sm:px-0">
        <h2 class="text-3xl sm:text-6xl font-extrabold mb-12"><?= esc_html(get_option("title_section_temoignages", "Témoignages.")) ?></h2>

        <div class="slider-testimonial swiper w-full h-fit flex flex-col gap-6">
            <div class="swiper-wrapper">

                <?php

                $testimonials = get_posts(array(
                    "post_type" => "temoignages",
                    "numberposts" => -1
                ));

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

<section id="contact"
         class="flex justify-center items-center bg-right-bottom sm:bg-right bg-[length:100%_auto] sm:bg-[length:auto_90%] bg-no-repeat sm:pt-16"
         style="background-image: url(<?= get_field("background_contact")["url"] ?>);">
    <div class="container min-h-[66vh] grid sm:grid-cols-2 py-12 px-4 sm:px-0">
        <div class="">
            <h2 class="text-3xl sm:text-6xl font-extrabold mb-6 sm:mb-8"><?= get_field("titre_contact"); ?></h2>
            <div class="mb-6"><?= get_field("description_contact") ?></div>
            <div class="flex flex-col gap-4">

                <a href="tel:<?= get_option("numero_telephone") ?>" class="flex gap-4 items-center">
                    <div class="w-12 h-12 flex items-center justify-center rounded-full bg-[#D9D9D9]">
                        <svg class="w-4 h-auto" xmlns="http://www.w3.org/2000/svg" width="17" height="18"
                             viewBox="0 0 17 18" fill="none">
                            <g clip-path="url(#clip0_440_75)">
                                <path d="M16.9632 13.9467C16.9151 13.7933 16.6092 13.5673 16.0457 13.2693C15.893 13.1753 15.6755 13.0477 15.394 12.8857C15.1123 12.7238 14.8565 12.5745 14.6273 12.4382C14.3976 12.3018 14.1824 12.1697 13.9813 12.0421C13.9491 12.0165 13.8485 11.942 13.6795 11.8182C13.5103 11.6947 13.3676 11.603 13.2507 11.5433C13.134 11.4838 13.0193 11.4539 12.9066 11.4539C12.7456 11.4539 12.5446 11.5754 12.3032 11.8182C12.0618 12.0612 11.8404 12.3252 11.6393 12.611C11.4381 12.8966 11.2247 13.1606 10.9996 13.4035C10.7741 13.6465 10.5888 13.7679 10.4441 13.7679C10.3715 13.7679 10.2809 13.7465 10.1723 13.7042C10.0638 13.6616 9.98128 13.6251 9.92461 13.5957C9.86845 13.5656 9.77207 13.5062 9.63514 13.4164C9.49796 13.3269 9.42167 13.2778 9.4056 13.2693C8.30292 12.6214 7.35722 11.8799 6.56832 11.045C5.77968 10.2095 5.07929 9.2083 4.46758 8.04062C4.45955 8.02356 4.41316 7.94256 4.32871 7.79775C4.24413 7.65281 4.18776 7.55068 4.15959 7.49086C4.13143 7.43126 4.09722 7.34386 4.05704 7.22883C4.01687 7.1138 3.9967 7.01797 3.9967 6.94118C3.9967 6.78787 4.11143 6.59175 4.34084 6.35309C4.57022 6.11457 4.81981 5.88863 5.08935 5.67571C5.35911 5.4628 5.60845 5.22835 5.83791 4.97277C6.06728 4.71705 6.18197 4.5041 6.18197 4.33368C6.18197 4.21444 6.15381 4.09287 6.09752 3.96933C6.04119 3.84553 5.95467 3.69445 5.83791 3.51539C5.72111 3.33642 5.6507 3.22999 5.62651 3.19573C5.5059 2.98282 5.38127 2.75486 5.25234 2.51195C5.1234 2.26909 4.98266 1.99837 4.82966 1.70011C4.67678 1.40199 4.55614 1.1718 4.4675 1.00989C4.18594 0.41342 3.97268 0.0894184 3.82775 0.0384629C3.77138 0.0128956 3.68681 0 3.57423 0C3.35678 0 3.07311 0.0425375 2.723 0.127881C2.37277 0.213091 2.09717 0.302464 1.89592 0.39636C1.49346 0.575242 1.06689 1.09509 0.616091 1.95574C0.205594 2.7567 0.000366211 3.54947 0.000366211 4.33345C0.000366211 4.56338 0.0144484 4.78708 0.0426127 5.00461C0.070777 5.22191 0.121101 5.46697 0.193626 5.73974C0.266024 6.01243 0.324425 6.215 0.368575 6.34691C0.412766 6.47891 0.495272 6.71538 0.616048 7.05639C0.736656 7.39732 0.809181 7.60602 0.833328 7.68272C1.11501 8.51798 1.44905 9.26364 1.83536 9.91993C2.47096 11.0108 3.33835 12.1381 4.43701 13.3015C5.53571 14.4648 6.60021 15.3831 7.63053 16.0564C8.25027 16.4654 8.95476 16.819 9.74349 17.1175C9.81597 17.1429 10.0131 17.2195 10.3349 17.3477C10.6569 17.4755 10.8803 17.5628 11.005 17.6097C11.1297 17.6567 11.3211 17.7185 11.5784 17.7953C11.8363 17.8721 12.0675 17.9254 12.2727 17.9554C12.4781 17.9849 12.6894 18 12.9066 18C13.647 18 14.3958 17.7826 15.1523 17.348C15.9651 16.8709 16.4559 16.4191 16.625 15.9927C16.7139 15.7798 16.7981 15.4879 16.8785 15.1171C16.9593 14.7464 16.9994 14.4461 16.9994 14.2159C16.9996 14.0962 16.9875 14.0069 16.9632 13.9467Z"
                                      fill="black"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_440_75">
                                    <rect width="17" height="18" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <p class="font-semibold"><?= get_option("numero_telephone") ?></p>
                </a>

                <a href="mailto:<?= get_option("email_contact") ?>" class="flex gap-4 items-center">
                    <div class="w-12 h-12 flex items-center justify-center rounded-full bg-[#D9D9D9]">
                        <svg class="w-4 h-auto" xmlns="http://www.w3.org/2000/svg" width="17" height="18"
                             viewBox="0 0 17 18" fill="none">
                            <path d="M0.354934 3.34533C2.68812 5.43751 6.78213 9.1183 7.98541 10.266C8.14694 10.4209 8.3202 10.4996 8.50006 10.4996C8.67955 10.4996 8.85251 10.4216 9.01368 10.2675C10.218 9.11865 14.312 5.43751 16.6452 3.34533C16.7905 3.21532 16.8126 2.9868 16.695 2.82786C16.4232 2.46059 16.0178 2.25 15.5834 2.25H1.41674C0.98234 2.25 0.576963 2.46059 0.305129 2.8279C0.187523 2.9868 0.20967 3.21532 0.354934 3.34533Z"
                                  fill="black"/>
                            <path d="M16.7946 4.4793C16.669 4.41742 16.5213 4.43901 16.4169 4.53351C13.8294 6.856 10.5271 9.83296 9.48812 10.8243C8.90498 11.3816 8.09565 11.3816 7.51114 10.8235C6.40369 9.76701 2.6953 6.42899 0.583113 4.53347C0.477959 4.43897 0.329939 4.41813 0.205428 4.47926C0.0802519 4.54082 0 4.67339 0 4.8195V14.2502C0 15.0775 0.635342 15.7502 1.41668 15.7502H15.5834C16.3647 15.7502 17 15.0775 17 14.2502V4.8195C17 4.67339 16.9197 4.54047 16.7946 4.4793Z"
                                  fill="black"/>
                        </svg>
                    </div>
                    <p class="font-semibold"><?= get_option("email_contact") ?></p>
                </a>
            </div>

        </div>

        <div class="sm:w-8/12 mt-8 sm:mt-0 mx-auto">
            <?= do_shortcode(get_field("shortcode_formulaire")) ?>
        </div>
    </div>
</section>



<?php get_footer(); ?>
