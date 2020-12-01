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
                <a class="nav-links" href="../matakuliahPage.php">Kembali</a>
            </ul>
            </div>
    </div>

</head>

<body>
    <br/><br/>
    <form action="add.php" method="post" name="form1">
		<div class="login-form">
			<h1>Tambah Matakuliah Baru</h1>
			<form action="auth" method="POST">                
                <input type="text" name="kode_mk" placeholder="Kode" required>
				<input type="text" name="nama_mk" placeholder="Nama Matakuliah" required>
				<input type="text" name="nik_dosen" placeholder="NIK Dosen" required>
				<input type="submit" name="Submit" value="Add">
			</form>
		</div>
    </form>

    <?php

    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $nama_mk = $_POST['nama_mk'];
        $kode_mk = $_POST['kode_mk'];
        $nik_dosen = $_POST['nik_dosen'];

        // include database connection file
        include_once("../config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO matakuliah(nama_mk,kode_mk,nik_dosen) VALUES('$nama_mk','$kode_mk','$nik_dosen')");

        // Show message when user added
        unset($_POST['Submit']);
        echo "User added successfully. <a href='../matakuliahPage.php'>Lihat Tabel Matakuliah</a>";
    }
    ?>
</body>
</html>
