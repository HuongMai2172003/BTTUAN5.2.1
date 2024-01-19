<!DOCTYPE html>
<?php
session_start();
require_once("sanpham.php");
global $result;
?>
<html lang="en">
<head>
    <title>Quản trị sản phẩm </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="jumbotron">
    <h1 class="display-3">Quản trị sản phẩm</h1>
    <hr class="my-2">
</div>

<div class="card-columns">
    <div class="card">
        <img class="card-img-top" src="holder.js/100x180/" alt="">
        <div class="card-body">
            <h4 class="card-title">Thông tin sản phẩm</h4>
            <form action="" method="post">
                <div class="form-group">
                    <label for="txtMaSP">MASP</label>
                    <input type="text" class="form-control" name="txtMaSP" id="txtMaSP" aria-describedby="helpId"
                           placeholder="MASP">
                    <small id="helpId" class="form-text text-muted">Help text</small>
                </div>
                <div class="form-group">
                    <label for="txtTenSP">TenSP</label>
                    <input type="text" class="form-control" name="txtTenSP" id="txtTenSP" aria-describedby="helpId"
                           placeholder="TenSP">
                    <small id="helpId" class="form-text text-muted">Help text</small>
                </div>

                <div class="form-group">
                    <label for="txtDVT">DVT</label>
                    <input type="text" class="form-control" name="txtDVT" id="txtDVT" aria-describedby="helpId"
                           placeholder="DVT">
                    <small id="helpId" class="form-text text-muted">Help text</small>
                </div>
                <div class="form-group">
                    <label for="txtDonGia">DonGia</label>
                    <input type="text" class="form-control" name="txtDonGia" id="txtDonGia" aria-describedby="helpId"
                           placeholder="DonGia">
                    <small id="helpId" class="form-text text-muted">Help text</small>
                </div>
                <div class="form-group">
                    <label for="txtNCC">NhaCungCap</label>
                    <input type="text" class="form-control" name="txtNCC" id="txtNCC" aria-describedby="helpId"
                           placeholder="NhaCungCap">
                    <small id="helpId" class="form-text text-muted">Help text</small>
                </div>

                <button type="submit" name="btnThem" id="btnThem" class="btn btn-primary btn-lg btn-block"> Thêm
                </button>
                <button type="submit" name="btnHienThi" id="btnHienThi"
                        class="btn btn-primary btn-lg btn-block"> Hiển Thị
                </button>
                <button type="submit" name="btnUpdate" id="btnUpdate"
                        class="btn btn-primary btn-lg btn-block"> Update
                </button>
            </form>
        </div>
    </div>

    <div class="card">
        <img class="card-img-top" src="holder.js/100x180/" alt="">
        <div class="card-body">
            <h4 class="card-title">Hiển thị sản phẩm </h4>
            <table class="table">
                <thead>
                <tr>
                    <th>MaSP</th>
                    <th>TenSP</th>
                    <th>DVT</th>
                    <th>DonGia</th>
                    <th>NhaCC</th>
                </tr>
                </thead>

                <tbody>
                <?php
                if (isset($_POST['btnHienThi'])) {
                    $result = hienThiSanPham();
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['MaSP'] . '</td>';
                        echo '<td>' . $row['TenSP'] . '</td>';
                        echo '<td>' . $row['DVT'] . '</td>';
                        echo '<td>' . $row['DonGia'] . '</td>';
                        echo '<td>' . $row['NCC'] . '</td>';
                        echo '</tr>';
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
if (isset($_POST['btnThem'])) {
    $MaSP = $_POST['txtMaSP'];
    $TenSP = $_POST['txtTenSP'];
    $DVT = $_POST['txtDVT'];
    $DonGia = $_POST['txtDonGia'];
    $NCC = $_POST['txtNCC'];
    $i = themSanPham($MaSP, $TenSP, $DVT, $DonGia, $NCC);
    if ($i < 0) {
        echo "Thêm Thất bại";
    } else {
        echo "Thêm thành công";
    }
}
?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
