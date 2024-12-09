@extends('layouts.admin_template')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-sm-12 text-center">
                        <h4 class="text-warning">
                            <strong>Selamat Datang di Halaman Administrator</strong>
                        </h4>
                        <h5 class="text-secondary">
                            <strong>Ini adalah aplikasi sederhana CRUD menggunakan Laravel
                                9.19</strong>
                        </h5>
                        <hr>
                    </div>
                    <div class="col-sm-12">
                        @if (Auth::check())
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-primary">Nama :
                                    {{ !empty(Auth::user()->name) ? Auth::user()->name : '' }}</button>
                                <button type="button" class="btn btn-outline-primary">Email :
                                    {{ !empty(Auth::user()->email) ? Auth::user()->email : '' }}</button>
                            </div>
                        @else
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-primary">Hilangkan comment di "web.php" untuk
                                    mengaktifkan middleware auth dan informasi akun akan muncul disini</button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-lg-4 col-sm-12">
            <div class="card gradient-1">
                <div class="card-body">
                    <h3 class="card-title text-white">Jumlah Transaksi</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $totalSales }}</h2>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12">
            <div class="card gradient-2">
                <div class="card-body">
                    <h3 class="card-title text-white">Jumlah Penjualan</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">Rp. {{ number_format($totalSalesAmount, 2, ',', '.') }}</h2>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12">
            <div class="card gradient-3">
                <div class="card-body">
                    <h3 class="card-title text-white">Jumlah Item Terjual</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">Qty. {{ $totalQty }}</h2>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Jumlah Penjualan per Bulan</h4>
                    <canvas id="salesPerMonthChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Jumlah Penjualan per Item</h4>
                    <canvas id="salesPerItemChart"></canvas>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- <script>
        var salesPerMonthData = @json($salesPerMonth);
        var salesPerItemData = @json($salesPerItem);

        var salesPerMonthLabels = Object.keys(salesPerMonthData).map(month => {
            return new Date(0, month - 1).toLocaleString('default', {
                month: 'long'
            });
        });
        var salesPerMonthValues = Object.values(salesPerMonthData);

        var salesPerItemLabels = Object.keys(salesPerItemData);
        var salesPerItemValues = Object.values(salesPerItemData);

        var ctx = document.getElementById('salesPerMonthChart').getContext('2d');
        var salesPerMonthChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: salesPerMonthLabels,
                datasets: [{
                    label: 'Penjualan (Rupiah)',
                    data: salesPerMonthValues,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctx = document.getElementById('salesPerItemChart').getContext('2d');
        var salesPerItemChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: salesPerItemLabels,
                datasets: [{
                    label: 'Penjualan (Qty)',
                    data: salesPerItemValues,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script> --}}
@endpush
