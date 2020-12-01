<style>
<?php include '../styles/Navbar.css'; ?>
<?php include '../styles/Table.css'; ?>
<?php include '../styles/Form.css'; ?>
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
    <br/><br/>
    <form action="add.php" method="post" name="form1">
		<div class="login-form">
			<h1>Hapus Mahasiswa dari Matakuliah</h1>
			<form action="auth" method="POST">                
                <input type="text" name="kode_mk" placeholder="Kode" required>
				<input type="text" name="nim_mahasiswa" placeholder="Nama Matakuliah" required>
				<input type="submit" name="Submit" value="Add">
			</form>
		</div>
    </form>

    <?php

    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $nama_mk = $_POST['nama_mk'];
        $nim_mahasiswa = $_POST['nim_mahasiswa'];

        // include database connection file
        include_once("../config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "DELETE FROM mk_diambil WHERE kode_mk=$id AND nim_mahasiswa=$nim_mahasiswa");

        // Show message when user added
        unset($_POST['Submit']);
        echo "Mahasiswa berhasil dikeluarkan dari Matakuliah. <a href='../matkuldiambilPage.php'>Lihat Tabel Matakuliah</a>";
    }
    ?>
</body>
</html>
