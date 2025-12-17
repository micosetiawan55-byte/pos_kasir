@extends('layouts.app')

@section('title', 'Pembayaran')

@section('content')
@php
    $total = 0;
    $totalItem = 0;
@endphp

<div class="row">
    <!-- DAFTAR PESANAN -->
    <div class="col-md-5">
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-header bg-gradient-success text-white py-3">
                <h5 class="mb-0"><i class="bi bi-cart-check me-2"></i>Daftar Pesanan</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mb-0 table-hover">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">Item</th>
                                <th class="text-center">Qty</th>
                                <th class="text-end pe-4">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $item)
                                @php
                                    $subtotal = $item['price'] * $item['qty'];
                                    $total += $subtotal;
                                    $totalItem += $item['qty'];
                                @endphp
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex flex-column">
                                            <strong>{{ $item['name'] }}</strong>
                                            <small class="text-muted"> Rp {{ number_format($item['price']) }}</small>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">
                                        <span class="badge bg-secondary rounded-pill px-3 py-2">{{ $item['qty'] }}</span>
                                    </td>
                                    <td class="text-end fw-bold align-middle pe-4">Rp {{ number_format($subtotal) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="table-light">
                            <tr>
                                <th colspan="2" class="ps-4">Total Item</th>
                                <th class="text-end fw-bold text-primary pe-4">{{ $totalItem }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <!-- RINGKASAN -->
        <div class="card border-0 shadow-sm">
            <div class="card-body bg-light">
                <div class="d-flex justify-content-between align-items-center p-3">
                    <div>
                        <strong class="fs-5">Total Pembayaran</strong>
                        <p class="text-muted mb-0 small">Jumlah yang harus dibayar</p>
                    </div>
                    <div class="text-end">
                        <h3 class="text-primary fw-bold mb-0">Rp {{ number_format($total) }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FORM PEMBAYARAN -->
    <div class="col-md-7">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-gradient-primary text-white py-3">
                <h5 class="mb-0"><i class="bi bi-wallet2 me-2"></i>Pembayaran</h5>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="{{ route('transaction.store') }}">
                    @csrf
                    <input type="hidden" name="total" value="{{ $total }}">

                    <!-- METODE PEMBAYARAN -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark mb-2">Metode Pembayaran</label>
                        <select name="payment_method" class="form-select form-select-lg border-2" required style="border-color: #e0e0e0;">
                            <option value="" disabled selected>Pilih metode pembayaran</option>
                            <option value="cash">💵 Tunai</option>
                            <option value="qris">📱 QRIS</option>
                            <option value="transfer">🏦 Transfer Bank</option>
                        </select>
                        <div class="form-text">Pilih metode pembayaran yang sesuai</div>
                    </div>

                    <!-- UANG DIBAYAR -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark mb-2">Uang Dibayar</label>
                        <div class="input-group input-group-lg border rounded-3 overflow-hidden">
                            <span class="input-group-text bg-light border-0 fw-bold">Rp</span>
                            <input
                                type="number"
                                class="form-control border-0 py-3"
                                name="paid"
                                id="paid"
                                min="{{ $total }}"
                                placeholder="Masukkan jumlah pembayaran"
                                required>
                        </div>
                        <div class="form-text">Minimal pembayaran: Rp {{ number_format($total) }}</div>
                    </div>

                    <!-- KEMBALIAN -->
                    <div class="alert alert-success border-0 shadow-sm mb-4" style="background: linear-gradient(135deg, #d4edda, #c3e6cb);">
                        <div class="d-flex justify-content-between align-items-center p-3">
                            <div>
                                <strong class="fs-5">Kembalian</strong>
                                <p class="text-muted mb-0 small">Uang yang harus dikembalikan</p>
                            </div>
                            <div class="text-end">
                                <h2 id="change" class="fw-bold mb-0 text-success">Rp 0</h2>
                            </div>
                        </div>
                    </div>

                    <!-- ACTION BUTTONS -->
                    <div class="d-grid gap-3">
                        <button type="submit" class="btn btn-success btn-lg py-3 fw-bold shadow-sm">
                            <i class="bi bi-check-circle-fill me-2"></i>Selesaikan Transaksi
                        </button>
                        <a href="{{ route('pos.index') }}" class="btn btn-outline-secondary btn-lg py-3 fw-bold">
                            <i class="bi bi-arrow-left-circle me-2"></i>Kembali ke Kasir
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const total = {{ $total }};
    const paidInput = document.getElementById('paid');
    const changeEl = document.getElementById('change');
    
    // Format input pembayaran
    paidInput.addEventListener('focus', function() {
        this.select();
    });
    
    // Hitung kembalian
    paidInput.addEventListener('input', function () {
        const paid = parseInt(this.value) || 0;
        const change = paid - total;
        
        if (change < 0) {
            changeEl.classList.remove('text-success');
            changeEl.classList.add('text-danger');
            changeEl.innerText = formatRupiah(0);
        } else if (change === 0) {
            changeEl.classList.remove('text-danger', 'text-success');
            changeEl.classList.add('text-secondary');
            changeEl.innerText = formatRupiah(change);
        } else {
            changeEl.classList.remove('text-danger', 'text-secondary');
            changeEl.classList.add('text-success');
            changeEl.innerText = formatRupiah(change);
        }
    });
    
    // Auto-focus input pembayaran
    document.addEventListener('DOMContentLoaded', function() {
        paidInput.focus();
    });

    function formatRupiah(num) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(num);
    }
</script>
@endsection