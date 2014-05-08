		<div class="printonly" style="display:none;">
			URL: <u><?php $str = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; echo str_replace(array('%','<'),'',$str); ?></u>
		</div>

		<div id="footer">
			<?php
				dynamic_sidebar("Footer");
			?>
		</div>
</body>
</html>