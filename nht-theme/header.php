<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">

		<!-- Probide basic meta info -->
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
		<meta property="og:title" content="<?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?>" />
		<meta property="og:type" content="article" />
		<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
		<meta property="og:image" content="<?php echo ''.esc_url($featured_img_url).''; ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<!-- Running wp_head func to pull in custom styles, javascript -->
		<?php wp_head(); ?>

		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>
		<!-- 

		    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
		o  %xxxx333333oo33oo3o33333333333oo  |
		u  M             iPod      |||||  M  |
		u  M                              N  |
		u  M  Now Here This            >  H  |
		u  M                              H  |
		u  M  Music                    >  H  |
		u  M                              H  |
		u  M  Podcasts                 >  H  |
		u  M                              H  |
		u  M  Shuffle Songs            >  H  |
		u  M                              H  |
		X  M  Radio Is Dead            >  H  |
		X  Nyyyyyyyyyyyyyyyy88888888888888M  |
		X                                    |
		X                                    |
		X                ^^^^                |
		X            ,///,//////,            |
		X         ,///(<<<<<<<<</(/^         |
		X        /<<(<<<<<<<<<<<<(<</        |
		X       (&&&&&&&&////<&&&&&&&)       |
		X      /&&&&&&&/      /&&&&&&&/      |
		X      /%%%%%%/        /%%%%%%/      |
		X      /%%%%%%%/       /%%%%%%/      |
		X      (o3o3o3o3/    /o3o3o3o3)      |
		8       <33333333333333333333>       |
		8         /%333xxxxxxxxx333%/        |
		8          /&3xxx%%o%xx3o&/,         |
		y             /(<&&&<<//,            |
		y                                    |
		8                                    |
		 u                                  ^
		  ,,////////////////////////////,,^^


		Now Here This Radio Archive
		ASCII by Henry Holtgeerts

		-->

	</head>

		<body>
	<div class="nht-player__loading" loading="false"></div>
	<div class="nht-player" active="false" id="nhtPlayer">
		<audio class="nht-player__audio" id="nhtPlayerAudio"></audio>
		<div class="nht-player__container">
			<div class="nht-player__grid">
				<div class="nht-player__controls">
					<button class="nht-player__seek-backward">
						<i class="fas fa-undo"></i>
					</button>
					<button class="nht-player__play-button">
						<i class="fas fa-play"></i>
					</button>
					<button class="nht-player__seek-forward">
						<i class="fas fa-redo"></i>
					</button>
				</div>
				<div class="nht-player__artwork">
					<img src="<?php echo get_template_directory_uri(); ?>/img/white_logo.png" alt="logo"/>
				</div>
				<div class="nht-player__title">
					<a class="nht-player__title--main">
                        This is a story!
					</a>
                    <div class="nht-player__title--producer"></div>
				</div>
				<div class="nht-player__seekbar">
					<div class="nht-player__playhead"></div>
					<div class="nht-player__played"></div>
					<div class="nht-player__loaded"></div>
					<div class="nht-player__duration"></div>
				</div>
				<div class="nht-player__time-code">
					4:56 / 7:43
				</div>
				<div class="nht-player__volume-control">
					<button class="nht-player__volume-button">
						<i class="fas fa-volume-up"></i>
					</button>
					<div class="nht-player__volume-head"></div>
					<div class="nht-player__volume-bar"></div>
				</div>
				<div class="nht-player__expand">
					<button class="nht-player__expand-button">
						<i class="fas fa-times"></i>
					</button>
				</div>
				<div class="nht-player__sharing-menu">
					<button class="nht-player__social-button">
						<i class="fas fa-play"></i>
					</button>
					<button class="nht-player__social-button">
						<i class="fas fa-play"></i>
					</button>						
					<button class="nht-player__social-button">
						<i class="fas fa-play"></i>
					</button>
				</div>
				<div class="nht-player__open-menu">
					<button class="nht-player__open-button">
						<i class="fas fa-play"></i>
					</button>
					<button class="nht-player__social-button">
						<i class="fas fa-play"></i>
					</button>
					<button class="nht-player__open-button">
						<i class="fas fa-play"></i>
					</button>
				</div>
			</div>
		</div>
	</div>

		<div id="ajax-content">

		<div class="nht-body">

			<nav class="nht-header">
				<div class="nht-container nht-container--wide">
					<div class="nht-navbar">
						<div class="nht-navbar__underlay"></div>
						<a href="<?php echo site_url(); ?>" class="nht-contents-link">
							<div class="nht-navbar__branding">
								<img src="<?php echo get_template_directory_uri(); ?>/img/black_logo.png" alt="logo" class="logo"/>
							</div>
						</a>
						<div class="nht-navbar__primary-menu">
							<div class="nht-navbar__responsive-header">
								<p>Menu</p>
								<button class="nht-navbar__toggle-menu" type="button" data-toggle="collapse" data-target="#navbar">
									<i class='fas fa-times'></i>
								</button>
							</div>
							<?php
								wp_nav_menu( array(
									'theme_location'    => 'primary',
									'depth'             => 2,
									'container'         => false,
									'menu_class'        => false,
									'after'				=> '<div class="nht-navbar__underline"></div>'
								) );
							?>
						</div>
						<div class="nht-navbar__search">
							<?php get_template_part('searchform'); ?>
						</div>
						<!-- <div class="nht-navbar__divider">
							<div class="nht-navbar__divider-bar"></div>
						</div>
						<div class="nht-navbar__follow-links">
							<a class="nht-navbar__follow-link" href=">">
								<i class='fab fa-apple'></i>
							</a>
							<a class="nht-navbar__follow-link" href="">
								<i class='fab fa-spotify'></i>
							</a>
						</div> -->

						<button class="nht-navbar__toggle-menu" type="button" data-toggle="collapse" data-target="#navbar">
							<i class='fas fa-bars'></i>
						</button>
					</div>
				</div>
			</nav>
			<!-- /nht-header -->
