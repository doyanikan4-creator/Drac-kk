<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username       = htmlspecialchars($_POST['username']);
    $nama_akun      = htmlspecialchars($_POST['nama_akun']);
    $bank_tujuan    = htmlspecialchars($_POST['bank_tujuan']);
    $nama_akun_bank = htmlspecialchars($_POST['nama_akun_bank']);
    $nomor_rekening = htmlspecialchars($_POST['nomor_rekening']);
    $nominal        = htmlspecialchars($_POST['nominal']);

    if ((int)$nominal < 20000) {
        die("Nominal minimal Rp20.000");
    }

    $email_tujuan = "doyanikan4@gmail.com";
    $subject      = "Permintaan Penarikan Drac-X - $username";

    $pesan = "
    <html>
    <head><title>Penarikan Drac-X</title></head>
    <body>
      <h2 style='color:#e94560;'>Permintaan Penarikan Baru - Drac-X</h2>
      <table border='1' cellpadding='10' cellspacing='0' style='border-collapse:collapse;'>
        <tr><td><b>Username</b></td><td>$username</td></tr>
        <tr><td><b>Nama Akun</b></td><td>$nama_akun</td></tr>
        <tr><td><b>Bank Tujuan</b></td><td>$bank_tujuan</td></tr>
        <tr><td><b>Nama Akun Bank</b></td><td>$nama_akun_bank</td></tr>
        <tr><td><b>Nomor Rekening</b></td><td>$nomor_rekening</td></tr>
        <tr><td><b>Nominal</b></td><td>Rp " . number_format($nominal,0,',','.') . "</td></tr>
        <tr><td><b>Waktu</b></td><td>" . date('d-m-Y H:i:s') . "</td></tr>
      </table>
    </body>
    </html>";

    $headers  = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: Drac-X <noreply@" . $_SERVER['HTTP_HOST'] . ">" . "\r\n";

    if (mail($email_tujuan, $subject, $pesan, $headers)) {
        echo "<script>alert('Permintaan penarikan berhasil dikirim! Mohon tunggu proses verifikasi.'); window.location='index.html';</script>";
    } else {
        echo "<script>alert('Gagal mengirim, coba lagi.'); window.location='index.html';</script>";
    }
}
?>
