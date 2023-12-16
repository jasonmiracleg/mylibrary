<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Writer;
use App\Models\Publisher;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'library',
            [
                'pagetitle' => 'Library',
                'activeLibrary' => 'active',
                'maintitle' => 'Books',
                'books' => Book::all()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $publishers = Publisher::all();
        $writers = Writer::all();
        return view('create', compact('publishers', 'writers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:books|max:255',
            'writer' => 'required', // max : 5 (characters),
            'synopsis' => 'required',
            'publisher' => 'required',
            'book_image' => 'image'
        ]);

        if ($request->file('book_image')) {
            $validatedData['book_image'] = $request->file('book_image')->store('images', ['disk' => 'public']);
            Book::create([
                'title' => $validatedData['title'],
                'writer_id' => $validatedData['writer'],
                'synopsis' => $validatedData['synopsis'],
                'publisher_id' => $validatedData['publisher'],
                'book_image' => $validatedData['book_image']
            ]);
        } else {
            Book::create([
                'title' => $validatedData['title'],
                'writer_id' => $validatedData['writer'],
                'synopsis' => $validatedData['synopsis'],
                'publisher_id' => $validatedData['publisher'],
            ]);
        }

        return redirect()->route('library.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Writer $writer)
    {
        return view(
            'bookWriter',
            [
                'pagetitle' => 'Book Info',
                'activeLibrary' => 'active',
                'maintitle' => 'The Writer',
                'writer' => $writer
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $bookEdit = Book::where('id', $book->id)->first();
        $publishers = Publisher::all();
        $writers = Writer::all();
        return view('edit', compact('publishers', 'writers', 'bookEdit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'writer' => 'required', // max : 5 (characters),
            'synopsis' => 'required',
            'publisher' => 'required',
            'book_image' => 'image'
        ]);
        if ($request->file('book_image')) {
            if ($book->book_image) {
                Storage::disk('public')->delete($book->book_image);
            }
            $validatedData['book_image'] = $request->file('book_image')->store('images', ['disk' => 'public']);

            $book->update([
                'title' => $validatedData['title'],
                'writer_id' => $validatedData['writer'],
                'synopsis' => $validatedData['synopsis'],
                'publisher_id' => $validatedData['publisher'],
                'book_image' => $validatedData['book_image']
            ]);
        } else {
            $book->update([
                'title' => $validatedData['title'],
                'writer_id' => $validatedData['writer'],
                'synopsis' => $validatedData['synopsis'],
                'publisher_id' => $validatedData['publisher'],
            ]);
        }

        return redirect()->route('library.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('library.index');
    }
}
