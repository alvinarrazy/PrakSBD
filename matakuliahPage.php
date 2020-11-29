<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM matakuliah ORDER BY kode_mk ASC");

?>
<style>
<?php include 'styles/Navbar.css'; ?>
<?php include 'styles/Table.css'; ?>
</style>

<html>
<head>    
    <title>Tabel Mahasiswa</title>
    <div class="navbar">
            <div class="navbar-logo">
                KELOMPOK 17
            </div>
            <div>
            <ul class="nav-menu">
                <a class="nav-links" href="./matakuliahComponents/add.php">Tambah Matkul</a>
                <a class="nav-links" href="firstPage.php">Tabel Dosen</a>
                <a class="nav-links" href="secondPage.php">Tabel Mahasiswa</a>
                <a class="nav-links" href="thirdPage.php">View</a>
                <a class="nav-links" href="logoutPage.php">Logout</a>
            </ul>
            </div>
    </div>
</head>

<body>

    <h2>Mahasiswa</h2>

    <table class="darkTable" width='80%' border=1>
    <thead>
        <tr>
            <th>Kode MK</th> <th>Nama MK</th> <th>Dosen Pengampu</th> <th>Update</th>
        </tr>
    <thead>
    <?php  
    session_start();
    if(!isset($_SESSION['user_name'])){
          header("Location: loginPage.php");
          exit();
      }

      

    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<tbody>";
        echo "<td>".$user_data['kode_mk']."</td>";
        echo "<td>".$user_data['nama_mk']."</td>";
        echo "<td>".$user_data['nik_dosen']."</td>";
        // echo "<td>".$user_data['mobile']."</td>"; 
        echo "<td><a href='matakuliahComponents/edit.php?id=$user_data[kode_mk]'>Edit</a> | <a href='matakuliahComponents/delete.php?id=$user_data[kode_mk]'>Delete</a></td></tr>";        
        echo "</tbody>";
    }
    ?>
    </table>
</body>
</html>
