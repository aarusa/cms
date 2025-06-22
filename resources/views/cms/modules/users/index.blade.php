{{-- File: resources/views/cms/dashboard.blade.php --}}
@extends('cms.layouts.master')

@section('title', 'Dashboard')

@section('content')

@php
    $loggedInUser = auth()->user();
@endphp
    
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
                            <th scope="col">Name</th>
                            <th scope="col">Role</th>
                            {{-- <th scope="col">Status</th>
                            <th scope="col">Verification</th> --}}
                            <th scope="col">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                
                        @if($users->count() > 0)
                          @foreach($users as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user->fname }} {{ $user->mname }} {{ $user->lname }}</td>
                                <td>{{ implode(', ', $user->getRoleNames()->toArray()) }}</td>
                                {{-- <td></td>
                                <td></td> --}}
                                <td>
                                  {{-- Show Edit ONLY if logged-in user is Super Admin --}}
                                  @if(
                                      ($loggedInUser->hasAnyRole(['Admin', 'Super Admin'])) 
                                      && !$user->hasRole('Super Admin')
                                  )
                                      <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                                  @endif

                                 {{-- Delete button for Admin or Super Admin users, but only if the listed user is NOT Super Admin --}}
                                  @if(
                                      ($loggedInUser->hasAnyRole(['Admin', 'Super Admin'])) 
                                      && !$user->hasRole('Super Admin')
                                  )
                                      <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger"
                                              onclick="return confirm('Are you sure you want to delete this user?');">
                                              Delete
                                          </button>
                                      </form>
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
