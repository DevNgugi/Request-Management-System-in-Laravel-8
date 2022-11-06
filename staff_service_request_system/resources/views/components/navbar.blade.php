@section('navbar')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <link rel="preconnect" href="https://fonts.googleapis.com/" crossorigin />
        <!-- CSS files -->
        <link href="dist/css/tabler.minc666.css?1655415752" rel="stylesheet" />
        <link href="dist/css/tabler-flags.minc666.css?1655415752" rel="stylesheet" />
        <link href="dist/css/tabler-payments.minc666.css?1655415752" rel="stylesheet" />
        <link href="dist/css/tabler-vendors.minc666.css?1655415752" rel="stylesheet" />
        <link href="dist/css/demo.minc666.css?1655415752" rel="stylesheet" />
        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    </head>

    <body>
        <div class="page">
            <header class="navbar navbar-expand-md navbar-light d-print-none">
                <div class="container-xl">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <h3>Staff Service Request System</h3>
                    <div class="navbar-nav flex-row order-md-last">
                        <div class="nav-item d-none d-md-flex me-3">
                            <div class="btn-list">

                            </div>
                        </div>
                        <div class="d-none d-md-flex">

                            <div class="nav-item dropdown d-none d-md-flex me-3">
                                <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                                    aria-label="Show notifications">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                                        <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                                    </svg>
                                    <span id="notifCount" style="font-size: 8px" class="badge bg-red"></span>
                                </a>

                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                                aria-label="Open user menu">
                                <svg  xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-user-circle" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <circle cx="12" cy="10" r="3"></circle>
                                    <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
                                </svg>
                                <div class="d-none d-xl-block ps-2">
                                    <div>{{ Auth::User()->name }}</div>
                                    <div class="mt-1 small text-muted">
                                        @if (Auth::User()->designation == 'Admin')
                                            {{ 'Admin' }}
                                        @else
                                            {{ 'Staff' }}
                                        @endif
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <a href="{{ route('profile') }}" class="dropdown-item">Profile & account</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{route('logout')}" class="dropdown-item"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">Logout</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="navbar-expand-md">
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <div class="navbar navbar-light">
                        <div class="container-xl">
                            <ul class="navbar-nav">
                                @if(Auth::User()->designation=='Admin')
                                <li class="nav-item {{ Request::path() == '/' ? 'active' : '' }}  ">

                                    <a class="nav-link" href="{{ route('users') }}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-users" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <circle cx="9" cy="7" r="4"></circle>
                                                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                            </svg>
                                        </span>
                                        <span class="nav-link-title"> Staff </span>
                                    </a>
                                </li>
                                @endif
                                <li class="nav-item {{ Request::path() == 'leaves' ? 'active' : '' }} ">

                                    <a class="nav-link" href="{{ route('leaves') }}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-calendar-event" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <rect x="4" y="5" width="16" height="16"
                                                    rx="2"></rect>
                                                <line x1="16" y1="3" x2="16" y2="7">
                                                </line>
                                                <line x1="8" y1="3" x2="8" y2="7">
                                                </line>
                                                <line x1="4" y1="11" x2="20" y2="11">
                                                </line>
                                                <rect x="8" y="15" width="2" height="2">
                                                </rect>
                                            </svg>
                                        </span>
                                        <span class="nav-link-title"> Leave Requests</span>
                                    </a>
                                </li>
                                <li class="nav-item  {{ Request::path() == 'items' ? 'active' : '' }} ">

                                    <a class="nav-link" href="{{ route('items') }}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-ballpen" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M14 6l7 7l-4 4"></path>
                                                <path
                                                    d="M5.828 18.172a2.828 2.828 0 0 0 4 0l10.586 -10.586a2 2 0 0 0 0 -2.829l-1.171 -1.171a2 2 0 0 0 -2.829 0l-10.586 10.586a2.828 2.828 0 0 0 0 4z">
                                                </path>
                                                <path d="M4 20l1.768 -1.768"></path>
                                            </svg>
                                        </span>
                                        <span class="nav-link-title"> Item Requests</span>
                                    </a>
                                </li>

                            </ul>

                        </div>
                    </div>
                </div>
            </div>


        @stop
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

        <script>
            $(document).ready(function() {
                // update the notification

                $.ajax({
                    type: "GET",
                    url: "/notif",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    success: function(data) {
                        $('#notifCount').html(data)
                    },
                    error: function(error) {
                        console.log(error.error);

                    }
                }); //end ajax

            });
        </script>
