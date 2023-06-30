
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
        
        <h1>Edit Master</h1>
        @if (session('message'))
            {!! session('message') !!}
        @endif
            
                <div class="modal-body">
                    <form method="POST" action="">
                        @csrf
                        @method('PATCH')
                        
                        <div class="form-group">
                            <label for="namaBarang">Nama Barang</label>
                            <input type="text" name="namaBarang" class="form-control" required value="{{$itemMaster->nama_barang}}">
                        </div>
                        <div class="form-group">
                            <label for="kodeBarang">Kode Barang</label>
                            <input type="text" name="kodeBarang" class="form-control" required value="{{$itemMaster->kode_barang}}">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="number" name="status" class="form-control" required value="{{$itemMaster->status}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{url('/masterItem')}}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
            </div>
    
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>