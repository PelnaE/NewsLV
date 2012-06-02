<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>NewsLV - pats jaunākais katru dienu!</title>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>NewsLV</h1>
		</div>
		<div id="menu-bar">
			<div class="menu-item" href="#"></div>
			<div class="menu-item" href="#"></div>
			<div class="menu-item" href="#"></div>
			<div class="menu-item" href="#"></div>
			<div class="menu-item" href="#"></div>
		</div>
		<div id="content">
			<?php if (!isset($content)): ?>
                
                    <h3><?=__('error_404')?></h3>
                    <p><?=__('error_404_descr')?></p>
                    
                <?php else: ?>
                    
                    <?= $content ?>
                    
                <?php endif; ?>
		</div>
	</div>
</body>
</html>