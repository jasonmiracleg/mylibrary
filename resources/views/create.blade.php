@extends('layouts.app')

@section('content')
    <div>
        <div class="container">
            <form action="{{ route('library.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Book Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Book Title" required>
                </div>
                <div class="mb-3">
                    <label for="writer" class="form-label">Writer</label>
                    <select name="writer" id="writer" class="form-select" required>
                        @foreach ($writers as $writer)
                            <option value="{{ $writer->id }}">{{ $writer->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="synopsis" class="form-label">Synopsis</label>
                    <textarea class="form-control" id="synopsis" name="synopsis" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="publisher" class="form-label">Publisher</label>
                    <select name="publisher" id="publisher" class="form-select" required>
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
