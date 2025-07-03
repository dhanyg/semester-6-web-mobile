@extends('layouts.app')

@section('title', 'Edit Pengeluaran')

@section('content')
<div class="d-flex align-items-center mb-4">
    <a href="{{ route('expenses.index') }}" class="btn btn-outline-secondary me-3">
        ← Kembali
    </a>
    <h2 class="h4 mb-0">Edit Pengeluaran</h2>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('expenses.update', $expense) }}" id="expense-form">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="amount" class="form-label">Jumlah (Rp)</label>
                <input type="number" class="form-control @error('amount') is-invalid @enderror"
                    id="amount" name="amount" value="{{ old('amount', $expense->amount) }}"
                    placeholder="0" step="0.01" required>
                @error('amount')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Keterangan</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror"
                    id="description" name="description" value="{{ old('description', $expense->description) }}"
                    placeholder="Contoh: Makan siang" required>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="expense_date" class="form-label">Tanggal</label>
                <input type="date" class="form-control @error('date') is-invalid @enderror"
                    id="expense_date" name="date"
                    value="{{ old('date', $expense->date->format('Y-m-d')) }}" required>
                @error('date')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection