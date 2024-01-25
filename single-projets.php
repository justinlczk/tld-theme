<?php
get_header();

?>

<section class="min-h-svh flex items-center justify-center">
    <div class="container grid sm:grid-cols-[1fr,2fr] gap-6 px-4 sm:px-0">

        <div class="text-content flex flex-col gap-6 order-2 sm:order-1">
            <div class="flex gap-2">
                <div class="h-px w-14 bg-primary mt-3"></div>
                <div class="flex flex-col">
                    <p class="uppercase"><strong><?= get_field("type") ?></strong></p>
                    <p class="uppercase tracking-widest"><?= get_field("date") ?></p>
                </div>
            </div>

            <h1 class="font-extrabold text-6xl"><?= the_title() ?></h1>

            <div>
                <?= get_field("description") ?>
            </div>

            <div class="grid sm:grid-cols-2 gap-4">

                <?php
                $skills = get_field("competences");

                foreach ($skills as $skill) {
                    ?>

                    <div class="grid grid-cols-[24px,1fr] gap-4">
                        <img class="w-full" src="<?= $skill["icone"]["url"] ?>" alt="<?= $skill["icone"]["url"] ?>">
                        <p class="uppercase"><?= $skill["texte"] ?></p>
                    </div>

                    <?php
                }

                ?>
            </div>

            <a class="btn border border-black rounded-full py-3 px-6 block w-fit mt-3 uppercase font-medium text-xs"
               href="<?= get_field("lien_decouvrir") ?>">Découvrir le projet</a>

        </div>

        <div class="w-full swiper main-slider-project flex flex-col gap-6 order-1 sm:order-2">
            <div class="max-h-[calc(100svh-100px)] swiper-wrapper">

                <?php
                $slides_project = get_field("slider");

                foreach ($slides_project as $slide_project) {
                    ?>
                    <img class="swiper-slide w-full object-contain" src="<?= $slide_project["url"] ?>" alt="<?= $slide_project["alt"] ?>">
                    <?php
                }

                ?>

            </div>

            <div class="swiper-pagination"></div>

            <div class="swiper-button-next z-10 hover:cursor-pointer w-10 h-10 absolute top-1/2 right-0 -translate-y-1/2 sm:-translate-x-1/2">
                <svg class="w-full h-auto" width="31" height="31" viewBox="0 0 31 31" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <g id="fleche" clip-path="url(#clip0_307_1272)">
                        <g id="Layer_1">
                            <path id="Vector"
                                  d="M1.65647 13.8724L24.971 13.8961L13.2574 2.18372L15.4408 0.000352271L30.8812 15.4408L15.4408 30.8825L13.253 28.6947L24.9738 16.9752L1.56887 16.9506"
                                  fill="black"/>
                        </g>
                    </g>
                    <defs>
                        <clipPath id="clip0_307_1272">
                            <rect width="21.8369" height="21.8369" fill="white"
                                  transform="translate(30.8818 15.4414) rotate(135)"/>
                        </clipPath>
                    </defs>
                </svg>
            </div>
            <div class="swiper-button-prev sm:hidden z-10 hover:cursor-pointer w-10 h-10 absolute top-1/2 left-0 -translate-y-1/2 rotate-180">
                <svg class="w-full h-auto" width="31" height="31" viewBox="0 0 31 31" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <g id="fleche" clip-path="url(#clip0_307_1272)">
                        <g id="Layer_1">
                            <path id="Vector"
                                  d="M1.65647 13.8724L24.971 13.8961L13.2574 2.18372L15.4408 0.000352271L30.8812 15.4408L15.4408 30.8825L13.253 28.6947L24.9738 16.9752L1.56887 16.9506"
                                  fill="black"/>
                        </g>
                    </g>
                    <defs>
                        <clipPath id="clip0_307_1272">
                            <rect width="21.8369" height="21.8369" fill="white"
                                  transform="translate(30.8818 15.4414) rotate(135)"/>
                        </clipPath>
                    </defs>
                </svg>
            </div>

        </div>

    </div>
</section>

<?php
if (get_field("brochure_active")) :
    ?>

    <section id="pdf" class="flex items-center justify-center my-6 sm:my-">
        <div class="container px-4 sm:px-0">
            <div class="sm:w-1/2">
                <h2 class="text-3xl sm:text-6xl font-extrabold mb-6 sm:mb-12"><?= get_field("titre_brochure") ?></h2>
                <div class="mb-6"><?= get_field("description_brochure") ?></div>
            </div>

            <div class="w-full">
                <?= do_shortcode(get_field("shortcode_pdf")) ?>
            </div>

            <div class="flex items-center justify-center">
                <a class="btn border border-black rounded-full py-3 px-6 block w-fit mt-3 uppercase font-medium text-xs"
                   href="<?= get_field("lien_brochure")["url"] ?>"><?= get_field("contenu_bouton_telechargement") ?></a>
            </div>
        </div>
    </section>

<?php
endif;

if (get_field("perspective_active")) :
    ?>

    <section id="content" class="flex items-center justify-center my-12 sm:my-0">
        <div class="container px-4 sm:px-0">
            <div class="sm:w-1/2">
                <h2 class="text-3xl sm:text-6xl font-extrabold mb-6 sm:mb-12"><?= get_field("titre_perspective") ?></h2>
                <div class="mb-6"><?= get_field("description_perspective") ?></div>
            </div>

            <div class="grid grid-cols-12 gap-6">

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
                $contents_perspective = get_field("contenu_perspective");
                //var_dump($contents_perspective);

                foreach ($contents_perspective as $content_perspective) {
                    ?>

                    <div class="col-span-<?= $content_perspective["taille"] ?>">
                        <?php

                        switch ($content_perspective["acf_fc_layout"]) {
                            case "slider" :
                                ?>
                                <div class="slider-perspective swiper w-full h-auto flex flex-col gap-6">
                                    <div class="swiper-wrapper w-full max-h-[80svh]">
                                        <?php
                                        foreach ($content_perspective["images"] as $image_slide_perspective_id) {
                                            $image_slide_perspective = wp_get_attachment_image($image_slide_perspective_id, "origin", false, array(
                                                "class" => "w-full h-auto swiper-slide object-cover"
                                            ));


                                            ?>
                                                <?= $image_slide_perspective; ?>
                                            <?php
                                        }
                                        ?>
                                    </div>

                                    <div class="swiper-pagination"></div>
                                </div>
                                <?php

                                break;

                            case "image" :
                                ?>
                                <img class="w-full" src="<?= $content_perspective["image"]["url"] ?>"
                                     alt="<?= $content_perspective["image"]["alt"] ?>">
                                <?php
                                break;

                            case "video":

                                ?>

                                <video class="w-full" controls
                                       src="<?= $content_perspective["video"]["url"] ?>"></video>

                                <?php

                                break;

                            case "titre":
                                ?>
                                <h2 class="text-3xl sm:text-6xl text-black font-extrabold"><?= $content_perspective["titre"]; ?></h2>
                                <?php
                                break;


                            case "texte" :
                                ?>
                                <div class=""><?= $content_perspective["texte"]; ?></div>
                                <?php

                            break;
                        }

                        ?>
                    </div>

                    <?php
                }

                ?>

            </div>
        </div>
    </section>

<?php
endif;
?>


<section class="flex justify-center items-center bg-right bg-[length:55%_auto] bg-no-repeat sm:pt-16" style="background-image: url(<?= get_option("image_contact") ?>);">
    <div class="container min-h-[66vh] grid gap-6 sm:gap-0 sm:grid-cols-2 pb-6 sm:pb-12 sm:py-12 px-4 sm:px-0">
        <div>
            <h2 class="text-3xl sm:text-6xl font-extrabold mb-8"><?= get_option("title_contact"); ?></h2>
            <div class="mb-6"><?= get_option("description_contact") ?></div>
            <div class="flex flex-col gap-4">

                <a href="tel:<?= get_option("numero_telephone") ?>" class="flex gap-4 items-center">
                    <div class="w-12 h-12 flex items-center justify-center rounded-full bg-[#D9D9D9]">
                        <svg class="w-4 h-auto" xmlns="http://www.w3.org/2000/svg" width="17" height="18" viewBox="0 0 17 18" fill="none">
                            <g clip-path="url(#clip0_440_75)">
                                <path d="M16.9632 13.9467C16.9151 13.7933 16.6092 13.5673 16.0457 13.2693C15.893 13.1753 15.6755 13.0477 15.394 12.8857C15.1123 12.7238 14.8565 12.5745 14.6273 12.4382C14.3976 12.3018 14.1824 12.1697 13.9813 12.0421C13.9491 12.0165 13.8485 11.942 13.6795 11.8182C13.5103 11.6947 13.3676 11.603 13.2507 11.5433C13.134 11.4838 13.0193 11.4539 12.9066 11.4539C12.7456 11.4539 12.5446 11.5754 12.3032 11.8182C12.0618 12.0612 11.8404 12.3252 11.6393 12.611C11.4381 12.8966 11.2247 13.1606 10.9996 13.4035C10.7741 13.6465 10.5888 13.7679 10.4441 13.7679C10.3715 13.7679 10.2809 13.7465 10.1723 13.7042C10.0638 13.6616 9.98128 13.6251 9.92461 13.5957C9.86845 13.5656 9.77207 13.5062 9.63514 13.4164C9.49796 13.3269 9.42167 13.2778 9.4056 13.2693C8.30292 12.6214 7.35722 11.8799 6.56832 11.045C5.77968 10.2095 5.07929 9.2083 4.46758 8.04062C4.45955 8.02356 4.41316 7.94256 4.32871 7.79775C4.24413 7.65281 4.18776 7.55068 4.15959 7.49086C4.13143 7.43126 4.09722 7.34386 4.05704 7.22883C4.01687 7.1138 3.9967 7.01797 3.9967 6.94118C3.9967 6.78787 4.11143 6.59175 4.34084 6.35309C4.57022 6.11457 4.81981 5.88863 5.08935 5.67571C5.35911 5.4628 5.60845 5.22835 5.83791 4.97277C6.06728 4.71705 6.18197 4.5041 6.18197 4.33368C6.18197 4.21444 6.15381 4.09287 6.09752 3.96933C6.04119 3.84553 5.95467 3.69445 5.83791 3.51539C5.72111 3.33642 5.6507 3.22999 5.62651 3.19573C5.5059 2.98282 5.38127 2.75486 5.25234 2.51195C5.1234 2.26909 4.98266 1.99837 4.82966 1.70011C4.67678 1.40199 4.55614 1.1718 4.4675 1.00989C4.18594 0.41342 3.97268 0.0894184 3.82775 0.0384629C3.77138 0.0128956 3.68681 0 3.57423 0C3.35678 0 3.07311 0.0425375 2.723 0.127881C2.37277 0.213091 2.09717 0.302464 1.89592 0.39636C1.49346 0.575242 1.06689 1.09509 0.616091 1.95574C0.205594 2.7567 0.000366211 3.54947 0.000366211 4.33345C0.000366211 4.56338 0.0144484 4.78708 0.0426127 5.00461C0.070777 5.22191 0.121101 5.46697 0.193626 5.73974C0.266024 6.01243 0.324425 6.215 0.368575 6.34691C0.412766 6.47891 0.495272 6.71538 0.616048 7.05639C0.736656 7.39732 0.809181 7.60602 0.833328 7.68272C1.11501 8.51798 1.44905 9.26364 1.83536 9.91993C2.47096 11.0108 3.33835 12.1381 4.43701 13.3015C5.53571 14.4648 6.60021 15.3831 7.63053 16.0564C8.25027 16.4654 8.95476 16.819 9.74349 17.1175C9.81597 17.1429 10.0131 17.2195 10.3349 17.3477C10.6569 17.4755 10.8803 17.5628 11.005 17.6097C11.1297 17.6567 11.3211 17.7185 11.5784 17.7953C11.8363 17.8721 12.0675 17.9254 12.2727 17.9554C12.4781 17.9849 12.6894 18 12.9066 18C13.647 18 14.3958 17.7826 15.1523 17.348C15.9651 16.8709 16.4559 16.4191 16.625 15.9927C16.7139 15.7798 16.7981 15.4879 16.8785 15.1171C16.9593 14.7464 16.9994 14.4461 16.9994 14.2159C16.9996 14.0962 16.9875 14.0069 16.9632 13.9467Z" fill="black"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_440_75">
                                    <rect width="17" height="18" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <p class="font-semibold" ><?= get_option("numero_telephone") ?></p>
                </a>

                <a href="tel:<?= get_option("email_contact") ?>" class="flex gap-4 items-center">
                    <div class="w-12 h-12 flex items-center justify-center rounded-full bg-[#D9D9D9]">
                        <svg class="w-4 h-auto" xmlns="http://www.w3.org/2000/svg" width="17" height="18" viewBox="0 0 17 18" fill="none">
                            <path d="M0.354934 3.34533C2.68812 5.43751 6.78213 9.1183 7.98541 10.266C8.14694 10.4209 8.3202 10.4996 8.50006 10.4996C8.67955 10.4996 8.85251 10.4216 9.01368 10.2675C10.218 9.11865 14.312 5.43751 16.6452 3.34533C16.7905 3.21532 16.8126 2.9868 16.695 2.82786C16.4232 2.46059 16.0178 2.25 15.5834 2.25H1.41674C0.98234 2.25 0.576963 2.46059 0.305129 2.8279C0.187523 2.9868 0.20967 3.21532 0.354934 3.34533Z" fill="black"/>
                            <path d="M16.7946 4.4793C16.669 4.41742 16.5213 4.43901 16.4169 4.53351C13.8294 6.856 10.5271 9.83296 9.48812 10.8243C8.90498 11.3816 8.09565 11.3816 7.51114 10.8235C6.40369 9.76701 2.6953 6.42899 0.583113 4.53347C0.477959 4.43897 0.329939 4.41813 0.205428 4.47926C0.0802519 4.54082 0 4.67339 0 4.8195V14.2502C0 15.0775 0.635342 15.7502 1.41668 15.7502H15.5834C16.3647 15.7502 17 15.0775 17 14.2502V4.8195C17 4.67339 16.9197 4.54047 16.7946 4.4793Z" fill="black"/>
                        </svg>
                    </div>
                    <p class="font-semibold" ><?= get_option("email_contact") ?></p>
                </a>
            </div>

        </div>

        <div class="sm:w-8/12 mx-auto">
            <?= do_shortcode(get_option("shortcode_form_contact")) ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
