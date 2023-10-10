<?php

function show_main()
{
	return <<<HTML
		<!DOCTYPE html>
		<html lang="en">
			<head>
				<meta charset="UTF-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<title>Document</title>
				<script sunpkg.com_htmx.org@1.9.6_dist_htmx.min.js" ></script>
			</head>
			<body>

				<button hx-post="/" hx-headers='{"action": "clicked"}' hx-swap="outerHTML">
					Click Me
				</button>
			</body>
		</html>
	HTML;
}

function button()
{
	return <<<HTML
		<button 
			hx-post="/" 
			hx-headers='{"action": "clicked"}' 
			hx-swap="outerHTML">
			Clicked!
		</button>
	HTML;
}
$action = false === array_key_exists('HTTP_ACTION', $_SERVER) ? 'show_main' : $_SERVER['HTTP_ACTION'];

switch ($action) {
	case 'show_main':
		echo show_main();
		break;
	case 'clicked':
		echo button();
		break;
	default:
		echo show_main();
		break;
}
