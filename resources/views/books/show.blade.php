@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
    <h1>Detail Buku</h1>
    <div class="card">
        <div class="card-header">
            {{ $book->title }}
        </div>
        <div class="card-body">
            <p><strong>Penulis:</strong> {{ $book->author }}</p>
            <p><strong>Deskripsi:</strong> {{ $book->description }}</p>
        </div>
    </div>
    <a href="{{ route('books.index') }}" class="btn btn-secondary mt-3 mb-3">Kembali</a>
@endsection
