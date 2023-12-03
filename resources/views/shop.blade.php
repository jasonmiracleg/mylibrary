@extends('layouts.template')

@section('layout_content')
    <form class="w-25 d-flex" role="search" action="\shop" method="GET">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
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
    <div>
        {{ $shops->links() }}
    </div>
@endsection
