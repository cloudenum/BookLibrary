@extends('dashboard.base')

@section('content')

<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ __('Edit Writer') }}
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/writers/{{ $writer->id }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <div class="col">
                                    <label>First Name</label>
                                    <input class="form-control" type="text" placeholder="{{ __('First Name') }}" name="first_name" value="{{ $writer->first_name }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col">
                                    <label>Last Name</label>
                                    <input class="form-control" type="text" placeholder="{{ __('Last Name') }}" name="last_name" value="{{ $writer->last_name }}" required autofocus>
                                </div>
                            </div>

                            <button class="btn btn-block btn-success" type="submit">{{ __('Save') }}</button>
                            <a href="{{ route('writer.index') }}" class="btn btn-block btn-primary">{{ __('Back') }}</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')

@endsection
