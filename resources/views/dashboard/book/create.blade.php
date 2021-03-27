@extends('dashboard.base')

@section('content')

<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ __('Create Book') }}
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
                        @if ($message?? '')
                        <div class="alert alert-info">
                            {{ $message }}
                        </div>
                        @endif
                        <form method="POST" action="{{ route('book.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label>Title</label>
                                <input class="form-control" type="text" placeholder="{{ __('Title') }}" name="title" required autofocus>
                            </div>

                            <div class="form-group row">
                                <label>Description</label>
                                <textarea class="form-control" id="desc" name="description" rows="9" placeholder="{{ __('Description ...') }}" required></textarea>
                            </div>

                            <div class="form-group row">
                                <label>Published</label>
                                <input type="date" class="form-control" name="published_date" required />
                            </div>

                            <div class="form-group row">
                                <label for="writers"></label>
                                <select class="form-control" id="writers" name="writers[]" multiple="multiple" required>
                                    @foreach($writers as $writer)
                                    <option value="{{ $writer->id }}">{{ $writer->first_name . ' ' . $writer->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label>Pages</label>
                                <input class="form-control" type="number" min="1" placeholder="{{ __('Total pages') }}" name="total_pages" required>
                            </div>
                            <div class="form-group row">
                                <label for="image-file">Image</label>
                                <input id="image-file" type="file" name="image_file">
                            </div>
                            <button class="btn btn-block btn-success" type="submit">{{ __('Add') }}</button>
                            <a href="{{ route('book.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
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
