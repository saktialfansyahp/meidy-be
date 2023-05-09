@extends('layout.admin')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Produk</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active"><a href=(produk,index)>Produk</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="container">
    <div class="container-fluid">
      <div class="col-8">
      <div class="row justify-content-center">
          <div class="card-body">
            <form action="{{route('produk.update', $data->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Gambar</label>
                <input type="file" name="gambar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->gambar }}">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"value="{{ $data->nama_produk }}">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Harga</label>
                <input type="text" name="harga" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->harga }}">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Ukuran</label>
                <select class="form-select" name="ukuran" aria-label="Default select example">
                        <option selected>{{ $data->ukuran }}</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="XXL">XXL</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Warna</label>
                <input type="text" name="warna" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->warna }}">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Stok</label>
                <input type="number" name="stok" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->stok }}">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->deskripsi }}">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
      </div>
      </div>
    </div>
    </div>
    

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  -->
</body>
</div>
@endsection
