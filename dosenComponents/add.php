<style>
<?php include '../styles/Navbar.css'; ?>
<?php include '../styles/Table.css'; ?>
<?php include '../styles/Form.css'; ?>
</style>

<html>
<head>
    <title>Tambah Dosen</title>
    <div class="navbar">
            <div class="navbar-logo">
                KELOMPOK 17
            </div>
            <div>
            <ul class="nav-menu">
                <a class="nav-links" href="../firstPage.php">Kembali</a>
            </ul>
            </div>
    </div>

</head>

<body>
    <br/><br/>
    <form action="add.php" method="post" name="form1">
		<div class="login-form">
			<h1>Tambah Dosen Baru</h1>
			<form action="auth" method="POST">
				<input type="text" name="nik" placeholder="NIK" required>
				<input type="text" name="nama_dosen" placeholder="Nama" required>
				<input type="submit" name="Submit" value="Add">
			</form>
		</div>
    </form>

    <?php

    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $NIK = $_POST['nik'];
        $name = $_POST['nama_dosen'];

        // include database connection file
        include_once("../config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO dosen(nama_dosen,nik) VALUES('$name','$NIK')");

        // Show message when user added
        unset($_POST['Submit']);
        echo "User added successfully. <a href='../firstPage.php'>Lihat Tabel Dosen</a>";
    }
    ?>
</body>
</html>
