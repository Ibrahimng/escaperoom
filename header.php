<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package escaperoom
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <?php $favicon = cs_get_option('favicon'); ?>
    <?php if($favicon) : ?>
        <link rel="icon" href="<?php echo $favicon; ?>" sizes="32x32" />
    <?php endif; ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar_header navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#escaperoom_navbar_collapse_1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php bloginfo('url'); ?>">
                    <?php
                        $logo = cs_get_option('logo_main');
                        if($logo){
                            echo '<img class="img-responsive" src="'. $logo .'">';
                        }else {
                            echo '<span class="text_logo">Escaperoom</span>';
                        }
                    ?>
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="escaperoom_navbar_collapse_1">
                <?php wp_nav_menu( array(
                    'menu'               => 'primary_menu',
                    'theme_location'     => 'primary_menu',
                    'depth'              => 0,
                    'container'          => 'false',
                    'menu_class'         => 'nav navbar-nav navbar-right',
                    'menu_id'            => '',
                    'fallback_cb'        => 'wp_bootstrap_navwalker::fallback',
                    'walker'             => new wp_bootstrap_navwalker()
                    ) ); 
                ?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- Header -->
    <div class="whitespace"></div>