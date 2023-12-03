@extends('layouts.template')

@section('layout_content')
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Shop Name</th>
                <th scope="col">Shop Address</th>
            </tr>
        </thead>
        <tbody>
            @php($counter = 1)
            @foreach ($shops as $shop)
                <tr>
                    <td>{{ $counter }}</td>
                    <td>{{ $shop->shop_name }}</td>
                    <td>{{ $shop->shop_address }}</td>
                </tr>
                @php($counter++)
            @endforeach
        </tbody>
    </table>
@endsection
