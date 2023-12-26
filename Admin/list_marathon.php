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
            <div class="collapse navbar-collapse" id="navcol-1"><a class="btn btn-primary ms-auto" role="button" href="marathon_regist.html">Add Race</a></div>
            <div class="collapse navbar-collapse" id="navcol-1"><a class="btn btn-primary ms-auto" role="button" href="list_participate.php">List Participate</a></div>
            <div class="collapse navbar-collapse" id="navcol-1"><a class="btn btn-primary ms-auto" role="button" href="index.php">List User</a></div>
        </div>
    </nav>
    <div class="container">
        <div>
            <form>
                <div class="form-group mb-3">
                    <div class="title-div">
                        <h1 style="text-align: center">LIST<br>MARATHON</h1>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="bootstrap_datatables">
        <div class="container py-5">
            <div class="row py-5">
                <div class="col-lg-10 mx-auto">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body bg-white p-5 rounded">
                            <div class="table-responsive">
                            <?php
// Kết nối đến cơ sở dữ liệu (sử dụng MySQLi hoặc PDO)
$servername = "localhost";
$username = "root";
$password = "";
$database = "marathon_hanoi";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Thực hiện truy vấn để lấy dữ liệu từ bảng marathon
$query = "SELECT MarathonID, Race, Date FROM marathon";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Nếu có dữ liệu, hiển thị nó trong bảng HTML
    echo '<table class="table table-striped table-bordered" id="example" style="width:100%;">';
    echo '<thead>';
    echo '<tr>';
    echo '<th style="text-align: center">Marathon ID</th>';
    echo '<th style="text-align: center">Race Name</th>';
    echo '<th style="text-align: center">Date Start</th>';
    echo '<th style="text-align: center">Action</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['MarathonID'] . '</td>';
        echo '<td>' . $row['Race'] . '</td>';
        echo '<td>' . $row['Date'] . '</td>';
        echo '<td><button class="btn btn-danger" onclick="deleteMarathon(' . $row['MarathonID'] . ')" style="border: none;width: 80px;height: 35px;margin-left: 0;background-color: #d23350;color: rgb(255,255,255);margin-top: 12px;text-align: center;padding-left: 12px;margin: auto;;" type="button">Delete</button></td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo "Không có dữ liệu";
}

// Đóng kết nối
$conn->close();
?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function deleteMarathon(marathonID) {
        var confirmation = confirm("Are you sure you want to delete this marathon?");
        if (confirmation) {
            $.ajax({
                type: "POST",
                url: "delete_marathon.php", // Đặt đường dẫn đến file PHP xử lý xóa ở đây
                data: { marathonID: marathonID },
                success: function(response) {
                    if (response === 'success') {
                        alert("Marathon deleted successfully.");
                        // Cập nhật trang hoặc thực hiện các hành động khác sau khi xóa
                        window.location.reload();
                    } else {
                        alert("Error deleting marathon.");
                    }
                }
            });
        }
    }
</script>

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