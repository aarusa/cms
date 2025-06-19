{{-- File: resources/views/cms/dashboard.blade.php --}}
@extends('cms.layouts.master')

@section('title', 'Dashboard')

@section('content')
    
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">User Management</h3>
                <h6 class="op-7 mb-2">Overview of all registered users in the system</h6>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <a href="#" class="btn btn-label-info btn-round me-2">Manage Roles & Permissions</a>
                <a href="{{ route('users.create') }}" class="btn btn-primary btn-round">Add New User</a>
            </div>
        </div>
        {{-- User contents --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">All Users</div>
                  </div>
                  <div class="card-body">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Role</th>
                            <th scope="col">Status</th>
                            <th scope="col">Verification</th>
                            <th scope="col">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>1</td>
                            <td>Arusha</td>
                            <td>Shahi</td>
                            <td>Super Admin</td>
                            <td>Active</td>
                            <td>Verified</td>
                            <td>
                                <button class="btn btn-warning" disabled>Edit</button>
                                <button class="btn btn-danger" disabled>Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Ashish</td>
                            <td>Shahi</td>
                            <td>Admin</td>
                            <td>Active</td>
                            <td>Verified</td>
                            <td>
                                <button class="btn btn-warning">Edit</button>
                                <button class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    
@endsection
