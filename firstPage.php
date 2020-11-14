<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM dosen_wali ORDER BY nik DESC");
?>
<style>
<?php include 'styles/Navbar.css'; ?>
<?php include 'styles/Table.css'; ?>
</style>

<html>
<head>    
    <title>Tabel Dosen</title>
    <div class="navbar">
            <div class="navbar-logo">
                KELOMPOK 17
            </div>
            <div>
            <ul class="nav-menu">
                <a class="nav-links" href="./dosenComponents/add.php">Tambah Dosen Baru</a>
                <a class="nav-links" href="secondPage.php">Tabel Mahasiswa</a>
                <a class="nav-links" href="thirdPage.php">Tampilkan JOIN</a>
            </ul>
            </div>
    </div>
</head>

<body>

    <h2>Dosen</h2>

    <table class="darkTable" width='80%' border=1>
    <thead>
        <tr>
            <th>NIK</th> <th>Nama</th> <th>No. Telp</th> <th>Update</th>
        </tr>
    <thead>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<tbody>";
        echo "<td>".$user_data['nik']."</td>";
        echo "<td>".$user_data['nama_dosen']."</td>";
        echo "<td>".$user_data['mobile']."</td>";    
        echo "<td><a href='./dosenComponents/edit.php?id=$user_data[nik]'>Edit</a> | <a href='./dosenComponents/delete.php?id=$user_data[nik]'>Delete</a></td></tr>";        
        echo "</tbody>";
    }
    ?>
    </table>
</body>
</html>
