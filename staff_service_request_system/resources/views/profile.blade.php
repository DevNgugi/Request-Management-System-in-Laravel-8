
@include('components.navbar')
@include('components.footer')

@yield('navbar')

        <div class="page-wrapper">
            <div class="container-xl">
                <!-- Page title -->
                <div class="page-header d-print-none">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <h2 class="page-title">Profile</h2>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="page-body">
                <div class="container-xl">
                   
                    <div class="row">
                        
                        <div class="col-12 col-md-8 m-auto">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Account Information</h3>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="form-group mb-3 row">
                                                    <label class="form-label col-3 col-form-label">Name
                                                        </label>
                                                    <div class="col">
                                                        <input value="{{$records->name}}" disabled type="email" class="form-control"
                                                            aria-describedby="emailHelp"/>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label class="form-label col-3 col-form-label">Email
                                                        address</label>
                                                    <div class="col">
                                                        <input value="{{$records->email}}" disabled type="email" class="form-control"
                                                            aria-describedby="emailHelp"/>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label class="form-label col-3 col-form-label">Phone Number
                                                        </label>
                                                    <div class="col">
                                                        <input value="{{$records->phone}}" disabled type="email" class="form-control"
                                                            aria-describedby="emailHelp"/>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label class="form-label col-3 col-form-label">Department
                                                        </label>
                                                    <div class="col">
                                                        <input value="{{$records->department}}" disabled type="email" class="form-control"
                                                            aria-describedby="emailHelp"/>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label class="form-label col-3 col-form-label">Designation
                                                        </label>
                                                    <div class="col">
                                                        <input disabled type="email" class="form-control" value="{{$records->designation}}"
                                                            aria-describedby="emailHelp"/>
                                                    </div>
                                                </div>
                                                

                                                
                                              
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
 
    <script src="../browser.sentry-cdn.com/5.27.6/bundle.tracing.min.js"
        integrity="sha384-9Z8PxByVWP+gIm/rTMPn9BWwknuJR5oJcLj+Nr9mvzk8nJVkVXgQvlLGZ9SIFEJF" crossorigin="anonymous">
    </script>

    <!-- Libs JS -->
    <script src="dist/libs/list.js/dist/error-404c666.html?1655415752" defer></script>
    <!-- Tabler Core -->
    <script src="dist/js/tabler.minc666.js?1655415752" defer></script>
    <script src="dist/js/demo.minc666.js?1655415752" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        // Set the options that I want
        toastr.options = {
            "closeButton": true,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "3000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }


        function showToast() {
            toastr.success("Hello World!");
        }
    </script>

@yield('footer')
