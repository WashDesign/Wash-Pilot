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
				<div class="credits"><a href="http://wash-design.co.uk/" target="_blank">by Wash</a></div>
	
			</div>
		</footer>
			<?php //*** Need to review add bower? ?> 
	    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/assets/js/inc/jquery-1.9.1.min.js"><\/script>')</script>
	
	    <?php wp_footer(); ?>
    
    </body>
</html>