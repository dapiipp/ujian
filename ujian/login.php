
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Login</h4>
                        <?php if (isset($error)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error; ?>
                            </div>
                        <?php } ?>
                        <form action="login.php" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
// Konfigurasi koneksi database
$host = 'localhost';
$usernamedb = 'root';
$passwordb = '';
$database = 'hotel';

// Membuat koneksi ke database
$connection = new mysqli($host, $usernamedb, $passwordb, $database);

// Memeriksa koneksi database
if ($connection->connect_error) {
    die("Koneksi database gagal: " . $connection->connect_error);
}

// Memeriksa apakah ada data yang dikirimkan melalui metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari formulir login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Melakukan query untuk mencari pengguna dengan username yang cocok
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $connection->query($query);

    // Memeriksa apakah query berhasil dieksekusi
    if ($result) {
        // Memeriksa apakah ada pengguna dengan username yang cocok
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Memeriksa kecocokan password
            if (password_verify($password, $user['password'])) {
                // Login berhasil, lakukan sesuatu, seperti menyimpan data pengguna di sesi
                session_start();
                
                // Memeriksa peran pengguna (user atau admin)
                $role = $user['role'];
                if ($role === 'admin') {
                    // Pengguna adalah admin, alihkan ke halaman admin.php
                    header("Location: editpasien.php");
                    exit;
                } else {
                    // Pengguna adalah user, alihkan ke halaman user.php
                    header("Location: pasien.php");
                    exit;
                }
            } else {
                // Password salah
                $error = "Password yang Anda masukkan salah.";
            }
        } else {
            // Username tidak ditemukan
            $error = "Username tidak ditemukan.";
        }
    } else {
        // Terjadi kesalahan saat menjalankan query
        $error = "Terjadi kesalahan dalam pemrosesan login.";
    }
}
?>

<?php
// Menutup koneksi database
$connection->close();
?>
