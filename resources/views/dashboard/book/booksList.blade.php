@extends('dashboard.base')

@section('content')

<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>{{ __('Books') }}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <a href="{{ route('book.create') }}" class="btn btn-primary m-2">{{ __('Add a Book') }}</a>
                        </div>
                        <br>
                        <table class="table table-responsive-sm table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Writers</th>
                                    <th>Pages</th>
                                    <th>Published</th>
                                    <th>Image URL</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($books as $book)
                                <tr>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->description }}</td>
                                    <td width="200px">
                                        @foreach ($book->writers as $writer)
                                        {{ $writer->first_name . ' ' . $writer->last_name }} <br />
                                        @endforeach
                                    </td>
                                    <td>{{ $book->total_pages }}</td>
                                    <td>{{
                                        $book->published_date
                                    }}</td>
                                    <td><img class="img-fluid" src="{{ $book->image_url }}" /></td>
                                    <td>
                                        <a href="{{ url('/book/' . $book->id) }}" class="btn btn-block btn-primary">View</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('/book/' . $book->id . '/edit') }}" class="btn btn-block btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('book.destroy', $book->id ) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-block btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $books->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('javascript')

@endsection
