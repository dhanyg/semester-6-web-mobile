@extends('layouts.app')

@section('title', 'Beranda - Catatan Pengeluaran')

@section('content')
<div class="text-center mb-4">
    <h1 class="h3 text-primary">Catatan Pengeluaran</h1>
</div>

<!-- Summary Cards -->
<div class="row g-3 mb-4">
    <div class="col-6">
        <div class="card text-center">
            <div class="card-body">
                <h6 class="card-title text-muted">Bulan Ini</h6>
                <h4 class="text-primary">Rp {{ number_format($totalThisMonth, 0, ',', '.') }}</h4>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card text-center">
            <div class="card-body">
                <h6 class="card-title text-muted">Hari Ini</h6>
                <h4 class="text-success">Rp {{ number_format($totalToday, 0, ',', '.') }}</h4>
            </div>
        </div>
    </div>
</div>

<!-- Add Button -->
<div class="d-grid mb-4">
    <a href="{{ route('expenses.create') }}" class="btn btn-primary btn-lg">
        Tambah Pengeluaran
    </a>
</div>

<!-- Expenses List -->
<div class="d-grid gap-3">
    @forelse($expenses as $expense)
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h6 class="card-title mb-1">{{ $expense->description }}</h6>
                    <p class="text-muted small mb-0">{{ $expense->date->format('d M Y') }}</p>
                </div>
                <div class="text-end">
                    <h5 class="text-danger mb-2">Rp {{ number_format($expense->amount, 0, ',', '.') }}</h5>
                    <div class="d-flex gap-1">
                        <a href="{{ route('expenses.edit', $expense) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                        <form method="POST" action="{{ route('expenses.destroy', $expense) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="card">
        <div class="card-body text-center">
            <p class="text-muted">Belum ada data pengeluaran</p>
        </div>
    </div>
    @endforelse
</div>
@endsection