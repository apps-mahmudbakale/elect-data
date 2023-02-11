<div>
    <div class="card-body">
                    
        <div id="users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_length" id="users_length"><label>Show <select wire:model="perPage"
                                aria-controls="users"
                                class="custom-select custom-select-sm form-control form-control-sm">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select> entries</label></div>
                </div>
                <div class="col-sm-12 col-md-5">
                    <div id="users_filter" class="dataTables_filter"><label>Search:<input type="search"
                                class="form-control form-control-sm" wire:model.debounce.300ms='search' placeholder=""
                                aria-controls="users"></label></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="users" class="table table-striped dataTable no-footer"
                        role="grid" aria-describedby="users_info">
                        <thead>
                            <tr role="row">
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>State</th>
                                <th>LGA</th>
                                <th>Role</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach($users as $user)
                                <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->state_name}}</td>
                                <td>{{$user->lg_name}}</td>
                                <td>{{$user->roles->first()->name}}</td>
                                <td class="text-right">
                                    <span class="dropdown ml-1">
                                        <button class="btn btn-default btn-sm dropdown-toggle align-text-top"
                                            data-boundary="viewport" data-toggle="dropdown">Actions</button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('users.edit', $user->id) }}">
                                                Edit
                                            </a>
                                            <button class="dropdown-item" id="del{{ $user->id }}" data-value="{{ $user->id }}">
                                                Delete
                                            </button>
                                        </div>
                                    </span>
                                    <script>
                                        document.querySelector('#del{{ $user->id }}').addEventListener('click', function(e) {
                                            // alert(this.getAttribute('data-value'));
                                            Swal.fire({
                                                title: 'Are you sure?',
                                                text: "You won't be able to revert this!",
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Yes, delete it!'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    document.getElementById('del#'+this.getAttribute('data-value')).submit();
                                                    // Swal.fire(
                                                    //     'Deleted!',
                                                    //     'Your file has been deleted.',
                                                    //     'success'
                                                    // )
                                                }
                                            })
                                        })
                                    </script>
                                    <form id="del#{{ $user->id }}"
                                        action="{{ route('users.destroy', $user->id) }}" method="POST"
                                         style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </form>
                                </td>
                            </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="users_info" role="status" aria-live="polite">Showing <b>{{ $users->firstItem() }}</b> to
                        <b>{{ $users->lastItem() }}</b> out of <b>{{ $users->total() }}</b> entries</div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="users_paginate">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
