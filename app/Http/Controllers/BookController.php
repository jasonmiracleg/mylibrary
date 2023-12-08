<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Writer;
use App\Models\Publisher;
use App\Http\Requests\StoreBookRequest;
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
        return view('create', compact('publishers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
