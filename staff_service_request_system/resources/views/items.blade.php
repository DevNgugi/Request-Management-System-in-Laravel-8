@include('components.navbar')
@include('components.footer')

@yield('navbar')


<div class="page-wrapper">
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">Item Requests</h2>
                </div>
                @if(Auth::User()->designation !='Admin')

                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">

                        <a onclick="defaults()" href="#" class="btn btn-primary d-none d-sm-inline-block"
                            data-bs-toggle="modal" data-bs-target="#modal-report">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            Create New Request
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
                @endif
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
                                  @if(Auth::User()->designation == 'Admin')
                                  <th>
                                    <button class="table-sort" data-sort="sort-name">
                                        Requested by
                                    </button>
                                </th>
                                      
                                      @endif
                                    <th>
                                        <button class="table-sort" data-sort="sort-name">
                                            Name
                                        </button>
                                    </th>
                                    </th>
                                    <th>
                                        <button class="table-sort" data-sort="sort-quantity">
                                            Quantity
                                        </button>
                                    </th>
                                    <th>
                                        <button class="table-sort" data-sort="sort-quantity">
                                            Created_At
                                        </button>
                                    </th>
                                    <th>
                                        <button class="table-sort" data-sort="sort-quantity">
                                            Status
                                        </button>
                                    </th>
                                    <th>
                                        <button class="table-sort" data-sort="sort-progress">
                                            Action
                                        </button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="table-tbody">
                                @isset($records)
                                    @foreach ($records as $record)
                                    @if($record->created_by == Auth::User()->email || Auth::User()->designation == 'Admin' )

                                        <tr>@if(Auth::User()->designation == 'Admin')
                                          <td class="sort-name">{{ $record->created_by }}</td> @endif

                                            <td class="sort-name">{{ $record->name }}</td>
                                            <td class="sort-city">{{ $record->quantity }}</td>
                                            <td class="sort-type">{{ $record->created_at }}</td>
                                            @if ($record->is_approved == 0)
                                    
                                                    <td class="sort-type ">Pending</td>
                                                @endif
                                                @if ($record->is_approved == 1)
                                    
                                                    <td class="sort-type ">Approved</td>
                                                @endif
                                                @if ($record->is_approved == 2)
                                    
                                                    <td class="sort-type ">Denied</td>

                                                @endif
                                            <td>

                                                <a onclick="updateData({{ $record->id }})"
                                                    style="margin-right:10px;cursor: pointer; text-decoration: none; color:blue "
                                                    href="#" data-bs-toggle="modal" data-bs-target="#modal-report">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-eye" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <circle cx="12" cy="12" r="2"></circle>
                                                        <path
                                                            d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7">
                                                        </path>
                                                    </svg>
                                                </a>
                                                @if(Auth::User()->designation == 'Admin')
                                                @if ($record->is_approved == 0)
                                                <a onclick="idStore({{ $record->id }})"
                                                    style="cursor: pointer; text-decoration: none; color:green "
                                                    href="#" data-bs-toggle="modal" data-bs-target="#modal-small">
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
                                                @endif
                                                @endif
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
                <h5 class="modal-title">New Item Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="">

                        <div class="mb-3">
                            <label class="form-label">Item</label>
                            <input id="name" type="text" class="form-control" name="name">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="">
                        <div class="mb-3">
                            <label class="form-label">Quantity</label>
                            <input id="quantity" name="quantity" type="number" class="form-control "
                                autocomplete="off">

                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <a href="#" onclick="saveData()" class="btn btn-primary ms-auto" id="savebtn"
                        data-bs-dismiss="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <line x1="12" y1="5" x2="12" y2="19" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>
                        Submit Request
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Delete modals --}}

<div class="modal modal-blur fade" id="modal-small" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog modal-sm " role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title ">Take Action</div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="updateRequest(0)" class="btn btn-danger me-auto"
                    data-bs-dismiss="modal">Deny Request</button>
                <button type="button" onclick="updateRequest(1)" class="btn btn-success"
                    data-bs-dismiss="modal">Approve Request</button>
            </div>
        </div>
    </div>
</div>

<input id="idStore" style="visibility:none" />

@yield('footer')


<script>
    function defaults() {
        $('#savebtn').css('pointer-events', '');
    }

    function saveData() {

        var name = $('#name').val();
        var quantity = $('#quantity').val();

        $.ajax({
            type: "POST",
            url: "/item",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                name: name,
                quantity: quantity,

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

    function updateData(id) {
        var savebtn = $('#savebtn')
        var name = $('#name');
        var quantity = $('#quantity');
        $.ajax({
            type: "GET",
            url: "/item" + id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            success: function(data) {
                savebtn.css('pointer-events', 'none');
                name.val(data.name)
                quantity.val(data.quantity)


            },
            error: function(error) {
                console.log(error.error);

            }
        }); //end ajax
    }

    function idStore(id) {

        $('#idStore').val(id);

    }


    function updateRequest(arg) {
      var id=$('#idStore').val()
      var choice=arg
        $.ajax({
            type: "POST",
            url: "/item" + id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                choice: choice,
                

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

</script>
