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
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data 1</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Course</th>
                                <th>Mentor</th>
                                <th>Title</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data1 as $item)
                                <tr>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->course }}</td>
                                    <td>{{ $item->mentor }}</td>
                                    <td>{{ $item->title }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data 2</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Course</th>
                                <th>Mentor</th>
                                <th>Title</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data2 as $item)
                                <tr>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->course }}</td>
                                    <td>{{ $item->mentor }}</td>
                                    <td>{{ $item->title }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data 3</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Course</th>
                                <th>Mentor</th>
                                <th>Title</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data3 as $item)
                                <tr>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->course }}</td>
                                    <td>{{ $item->mentor }}</td>
                                    <td>{{ $item->title }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data 4</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Course</th>
                                <th>Mentor</th>
                                <th>Title</th>
                                <th>Jumlah Peserta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data4 as $item)
                                <tr>
                                    <td>{{ $item->course }}</td>
                                    <td>{{ $item->mentor }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->jumlah_peserta }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data 5</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Mentor</th>
                                <th>Jumlah Peserta</th>
                                <th>Total Fee</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data5 as $item)
                                <tr>
                                    <td>{{ $item->mentor }}</td>
                                    <td>{{ $item->jumlah_peserta }}</td>
                                    <td>{{ $item->total_fee }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="card gradient-1">
                <div class="card-body">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Grafik 1</h4>
                                <canvas id="grafik1Chart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Grafik 2</h4>
                                <canvas id="grafik2Chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var grafik1 = @json($grafik1);
        var ctxgrafik1 = document.getElementById('grafik1Chart').getContext('2d');
        var grafik1Chart = new Chart(ctxgrafik1, {
            type: 'bar',
            data: {
                labels: grafik1.map(item => item.title),
                datasets: [{
                    label: 'Jumlah Peserta',
                    data: grafik1.map(item => item.jumlah_peserta),
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

        var grafik2 = @json($grafik2);
        var ctxgrafik2 = document.getElementById('grafik2Chart').getContext('2d');
        var grafik2Chart = new Chart(ctxgrafik2, {
            type: 'bar',
            data: {
                labels: grafik2.map(item => item.mentor),
                datasets: [{
                    label: 'Total Fee',
                    data: grafik2.map(item => item.total_fee),
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor: 'rgba(255, 206, 86, 1)',
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
    </script>
@endpush
