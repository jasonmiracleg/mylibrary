@extends('layouts.template')

@section('layout_content')
    <h3>{{ $writer->name }}</h3>
    <h4>{{ $writer->contact }}</h4>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Synopsis</th>
                <th scope="col">Publisher</th>
            </tr>
        </thead>
        <tbody>
            @php($counter = 1)
            @foreach ($writer->books as $book)
                <tr>
                    <td>{{ $counter }}</td>
                    <td>{{ $book['title'] }}</td>
                    <td>{{ $book['synopsis'] }}</td>
                    <td>{{ $book['publisher'] }}</td>
                </tr>
                @php($counter++)
            @endforeach
        </tbody>
    </table>
@endsection
