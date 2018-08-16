<?php get_header(); ?>

	<div class="container body">
		<div class='row logo-header-wrapper'>
			<div class='col-12'>
			<!-- <h3 class='issue-text'>Now Here This</h3> -->
			<img src='../images/black_logo.png' class='logo-header'/>
			</div>
		</div>
		<div class='row headers'>
			<div class='col-12'>
			<h3 class='header-text'><span class='header-span'>FEATURED STORIES</span></h3>
			</div>
		</div>

		<div class='row'>
			<?php get_template_part('loop-featured'); ?>
		</div>
		<div class='row headers'>
			<div class='col-12'>
			<h3 class='header-text'><span class='header-span'>CURRENT ISSUE</span></h3>
			</div>
		</div>
		<div class='row'>
			<div class='col-10 offset-1'>
			<a href='http://nowherethis.org/issue-2/sorry.html'><img src='../images/sorry-title.gif' alt='issue 2 image' id='index-issue-image'/></a>
			</div>
		</div>
		<div class='row headers'>
			<div class='col-12'>
			<h3 class='header-text'><span class='header-span'>NEWS & ANNOUNCEMENTS</span></h3>
			</div>
		</div>
		<div class='row'>
			<div class='col-8 offset-2'>
			<p class='announcements'>Currently accepting pitches! Contact justin_bai@brown.edu for more info.</p>
			</div>
		</div>
		<div class='row'>
			<div class='col-8 offset-2'>
			<p class='announcements'>We just released issue 2, <a href='http://nowherethis.org/issue-2/sorry.html'>Sorry</a>! </p>
			</div>
		</div>
    </div>

<?php get_footer(); ?>
