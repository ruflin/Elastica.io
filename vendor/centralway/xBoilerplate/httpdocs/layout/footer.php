		<?php if ($this->getConfig()->dev) { ?>
		<div id="panel">
			<div class="buttons">
				<span>ACTIONS</span> ·
				<a href="#" onclick="window.location.reload(true);">Reload without cache</a> ·
				<a href="#_" onclick="document.getElementById('panel').style.display='none';">X</a>
			</div>
		</div>
		<?php } ?>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="<?php echo $this->js(); ?>libs/jquery-1.7.1.min.js"><\/script>')</script>
		<script src="<?php echo $this->js(); ?>script.js"></script>
		<?php echo $this->loadPageJs(); ?>

		<?php if ($this->getConfig()->googleAnalytics) { ?>
		<script>
			var _gaq=[['_setAccount', '<?php echo $this->getConfig()->googleAnalytics; ?>'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
				g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
				s.parentNode.insertBefore(g,s)}(document,'script'));
		</script>
		<?php } ?>
	</body>
</html>