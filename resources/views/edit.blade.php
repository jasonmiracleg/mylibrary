@extends('layouts.app')

@section('content')
    <div>
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('library.update', $bookEdit) }}" method="POST" enctype="multipart/form-data">
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
                    <label for="book_image" class="form-label">Upload Book Image</label>
                    @if ($bookEdit->book_image)
                        <br>
                        <img src="{{ asset('storage/' . $bookEdit->book_image) }}" alt="{{ $bookEdit->title }}"
                            class="img-preview img-fluid mb-3 col-sm-5">
                    @else
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                    @endif
                    <input type="file" name="book_image" id="book_image" class="form-control"
                        accept="image/jpg, image/png, image.jpeg" onchange="previewImage()">
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
    <script>
        function previewImage() {
            const image = document.querySelector('#book_image'); // Getting the id
            const imgPreview = document.querySelector('.img-preview'); // Getting the class


            imgPreview.style.display = 'block';

            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);

            ofReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
