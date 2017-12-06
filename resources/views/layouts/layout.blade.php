<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{!! csrf_token() !!}" />

    <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <!-- Стили JQuery-UI -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- Пользовательские стили -->
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <!-- Стили DataTables -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

</head>
<body>

  @include('layouts.headerNavigation')

  <div class="jumbotron">
    <div class="container">
      <h1></h1>        
      <h1>Welcome to Employees app!</h1>
      <p class="lead">This application is the result of executing the test task for the Junior PHP Developer position.</p>
    </div>      
  </div>

  <div class="container">
    @include('admin.parts.msg')
    @yield('content') 
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="/js/jquery.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>


  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
  
  <!-- DataTables -->
  <script src="/js/jquery.dataTables.min.js"></script>

  <!-- JQuery-UI -->
  <script src="/js/jquery-ui.js"></script>

  <!-- App scripts -->
  @stack('scripts') 

  <script type="text/javascript">
  
    <!-- //Тест работы ajax --> 
    $(document).ready(function(){
      $('#getRequest').click(function(e){
        e.preventDefault();
        // $.get('getRequest', function(data){
        //   $('#getRequestData').append(data);
        //   console.log(data);
        // });
        $.ajax({
          type: "GET",
          url: "getRequest",
          success: function(data){
            console.log(data);
            $('#getRequestData').append("test");
          }
        });
      });

      // После создания тега meta вы можете указать библиотеке, такой как jQuery, автоматически добавлять токен в заголовки всех запросов. Это обеспечивает простую, удобную CSRF-защиту для ваших приложений на базе AJAX:
      // $.ajaxSetup({
      //     headers: {
      //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      //     }
      // });

    });
  </script>

</body>
</html>