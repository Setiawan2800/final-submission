@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
    <h1>Edit Buku</h1>
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Judul Buku</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $book->title }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" rows="3" required>{{ $book->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Penulis</label>
            <input type="text" name="author" id="author" class="form-control" value="{{ $book->author }}" required>
        </div>
        <button type="submit" class="btn btn-success mb-3">Update</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary mb-3">Batal</a>
    </form>
@endsection
