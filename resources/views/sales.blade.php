@extends('layouts.template')

@section('layout_content')
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Shop Name</th>
                <th scope="col">Book Title</th>
                <th scope="col">User Name</th>
                <th scope="col">Book Amount</th>
            </tr>
        </thead>
        <tbody>
            @php($counter = 1)
            @foreach ($sales as $sale)
                <tr>
                    <td>{{ $counter }}</td>
                    <td>{{ $sale->seller->shop_name }}</td>
                    <td>{{ $sale->sold->title }}</td>
                    <td>{{ $sale->buyer->name }}</td>
                    <td>{{ $sale->book_amount }}</td>
                </tr>
                @php($counter++)
            @endforeach
        </tbody>
    </table>
@endsection
