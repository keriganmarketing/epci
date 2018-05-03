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
        <section id="content" class="section-wrapper team">
            <div class="container">
                <div class="content">
                    <?php include(locate_template('template-parts/sections/support-heading.php')); ?>
                    <?php the_content();?>

                    <div class="columns is-multiline">
                        <?php foreach($members as $member){ ?>
                            <?php include(locate_template('template-parts/partials/mini-team.php')); ?>
                        <?php } ?>
                    </div>

                </div><!-- .entry-content -->
            </div>
        </section>

    </article><!-- #post-## -->
</div>
<?php include(locate_template('template-parts/sections/bot.php')); ?>