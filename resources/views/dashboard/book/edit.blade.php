@extends('dashboard.base')

@section('content')

<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ __('Edit Book') }}
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
                        <form method="POST" action="/book/{{ $book->id }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label>Title</label>
                                <input class="form-control" type="text" placeholder="{{ __('Title') }}" name="title" value="{{$book->title}}" required autofocus>
                            </div>

                            <div class="form-group row">
                                <label>Description</label>
                                <textarea class="form-control" id="desc" name="description" rows="9" placeholder="{{ __('Description ...') }}" required>
                                {{ $book->description }}
                                </textarea>
                            </div>

                            <div class="form-group row">
                                <label>Published</label>
                                <input type="date" class="form-control" name="published_date" value="{{ $book->published_date }}" required />
                            </div>

                            <div class="form-group row">
                                <label for="writers"></label>
                                <select class="form-control" id="writers" name="writers" multiple required>
                                    @foreach($writers as $writer)
                                    @if (array_search($writer->id, array_column($book->writers->all(), 'id')) !== false)
                                    <option value="{{ $writer->id }}" selected>{{ $writer->first_name . ' ' . $writer->last_name }}</option>
                                    @else
                                    <option value="{{ $writer->id }}">{{ $writer->first_name . ' ' . $writer->last_name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label>Pages</label>
                                <input class="form-control" type="number" min="1" placeholder="{{ __('Total pages') }}" name="total_pages" value="{{ $book->total_pages }}" required>
                            </div>
                            <div class="form-group row">
                                <label for="image-file">Image</label>
                                <img class="img-fluid" src="{{ $book->image_url }}" />
                                <input id="image-file" type="file" name="image_file">
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
