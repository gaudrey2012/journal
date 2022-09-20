@extends('layouts.dashboard')
@section('content')
<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row clearfix mb-5 g-3 row-deck">
            <div class="col-md-12 col-lg-8">
                <div class="card">
                    <div class="card-body p-4 d-flex align-items-center">
                        <div class="d-flex align-items-center flex-column flex-md-row flex-fill">
                            <img src="assets/images/profile_av.png" alt="" class="rounded-circle">
                            <div class="media-body ms-md-5 m-0 mt-4 mt-md-0 text-md-start text-center">
                                <h5 class="font-weight-bold ">
                                    @if (Auth::user())
                                        {{ Auth::user()->name }}
                                    @endif
                                </h5>
                                <div class="text-muted mb-2">Achievement Level 6</div>
                                <a href="javascript:void(0)" class="d-inline-block text-primary"> <strong>234</strong> <span class="text-muted">followers</span> </a>
                                <a href="javascript:void(0)" class="d-inline-block text-primary ms-3"> <strong>111</strong> <span class="text-muted">following</span> </a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection