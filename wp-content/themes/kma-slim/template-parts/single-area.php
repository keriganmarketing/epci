<?php

use Includes\Modules\Areas\Areas;

/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.2
 */

include(locate_template('template-parts/sections/top.php'));

$areas = new Areas();
$area = $areas->getSingle($post->post_title);

$headline = $post->post_title;

?>
<div id="mid" >
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <section id="content" class="section-wrapper">
            <div class="container">
                <div class="content">
                    <?php include(locate_template('template-parts/sections/support-heading.php')); ?>
                    <div class="columns is-multiline is-variable is-8">
                        <div class="column is-6">
                            <h2>Contractor Forms & Information</h2>
                            <?= $area['contractor_content']; ?>
                        </div>
                        <div class="column is-6">
                            <h2>Home Owner Forms & Information</h2>
                            <?= $area['home_owner_content']; ?>
                        </div>
                    </div>
                </div><!-- .entry-content -->
            </div>
        </section>
    </article><!-- #post-## -->
</div>
<?php include(locate_template('template-parts/sections/bot.php')); ?>