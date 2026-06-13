<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Area - Hervina Collections</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: #fff9f6;
      color: #5f4335;
      padding: 40px 8%;
    }

    .crud-container {
      background: white;
      padding: 40px;
      border-radius: 35px;
      box-shadow: 0 12px 35px rgba(0,0,0,0.06);
    }

    .crud-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
      flex-wrap: wrap;
      gap: 20px;
    }

    .crud-header h2 {
      font-size: 32px;
      color: #6e4d3d;
    }

    .btn {
      padding: 12px 25px;
      border-radius: 40px;
      text-decoration: none;
      font-weight: 600;
      transition: 0.3s;
      display: inline-block;
      font-size: 14px;
    }

    .btn-add {
      background: #d8a892;
      color: white;
      box-shadow: 0 8px 20px rgba(216,168,146,0.3);
    }

    .btn-add:hover {
      background: #be8b74;
      transform: translateY(-3px);
    }

    .btn-back {
      border: 2px solid #d8a892;
      color: #9a7561;
      margin-right: 10px;
    }

    .btn-back:hover {
      background: #f6e3d8;
    }

    .table-responsive {
      width: 100%;
      overflow-x: auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
      text-align: left;
    }

    th {
      background-color: #fcf1eb;
      color: #6e4d3d;
      padding: 18px;
      font-weight: 600;
      border-bottom: 2px solid #f0ddd2;
    }

    td {
      padding: 18px;
      border-bottom: 1px solid #f3ddd1;
      color: #7d6257;
      vertical-align: middle;
    }

    tr:hover td {
      background-color: #fffdfc;
    }

    .product-img {
      width: 60px;
      height: 60px;
      object-fit: cover;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    .actions {
      display: flex;
      gap: 15px;
    }

    .action-link {
      text-decoration: none;
      font-weight: 600;
      font-size: 14px;
    }

    .edit-link {
      color: #4a90e2;
    }

    .edit-link:hover {
      text-decoration: underline;
    }

    .delete-btn {
      background: none;
      border: none;
      color: #e06c75;
      font-family: 'Poppins', sans-serif;
      font-weight: 600;
      font-size: 14px;
      cursor: pointer;
    }

    .delete-btn:hover {
      text-decoration: underline;
    }

    .alert-success {
      background: #e6f4ea;
      color: #137333;
      padding: 15px 25px;
      border-radius: 18px;
      margin-bottom: 25px;
      font-size: 15px;
    }

    /* FIX PAGINATION: Memaksa tanda panah raksasa Laravel menjadi kecil & rapi */
    .pagination-wrapper {
      margin-top: 30px;
      display: flex;
      justify-content: center;
    }

    .pagination-wrapper nav {
      display: flex;
      align-items: center;
      justify-content: space-between;
      width: 100%;
    }

    .pagination-wrapper svg {
      width: 20px !important;
      height: 20px !important;
      display: inline-block;
      vertical-align: middle;
    }

    .pagination-wrapper flex {
      display: flex;
      align-items: center;
      gap: 5px;
    }

    /* Style untuk text info "Showing X to Y" */
    .pagination-wrapper p {
      font-size: 14px;
      color: #7d6257;
    }

    /* Style untuk kotak tombol angka */
    .pagination-wrapper span, 
    .pagination-wrapper a {
      padding: 8px 16px;
      border: 1px solid #f0ddd2;
      background: white;
      color: #6e4d3d;
      text-decoration: none;
      border-radius: 10px;
      font-size: 14px;
      transition: 0.3s;
    }

    .pagination-wrapper a:hover {
      background: #f6e3d8;
    }

    .pagination-wrapper .active,
    .pagination-wrapper span[aria-current="page"] {
      background: #d8a892 !important;
      color: white !important;
      border-color: #d8a892 !important;
    }
  </style>
</head>
<body>

  <div class="crud-container">
    
    @if(session('success'))
      <div class="alert-success">
        ✨ {{ session('success') }}
      </div>
    @endif

    <div class="crud-header">
      <div>
        <h2><i class="fa-solid fa-user-gear"></i> Admin Area</h2>
        <p style="color: #a08575; font-size: 14px; margin-top: 5px;">Kelola data stok dan produk katalog jilbab kamu</p>
      </div>
      <div>
        <a href="/" class="btn btn-second btn-back"><i class="fa-solid fa-arrow-left"></i> Lihat Toko</a>
        <a href="{{ route('jilbabs.create') }}" class="btn btn-add"><i class="fa-solid fa-plus"></i> Tambah Jilbab</a>
      </div>
    </div>

    <div class="table-responsive">
      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama Jilbab</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Stok</th>
            <th style="text-align: center;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($jilbabs as $index => $jilbab)
            <tr>
              <td>{{ ($jilbabs->currentPage() - 1) * $jilbabs->perPage() + $index + 1 }}</td>
              <td>
                <img src="{{ $jilbab->image }}" alt="{{ $jilbab->title }}" class="product-img">
              </td>
              <td style="font-weight: 600; color: #5f4335;">{{ $jilbab->title }}</td>
              <td>{{ Str::limit($jilbab->description, 50) }}</td>
              <td style="font-weight: 600; color: #d8a892;">Rp {{ number_format($jilbab->price, 0, ',', '.') }}</td>
              <td>
                <span style="background: #f6e3d8; padding: 4px 12px; border-radius: 20px; font-size: 13px; font-weight: 600; color: #9a7561;">
                  {{ $jilbab->stock }} pcs
                </span>
              </td>
              <td style="text-align: center;">
                <div class="actions" style="justify-content: center;">
                  <a href="{{ route('jilbabs.edit', $jilbab->id) }}" class="action-link edit-link">
                    <i class="fa-solid fa-pen-to-square"></i> Edit
                  </a>

                  <form action="{{ route('jilbabs.destroy', $jilbab->id) }}" method="POST" onsubmit="return confirm('Apakah kamu yakin ingin menghapus produk ini? ✨');" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-btn">
                      <i class="fa-solid fa-trash"></i> Hapus
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="7" style="text-align: center; padding: 40px; font-style: italic; color: #a08575;">
                <i class="fa-solid fa-box-open" style="font-size: 30px; margin-bottom: 10px; display: block; color: #d8a892;"></i>
                Belum ada produk jilbab yang terdaftar. Yuk tambah sekarang!
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="pagination-wrapper">
      {{ $jilbabs->links() }}
    </div>

  </div>

</body>
</html>