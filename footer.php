		</div> <!-- end site-content -->

		<footer class="site-footer" role="contentinfo">
			<div class="wrap grp">

				<?php //*** needs nav function ?>
				<nav class="supporting-nav" role="navigation">
					<ul>
						<li><a href="#">Menu Item</a></li>
						<li><a href="#">Menu Item</a></li>
						<li><a href="#">Menu Item</a></li>
						<li><a href="#">Menu Item</a></li>
						<li><a href="#">Menu Item</a></li>
						<li><a href="#">Menu Item</a></li>
					</ul>
				</nav>

				<?php //*** possibly coudl do a creds/branding function ?>
				<div class="copyright"> Company Name :&copy 2013</div>
				<div class="credits">
					<a href="http://wash-design.co.uk/" target="_blank">A website and brand crafted by <b>Wash</b></a>
				</div>

			</div><!-- end wrap -->
		</footer>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

        <?php wp_footer(); ?>

        <?php //Google Analytics: change UA-XXXXX-X to be your site's ID. ?>
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>