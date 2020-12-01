<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM mahasiswa ORDER BY nim ASC");
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
                Sistem Akademik
            </div>
            <div>
            <ul class="nav-menu">
                <a class="nav-links" href="./mahasiswaComponents/add.php">Tambah Mahasiswa Baru</a>
                <a class="nav-links" href="firstPage.php">Tabel Dosen</a>
                <a class="nav-links" href="matakuliahPage.php">Tabel Matakuliah</a>
                <a class="nav-links" href="matkuldiambilPage.php">View</a>
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
            <th>NIM</th> <th>Nama</th> <th>Update</th>
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
        echo "<td>".$user_data['nim']."</td>";
        echo "<td>".$user_data['nama_mahasiswa']."</td>";
        // echo "<td>".$user_data['mobile']."</td>"; 
        echo "<td><a href='mahasiswaComponents/edit.php?id=$user_data[nim]'>Edit</a> | <a href='mahasiswaComponents/delete.php?id=$user_data[nim]'>Delete</a></td></tr>";        
        echo "</tbody>";
    }
    ?>
    </table>
</body>
</html>
