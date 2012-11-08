<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
		<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="lib/mediaelement/mediaelement-and-player.js"></script>
		<link rel="stylesheet" href="lib/mediaelement/mediaelementplayer.min.css" />
        <title></title>
    </head>
    <body>
		<?php
		$dir = './files/';
		$de = opendir($dir);
		if ($de) {
			$counter = 0;
			while (($file = readdir($de)) !== false) {
				$path = $dir . $file;
				$url = 'http://gagandeep.rtcamp.info/allplayers/files/' . $file;
				if ((!is_file($path)) || (!is_readable($path)) || (strtolower(pathinfo($path, PATHINFO_EXTENSION) != 'mp4')))
					continue;
				echo $url;
				?>
				<h2>MediaElement <?php echo $file; ?></h2>
				<video id="<?php echo 'id-' . ++$counter; ?>" class="mediaelement" controls preload="auto" width="640" height="480" >
					<source src="<?php echo $url; ?>" type='video/mp4'>
				</video>
				<script type="text/javascript">
					$(document).ready(function() {
						jQuery('#<?php echo 'id-' . $counter; ?>').mediaelementplayer(); // instantiation
					});
				</script>
				<?php
			}
		}else {
			echo "Could not find directory";
		}
		?>

    </body>
</html>
