{{-- @extends('layouts.template')
@section('layout_content') --}}
<x-frame>
    <x-slot:layout_pagetitle>
        {{ $pagetitle }}
    </x-slot:layout_pagetitle>

    <x-slot:layout_maintitle>
        {{ $maintitle }}
    </x-slot:layout_maintitle>

    <x-slot:layout_tagline>
        Welcome to our library
    </x-slot:layout_tagline>
    <table>
        <tr>
            <td>Email</td>
            <td>Company@gmail.com</td>
        </tr>
        <tr>
            <td>Phone</td>
            <td>0123456789</td>
        </tr>
        <tr>
            <td>Address</td>
            <td>Main Street 123, Surabaya</td>
        </tr>
    </table>
    <x-mybutton>
        Contact Us
    </x-mybutton>
</x-frame>
{{-- @endsection --}}
