<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="../assets/css/Bootstrap-DataTables.css">
    <link rel="stylesheet" href="../assets/css/Google-Style-Login-.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/Responsive-Form-Contact-Form-Clean.css">
    <link rel="stylesheet" href="../assets/css/Responsive-Form.css">
    <link rel="stylesheet" href="../assets/css/Section-Title.css">
    <link rel="stylesheet" href="../assets/css/Table-With-Search-search-table.css">
    <link rel="stylesheet" href="../assets/css/Table-With-Search.css">
</head>

<body>
    <nav class="navbar navbar-expand bg-light navigation-clean navbar-light">
        <div class="container"><a class="navbar-brand" href="#">Hanoi Marathon 2024</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"></button>
            <div class="collapse navbar-collapse" id="navcol-1"><a class="btn btn-primary ms-auto" role="button" href="index.php">List User</a></div>
            <div class="collapse navbar-collapse" id="navcol-1"><a class="btn btn-primary ms-auto" role="button" href="list_marathon.php">List Marathon</a></div>
        </div>
    </nav>
    <div class="container">
        <div>
            <form>
                <div class="form-group mb-3">
                    <div class="title-div">
                        <h1 style="text-align: center">LIST<br>PARTICIPANT</h1>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="bootstrap_datatables">
        <div class="bootstrap_datatables">
            <div class="container py-5">
                <div class="row py-5">
                    <div class="col-lg-10 mx-auto">
                        <div class="card border-0 shadow rounded">
                            <div class="card-body bg-white p-5 rounded">
                                <div class="table-responsive">
                                <?php
//require_once("db.php");
$servername = "localhost";
$username = "root";
$password = "";
$database = "marathon_hanoi";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Truy vấn dữ liệu từ bảng participate
$sql = "SELECT EntryNO, userID, MarathonID, Hotel, Time, Standings FROM participate";
$result = mysqli_query($conn, $sql);

// Kiểm tra xem có dữ liệu hay không
if (mysqli_num_rows($result) > 0) {
    // Bắt đầu tạo bảng HTML
    echo '<table class="table table-striped table-bordered" id="example" style="width:100%;">
            <thead>
                <tr>
                    <th style="text-align: center">Marathon ID</th>
                    <th style="text-align: center">User ID</th>
                    <th style="text-align: center">Entry NO</th>
                    <th style="text-align: center">Hotel</th>
                    <th style="text-align: center">Time Record</th>
                    <th style="text-align: center">Standings</th>
                    <th style="text-align: center">Action</th>
                </tr>
            </thead>
            <tbody>';

    // Lặp qua từng dòng dữ liệu
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['MarathonID'] . '</td>';
        echo '<td>' . $row['userID'] . '</td>';
        echo '<td>' . $row['EntryNO'] . '</td>';
        echo '<td>' . $row['Hotel'] . '</td>';
        echo '<td>' . $row['Time'] . '</td>';
        echo '<td>' . $row['Standings'] . '</td>';
        echo '<td>
                <button class="btn btn-danger update" data-entryno="' . $row['EntryNO'] . '">Update</button>
              </td>';
        echo '</tr>';
    }

    // Kết thúc bảng HTML
    echo '</tbody>
        </table>';

    // Thêm mã JavaScript để xử lý sự kiện click cho nút "Update"
    echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                var updateButtons = document.querySelectorAll(".update");

                updateButtons.forEach(function(button) {
                    button.addEventListener("click", function() {
                        var entryNO = this.getAttribute("data-entryno");
                        UpdateUser(entryNO);
                    });
                });
            });

            function UpdateUser(entryNO) {
                // Thực hiện các bước cần thiết để cập nhật người dùng
                // Ví dụ: Chuyển hướng đến trang cập nhật với entryNO
                window.location.href = "updateUser.php?entryNO=" + entryNO;
            }
          </script>';
} else {
    echo "Không có dữ liệu.";
}

// Đóng kết nối
$conn->close();
?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/js/Bootstrap-DataTables-main.js"></script>
    <script src="../assets/js/Table-With-Search-search-table.js"></script>
</body>

</html>