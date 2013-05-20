<?php

/**
 * File       index.php
 * Created    5/20/13 9:26 AM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2013 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */
/*
 * Initialize session
 */
session_start();

/*
 * Create $_SESSION['time'] as array
 * Using isset to not throw an error
 */

if (!isset($_SESSION['time'])) {
	$_SESSION['time'] = array();
}

/*
 * Populate $_SESSION['time'] only with new $_POST['time'] data
 * Using isset check to avoid throwing an error if the array exists but empty
 */
if (isset($_POST['time']) && !in_array($_POST['time'], $_SESSION['time'])) {
	$_SESSION['time'][] = $_POST['time'];
}

/*
 * Check for existence and display state and contents
 */
if ($_SESSION['time']) {
	echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
} else {
	echo '<p>No session array!</p>';
}


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script>
		(function ($) {
			// TODO: should start using .on instead of .live
			$('.submit').live('click', function () {
				$.ajax({
					type   : 'POST',
					data   : "time=" + <?php echo time() ?>,
					success: function (data) {
						$(".status").append(data);
					}
				});
				return false;

			});
		})(jQuery)

	</script>
</head>
<body>
<h4>Tizag Art Supply Order Form</h4>

<form action="submit.php" method="post">
	Time: <input name="time" type="text" value="<?php echo time() ?>" />
	<input type="submit" class="submit" />
</form>
<p><a href="destroy.php">Destroy Session!</a>
<p class="status"></p>
</body>
</html>