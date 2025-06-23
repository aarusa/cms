{{-- File: resources/views/cms/modules/users/permissions/index.blade.php --}}
@extends('cms.layouts.master')

@section('title', 'Permissions Management')

@section('content')

@php
    $loggedInUser = auth()->user();
@endphp
    
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Permissions Management</h3>
                <h6 class="op-7 mb-2">Overview of all permissions and their role assignments</h6>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <a href="{{ route('permissions.create') }}" class="btn btn-primary btn-round">Add New Permission</a>
            </div>
        </div>
        
        {{-- Permissions contents --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">All Permissions</div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Permission Name</th>
                                    <th scope="col">Assigned Roles</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($permissions->count() > 0)
                                    @foreach($permissions as $index => $permission)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                            {{ $permission->name }}
                                                <!-- <span class="badge bg-primary">{{ $permission->name }}</span> -->
                                            </td>
                                            <td>
                                                @php
                                                    $assignedRoles = $permission->roles;
                                                @endphp
                                                @if($assignedRoles->count() > 0)
                                                    @foreach($assignedRoles as $role)
                                                        <span class="badge bg-secondary me-1">{{ $role->name }}</span>
                                                    @endforeach
                                                @else
                                                    <span class="text-muted">No roles assigned</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-info btn-sm">View Details</a>
                                                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                
                                                @if($permission->roles()->count() == 0)
                                                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" style="display:inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure you want to delete this permission?');">
                                                            Delete
                                                        </button>
                                                    </form>
                                                @else
                                                    <!-- <span class="badge bg-secondary">Protected</span> -->
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center">No permissions found.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Role-Permission Matrix --}}
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Role-Permission Matrix</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Roles</th>
                                        @foreach($permissions as $permission)
                                            <th class="text-center">{{ $permission->name }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($roles as $role)
                                        <tr>
                                            <td><strong>{{ $role->name }}</strong></td>
                                            @foreach($permissions as $permission)
                                                <td class="text-center">
                                                    @if($role->hasPermissionTo($permission->name))
                                                        <span class="badge bg-success">✓</span>
                                                    @else
                                                        <span class="badge bg-light text-dark">✗</span>
                                                    @endif
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
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
