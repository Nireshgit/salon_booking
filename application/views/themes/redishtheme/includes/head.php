<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
		<meta name="title" content="<?php echo html_escape($general['title']) ?>">
		<meta name="description" content="<?php echo html_escape($general['description']) ?>">
		<meta name="keywords" content="<?php echo html_escape($general['keywords']) ?>">
		<?php 
			$re = '/<meta\s*name=[\'"][^\']+[\'"]\s*content=[\'"][^\']*[\'"]\s*\/?>/';
			if($str = html_escape($meta_tags, true)){
				preg_match_all($re, $str, $matches);
				foreach($matches as $tag){ 
					print_r($tag[0]);
				}
			}
		?>
		
		<link rel="icon" href="<?php uploads('img/' . $general['favicon']) ?>">
		<title><?php echo (isset($title) ? html_escape($title) . ' - ' : '') . html_escape($general['title']) ?></title>
		<script type="text/javascript">"use strict";
			const base 			= '<?php echo html_escape(base_url()) ?>';
			const homepage 		= '<?php echo html_escape(HOMEPAGE_CONTROLLER); ?>';
			const upimg 		= '<?php uploads("img/"); ?>';
			const stripePub 	= '<?php echo $stripe['stripe_publishable_key']; ?>';
			const stripeStatus 	= '<?php echo $stripe['status']; ?>';
		</script>
		<link rel="stylesheet" href="<?php $assets("css/bootstrap.min.css"); ?>">
		<link rel="stylesheet" href="<?php $assets("css/icomoon.css"); ?>">
		<link rel="stylesheet" href="<?php $assets("plugins/calendar/css/vanilla-calendar-min.css"); ?>">
		<link rel="stylesheet" href="<?php $assets("css/style.css"); ?>">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900" rel="stylesheet"> 
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
		<?php
			//echo html_escape($scripts['header'], true);
		?>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo html_escape($analytics, true); ?>"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', '<?php echo html_escape($analytics, true); ?>');
		</script>
		