<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Forever Missed</title>

		<!-- Fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Styles -->
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">

		<!-- CSRF token -->
		<meta name="csrf-token" content="{{ csrf_token() }}" />

    </head>
    <body class="antialiased">
		<div id="app" class="flex">
			<mainpage />
		</div>

		<script src="{{ mix('js/app.js') }}"></script>
		<script type="text/javascript">
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
		</script>
    </body>
</html>
