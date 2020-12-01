<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM matakuliah_diambil_mahasiswa ORDER BY kode_matakuliah ASC");

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
                <a class="nav-links" href="./matkuldiambilComponents/delete.php">Hapus Mahasiswa</a>
                <a class="nav-links" href="firstPage.php">Tabel Dosen</a>
                <a class="nav-links" href="secondPage.php">Tabel Mahasiswa</a>
                <a class="nav-links" href="matakuliahPage.php">Daftar Matakuliah</a>
                <a class="nav-links" href="logoutPage.php">Logout</a>
            </ul>
            </div>
    </div>
</head>

<body>

    <h2>List Matakuliah diambil Mahasiswa</h2>
    <form action="./matkuldiambilComponents/search.php" method="post" name="form1">
		<div class="login-form">
			<h1>Cari Matakuliah</h1>
				<input type="text" name="carimk" placeholder="Nama Matakuliah" required>
				<input type="submit" name="Submit" value="Add">
		</div>
    </form>

    <table class="darkTable" width='80%' border=1>
    <thead>
        <tr>
            <th>Kode MK</th> <th>Nama MK</th> <th>NIM</th> <th>Nama Mahasiswa</th>
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
        echo "<td>".$user_data['kode_matakuliah']."</td>";
        echo "<td>".$user_data['nama_mk']."</td>";
        echo "<td>".$user_data['nim_mahasiswa']."</td>";
        echo "<td>".$user_data['nama_mahasiswa']."</td>";
        // echo "<td>".$user_data['mobile']."</td>"; 
        echo "</tbody>";
    }
    ?>
    </table>
</body>
</html>
