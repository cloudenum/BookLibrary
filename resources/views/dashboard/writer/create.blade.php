@extends('dashboard.base')

@section('content')

<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ __('Add a Writer') }}
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form method="POST" action="{{ route('writer.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label>First Name</label>
                                <input class="form-control" type="text" placeholder="{{ __('First Name') }}" name="first_name" required autofocus>
                            </div>

                            <div class="form-group row">
                                <label>Last Name</label>
                                <input class="form-control" type="text" placeholder="{{ __('Last Name') }}" name="last_name" required autofocus>
                            </div>

                            <button class="btn btn-block btn-success" type="submit">{{ __('Add') }}</button>
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
