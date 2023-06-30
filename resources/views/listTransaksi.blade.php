<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Transaksi</title>
  </head>
  <body>

    <div class="container">
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light my-3">
            <a class="navbar-brand" href="#"><h1>List Transaksi</h1></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a  href="{{url('/masterItem')}}">Master Item <span class="sr-only">(current)</span></a>
                </li>
                
            </div>
            </nav>

        @if (session('message'))
            {!! session('message') !!}
        @endif

        <table class="table">
            <!-- Button trigger modal -->
            <div class="my-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Tambah Data
            </button>
            </div>
            

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Transaksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    <form method="POST" action="">
                        @csrf
                        
                        <div class="form-group">
                            <select class="form-control" name="kodeBarang" required>
                            <option value="">Pilih Kode Barang</option>
                            @foreach ($dataMasterItem as $item)
                                <option value="{{$item->kode_barang}}">{{$item->kode_barang}} - {{$item->nama_barang}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="number" name="qty" class="form-control" placeholder="Kuantity" required>
                            
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
            </div>
            <div class="my-2">
                @error('qty')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }} !!!
                    </div>
                @enderror
            </div>
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">kode Barang</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Qty</th>
            <th scope="col">
                <center>aksi</center>
            </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->kode_barang}}</td>
                    <td>{{$item->nama_barang}}</td>
                    <td>{{$item->qty}}</td>
                    <td>
                        <center>
                        <a href="{{url('/edit', $item->id)}}" class="btn btn-warning">Edit</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{$item->id}}">
                        Hapus
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-danger" id="exampleModalLabel">Hapus..!!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Hapus Data..?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <a href="{{url('/hapus', $item->id)}}" class="btn btn-primary">Confirm Hapus</a>
                            </div>
                            </div>
                        </div>
                    </div>
                        </center>
                    </td>
                    </tr>
                <tr>
            @endforeach
        </tbody>
        </table>
    
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>