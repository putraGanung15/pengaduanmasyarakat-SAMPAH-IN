<?php
// Konfigurasi database
$host = "localhost";
$username = "root";
$password = "";
$database_name = "tokoroti";

// Koneksi ke database
$conn = mysqli_connect($host, $username, $password, $database_name);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Set karakter
$conn->set_charset("utf8");

// Cek apakah database ada tabel
$tables = array();
$sql = "SHOW TABLES";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}

// Ambil daftar tabel
while ($row = mysqli_fetch_row($result)) {
    $tables[] = $row[0];
}

// Jika tidak ada tabel
if (empty($tables)) {
    die("Database '$database_name' tidak memiliki tabel untuk di-backup.");
}

$sqlScript = "";
foreach ($tables as $table) {
    // Struktur tabel
    $query = "SHOW CREATE TABLE $table";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Gagal membaca struktur tabel '$table': " . mysqli_error($conn));
    }

    $row = mysqli_fetch_row($result);
    $sqlScript .= "\n\n" . $row[1] . ";\n\n";

    // Data tabel
    $query = "SELECT * FROM $table";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Gagal membaca data tabel '$table': " . mysqli_error($conn));
    }

    $columnCount = mysqli_num_fields($result);

    // Isi data tiap baris
    while ($row = mysqli_fetch_row($result)) {
        $sqlScript .= "INSERT INTO $table VALUES(";
        for ($j = 0; $j < $columnCount; $j++) {
            $row[$j] = addslashes($row[$j]);
            $row[$j] = str_replace("\n", "\\n", $row[$j]);
            $sqlScript .= isset($row[$j]) ? '"' . $row[$j] . '"' : '""';
            if ($j < ($columnCount - 1)) {
                $sqlScript .= ',';
            }
        }
        $sqlScript .= ");\n";
    }
    $sqlScript .= "\n";
}

// Simpan hasil ke file SQL
if (!empty($sqlScript)) {
    $backup_file_name = $database_name . '_backup_' . time() . '.sql';
    $fileHandler = fopen($backup_file_name, 'w+');
    fwrite($fileHandler, $sqlScript);
    fclose($fileHandler);

    // Download file melalui browser
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($backup_file_name));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($backup_file_name));
    ob_clean();
    flush();
    readfile($backup_file_name);

    // Hapus file setelah didownload
    unlink($backup_file_name);
}
?>
