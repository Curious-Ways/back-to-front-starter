<?php
/**
 * The Header for our theme.
 *
 * @package Back to Front Starter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php $url = site_url(); ?><link rel="icon" type="image/x-icon" href="<?php echo $url; ?>/favicon.ico">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">

  <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'back_to_front_starter' ); ?></a>

  <header id="masthead" class="site-header" role="banner">

    <?php get_template_part( 'components/header/site', 'branding' ); ?>

    <?php get_template_part( 'components/navigation/navigation', 'top' ); ?>

    <?php back_to_front_starter_social_menu(); ?>

  </header>

  <div id="content" class="site-content">