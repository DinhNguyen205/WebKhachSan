<?php
$host = 'sql210.infinityfree.com';
$dbname = 'if0_39115570_hotrodulich';
$username = 'if0_39115570';
$password = 'nhomcttcntt46a';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->exec("SET NAMES 'utf8mb4'");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kết nối thất bại: " . $e->getMessage());
}
?>