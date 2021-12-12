@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-7">
        <div class="text-primary p-3">
            <h5 class="text-primary">Welcome Back !</h5>
            {{-- <p>{{ auth()->user()->userGreetings() }}</p> --}}

        </div>
    </div>
</div>

{{-- <div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4>Lesson Category</h4>
                <div id="lesson-chart" class=""></div>
            </div>
        </div>
    </div>
    <div class="col-md-6"></div>
</div> --}}
@endsection

{{-- @section('script')

@include('layouts.includes.chart')

@endsection --}}
