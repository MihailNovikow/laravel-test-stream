@extends('layout.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All Streams</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('streams.create') }}"> Create New stream</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>name</th>
            <th>preview</th>
        </tr>
        @foreach ($streams as $stream)
        <tr>
            <td>{{ $stream->name }}</td>
            <td>{{ $stream->preview }}</td>
            <td>
                 <a class="btn btn-info" href="{{ route('streams.show',$stream->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('streams.edit',$stream->id) }}">Edit</a>
                <form action="{{ route('streams.destroy',$stream->id) }}" method="stream">
   
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection