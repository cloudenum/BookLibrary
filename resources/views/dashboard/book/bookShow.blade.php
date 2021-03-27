@extends('dashboard.base')

@section('content')

<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Book
                    </div>
                    <div class="card-body">
                        <h4>{{ $book->title }}</h4>
                        <img class="img-fluid" src="{{ $book->image_url }}" />
                        <h6>Description:</h6>
                        <p> {{ $book->description }}</p>
                        <h6>Writers:</h6>
                        <p>
                            @foreach ($book->writers as $writer)
                            {{ $writer->first_name . ' ' . $writer->last_name }} <br />
                            @endforeach
                        </p>
                        <h6>Pages:</h6>
                        <p> {{ $book->total_pages }}</p>
                        <h6>Published:</h6>
                        <p> {{ $book->published_date }}</p>
                        <a href="{{ route('book.index') }}" class="btn btn-block btn-primary">{{ __('Back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('javascript')

@endsection
