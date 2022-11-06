@include('components.navbar')
@include('components.footer')

@yield('navbar')


<div class="page-wrapper">
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">Staff Members</h2>
                </div>
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">

                        <a href="#" onclick="defaults()" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                            data-bs-target="#modal-report">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            Add Staff
                        </a>
                        <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                            data-bs-target="#modal-report" aria-label="Create new report">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-body">
                    <div id="table-default">
                        <table class="table" id="example">
                            <thead>
                                <tr>
                                    <th>
                                        <button class="table-sort" data-sort="sort-name">
                                            Name
                                        </button>
                                    </th>
                                    <th>
                                        <button class="table-sort" data-sort="sort-city">
                                            Email
                                        </button>
                                    </th>
                                    <th>
                                        <button class="table-sort" data-sort="sort-city">
                                            Date Created
                                        </button>
                                    </th>
                                    <th>
                                        <button class="table-sort" data-sort="sort-city">
                                            Action
                                        </button>
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="table-tbody">
                                @isset($records)
                                    @foreach ($records as $record)
                                    @if(Auth::User()->email != $record->email)
                                    
                                        <tr>
                                            <td class="sort-name">{{ $record->name }}</td>
                                            <td class="sort-city">{{ $record->email }}</td>
                                            <td class="sort-type">{{ $record->created_at }}</td>

                                            <td>
                                              
                                                <a onclick="updateData({{ $record->id }})" style="cursor: pointer; text-decoration: none; color:green "
                                                    href="#" data-bs-toggle="modal" data-bs-target="#modal-report">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-edit" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path
                                                            d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1">
                                                        </path>
                                                        <path
                                                            d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                                        </path>
                                                        <path d="M16 5l3 3"></path>
                                                    </svg>
                                                </a>

                                                

                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>




{{-- modals --}}
<div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="">

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input id="name" type="text" class="form-control" name="name">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input id="email" name="email" type="email" class="form-control "
                                autocomplete="off">

                        </div>
                    </div>
                    <div class="">
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input id="phone" name="phone" type="text" class="form-control "
                                autocomplete="off">

                        </div>
                    </div>
                    <div class="">
                        <div class="mb-3">
                            <label class="form-label">Department</label>
                            <input id="department" name="department" type="text" class="form-control"
                                autocomplete="off">

                        </div>
                    </div>
                    <div class="">
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select id="designation" name="designation" class="form-select">
                                <option value="Surbodinate" selected>Surbodinate</option>
                                <option value="Director">Director</option>
                                <option value="Manager">Manager</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="">
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input id="password" name="department" type="text" class="form-control"
                                autocomplete="off">

                        </div>
                    </div>
                    <div class="">
                        <div class="mb-3">
                            <label class="form-label">Password Confirmation</label>
                            <input id="passconfirm" name="passconfirm" type="text" class="form-control"
                                autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Cancel
                </a>
                <a href="#" onclick="saveData()" id="savebtn" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>
                    Save User
                </a>
            </div>
        </div>
    </div>
</div>

{{-- Delete modals --}}
<div class="modal modal-blur fade" id="modal-danger" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-status bg-danger"></div>
            <div class="modal-body text-center py-4">
                <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 9v2m0 4v.01"></path>
                    <path
                        d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75">
                    </path>
                </svg>
                <h3>Are you sure?</h3>
                <div class="text-muted">Do you really want to remove 84 files? What you've done cannot be undone.</div>
            </div>
            <div class="modal-footer">
                <div class="w-100">
                    <div class="row">
                        <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                Cancel
                            </a></div>
                        <div class="col"><a href="#" class="btn btn-danger w-100" data-bs-dismiss="modal">
                                Delete 84 items
                            </a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@yield('footer')

<script>
    function saveData() {

        var name = $('#name').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var password = $('#password').val();
        var passconfirm = $('#passconfirm').val();
        var department = $('#department').val();
        var designation = $('#designation').val();
        $.ajax({
            type: "POST",
            url: "/adduser",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                name: name,
                email: email,
                password: password,
                department: department,
                phone: phone,
                designation: designation,
            },
            success: function(response) {

                if (response.success) {
                    toastr.success(response.success, "Success")
                }
                if (response.error) {
                    toastr.error(response.error, "Error")
                }

            },
            error: function(error) {
                console.log(error.error);

            }
        }); //end ajax
    }
    function defaults(){
    $('#savebtn').css('pointer-events','');
  }
  
    function updateData(id){
      var name = $('#name')
        var email = $('#email')
        var phone = $('#phone')
        var password = $('#password')
        var passconfirm = $('#passconfirm')
        var department = $('#department')
        var designation = $('#designation')
        var savebtn = $('#savebtn')
        $.ajax({
            type: "GET",
            url: "/getuser"+id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            
            success: function(data) {
              savebtn.css('pointer-events','none');

               name.val(data.email)
               email.val(data.email)
                phone.val(data.phone)
                password.val(data.password)
                department.val(data.department)
                designation.val(data.designation).change()
                
            },
            error: function(error) {
                console.log(error.error);

            }
        }); //end ajax
    }
</script>
