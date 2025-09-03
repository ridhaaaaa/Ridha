<?php
// Konfigurasi kredensial MySQL
$DB_HOST = '127.0.0.1';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'profil_db';
$DB_PORT = 3306;

function get_server_connection_without_db() {
    global $DB_HOST, $DB_USER, $DB_PASS, $DB_PORT;
    $mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, '', $DB_PORT);
    if ($mysqli->connect_errno) {
        die('Gagal koneksi MySQL (server): ' . $mysqli->connect_error);
    }
    return $mysqli;
}

function get_db_connection() {
    global $DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $DB_PORT;
    $mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $DB_PORT);
    if ($mysqli->connect_errno) {
        die('Gagal koneksi MySQL (db): ' . $mysqli->connect_error);
    }
    $mysqli->set_charset('utf8mb4');
    return $mysqli;
}

// Pastikan database dan tabel ada
function ensure_database_and_tables() {
    global $DB_NAME;

    // 1) Buat database jika belum ada
    $server = get_server_connection_without_db();
    $dbNameEscaped = preg_replace('/[^a-zA-Z0-9_]/', '_', $DB_NAME);
    $server->query("CREATE DATABASE IF NOT EXISTS `{$dbNameEscaped}` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");
    $server->close();

    // 2) Buat tabel jika belum ada
    $mysqli = get_db_connection();
    $sql = "CREATE TABLE IF NOT EXISTS projects (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        image VARCHAR(512) DEFAULT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
    $mysqli->query($sql);
    $sql2 = "CREATE TABLE IF NOT EXISTS messages (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        message TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
    $mysqli->query($sql2);
    $mysqli->close();
}

ensure_database_and_tables();
?>



