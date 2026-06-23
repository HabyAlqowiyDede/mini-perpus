<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
  <title>Examples &rsaquo; Register &mdash; Stisla</title>

  <link rel="stylesheet" href="{{ asset('/dist/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('/dist/modules/ionicons/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{ asset('/dist/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css')}}">

  <link rel="stylesheet" href="{{ asset('/dist/css/demo.css')}}">
  <link rel="stylesheet" href="{{ asset('/dist/css/style.css')}}">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              Stisla
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>
              <div class="card-body">
                <form method="POST" action="{{ route('signup') }}">
                  @csrf
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="name" >First Name</label>
                      <input id="name" value="{{old('name')}}"  type="text" class="form-control" name="name" autofocus>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email">
                    <div class="invalid-feedback">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input id="password2" type="password" class="form-control" name="password_confirmation">
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Stisla <span id="year"></span>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script src="{{ asset('/dist/modules/jquery.min.js')}}"></script>
  <script src="{{ asset('/dist/modules/popper.js')}}"></script>
  <script src="{{ asset('/dist/modules/tooltip.js')}}"></script>
  <script src="{{ asset('/dist/modules/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('/dist/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
  <script src="{{ asset('/dist/modules/moment.min.js')}}"></script>
  <script src="{{ asset('/dist/modules/scroll-up-bar/dist/scroll-up-bar.min.js')}}"></script>
  <script src="{{ asset('/dist/js/sa-functions.js')}}"></script>
  
  <script src="{{ asset('/dist/js/scripts.js')}}"></script>
  <script src="{{ asset('/dist/js/custom.js')}}"></script>
  <script src="{{ asset('/dist/js/demo.js')}}"></script>
  <script>
    const year = document.getElementById('year');
    year.innerHTML = new Date().getFullYear();
  </script>
</body>
</html>