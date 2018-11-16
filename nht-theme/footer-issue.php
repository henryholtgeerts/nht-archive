</div>

<!-- ajax-content -->
        
        <!-- Running wp_footer func to pull in custom javascript to load in footer -->
		<?php wp_footer(); ?>

		<script type='text/javascript'>
    
			$(function(){
			
				var iFrames = $('iframe');
			
				function iResize() {
				
					for (var i = 0, j = iFrames.length; i < j; i++) {
					iFrames[i].style.height = iFrames[i].contentWindow.document.body.offsetHeight + 'px';}
					}
					
					if ($.browser.safari || $.browser.opera) { 
					
					iFrames.load(function(){
						setTimeout(iResize, 0);
					});
					
					for (var i = 0, j = iFrames.length; i < j; i++) {
							var iSource = iFrames[i].src;
							iFrames[i].src = '';
							iFrames[i].src = iSource;
					}
					
					} else {
					iFrames.load(function() { 
						this.style.height = this.contentWindow.document.body.offsetHeight + 'px';
					});
					}
				
				});

		</script>

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
