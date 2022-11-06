<!doctype html>

<html lang="en">
  
<head>
    
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Staff Service Request System - Login</title>
       <!-- CSS files -->
    <link href="{{asset('dist/css/tabler.minc666.css?1655415752')}}" rel="stylesheet"/>
    <link href="{{asset('dist/css/tabler-flags.minc666.css?1655415752')}}" rel="stylesheet"/>
    <link href="{{asset('dist/css/tabler-payments.minc666.css?1655415752')}}" rel="stylesheet"/>
    <link href="{{asset('dist/css/tabler-vendors.minc666.css?1655415752')}}" rel="stylesheet"/>
    <link href="{{asset('dist/css/demo.minc666.css?1655415752')}}" rel="stylesheet"/>
  </head>
  <body  class=" border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
      <div class="container-tight py-4">
        
        <form class="card card-md" action="#" method="get" autocomplete="off">
          @csrf
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Login to your account</h2>
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="email" class="form-control" placeholder="Enter Username" autocomplete="off">
              @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
            <div class="mb-2">
              <label class="form-label">
                Password
               
              </label>
              <div class="input-group input-group-flat">
                <input type="password" class="form-control"  placeholder="Password"  autocomplete="off">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              </div>
            </div>
            
            <div class="form-footer">
              <button  type="submit" class="btn btn-primary w-100">
                <a class="text-white" href="#">Sign in</a>
              </button>
            </div>
          </div>
         
        </form>
        
      </div>
    </div>
  </body>
</html>