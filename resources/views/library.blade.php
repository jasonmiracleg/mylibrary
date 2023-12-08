@extends('layouts.template')

@section('layout_content')
    <div class="btn-group" role="toolbar" aria-label="Toolbar with Button Groups">
        <div class="btn-group me-2" role="group" aria-label="Basic Example">
            <form action="{{ route('book.create') }}" method="GET">
                <button class="btn btn-primary" href="{{ route('book.create') }}">
                    Tambah
                </button>
            </form>
        </div>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Synopsis</th>
                <th scope="col">Writer Name</th>
                <th scope="col">Publisher</th>
            </tr>
        </thead>
        <tbody>
            @php($counter = 1)
            @foreach ($books as $book)
                <tr>
                    <td>{{ $counter }}</td>
                    <td>{{ $book['title'] }}</td>
                    <td>{{ $book['synopsis'] }}</td>
                    <td><a href="\library\{{ $book['writer_id'] }}">{{ $book->writer->name }}</a></td>
                    <td>{{ $book->publisher->publisher }}</td>
                </tr>
                @php($counter++)
            @endforeach
        </tbody>
    </table>
@endsection
