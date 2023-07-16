<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <title>Edit Data P</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
<div class="container">
        <div class="row mt-3">
            <div class="col-4">
                <h3>Edit Data Hotel</h3>
                <?php
                include 'koneksi.php';
                $panggil = $koneksi->query("SELECT * FROM hotel where idPesanan='$_GET[edit]'");
                ?>
                 <?php
                while ($row = $panggil->fetch_assoc()) {
                ?>
                    <form action="koneksi.php" method="POST">
                        <div class="form-group">
                            <label for="idPasien">ID Pesanan</label>
                            <input type="text" class="form-control mb3" name="idPesanan" value="<?= $row['idPesanan'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nmPasien">Nama Pemesan</label>
                            <input type="text" class="form-control mb3" name="nmPemesam" value="<?= $row['nmPemesan'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="noTelp">Nomor Telephon</label>
                            <input type="text" class="form-control mb3" name="noTelp" value="<?= $row['noTelp'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <div class="form-check">
                                <input type="radio" class="form-checkinput" name="jk" value="perempuan" <?php if (($row['jk']) === "perempuan") {echo "checked";
                                } ?>> Perempuan
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-checkinput" name="jk" value="laki-laki" <?php if (($row['jk']) === "lakilaki") {echo "checked";
                                } ?>> Laki-laki
                            </div>
                            <div class="form-group mt-3">
                                <label for="alamat">Alamat</label>
                                <textarea class="formcontrol" name="alamat" id="alamat" cols="44" rows="3" placeholder="Alamat"><?= $row['alamat'] ?></textarea>
                            </div>
                            <div class="form-group mt-3">
                                <input type="submit" name="edit" value="Edit" class="form-control btn btn-primary">
                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</body>