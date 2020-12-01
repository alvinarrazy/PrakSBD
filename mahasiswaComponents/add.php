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
                <a class="nav-links" href="../secondPage.php">Kembali</a>
            </ul>
            </div>
    </div>

</head>

<body>
    <br/><br/>
    <form action="add.php" method="post" name="form1">
		<div class="login-form">
			<h1>Tambah Mahasiswa Baru</h1>
			<form action="auth" method="POST">                
                <input type="text" name="nim" placeholder="NIM" required>
				<input type="text" name="nama_mahasiswa" placeholder="Nama" required>
				<input type="submit" name="Submit" value="Add">
			</form>
		</div>
    </form>

    <?php

    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $name = $_POST['nama_mahasiswa'];
        $nim = $_POST['nim'];

        // include database connection file
        include_once("../config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO mahasiswa(nama_mahasiswa,nim) VALUES('$name','$nim')");

        // Show message when user added
        unset($_POST['Submit']);
        echo "User added successfully. <a href='../secondPage.php'>Lihat Tabel Mahasiswa</a>";
    }
    ?>
</body>
</html>
