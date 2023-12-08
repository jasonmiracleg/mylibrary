@extends('layouts.app')

@section('content')
    <div>
        <div class="container">
            <form action="{{ route('book.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Book Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Book Title">
                </div>
                <div class="mb-3">
                    <label for="writer_name" class="form-label">Writer Name</label>
                    <input type="text" class="form-control" id="writer_name" name="writer_name"
                        placeholder="Writer Name">
                </div>
                <div class="mb-3">
                    <label for="synopsis" class="form-label">Synopsis</label>
                    <textarea class="form-control" id="synopsis" name="synopsis" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="publisher" class="form-label">Publisher</label>
                    <select name="publisher" id="publisher" class="custom-select" required>
                        @foreach ($publishers as $publisher)
                            <option value="{{ $publisher->id }}">{{ $publisher->publisher }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
