<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
		<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
		<link href="http://vjs.zencdn.net/c/video-js.css" rel="stylesheet">
		<script src="http://vjs.zencdn.net/c/video.js"></script>
		<link rel="stylesheet" href="lib/projeckktor/theme/style.css" type="text/css" media="screen" />
		<script type="text/javascript" src="lib/projeckktor/projekktor-1.0.23r85.min.js"></script>
		<script type="text/javascript" src="lib/jplayer/jquery.jplayer.min.js"></script>
		<script type="text/javascript" src="lib/mediaelement/mediaelement-and-player.js"></script>
		<script type="text/javascript" src="lib/jwplayer/jwplayer.js"></script>
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
		<h2>Video-JS <?php echo $file; ?></h2>
		<video id="<?php echo 'id-' . ++$counter; ?>" class="video-js vjs-default-skin" controls
					   preload="auto" width="640" height="480" poster="my_video_poster.png"
					   data-setup="{}">
					<source src="<?php echo $url; ?>" type='video/mp4'>
				</video>
		<h2>Projekktor <?php echo $file; ?></h2>
				<video id="<?php echo 'id-' . ++$counter; ?>" class="projekktor" controls preload="auto" width="640" height="480" >
					<source src="<?php echo $url; ?>" type='video/mp4'>
				</video>
				<script type="text/javascript">
					$(document).ready(function() {
						projekktor('#<?php echo 'id-' . $counter; ?>',{
							playerFlashMP4:'lib/projeckktor/jarisplayer.swf'
						}); 
					});
				</script>
				<h2>MediaElement <?php echo $file; ?></h2>
				<video id="<?php echo 'id-' . ++$counter; ?>" class="mediaelement" controls preload="auto" width="640" height="480" >
					<source src="<?php echo $url; ?>" type='video/mp4'>
				</video>
				<script type="text/javascript">
					$(document).ready(function() {
						jQuery('#<?php echo 'id-' . $counter; ?>').mediaelementplayer(); // instantiation
					});
				</script>
				<h2>jwPlayer <?php echo $file; ?></h2>
				<div id="<?php echo 'id-' . ++$counter; ?>"></div>
				<script type="text/javascript">
					jwplayer("<?php echo 'id-' . $counter; ?>").setup({
						flashplayer: "lib/jwplayer/player.swf",
						file: "<?php echo $url; ?>",
						width:'640',
						height:'480'
					});
				</script>
				<br/>
				<?php
			}
		}else {
			echo "Could not find directory";
		}
		?>

    </body>
</html>
