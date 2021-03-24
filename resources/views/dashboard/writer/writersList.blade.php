@extends('dashboard.base')

@section('content')

<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>{{ __('Writers') }}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <a href="{{ route('writer.create') }}" class="btn btn-primary m-2">{{ __('Add a Writer') }}</a>
                        </div>
                        <br>
                        <table class="table table-responsive-sm table-striped">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($writers as $writer)
                                <tr>
                                    <td>{{ $writer->first_name }}/td>
                                    <td><strong>{{ $writer->last_name }}</strong></td>
                                    <td>
                                        <a href="{{ url('/writers/' . $writer->id) }}" class="btn btn-block btn-primary">View</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('/writers/' . $writer->id . '/edit') }}" class="btn btn-block btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('writer.destroy', $writer->id ) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-block btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $writers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('javascript')

@endsection
