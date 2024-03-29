<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Sleek Dashboard - Free Bootstrap 4 Admin Dashboard Template and UI Kit. It is very powerful bootstrap admin dashboard, which allows you to build products like admin panels, content management systems and CRMs etc.">

    <title>Login in </title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />
    <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />

    <!-- SLEEK CSS -->
    <link id="sleek-css" rel="stylesheet" href="{{asset('backend/assets/css/sleek.css')}}" />
    <link href="{{asset('backend/assets/plugins/toastr/toastr.min.css')}}"rel='stylesheet'>
    
    <link href=" {{asset('backend/assets/plugins/nprogress/nprogress.css')}}" rel="stylesheet" />
    <link href="{{asset('backend/assets/plugins/flag-icons/css/flag-icon.min.css')}}"rel='stylesheet'>
    
    <!-- No Extra plugin used -->
    <link href="{{asset('backend/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}"rel='stylesheet'>
    <link href="{{asset('backend/assets/plugins/ladda/ladda.min.css')}}"rel='stylesheet'>
    <link href="{{asset('backend/assets/plugins/select2/css/select2.min.css')}}"rel='stylesheet'>
    
    <link href="{{asset('backend/assets/plugins/daterangepicker/daterangepicker.css')}}"rel='stylesheet'>   
    <!-- FAVICON -->
    <link href="{{asset('backend/assets/img/favicon.png')}}" rel="shortcut icon" />

    <script src="{{asset('backend/assets/plugins/nprogress/nprogress.js')}}"></script>
  </head>

  <body class="" id="body">
    <div class="container d-flex align-items-center justify-content-center vh-100">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-10">
          <div class="card">
            <div class="card-header bg-primary">
              <div class="app-brand">
                <a href="/index.html">
                  <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30" height="33"
                    viewBox="0 0 30 33">
                    <g fill="none" fill-rule="evenodd">
                      <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                      <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                    </g>
                  </svg>

                  <span class="brand-name">Dashboard</span>
                </a>
              </div>
            </div>

            <div class="card-body p-5">
              <h4 class="text-dark mb-5">Sign In</h4>
              
              <form action="{{route('login')}}" method="POST">
              	@csrf
                <div class="row">
                  <div class="form-group col-md-12 mb-4">
                    <input type="email" class="form-control input-lg" id="email" name="email" aria-describedby="emailHelp" placeholder="Write Your Email">
                  </div>

                  <div class="form-group col-md-12 ">
                    <input type="password" class="form-control input-lg" name="password" id="password" placeholder="Password">
                  </div>

                  <div class="col-md-12">
                    <div class="d-flex my-2 justify-content-between">
                      <div class="d-inline-block mr-3">
                        <label class="control control-checkbox">Remember me
                          <input type="checkbox" />
                          <div class="control-indicator"></div>
                        </label>
                      </div>

                      <p><a class="text-blue" href="#">Forgot Your Password?</a></p>
                    </div>

                    <button type="submit" class="btn btn-lg btn-primary btn-block mb-4">Sign In</button>

                    <p>Don't have an account yet ?
                      <a class="text-blue" href="{{route('register')}}">Sign Up</a>
                    </p>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Javascript -->
    <script src="{{asset('backend/assets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/sleek.js')}}"></script>
  	<link href="{{asset('backend/assets/plugins/assets/options/optionswitch.css')}}" rel="stylesheet">
	<script src="{{asset('backend/assets/plugins/assets/options/optionswitcher.js')}}"></script>
</body>
</html>