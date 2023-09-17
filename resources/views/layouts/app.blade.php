<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

  <link rel="stylesheet" href="{{URL::asset('asset/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('asset/modules/ionicons/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('asset/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('asset/modules/summernote/summernote-lite.css')}}">
  <link rel="stylesheet" href="{{URL::asset('asset/modules/flag-icon-css/css/flag-icon.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('asset/css/demo.css')}}">
  <link rel="stylesheet" href="{{URL::asset('asset/css/style.css')}}">
  <link rel="stylesheet" href="{{URL::asset('asset/css/style2.css')}}">


    <!-- Scripts -->
 
</head>
<body>

  <div id="app">
     @yield('content')
    <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2023 <div class="bullet"></div> Design By <a href="#">Gana</a>
        </div>
        <div class="footer-right"></div>
      </footer>
  </div>
</div>
</body>
 
<script src="{{URL::asset('asset/modules/jquery.min.js')}}"></script>
  <script src="{{URL::asset('asset/modules/popper.js')}}"></script>
  <script src="{{URL::asset('asset/modules/tooltip.js')}}"></script>
  <script src="{{URL::asset('asset/modules/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{URL::asset('asset/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
  <script src="{{URL::asset('asset/modules/scroll-up-bar/dist/scroll-up-bar.min.js')}}"></script>
  <script src="{{URL::asset('asset/js/sa-functions.js')}}"></script>
  
  <script src="{{URL::asset('asset/modules/chart.min.js')}}"></script>
  <script src="{{URL::asset('asset/modules/summernote/summernote-lite.js')}}"></script>

  <script>
  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
      datasets: [{
        label: 'Statistics',
        data: [460, 458, 330, 502, 430, 610, 488],
        borderWidth: 2,
        backgroundColor: 'rgb(87,75,144)',
        borderColor: 'rgb(87,75,144)',
        borderWidth: 2.5,
        pointBackgroundColor: '#ffffff',
        pointRadius: 4
      }]
    },
    options: {
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true,
            stepSize: 150
          }
        }],
        xAxes: [{
          gridLines: {
            display: false
          }
        }]
      },
    }
  });
  </script>
  <script src="{{URL::asset('asset/js/scripts.js')}}"></script>
  <script src="{{URL::asset('asset/js/custom.js')}}"></script>
  <script src="{{URL::asset('asset/js/demo.js')}}"></script>
</html>
