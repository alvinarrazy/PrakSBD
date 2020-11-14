<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT A.nim, A.nama_mahasiswa, B.nama_dosen FROM mahasiswa A INNER JOIN dosen_wali B ON A.nik_wali = B.nik");
$result1 = mysqli_query($mysqli, "SELECT A.nim, A.nama_mahasiswa, B.nama_dosen FROM mahasiswa A LEFT JOIN dosen_wali B ON A.nik_wali = B.nik");
$result2 = mysqli_query($mysqli, "SELECT A.nim, A.nama_mahasiswa, B.nama_dosen FROM mahasiswa A RIGHT JOIN dosen_wali B ON A.nik_wali = B.nik");
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
                <a class="nav-links" href="firstPage.php">Tabel Dosen</a>
                <a class="nav-links" href="secondPage.php">Tabel Mahasiswa</a>
            </ul>
            </div>
    </div>
</head>

<body>

    <h2>Inner Join</h2>

    <table class="darkTable" width='80%' border=1>
    <thead>
        <tr>
            <th>NIM</th> <th>Nama Mahasiswa</th> <th>Dosen Wali</th>
        </tr>
    <thead>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<tbody>";
        echo "<td>".$user_data['nim']."</td>";
        echo "<td>".$user_data['nama_mahasiswa']."</td>";
        echo "<td>".$user_data['nama_dosen']."</td>";    
        echo "</tbody>";
    }
    ?>
    </table>

    <br></br>

    <h2>Left Join</h2>

    <table class="darkTable" width='80%' border=1>
    <thead>
        <tr>
            <th>NIM</th> <th>Nama Mahasiswa</th> <th>Dosen Wali</th>
        </tr>
    <thead>
    <?php  
    while($user_data = mysqli_fetch_array($result1)) {         
        echo "<tr>";
        echo "<tbody>";
        echo "<td>".$user_data['nim']."</td>";
        echo "<td>".$user_data['nama_mahasiswa']."</td>";
        echo "<td>".$user_data['nama_dosen']."</td>";    
        echo "</tbody>";
    }
    ?>
    </table>

    <br></br>

    <h2>Right Join</h2>

    <table class="darkTable" width='80%' border=1>
    <thead>
        <tr>
            <th>NIM</th> <th>Nama Mahasiswa</th> <th>Dosen Wali</th>
        </tr>
    <thead>
    <?php  
    while($user_data = mysqli_fetch_array($result2)) {         
        echo "<tr>";
        echo "<tbody>";
        echo "<td>".$user_data['nim']."</td>";
        echo "<td>".$user_data['nama_mahasiswa']."</td>";
        echo "<td>".$user_data['nama_dosen']."</td>";    
        echo "</tbody>";
    }
    ?>
    </table>

    <br></br>
</body>
</html>
