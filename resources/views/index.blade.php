{{-- @extends('layouts.template') --}}
<x-frame>
    {{-- @section('layout_content') --}}

    <x-slot:layout_pagetitle>
        {{ $pagetitle }}
    </x-slot:layout_pagetitle>

    <x-slot:layout_maintitle>
        {{ $maintitle }}
    </x-slot:layout_maintitle>

    <x-slot:layout_tagline>
        Welcome to our library
    </x-slot:layout_tagline>

    <p>This application is to manage my mini library.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident excepturi similique veniam omnis.
        Perspiciatis,
        nesciunt labore? Impedit, explicabo! Iste eligendi adipisci, rem a pariatur hic amet omnis explicabo possimus
        quibusdam!</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident excepturi similique veniam omnis.
        Perspiciatis,
        nesciunt labore? Impedit, explicabo! Iste eligendi adipisci, rem a pariatur hic amet omnis explicabo possimus
        quibusdam!</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident excepturi similique veniam omnis.
        Perspiciatis,
        nesciunt labore? Impedit, explicabo! Iste eligendi adipisci, rem a pariatur hic amet omnis explicabo possimus
        quibusdam!</p>
    {{-- @endsection --}}
    <x-mybutton>
        Contact Us
    </x-mybutton>
</x-frame>
