@extends('layouts.master')

@section('content')



    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Dashboard</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>

        </div>
    </div>
    <!-- End Page Header -->

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body text-center">
                    <h1>{{ auth()->user()->userGreetings() }}  </h1> <br>
                    <h1>Welcome Back!</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->


@endsection

{{-- @section('script')

@include('layouts.includes.chart')

@endsection --}}
