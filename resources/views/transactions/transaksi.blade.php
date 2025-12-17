@extends('layouts.app')

@section('title', 'Transaksi Hari Ini')

@section('content')
<div class="container-fluid px-4">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="mb-1 fw-bold text-primary">
                        <i class="bi bi-calendar-check me-2"></i>Transaksi Hari Ini
                    </h2>
                    <p class="text-muted mb-0">
                        <i class="bi bi-clock-history me-1"></i>09 December 2025 • 
                        <span class="badge bg-info bg-opacity-10 text-info border border-info">Real-time Update</span>
                    </p>
                </div>
                <div>
                    <button class="btn btn-outline-primary me-2" id="refreshBtn">
                        <i class="bi bi-arrow-clockwise me-1"></i>Refresh
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-start border-4 border-success shadow-sm h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col me-2">
                            <div class="text-xs fw-bold text-success text-uppercase mb-1">
                                Transaksi Hari Ini
                            </div>
                            <div class="h5 mb-0 fw-bold" id="todayCount">5</div>
                            <div class="mt-2">
                                <span class="text-muted small">
                                    <i class="bi bi-clock me-1"></i>
                                    <span id="currentShift">Shift: Pagi (08:00-16:00)</span>
                                </span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-receipt-cutoff text-success opacity-25" style="font-size: 3rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-start border-4 border-primary shadow-sm h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col me-2">
                            <div class="text-xs fw-bold text-primary text-uppercase mb-1">
                                Total Pendapatan
                            </div>
                            <div class="h5 mb-0 fw-bold text-primary" id="todayRevenue">Rp 560.174</div>
                            <div class="mt-2">
                                <span class="text-muted small">
                                    <i class="bi bi-currency-dollar me-1"></i>
                                    <span id="averageTransaction">Rp 112.034,8 / transaksi</span>
                                </span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-cash-stack text-primary opacity-25" style="font-size: 3rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-start border-4 border-warning shadow-sm h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col me-2">
                            <div class="text-xs fw-bold text-warning text-uppercase mb-1">
                                Produk Terjual
                            </div>
                            <div class="h5 mb-0 fw-bold" id="productsSold">50</div>
                            <div class="mt-2">
                                <span class="text-muted small">
                                    <i class="bi bi-person-badge me-1"></i>
                                    <span id="cashierName">Kasir: Kasir</span>
                                </span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-box-seam text-warning opacity-25" style="font-size: 3rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-start border-4 border-info shadow-sm h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col me-2">
                            <div class="text-xs fw-bold text-info text-uppercase mb-1">
                                Status Aktivitas
                            </div>
                            <div class="h5 mb-0 fw-bold">
                                <span class="badge bg-success" id="shiftStatus">Aktif</span>
                            </div>
                            <div class="mt-2">
                                <span class="text-muted small">
                                    <i class="bi bi-clock-history me-1"></i>
                                    Update: <span id="lastUpdate">14:53</span>
                                </span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-activity text-info opacity-25" style="font-size: 3rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Cards -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h5 class="card-title mb-4 fw-bold">
                        <i class="bi bi-lightning-charge-fill text-primary me-2"></i>Aksi Cepat
                    </h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="card border-0 bg-gradient-primary-hover h-100 shadow-sm">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <div class="bg-primary bg-opacity-10 p-3 rounded-3">
                                                <i class="bi bi-eye-fill text-primary" style="font-size: 1.75rem;"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="fw-bold mb-1">Cek Laporan Detail</h6>
                                            <p class="text-muted small mb-0">Analisis lengkap transaksi hari ini</p>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary w-100 mt-3 fw-semibold" id="viewReportBtn">
                                        <i class="bi bi-eye me-2"></i>Lihat Laporan
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="card border-0 bg-gradient-success-hover h-100 shadow-sm">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <div class="bg-success bg-opacity-10 p-3 rounded-3">
                                                <i class="bi bi-download text-success" style="font-size: 1.75rem;"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="fw-bold mb-1">Export Data</h6>
                                            <p class="text-muted small mb-0">Download data dalam format Excel/CSV</p>
                                        </div>
                                    </div>
                                    <button class="btn btn-success w-100 mt-3 fw-semibold" id="exportDataBtn">
                                        <i class="bi bi-download me-2"></i>Export Data
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Transactions Table -->
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-0 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold">
                            <i class="bi bi-list-check me-2 text-primary"></i>Daftar Transaksi
                        </h5>
                        <div class="text-muted small">
                            <span id="firstTransaction">10:53</span> - 
                            <span id="lastTransaction">14:53</span>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4 py-3 fw-semibold text-secondary">#</th>
                                    <th class="py-3 fw-semibold text-secondary">WAKTU</th>
                                    <th class="py-3 fw-semibold text-secondary">INVOICE</th>
                                    <th class="py-3 fw-semibold text-secondary">ITEM</th>
                                    <th class="py-3 fw-semibold text-secondary">TOTAL</th>
                                    <th class="py-3 fw-semibold text-secondary">METODE</th>
                                    <th class="text-end pe-4 py-3 fw-semibold text-secondary">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-bottom border-light">
                                    <td class="ps-4">
                                        <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-1 fw-semibold">1</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="time-indicator time-evening me-3"></div>
                                            <div>
                                                <div class="fw-semibold">14:53</div>
                                                <small class="text-muted">Baru saja</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="fw-semibold text-primary">INV-2025-009001</div>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary">
                                            <i class="bi bi-box me-1"></i>10 item
                                        </span>
                                    </td>
                                    <td>
                                        <div class="fw-bold">Rp 85.000</div>
                                    </td>
                                    <td>
                                        <span class="badge bg-success bg-opacity-10 text-success border border-success px-3 py-1">
                                            <i class="bi bi-cash me-1"></i>Tunai
                                        </span>
                                    </td>
                                    <td class="text-end pe-4">
                                        <button class="btn btn-sm btn-outline-primary rounded-3 px-3" 
                                                onclick="showTransactionDetail(1)"
                                                data-bs-toggle="tooltip" title="Lihat Detail">
                                            <i class="bi bi-eye me-1"></i>Detail
                                        </button>
                                    </td>
                                </tr>

                                <tr class="border-bottom border-light">
                                    <td class="ps-4">
                                        <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-1 fw-semibold">2</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="time-indicator time-afternoon me-3"></div>
                                            <div>
                                                <div class="fw-semibold">13:58</div>
                                                <small class="text-muted">1 jam lalu</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="fw-semibold text-primary">INV-2025-009102</div>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary">
                                            <i class="bi bi-box me-1"></i>10 item
                                        </span>
                                    </td>
                                    <td>
                                        <div class="fw-bold">Rp 78.799</div>
                                    </td>
                                    <td>
                                        <span class="badge bg-success bg-opacity-10 text-success border border-success px-3 py-1">
                                            <i class="bi bi-cash me-1"></i>Tunai
                                        </span>
                                    </td>
                                    <td class="text-end pe-4">
                                        <button class="btn btn-sm btn-outline-primary rounded-3 px-3"
                                                onclick="showTransactionDetail(2)"
                                                data-bs-toggle="tooltip" title="Lihat Detail">
                                            <i class="bi bi-eye me-1"></i>Detail
                                        </button>
                                    </td>
                                </tr>

                                <tr class="border-bottom border-light">
                                    <td class="ps-4">
                                        <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-1 fw-semibold">3</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="time-indicator time-afternoon me-3"></div>
                                            <div>
                                                <div class="fw-semibold">12:19</div>
                                                <small class="text-muted">3 jam lalu</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="fw-semibold text-primary">INV-2025-009103</div>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary">
                                            <i class="bi bi-box me-1"></i>10 item
                                        </span>
                                    </td>
                                    <td>
                                        <div class="fw-bold">Rp 178.423</div>
                                    </td>
                                    <td>
                                        <span class="badge bg-success bg-opacity-10 text-success border border-success px-3 py-1">
                                            <i class="bi bi-cash me-1"></i>Tunai
                                        </span>
                                    </td>
                                    <td class="text-end pe-4">
                                        <button class="btn btn-sm btn-outline-primary rounded-3 px-3"
                                                onclick="showTransactionDetail(3)"
                                                data-bs-toggle="tooltip" title="Lihat Detail">
                                            <i class="bi bi-eye me-1"></i>Detail
                                        </button>
                                    </td>
                                </tr>

                                <tr class="border-bottom border-light">
                                    <td class="ps-4">
                                        <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-1 fw-semibold">4</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="time-indicator time-morning me-3"></div>
                                            <div>
                                                <div class="fw-semibold">11:24</div>
                                                <small class="text-muted">4 jam lalu</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="fw-semibold text-primary">INV-2025-009104</div>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary">
                                            <i class="bi bi-box me-1"></i>10 item
                                        </span>
                                    </td>
                                    <td>
                                        <div class="fw-bold">Rp 47.514</div>
                                    </td>
                                    <td>
                                        <span class="badge bg-success bg-opacity-10 text-success border border-success px-3 py-1">
                                            <i class="bi bi-cash me-1"></i>Tunai
                                        </span>
                                    </td>
                                    <td class="text-end pe-4">
                                        <button class="btn btn-sm btn-outline-primary rounded-3 px-3"
                                                onclick="showTransactionDetail(4)"
                                                data-bs-toggle="tooltip" title="Lihat Detail">
                                            <i class="bi bi-eye me-1"></i>Detail
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="ps-4">
                                        <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-1 fw-semibold">5</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="time-indicator time-morning me-3"></div>
                                            <div>
                                                <div class="fw-semibold">10:53</div>
                                                <small class="text-muted">4 jam lalu</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="fw-semibold text-primary">INV-2025-009105</div>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary">
                                            <i class="bi bi-box me-1"></i>10 item
                                        </span>
                                    </td>
                                    <td>
                                        <div class="fw-bold">Rp 170.438</div>
                                    </td>
                                    <td>
                                        <span class="badge bg-success bg-opacity-10 text-success border border-success px-3 py-1">
                                            <i class="bi bi-cash me-1"></i>Tunai
                                        </span>
                                    </td>
                                    <td class="text-end pe-4">
                                        <button class="btn btn-sm btn-outline-primary rounded-3 px-3"
                                                onclick="showTransactionDetail(5)"
                                                data-bs-toggle="tooltip" title="Lihat Detail">
                                            <i class="bi bi-eye me-1"></i>Detail
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Transaction Details -->
<div class="modal fade" id="transactionDetailModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">
                    <i class="bi bi-receipt me-2"></i>Detail Transaksi
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="transactionDetailContent">
                <!-- Detail akan diisi via JavaScript -->
            </div>
        </div>
    </div>
</div>

<style>
    /* Styling untuk halaman transaksi */
    .border-start {
        border-left-width: 4px !important;
    }
    
    .time-indicator {
        width: 8px;
        height: 32px;
        border-radius: 4px;
    }
    
    .time-morning {
        background: linear-gradient(180deg, #3498db, #2ecc71);
    }
    
    .time-afternoon {
        background: linear-gradient(180deg, #f39c12, #e74c3c);
    }
    
    .time-evening {
        background: linear-gradient(180deg, #9b59b6, #34495e);
    }
    
    /* Hover effects */
    tr:hover {
        background-color: rgba(67, 97, 238, 0.03) !important;
    }
    
    .bg-gradient-primary-hover:hover {
        background: linear-gradient(135deg, rgba(67, 97, 238, 0.05), rgba(67, 97, 238, 0.1));
    }
    
    .bg-gradient-success-hover:hover {
        background: linear-gradient(135deg, rgba(40, 167, 69, 0.05), rgba(40, 167, 69, 0.1));
    }
    
    /* Card styling */
    .card {
        border-radius: 12px;
        overflow: hidden;
    }
    
    .table th {
        border-top: none;
        border-bottom: 2px solid #f1f3f5;
    }
    
    .badge {
        font-weight: 500;
    }
    
    /* Button styling */
    .btn-outline-primary {
        border-width: 1.5px;
    }
    
    .btn-outline-primary:hover {
        background-color: #4361ee;
        color: white;
        transform: translateY(-1px);
        transition: all 0.2s ease;
    }
    
    /* Custom scrollbar */
    .table-responsive::-webkit-scrollbar {
        height: 6px;
    }
    
    .table-responsive::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 3px;
    }
    
    .table-responsive::-webkit-scrollbar-thumb {
        background: #c1c1c1;
        border-radius: 3px;
    }
</style>
@endsection

@section('scripts')
<script>
    // Format currency
    function formatCurrency(amount) {
        return 'Rp ' + new Intl.NumberFormat('id-ID').format(amount);
    }
    
    // Show transaction detail modal
    function showTransactionDetail(transactionId) {
        // Sample transaction detail
        const transaction = {
            id: transactionId,
            invoice: 'INV-2025-009001',
            time: '14:53',
            items: 10,
            total: 85000,
            method: 'Tunai',
            details: [
                { name: 'Kopi Hitam', qty: 2, price: 15000 },
                { name: 'Teh Manis', qty: 5, price: 10000 },
                { name: 'Roti Bakar', qty: 3, price: 5000 }
            ]
        };
        
        const modalContent = document.getElementById('transactionDetailContent');
        
        // Build items list
        let itemsHtml = '';
        let itemsTotal = 0;
        transaction.details.forEach(item => {
            const subtotal = item.qty * item.price;
            itemsTotal += subtotal;
            itemsHtml += `
                <tr>
                    <td>${item.name}</td>
                    <td class="text-center">${item.qty}</td>
                    <td class="text-end">${formatCurrency(item.price)}</td>
                    <td class="text-end fw-bold">${formatCurrency(subtotal)}</td>
                </tr>
            `;
        });
        
        const detailHtml = `
            <div class="p-3">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card border-0 bg-light">
                            <div class="card-body">
                                <h6 class="text-muted mb-2">INVOICE</h6>
                                <h4 class="fw-bold text-primary">${transaction.invoice}</h4>
                                <div class="d-flex align-items-center mt-3">
                                    <span class="badge bg-success me-3">
                                        <i class="bi bi-check-circle me-1"></i>Selesai
                                    </span>
                                    <span class="text-muted">
                                        <i class="bi bi-clock me-1"></i>${transaction.time}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-0 bg-light">
                            <div class="card-body">
                                <h6 class="text-muted mb-2">PEMBAYARAN</h6>
                                <h4 class="fw-bold">${formatCurrency(transaction.total)}</h4>
                                <div class="mt-3">
                                    <span class="badge bg-success bg-opacity-10 text-success border border-success px-3 py-2">
                                        <i class="bi bi-cash me-1"></i>${transaction.method}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <h6 class="fw-bold mb-3">Detail Items</h6>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Produk</th>
                                <th width="100" class="text-center">Qty</th>
                                <th width="150" class="text-end">Harga</th>
                                <th width="150" class="text-end">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${itemsHtml}
                            <tr class="table-light">
                                <td colspan="3" class="text-end fw-bold">Total</td>
                                <td class="text-end fw-bold text-primary">${formatCurrency(transaction.total)}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="d-flex justify-content-end mt-4">
                    <button type="button" class="btn btn-outline-secondary me-2" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-1"></i>Tutup
                    </button>
                    <button type="button" class="btn btn-primary" onclick="printReceipt()">
                        <i class="bi bi-printer me-1"></i>Cetak Ulang
                    </button>
                </div>
            </div>
        `;
        
        modalContent.innerHTML = detailHtml;
        
        // Show modal
        const modal = new bootstrap.Modal(document.getElementById('transactionDetailModal'));
        modal.show();
    }
    
    // Print receipt
    function printReceipt() {
        alert('Fitur cetak struk akan membuka jendela print...');
        window.print();
    }
    
    // Export today's transactions
    document.getElementById('exportDataBtn').addEventListener('click', function() {
        const btn = this;
        const originalText = btn.innerHTML;
        
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Exporting...';
        btn.disabled = true;
        
        setTimeout(() => {
            btn.innerHTML = originalText;
            btn.disabled = false;
            
            // Sample transactions data
            const todayTransactions = [
                { invoice: 'INV-2025-009001', time: '14:53', items: 10, total: 85000, method: 'Tunai' },
                { invoice: 'INV-2025-009102', time: '13:58', items: 10, total: 78799, method: 'Tunai' },
                { invoice: 'INV-2025-009103', time: '12:19', items: 10, total: 178423, method: 'Tunai' },
                { invoice: 'INV-2025-009104', time: '11:24', items: 10, total: 47514, method: 'Tunai' },
                { invoice: 'INV-2025-009105', time: '10:53', items: 10, total: 170438, method: 'Tunai' }
            ];
            
            // Create CSV content
            let csvContent = "data:text/csv;charset=utf-8,";
            csvContent += "No,Invoice,Waktu,Items,Total,Metode\n";
            
            todayTransactions.forEach((transaction, index) => {
                csvContent += `${index + 1},${transaction.invoice},${transaction.time},${transaction.items},${transaction.total},${transaction.method}\n`;
            });
            
            // Create download link
            const encodedUri = encodeURI(csvContent);
            const link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", `transaksi_hariini_2025-12-09.csv`);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }, 1000);
    });
    
    // Cek Laporan button
    document.getElementById('viewReportBtn').addEventListener('click', function() {
        const btn = this;
        const originalText = btn.innerHTML;
        
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Loading...';
        btn.disabled = true;
        
        setTimeout(() => {
            btn.innerHTML = originalText;
            btn.disabled = false;
            
            // Show summary in modal
            const summaryHtml = `
                <div class="p-4">
                    <div class="text-center mb-4">
                        <i class="bi bi-file-earmark-text text-primary" style="font-size: 3rem; margin-bottom: 20px;"></i>
                        <h4 class="mb-3 fw-bold">Ringkasan Laporan Hari Ini</h4>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card border-0 bg-light">
                                <div class="card-body text-center py-4">
                                    <div class="text-muted mb-2">Total Transaksi</div>
                                    <h2 class="fw-bold text-primary">5 transaksi</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-0 bg-light">
                                <div class="card-body text-center py-4">
                                    <div class="text-muted mb-2">Total Pendapatan</div>
                                    <h2 class="fw-bold text-success">Rp 560.174</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle me-2"></i>
                        Laporan ini mencakup semua transaksi dari shift Pagi (08:00-16:00)
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <button type="button" class="btn btn-outline-secondary me-2" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle me-1"></i>Batal
                        </button>
                        <button type="button" class="btn btn-primary" onclick="printReport()">
                            <i class="bi bi-printer me-1"></i>Cetak Ulang
                        </button>
                    </div>
                </div>
            `;
            
            const modalContent = document.getElementById('transactionDetailContent');
            modalContent.innerHTML = summaryHtml;
            
            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('transactionDetailModal'));
            const modalTitle = document.querySelector('#transactionDetailModal .modal-title');
            modalTitle.innerHTML = '<i class="bi bi-file-earmark-text me-2"></i>Laporan Hari Ini';
            modal.show();
        }, 1000);
    });
    
    // Print report function
    function printReport() {
        alert('Fitur cetak laporan akan membuka jendela print...');
        window.print();
    }
    
    // Refresh button
    document.getElementById('refreshBtn').addEventListener('click', function() {
        const btn = this;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Refreshing...';
        btn.disabled = true;
        
        setTimeout(() => {
            btn.innerHTML = '<i class="bi bi-arrow-clockwise me-1"></i>Refresh';
            btn.disabled = false;
            
            // Show success alert
            const alertDiv = document.createElement('div');
            alertDiv.className = 'alert alert-success alert-dismissible fade show mt-3';
            alertDiv.innerHTML = `
                <i class="bi bi-check-circle me-2"></i>
                Data berhasil direfresh!
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            
            document.querySelector('.container-fluid').prepend(alertDiv);
        }, 1500);
    });
    
    // Initialize tooltips
    document.addEventListener('DOMContentLoaded', function() {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
@endsection