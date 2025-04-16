<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>HTMX Test Sample</title>
	<link rel="icon" href="<?=BASEPATH?>/favicon.svg" type="image/svg+xml">
	<link rel="stylesheet" href="<?=BASEPATH?>/public/css/style.css">
	<script src="<?=BASEPATH?>/public/vendor/htmx.min.js"></script>
</head>
<body>
	<header>
		<div class="title">HTMX Test Sample</div>
		<nav>
			<a href="<?=BASEPATH?>" <?php if ($route == '/'): ?>class="selected"<?php endif ?>>Home</a>
			<a href="<?=BASEPATH?>/about" <?php if ($route == '/about'): ?>class="selected"<?php endif ?>>About</a>
		</nav>
	</header>

	<main>
		<?=$content?>
	</main>

	<footer>
		<p>by necro_txilok - 2025</p>
	</footer>
</body>
</html>
