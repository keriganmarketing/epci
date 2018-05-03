<?php

use Includes\Modules\Locations\Locations;

/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.2
 */
$headline = ($post->page_information_headline != '' ? $post->page_information_headline : $post->post_title);
$subhead = ($post->page_information_subhead != '' ? $post->page_information_subhead : '');

include(locate_template('template-parts/sections/top.php'));
?>
<div id="mid" >
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <section id="content" class="section-wrapper">
            <div class="container">
                <div class="content">
                    <?php include(locate_template('template-parts/sections/support-heading.php')); ?>

                    <div class="columns is-multiline">
                        <div class="column is-4-desktop">
                            <?php the_content(); ?>
                        </div>
                        <div class="column is-8-desktop">
                            <?= do_shortcode('[contact_form]'); ?>
                        </div>
                    </div>

                </div><!-- .entry-content -->
            </div>
        </section>
        <div class="section-wrapper map">
            <div class="container">
                <div class="content has-text-centered">
                    <h2>Building Departments</h2>
                </div>
                <div class="columns is-multiline">
                    <?php $locations = new Locations();
                    foreach($locations->getLocations() as $location){ ?>
                        <div class="location column is-6-tablet is-3-fullhd">
                            <div class="is-full-height is-flex-column is-justified-between">
                                <h3 class="title is-3 is-secondary"><?= $location['name']; ?></h3>
                                <p class="subtitle address"><?= nl2br($location['address']); ?></p>
                                <div class="contact-info" style="padding: .5rem 0">
                                <p class="phone"><em>email:</em> <a href="mailto:<?= $location['email']; ?>"><?= $location['email']; ?></a></p>
                                <p class="phone"><em>tel:</em> <a href="tel:<?= str_replace('(','',str_replace(') ', '-', $location['phone'])); ?>"><?= $location['phone']; ?></a></p>
                                <p class="phone"><em>fax:</em> <?= $location['fax']; ?></p>
                                </div>
                                <p><a class="button is-primary is-rounded is-outlined" href="https://www.google.com/maps/dir//<?= $location['latitude']; ?>,<?= $location['longitude']; ?>">Get directions</a></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php include(locate_template('template-parts/partials/location-map.php')); ?>
        </div>
    </article><!-- #post-## -->
</div>
<?php include(locate_template('template-parts/sections/bot.php')); ?>