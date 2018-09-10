<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">

		<!-- Probide basic meta info -->
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<style>
		iframe {
			width: 100%;
			height: 100vh;
			border: none;
		}
		</style>

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
