<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Jilbab - Tutorial Laravel 12</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: #eef1f4">

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ $jilbab->image }}" class="rounded mb-4" style="width: 250px; height: 250px; object-fit: cover;">
                        </div>
                        <hr>
                        <h4>{{ $jilbab->title }}</h4>
                        <p class="mt-3">
                            <strong>Harga :</strong> {{ "Rp " . number_format($jilbab->price, 2, ',', '.') }} <br>
                            <strong>Stok :</strong> {{ $jilbab->stock }} Pcs
                        </p>
                        <hr>
                        <h5>Deskripsi Jilbab:</h5>
                        <p>{!! $jilbab->description !!}</p>
                        <hr>
                        <a href="{{ route('jilbabs.index') }}" class="btn btn-md btn-secondary">KEMBALI</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>