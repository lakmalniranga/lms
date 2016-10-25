	<div class="row">
		<div class="column column-12">
			<footer class="footer text-center">
			<p>Copyright © 2016 <a href="http://nsbm.lk">National School of Business Management</a>. All Rights Reserved.</p>
			</footer>
		</div>
	</div>
 </div>

  	<script src="<?php echo ROOT . 'assets/js/script.js'; ?>"></script>
  	<script language="JavaScript">
		function selectall() {
			checkboxes = document.getElementsByName('checkbox[]');
			for(var i=0, n=checkboxes.length;i<n;i++) {
				checkboxes[i].checked = true;
			}
		}

		function selectnone() {
			checkboxes = document.getElementsByName('checkbox[]');
			for(var i=0, n=checkboxes.length;i<n;i++) {
				checkboxes[i].checked = false;
			}
		}
		
	</script>
</body>
</html>
