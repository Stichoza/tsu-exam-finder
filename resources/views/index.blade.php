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
	<div class="svg-assets">
		<div class="svg-desk"></div>
		<img class="svg-shelf-r" src="{{ url('assets/shelf_right.svg') }}" alt="">
		<img class="svg-shelf-l" src="{{ url('assets/shelf_left.svg') }}" alt="">
		<img class="svg-stuff" src="{{ url('assets/main_vector.svg') }}" width="480" alt="">
	</div>
	<div class="page-content container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<h1 class="text-center">გამოცდის ადგილები (თსუ)</h1>
			</div>
		</div>
		<div class="row sweet-inputs">
			<div class="col-sm-3 col-sm-offset-2">
				<input type="text" class="form-control input-lg" placeholder="სახელი">
			</div>
			<div class="col-sm-5">
				<input type="text" class="form-control input-lg" placeholder="გვარი">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<span class="date ui-clickable">
					@foreach ($dates as $date)
						<span class="{{ $date['active'] ? null : 'hidden' }}" data-value="{{ $date['value'] }}">{{ $date['title'] }}</span>
					@endforeach
				</span>
				<span class="time ui-clickable">14:00</span>
			</div>
		</div>
	</div>
	<div class="sticky-copyright containter-fluid">
		<div class="row">
			<div class="text-center visible-xs col-xs-12">
				Created with &hearts; by <a href="https://stichoza.com">Stichoza</a>, School vector designed by <a href="http://www.freepik.com/free-photos-vectors/school">Freepik</a>
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
	<script>
		$('.ui-clickable.time').click(function(event) {
			swal({
				title: 'მიუთითე დრო',
				text: $('.timer-source').html(),
				html: true
			});
		});
	</script>
</body>
</html>