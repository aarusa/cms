  {{-- File: resources/views/cms/dashboard.blade.php --}}
  @extends('cms.layouts.master')

  @section('title', 'Role Management')

  @section('content')

  @php
      $loggedInUser = auth()->user();
  @endphp
      
      <div class="page-inner">
          <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
              <div>
                  <h3 class="fw-bold mb-3">Role Management</h3>
                  <h6 class="op-7 mb-2">Overview of all user roles in the system</h6>
              </div>
              <div class="ms-md-auto py-2 py-md-0">
                  <a href="{{ route('roles.create') }}" class="btn btn-primary btn-round">Add New Role</a>
              </div>
          </div>
          {{-- User contents --}}
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <div class="card-title">All Roles</div>
                    </div>
                    <div class="card-body">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                              <th scope="col">#</th>
                              <th scope="col">Role</th>
                              <th scope="col">Permissions</th>
                              <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                  
                          @if($roles->count() > 0)
                            @foreach($roles as $index => $role)
                              <tr>
                                  <td>{{ $index + 1 }}</td>
                                  <td>{{ $role->name }}</td>
                                  <td>
                                      <a href="{{ route('permissions.role', $role->id) }}" class="btn btn-info btn-sm">
                                          Manage Permissions 
                                          <span class="badge bg-light text-dark ms-1">{{ $role->permissions->count() }}</span>
                                      </a>
                                  </td>
                                  <td>
                                    @if(strtolower($role->name) !== 'super admin')
                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline-block">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger btn-sm"
                                              onclick="return confirm('Are you sure you want to delete this role?');">
                                              Delete
                                          </button>
                                      </form>
                                    @else
                                        <span class="badge bg-secondary">Protected</span>
                                    @endif
                                  </td>
                              </tr>
                            @endforeach
                          @endif
                        </tbody>
                      </table>
                    </div>
                  </div>
              </div>
          </div>

      </div>
      </div>
      
  @endsection

  @push('scripts')
  <script>
      // Check for success message
      @if (session('success'))
          swal({
              title: "Success!",
              text: "{{ session('success') }}",
              icon: "success",
              button: "OK",
          });
      @endif

      // Check for error message
      @if (session('error'))
          swal({
              title: "Error!",
              text: "{{ session('error') }}",
              icon: "error",
              button: "OK",
          });
      @endif
  </script>
  @endpush
