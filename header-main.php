<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php bloginfo( 'name' ) ?></title>
	<?php wp_head() ?>
</head>

<body>
<div class="preloader">
    <div class="loader"></div>
</div>
<header class="main-header" <?php echo blurex_acf_image( 'header_bg' ); ?>>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="<?php echo home_url( '/' ) ?>">
			<?php $custom_logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ) );
			if ( $custom_logo ) : ?>
                <img src="<?php echo $custom_logo[0]; ?>" alt="<?php bloginfo( 'name' ) ?>">
			<?php endif; ?>
            <span class="company-name"><?php bloginfo( 'name' ) ?></span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <img src="<?php bloginfo( template_url ) ?>/assets/img/menu-icon.png" alt="menu">
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<?php wp_nav_menu( array(
				"theme_location" => "header-menu",
				"container"      => false,
				"menu_class"     => "navbar-nav ml-auto",
			) )
			?>
        </div>
    </nav>
    <div class="main-header-title">
		<?php if ( get_field( 'header1' ) ) : ?>
            <h3><?php echo the_field( 'header1' ); ?></h3>
		<?php endif ?>
		<?php if ( get_field( 'header2' ) ) : ?>
            <h2><?php echo the_field( 'header2' ); ?></h2>
		<?php endif ?>
		<?php if ( get_field( 'header_description' ) ) : ?>
            <p><?php echo the_field( 'header_description' ) ?></p>
		<?php endif ?>
        <div class="main-header-buttons">
			<?php $link = get_field( 'button1' );
			$link2 = get_field( 'button2' );
			?>
            <button class="btn pink"><a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a></button>
            <button class="btn violet"><a href="<?php echo $link2['url'] ?>"><?php echo $link2['title'] ?></a></button>
        </div>
    </div>
</header>