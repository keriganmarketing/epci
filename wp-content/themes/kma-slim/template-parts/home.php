<?php

use Includes\Modules\Slider\BulmaSlider;

/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.2
 */
$headline = ($post->page_information_headline != '' ? $post->page_information_headline : $post->post_title);
$subhead  = ($post->page_information_subhead != '' ? $post->page_information_subhead : '');

include(locate_template('template-parts/sections/top.php'));
?>
<div id="mid">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="section-wrapper home-header">
            <slider>
                <?php
                $slider = new BulmaSlider();
                $slides = $slider->getSlides('home-page-slider');
                $slider = '';

                $i = 0;
                foreach ($slides as $slide) {
                    $slider .= '<slide :id="' . number_format($i) . '" image="' . $slide['photo'] . '" >
                        <section class="slide-content">'
                               . ($slide['headline'] != '' ? '<h2 class="title is-1 is-primary">' . $slide['headline'] . '</h2>' : '')
                               . ($slide['caption'] != '' ? '<p class="slider-subtitle">' . $slide['caption'] . '</p>' : '')
                               . ($slide['description'] != '' ? '<div class="slider-description">' . $slide['description'] . '</div>' : '')
                               . ($slide['url'] != '' ? '<a class="button is-primary is-rounded has-shadow" href="' . $slide['link'] . '">'
                                                        . ($slide['button_text'] != '' ? $slide['button_text'] : 'More Info') . '</a>' : '') .
                               '</section>
                        </slide>';
                    $i++;
                }
                echo $slider;

                ?>
            </slider>
        </div>

        <div class="section-wrapper home-page-copy">
            <div class="container">
                <div class="content home">
                    <h1>As a locally owned and operated business, EP Consultants, Inc. (EPCI) provides a personal
                        interest in assisting local municipalities, contractors, and homeowners in code services.</h1>
                    <hr>
                    <p>We offer over two decades of experience in Florida code services on a state and local level, to
                        ensure that the development of Northwest Florida flourishes into a structurally safe
                        environment. We pride ourselves in assisting local municipalities with obtaining development
                        goals, knowing these efforts will lead to a bright future for Florida's cities. </p>
                </div>
            </div>
        </div>

        <div class="section-wrapper area-tiles">
            <?php include(locate_template('template-parts/sections/area-tiles.php')); ?>
        </div>

        <div class="section-wrapper feature-boxes">
            <?php include(locate_template('template-parts/sections/feature-boxes.php')); ?>
        </div>

    </article>
</div>
<?php include(locate_template('template-parts/sections/bot.php')); ?>
