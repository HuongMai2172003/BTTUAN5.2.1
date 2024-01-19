<?php
header('Access-Control-Allow-Origin: *');

$s = "localhost";
$u = "root";
$p = "";
$db = "androi5";
$conn = new mysqli($s, $u, $p, $db);

function ketNoiDB()
{
    global $conn;
    return $conn;
}

function themSanPham($MaSP, $TenSP, $DVT, $DonGia, $NCC)
{
    $con = ketNoiDB();
    if ($con) {
        $i = $con->query('INSERT INTO sanpham VALUES ("' . $MaSP . '","' . $TenSP . '","' . $DVT . '","' . $DonGia . '","' . $NCC . '")');
        if (!$i) {
            echo "Error: " . $con->error; // Hiển thị lỗi SQL
        }
        return $i;
    } else {
        echo "Không thể kết nối đến cơ sở dữ liệu.";
        return false;
    }
}

function hienThiSanPham()
{
    $con = ketNoiDB();
    if ($con) {
        $result = $con->query('SELECT * FROM sanpham');
        return $result;
    } else {
        echo "Không thể kết nối đến cơ sở dữ liệu.";
        return false;
    }
}

function updateSanPham($MaSP, $TenSP, $DVT, $DonGia, $NCC)
{
    $con = ketNoiDB();
    if ($con) {
        $i = $con->query('UPDATE sanpham SET 
            TenSP="' . $TenSP . '",
            DVT="' . $DVT . '",
            DonGia="' . $DonGia . '",
            NCC="' . $NCC . '" 
            WHERE MaSP="' . $MaSP . '"');
        if (!$i) {
            echo "Error: " . $con->error; // Hiển thị lỗi SQL
        }
        return $i;
    } else {
        echo "Không thể kết nối đến cơ sở dữ liệu.";
        return false;
    }
}


