<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	
	<title>TSU Exam Finder - გამოცდის ადგილები</title>
	<meta name="description" content="წინასწარ გაიგე რომელ სექტორში რა ადგილას წერ გამოცდას.">
	<meta name="keywords" content="tsu,exams,თსუ,გამოცდები,განრიგი,ცხრილი,სექტორი,ადგილი,შუალედური,კოლოქვიუმი">
	<meta name="author" content="Levan Velijanashvili">

	<meta property="og:title" content="გამოცდის ადგილები (თსუ)">
	<meta property="og:image" content="{{ url('assets/og-image.png') }}">
	<meta property="og:description" content="description goes here">

	<link rel="stylesheet" href="{{ url('lib/bootstrap/dist/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ url('lib/alk-life/css/alk-life.min.css') }}">
	<link rel="stylesheet" href="{{ url('lib/sweetalert/dist/sweetalert.css') }}">
	<link rel="stylesheet" href="{{ url('css/dist/main.min.css') }}">
</head>
<body>
	<div class="svg-assets noselect">
		<div class="svg-desk"></div>
		<img class="svg-shelf-r" src="{{ url('assets/shelf_right.svg') }}" alt="">
		<img class="svg-shelf-l" src="{{ url('assets/shelf_left.svg') }}" alt="">
		<img class="svg-stuff" src="{{ url('assets/main_vector.svg') }}" width="480" alt="">
	</div>
	<div class="page-content container">
		<form id="main-form" action="details" method="post">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<h1 class="text-center header-title">გამოცდის ადგილები (თსუ)</h1>
				</div>
			</div>
			<div class="row sweet-inputs">
				<div class="col-lg-2 col-md-3 col-lg-offset-3 col-md-offset-2">
					<input type="text" id="input-name" name="name" class="form-control input-lg floatlabel" placeholder="სახელი" autocapitalize="none" required autofocus>
				</div>
				<div class="col-lg-3 col-md-3 col-xs-9">
					<input type="text" id="input-last" name="last" class="form-control input-lg floatlabel" placeholder="გვარი" autocapitalize="none" required>
				</div>
				<div class="col-lg-1 col-md-2 col-xs-3">
					<input type="submit" class="btn-block" value="Go!">
				</div>
			</div>
			<div class="row date-inputs">
				<div class="col-sm-8 col-sm-offset-2 text-center">
					<span class="date ui-clickable noselect">
						@foreach ($dates as $date)
							<span class="{{ $date['active'] ? 'active' : 'hidden' }}" data-value="{{ $date['value'] }}">{{ $date['title'] }}</span>
							@if ($date['active'])
								<input type="hidden" name="date" class="input-dynamic-date" value="{{ $date['value'] }}">
							@endif
						@endforeach
					</span>
					<span class="time ui-clickable noselect">{{ $time }}</span>
					<input type="hidden" name="time" class="input-dynamic-time" value="{{ $time }}">
				</div>
			</div>
		</form>
	</div>
	<div class="sticky-copyright containter-fluid">
		<div class="row">
			<div class="text-center visible-xs col-xs-12">
				Made with <span class="author-heart">&hearts;</span> by <a href="https://stichoza.com">Stichoza</a>, vectors by <a href="http://www.freepik.com/free-photos-vectors/school">Freepik</a>
			</div>
			<div class="hidden-xs text-left col-sm-6">
				School vector designed by <a href="http://www.freepik.com/free-photos-vectors/school">Freepik</a>
			</div>
			<div class="hidden-xs text-right col-sm-6">
				Made with <span class="author-heart">&hearts;</span> by <a href="https://stichoza.com">Stichoza</a>
				&middot; Fork it on <a href="https://github.com/Stichoza/tsu-exam-finder">GitHub</a>
			</div>
		</div>
	</div>
	<div class="timer-source hidden">
		<a href="#" class="btn btn-primary btn-spinner" data-spinner-fn="h+">+</a>
		<a href="#" class="btn btn-primary btn-spinner" data-spinner-fn="m+">+</a>
		<input type="tel" class="input-dynamic-time input-sweetalert-time" value="{{ $time }}">
		<a href="#" class="btn btn-primary btn-spinner" data-spinner-fn="h-">-</a>
		<a href="#" class="btn btn-primary btn-spinner" data-spinner-fn="m-">-</a>
	</div>
	<script src="{{ url('lib/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ url('lib/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<script src="{{ url('lib/sweetalert/dist/sweetalert.min.js') }}"></script>
	<script src="{{ url('lib/floatlabel.js/floatlabels.min.js') }}"></script>
	<script src="{{ url('lib/jquery.inputmask/dist/jquery.inputmask.bundle.js') }}"></script>
	<script src="{{ url('lib/geokbd/geokbd.js') }}"></script>
	<script src="{{ url('js/dist/main.min.js') }}"></script>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-30451315-6', 'auto');
		ga('send', 'pageview');
	</script>
</body>
</html>