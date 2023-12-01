@extends('layouts.template')

@section('layout_content')
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
                    <td>{{ $book['writer_name'] }}</td>
                    <td>{{ $book['publisher'] }}</td>
                </tr>
                $counter++
            @endforeach
        </tbody>
    </table>
@endsection