		<!-- nht-footer -->

		<footer class="nht-footer">
			<div class="nht-container nht-container--wide">
				<div class="nht-footer__text">
					<p>Contact Us: info@nowherethis.org</p>
				</div>
				<div class="nht-footer__copyright">
					<p>&copy; <?php echo date('Y'); ?> - All Rights ReservedTESTINGGG</p>
				</div>
			</div>
		</footer>

		<!-- /nht-footer -->

		</div>

		<!-- #ajax-content -->

		<!-- Running wp_footer func to pull in custom javascript to load in footer -->
		<?php wp_footer(); ?>

		<!-- Pull in popper.js and bootstrap.js from cdn -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>

		</div>

	</body>
</html>
