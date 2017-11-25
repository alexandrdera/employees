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
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
 
    <!-- //Тест работы ajax --> 
    <script type="text/javascript">
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Обработка кнопки Delete удаления сотрудника
        $('.btn-danger').click(function(e){
          e.preventDefault();
          console.log($(this).attr("id"));
          
          $.ajax({
            type: "DELETE",
            url: "/employees/"+$(this).attr("id"),
            data: {
              'id': $(this).attr("id"), 
              '_token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data){
              console.log(data);
              $(this).append("test");
            }
          });
        });


      });
    </script>

</body>
</html>