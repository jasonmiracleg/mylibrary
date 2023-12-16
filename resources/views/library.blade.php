@extends('layouts.template')

@section('layout_content')
    <div class="btn-group" role="toolbar" aria-label="Toolbar with Button Groups">
        <div class="btn-group me-2" role="group" aria-label="Basic Example">
            <form action="{{ route('library.create') }}" method="GET">
                <button class="btn btn-primary" href="{{ route('library.create') }}">
                    Tambah
                </button>
            </form>
        </div>
    </div>
    {{-- <div style="max-height: 350px; overflow:hidden">
        <img src="{{ asset('strorage/' . $namaModel->namaAtributGambar) }}" alt="{{ $namaModel->bebas }}" class="img-fluid">
    </div> --}}
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Synopsis</th>
                <th scope="col">Writer Name</th>
                <th scope="col">Publisher</th>
                <th scope="col">Action</th>
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
                    <td>
                        <a href="{{ route('library.edit', $book) }}"><button class="btn btn-info" id="edit"
                                name="edit">Edit</button></a>
                        <form action="{{ route('library.destroy', $book) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" id="delete" name="delete">Delete</button>
                        </form>
                    </td>
                </tr>
                @php($counter++)
            @endforeach
        </tbody>
    </table>
@endsection
