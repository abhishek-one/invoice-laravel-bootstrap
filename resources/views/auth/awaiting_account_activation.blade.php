@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Message') }}</div>
                <div class="card-body">
                    <div class="row mb-3">
                        <label for="email" class="text-center">
                        @if(Session::has('msg'))
                        {{ Session::get('msg') }}
                        @else
                        {{'Something went wrong. Please contact Admin'}}
                        @endif   
                        </label> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection