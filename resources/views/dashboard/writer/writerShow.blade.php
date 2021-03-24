@extends('dashboard.base')

@section('content')

<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Writer
                    </div>
                    <div class="card-body">
                        <h4>First Name:</h4>
                        <p> {{ $writer->first_name }}</p>
                        <h4>Last Name:</h4>
                        <p> {{ $writer->last_name }}</p>
                        <a href="{{ route('writer.index') }}" class="btn btn-block btn-primary">{{ __('Back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('javascript')

@endsection
