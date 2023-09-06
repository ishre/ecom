
@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">

    <div class="row profile-body">
        <!-- left wrapper start -->
        <div class="col-md-4 col-xl-4 left-wrapper">
            <div class=" card rounded">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="card-title mb-0">About</h6>
                    </div>
                    <div class="mt-3 mb-3">
                        <img class="wd-100 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('https://static.vecteezy.com/system/resources/previews/008/442/086/non_2x/illustration-of-human-icon-user-symbol-icon-modern-design-on-blank-background-free-vector.jpg') }} " alt="profile">
                    </div>
                    <div class="mb-3">
                        <span class="h4 mt-3">{{ $profileData->name }}</span>
                    </div>
                    <p>Hi! I'm Amiah the Senior UI Designer at NobleUI. We hope you enjoy the design and quality of Social.</p>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Username:</label>
                        <p class="text-muted"><span>@</span>{{ $profileData->username }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                        <p class="text-muted">{{ $profileData->email }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                        <p class="text-muted">{{ $profileData->phone }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
                        <p class="text-muted">{{ $profileData->address }}</p>
                    </div>

                    <div class="mt-3 d-flex social-links">
                        <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="github"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="twitter"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- left wrapper end -->
        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-8 middle-wrapper">

            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">Admin Password Change</h6>

                    <form class="forms-sample" method="POST" action="{{ route('admin.update.password') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Old Password</label>
                            <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="old_password" autocomplete="off">
                            @error ('old_password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" autocomplete="off" >
                            @error('new_password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="old_password" class="form-label">Confirm New Password</label>
                            <input name="new_password_confirmation" type="password" class="form-control" id="new_password_confirmation" autocomplete="off" >
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-secondary">Cancel</button>
                    </form>

                </div>
            </div>
        </div>

        <!-- middle wrapper end -->
    </div>

</div>


@endsection