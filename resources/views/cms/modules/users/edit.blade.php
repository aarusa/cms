{{-- File: resources/views/cms/dashboard.blade.php --}}
@extends('cms.layouts.master')

@section('title', 'Dashboard')

@section('content')
    
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Add New User</h3>
                <h6 class="op-7 mb-2">Fill out the form to create a new system user.</h6>
            </div>
        </div>
        
        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="fname">First Name</label>
                                        <input
                                            type="text"
                                            class="form-control @error('fname') is-invalid @enderror"
                                            id="fname"
                                            name="fname"
                                            value="{{ old('fname', $user->fname) }}"
                                            placeholder="Enter First Name"
                                        />
                                        @error('fname')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="mname">Middle Name</label>
                                        <input
                                            type="text"
                                            class="form-control @error('mname') is-invalid @enderror"
                                            id="mname"
                                            name="mname"
                                            value="{{ old('mname', $user->mname) }}"
                                            placeholder="Enter Middle Name"
                                        />
                                        @error('mname')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="lname">Last Name</label>
                                        <input
                                            type="text"
                                            class="form-control @error('lname') is-invalid @enderror"
                                            id="lname"
                                            name="lname"
                                            value="{{ old('lname', $user->lname) }}"
                                            placeholder="Enter Last Name"
                                        />
                                        @error('lname')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    
                                    <div class="form-group">
                                        <label for="email2">Email Address</label>
                                        <input
                                            type="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            id="email2"
                                            name="email"
                                            value="{{ old('email', $user->email) }}"
                                            placeholder="Enter Email"
                                        />
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input
                                            type="text"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            id="phone"
                                            name="phone"
                                            value="{{ old('phone', $user->phone) }}"
                                            placeholder="Enter Phone Number"
                                        />
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input
                                            type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            id="password"
                                            name="password"
                                            placeholder="Password"
                                        />
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="defaultSelect">Role</label>
                                        <select
                                            class="form-select form-control @error('role') is-invalid @enderror"
                                            id="defaultSelect"
                                            name="role"
                                        >
                                            <option value="">Select Role</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->name }}" {{ $user->roles->first()->name == $role->name ? 'selected' : '' }}>
                                                    {{ $role->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button class="btn btn-success" type="submit">Update</button>
                            <a href="{{ route('users.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="userImage">Upload Photo</label><br>
                                    <input
                                        type="file"
                                        class="form-control-file"
                                        id="userImage"
                                    />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>

@endsection
