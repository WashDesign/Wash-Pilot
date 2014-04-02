			</div>	
		</main> <!-- end main -->
	
		<footer class="site__footer" role="contentinfo">
			<div class="constrain grp">
				
				<div class="copyright">&copy; <?php echo date("Y") ?> 
	<?php	
	
			if(get_field('company_name', 'option')) 
			{
	
					the_field('company_name', 'option');
	
			} else {
	
				bloginfo( 'name' );
	
			}
	
	?>
				
				</div>
				<div class="credits"><a href="http://wearebold.co.uk/" target="_blank">crafted by wearebold</a></div>
	
			</div>
		</footer>
	
	    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/assets/js/inc/jquery-1.9.1.min.js"><\/script>')</script>
	
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