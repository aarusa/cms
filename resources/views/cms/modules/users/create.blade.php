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
                                        class="form-control"
                                        id="fname"
                                        placeholder="Enter First Name"
                                    />
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="mname">Middle Name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="mname"
                                        placeholder="Enter Middle Name"
                                    />
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="lname">Last Name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="lname"
                                        placeholder="Enter Last Name"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                
                                <div class="form-group">
                                    <label for="email2">Email Address</label>
                                    <input
                                        type="email"
                                        class="form-control"
                                        id="email2"
                                        placeholder="Enter Email"
                                    />
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="password"
                                        placeholder="Password"
                                    />
                                </div>

                                <div class="form-group">
                                    <label for="defaultSelect">Role</label>
                                    <select
                                        class="form-select form-control"
                                        id="defaultSelect"
                                    >
                                        <option>Admin</option>
                                        <option>Editor</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button class="btn btn-success">Submit</button>
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
    </div>

@endsection
