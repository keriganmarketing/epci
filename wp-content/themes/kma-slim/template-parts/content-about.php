<?php

use Includes\Modules\Team\Team;

/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.2
 */
$headline = ($post->page_information_headline != '' ? $post->page_information_headline : $post->post_title);
$subhead = ($post->page_information_subhead != '' ? $post->page_information_subhead : '');

$team = new Team();
$members = $team->getTeam();

include(locate_template('template-parts/sections/top.php'));
?>
<div id="mid" >
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <section id="content" class="section-wrapper">
            <div class="container">
                <div class="content">
                    <?php include(locate_template('template-parts/sections/support-heading.php')); ?>
                    <?php the_content();?>
                </div><!-- .entry-content -->
            </div>
        </section>
        <div class="section-wrapper area-tiles">
            <div class="container">
                <div class="columns is-multiline is-gapless">
                    <?php foreach($members as $member){ ?>
                        <pre><?= print_r($member); ?></pre>
                    <?php } ?>
                </div>
            </div>
        </div>
    </article><!-- #post-## -->
</div>
<?php include(locate_template('template-parts/sections/bot.php')); ?>