<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Writer;
use App\Models\Publisher;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Http\Request;

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
        Book::create([
            'title' => $request->title,
            'writer_id' => $request->writer,
            'synopsis' => $request->synopsis,
            'publisher_id' => $request->publisher
        ]);
        return redirect()->route('library');
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
        $book->update([
            'title' => $request->title,
            'writer_id' => $request->writer,
            'synopsis' => $request->synopsis,
            'publisher_id' => $request->publisher
        ]);
        return redirect()->route('library');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('library');
    }
}
