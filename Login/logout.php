<script type="text/javascript">
	window.onload = function resetOnce() { 
  		document.cookie = "studentNo=; expires=Thu, 01 Jan 1970 00:00:00 GMT";
	}
</script>

<?php
session_start();
session_unset();
session_destroy();

header('location: ../index.php');
?>