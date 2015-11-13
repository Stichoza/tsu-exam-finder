<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TSU Exam Finder</title>
	<link rel="stylesheet" href="{{ url('lib/bootstrap/dist/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ url('lib/alk-life/css/alk-life.min.css') }}">
	<style>
		body {
			background-color: #5ca0a0;
		}
		.svg-desk {
			position: fixed;
			top: 0;
			left: 0;
			right: 0;
			bottom: 30%;
			background-image: url('assets/desk.svg');
			background-size: cover;
			z-index: 200;
			box-shadow: 0 0 64px rgba(0,0,0,0.15);
		}
		.svg-shelf-r, .svg-shelf-l {
			position: fixed;
			z-index: 150;
			left: 50%;
			-webkit-transition: all .25s ease-in-out;
			   -moz-transition: all .25s ease-in-out;
			    -ms-transition: all .25s ease-in-out;
			     -o-transition: all .25s ease-in-out;
			        transition: all .25s ease-in-out;
		}
		.svg-shelf-r:hover, .svg-shelf-l:hover {
			margin-bottom: 0;
		}
		.svg-shelf-r {
			bottom: calc(30% - 52px);
			margin-left: 240px;
			margin-bottom: 20px;
			width: 140px;
		}
		.svg-shelf-l {
			bottom: calc(30% - 84px);
			margin-left: -350px;
			margin-bottom: 50px;
			width: 140px;
		}
		.svg-stuff {
			position: fixed;
			bottom: calc(30% - 150px);
			width: 580px;
			left: 50%;
			margin-left: -290px;
			z-index: 250;
			pointer-events: none;
		}
		.page-content {
			position: relative;
			z-index: 300;
		}
	</style>
</head>
<body>
	<div class="svg-assets">
		<div class="svg-desk"></div>
		<img class="svg-shelf-r" src="{{ url('assets/shelf_right.svg') }}" alt="">
		<img class="svg-shelf-l" src="{{ url('assets/shelf_left.svg') }}" alt="">
		<img class="svg-stuff" src="{{ url('assets/main_vector.svg') }}" width="480" alt="">
	</div>
	<div class="page-content container-fluid">
		<input type="text" name="" id="">
	</div>
	<script src="{{ url('lib/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ url('lib/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</body>
</html>