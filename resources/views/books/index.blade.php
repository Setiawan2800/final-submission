@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="mb-0">Book List</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary">
         <i class="fas fa-plus"></i> Add Book
    </a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Author</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>{{ $loop->iteration + ($books->currentPage() - 1) * $books->perPage() }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td class="text-center">
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm me-1">
                            <i class="fas fa-info-circle"></i> Details
                        </a>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm me-1">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada data buku</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $books->links('pagination::bootstrap-5') }}
</div>
@endsection
