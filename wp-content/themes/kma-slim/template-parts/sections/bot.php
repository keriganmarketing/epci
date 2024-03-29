<?php

use Includes\Modules\Social\SocialSettingsPage;
use Includes\Modules\Navwalker\BulmaNavwalker;

/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.3
 */

$socialLinks = new SocialSettingsPage();
$socialIcons = $socialLinks->getSocialLinks('svg', 'circle');
?>
    <div class="sticky-footer">
        <div id="bot" class="is-flex-column is-aligned has-text-centered">
            <div class="bottom-nav">
                <?php wp_nav_menu([
                    'theme_location' => 'footer-menu',
                    'container'      => false,
                    'menu_class'     => 'navbar is-transparent is-justified is-aligned',
                    'fallback_cb'    => '',
                    'menu_id'        => 'footer-menu',
                    'link_before'    => '',
                    'link_after'     => '',
                    'items_wrap'     => '<div id="%1$s" class="%2$s">%3$s</div>',
                    'walker'         => new BulmaNavwalker()
                ]); ?>
            </div>
            <?php if (is_array($socialIcons)) { ?>
                <div class="social">
                    <?php foreach ($socialIcons as $socialId => $socialLink) {
                        echo '<a class="' . $socialId . '" href="' . $socialLink[0] . '" target="_blank" >' . $socialLink[1] . '</a>';
                    } ?>
                </div>
            <?php } ?>
        </div>
        <div id="bot-bot">
            <div class="container">
                <div class="is-flex-column is-justified is-aligned">
                    <p class="contact-info"><span class="address is-block is-inline-block-tablet" >205&nbsp;W. 7th&nbsp;St.&nbsp;Panama&nbsp;City,&nbsp;Florida&nbsp;32401</span>
                        <span class="is-hidden-mobile" >|</span>
                        <span class="phone is-block is-inline-block-tablet" ><em>phone:</em> <a class="is-bold" href="tel:850-818-0213" >850-818-0213</a></span>
                        <span class="is-hidden-mobile" >|</span>
                        <span class="fax is-block is-inline-block-tablet" ><em>fax:</em> 850-818-0214</span></p>
                    <p class="copyright">&copy;<?php echo date('Y'); ?>&nbsp;<?php echo get_bloginfo(); ?>. All Rights&nbsp;Reserved. <span class="siteby">
                        <svg version="1.1" id="kma" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="14" width="20"
                             viewBox="0 0 12.5 8.7" style="enable-background:new 0 0 12.5 8.7;"
                             xml:space="preserve">
                                <path fill="#b4be35"
                              d="M6.4,0.1c0,0,0.1,0.3,0.2,0.9c1,3,3,5.6,5.7,7.2l-0.1,0.5c0,0-0.4-0.2-1-0.4C7.7,7,3.7,7,0.2,8.5L0.1,8.1 c2.8-1.5,4.8-4.2,5.7-7.2C6,0.4,6.1,0.1,6.1,0.1H6.4L6.4,0.1z"></path>
                        </svg> &nbsp;<a href="https://keriganmarketing.com">Site&nbsp;by&nbsp;KMA</a>.
                    </span></p>
                </div>
            </div>
        </div>
    </div><!-- sticky footer -->
</div><!-- app -->
</div><!-- site wrapper -->
<?php wp_footer(); ?>