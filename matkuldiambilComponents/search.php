<?php
    session_start();
    if(isset($_POST['Submit'])) {
        $mk = $_POST['carimk'];
        // include database connection file
        include_once("../config.php");

        // Insert user data into table
        $results = mysqli_query($mysqli, "SELECT * FROM matakuliah_diambil_mahasiswa WHERE nama_mk LIKE  '%$mk%'");

        // Show message when user added
        unset($_POST['Submit']);
    }
?>
<style>
<?php include '../styles/Navbar.css'; ?>
<?php include '../styles/Table.css'; ?>
</style>

<html>
<head>    
    <title>Sistem Akademik</title>
    <div class="navbar">
            <div class="navbar-logo">
                Sistem Akademik
            </div>
            <div>
            <ul class="nav-menu">
                <a class="nav-links" href="../matkuldiambilPage.php">Kembali</a>
            </ul>
            </div>
    </div>
</head>

<body>

    <h2>Cari Matakuliah</h2>

    <table class="darkTable" width='80%' border=1>
    <thead>
        <tr>
            <th>Kode MK</th> <th>Nama MK</th> <th>NIM</th> <th>Nama Mahasiswa</th>
        </tr>
    <thead>
    <?php  
    if(!isset($_SESSION['user_name'])){
          header("Location: loginPage.php");
          exit();
      }

      

    while($user_data = mysqli_fetch_array($results)) {         
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
