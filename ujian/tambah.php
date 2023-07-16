<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <title>Tambah Data Pasien</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-4">
                <h3>Tambah Data Pasien</h3>
                <form action="koneksi.php" method="POST">
                    <div class="form-group">
                        <label for="idPesanan">ID Pesanan</label>
                        <input type="text" class="form-control mb3" name="idPesanan" placeholder="ID Pesanan">
                    </div>
                    <div class="form-group">
                        <label for="nmPemesan">Nama Pemesan</label>
                        <input type="text" class="form-control mb3" name="nmPemesan" placeholder="Nama Pemesan">
                    </div>
                    <div class="form-group">
                        <label for="noTelp">No Telephon</label>
                        <input type="text" class="form-control mb3" name="noTelp" placeholder="No Telephon">
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <div class="form-check">
                            <input type="radio" class="form-checkinput" name="jk" value="perempuan"> Perempuan
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-checkinput" name="jk" value="laki-laki"> Laki-laki
                        </div>
                        <div class="form-group mt-3">
                            <label for="alamat">Alamat</label>
                            <br>
                            <textarea class="formcontrol" name="alamat" id="alamat" cols="44" rows="5" placeholder="Alamat"></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <input type="submit" name="simpan" value="Simpan" class="form-control btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>