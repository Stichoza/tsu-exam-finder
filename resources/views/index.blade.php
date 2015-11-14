<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TSU Exam Finder</title>
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
		<form action="details">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<h1 class="text-center header-title">გამოცდის ადგილები (თსუ)</h1>
				</div>
			</div>
			<div class="row sweet-inputs">
				<div class="col-lg-2 col-md-3 col-lg-offset-3 col-md-offset-2">
					<input type="text" id="input-name" name="name" class="form-control input-lg floatlabel" placeholder="სახელი" required autofocus>
				</div>
				<div class="col-lg-3 col-md-3 col-xs-9">
					<input type="text" id="input-last" name="last" class="form-control input-lg floatlabel" placeholder="გვარი" required>
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
						@endforeach
					</span>
					<span class="time ui-clickable noselect">14:00</span>
				</div>
			</div>
		</form>
	</div>
	<div class="sticky-copyright containter-fluid">
		<div class="row">
			<div class="text-center visible-xs col-xs-12">
				Created with <span class="author-heart">&hearts;</span> by <a href="https://stichoza.com">Stichoza</a>, School vector designed by <a href="http://www.freepik.com/free-photos-vectors/school">Freepik</a>
			</div>
			<div class="hidden-xs text-left col-sm-6">
				Created with &hearts; by <a href="https://stichoza.com">Stichoza</a>
			</div>
			<div class="hidden-xs text-right col-sm-6">
				School vector designed by <a href="http://www.freepik.com/free-photos-vectors/school">Freepik</a>
			</div>
		</div>
	</div>
	<div class="timer-source hidden">
		საათი: <a>8</a>, <a>9</a>, <a>10</a>, <a>11</a>, <a>12</a>, <a>13</a>, <a>14</a>, <a>15</a>, <a>16</a>, <a>17</a>, <a>18</a>, <a>19</a><!-- ამაზე გვიან თუ დაგინიშნეს გამოცდა, აღარ მიხვიდეთ საერთოდ -->
		<br>
		წუთი: <a>00</a>, <a>15</a>, <a>30</a>, <a>45</a>
	</div>
	<script src="{{ url('lib/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ url('lib/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<script src="{{ url('lib/sweetalert/dist/sweetalert.min.js') }}"></script>
	<script src="{{ url('lib/floatlabel.js/floatlabels.min.js') }}"></script>
	<script src="{{ url('js/dist/main.min.js') }}"></script>
</body>
</html>