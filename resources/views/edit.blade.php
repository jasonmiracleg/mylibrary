@extends('layouts.app')

@section('content')
    <div>
        <div class="container">
            <form action="{{ route('library.update', $bookEdit) }}" method="POST">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Book Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Book Title"
                        value="{{ $bookEdit->title }}" required>
                </div>
                <div class="mb-3">
                    <label for="writer" class="form-label">Writer</label>
                    <select name="writer" id="writer" class="form-select" required>
                        @foreach ($writers as $writer)
                            @if (old('writer_id', $bookEdit->writer_id) === $writer->id)
                                <option value="{{ $writer->id }}" selected>{{ $writer->name }}</option>
                            @else
                                <option value="{{ $writer->id }}">{{ $writer->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="synopsis" class="form-label">Synopsis</label>
                    <textarea class="form-control" id="synopsis" name="synopsis" rows="3" required>{{ $bookEdit->synopsis }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="publisher" class="form-label">Publisher</label>
                    <select name="publisher" id="publisher" class="form-select" required>
                        @foreach ($publishers as $publisher)
                            @if (old('publisher_id', $bookEdit->publisher_id) === $publisher->id)
                                <option value="{{ $publisher->id }}" selected>{{ $publisher->publisher }}</option>
                            @else
                                <option value="{{ $publisher->id }}">{{ $publisher->publisher }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
