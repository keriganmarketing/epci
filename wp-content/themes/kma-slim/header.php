<?php
/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.3
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="-tilcek1viyq7BJTC8lYHoZ5bKbMsz6WF0cBhiIxS0U" />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
    <?php if(is_page(22)){ ?>
        <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo GOOGLE_MAPS_API; ?>" ></script>
    <?php } ?>
</head>

<body <?php body_class(); ?> >
<a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'kstrap'); ?></a>
<div id="app"> 
