<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penjualan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            min-height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            padding: 20px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
        }

        .sidebar h2 {
            font-size: 24px;
            margin-bottom: 30px;
            text-align: center;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 15px;
        }

        .sidebar ul li a {
            color: #adb5bd;
            text-decoration: none;
            font-size: 18px;
            display: block;
            padding: 10px;
            border-radius: 5px;
            transition: all 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: #495057;
            color: white;
        }

        /* Main Content Styles */
        .main-content {
            margin-left: 270px;
            padding: 20px;
            width: calc(100% - 270px);
        }

        .main-content header h1 {
            font-size: 28px;
            color: #343a40;
            margin-bottom: 20px;
        }

        .container h2 {
            font-size: 24px;
            color: #343a40;
        }

        /* Table Styles */
        table {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        thead.table-dark th {
            background-color: #343a40 !important;
            color: white;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Button Styles */
        .btn-secondary {
            background-color: #343a40;
            border: none;
            padding: 10px;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        .btn-secondary:hover {
            background-color: #495057;
            color: white;
            text-decoration: none;
        }

        .btn-secondary:focus {
            outline: none;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Dashboard Penjualan</h2>
        <ul>
            <li><a href="{{url(Auth::user()->role.'/home') }}">Home</a></li>
            <li><a href="{{url(Auth::user()->role.'/produk') }}">Produk</a></li>
            <li><a href="#">Penjualan</a></li>
            <li><a href="{{url(Auth::user()->role.'/laporan') }}">Laporan</a></li>
            <li><a href="#">Pengaturan</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <header>
            <h1>Selamat Datang di Dashboard Penjualan</h1>
        </header>
        <div class="container mt-4">
            <h2 class="text-center mb-4">Laporan Produk</h2>
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Jumlah Produk</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key => $product)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $product->nama_produk }}</td>
                        <td>{{ $product->deskripsi }}</td>
                        <td>{{ number_format($product->harga, 0, ',', '.') }}</td> <!-- Format harga -->
                        <td>{{ $product->jumlah_produk }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{url(Auth::user()->role.'/report') }}"
            class="btn btn-secondary w-100 d-flex justify-content-center align-items-center text-white cursor-pointer">Export to PDF</a>
        </div>
    </div>
</body>
</html>
