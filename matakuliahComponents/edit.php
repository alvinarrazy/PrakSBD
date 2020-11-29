<?php
// include database connection file
include_once("../config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $id = $_POST['id'];

    $nama_mk = $_POST['nama_mk'];
    $kode_mk = $_POST['kode_mk'];
    $nik_dosen = $_POST['nik_dosen'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE matakuliah SET nama_mk='$nama_mk',kode_mk='$kode_mk',nik_dosen='$nik_dosen' WHERE kode_mk='$id'");

    // Redirect to homepage to display updated user in list
    header("Location: ../matakuliahPage.php");
}
?>

<style>
<?php include '../styles/Navbar.css'; ?>
<?php include '../styles/Table.css'; ?>
<?php include '../styles/Form.css'; ?>
</style>

<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM matakuliah WHERE kode_mk='$id'");

while($user_data = mysqli_fetch_array($result))
{
    $nama_mk = $user_data['nama_mk'];
    $kode_mk = $user_data['kode_mk'];
    $nik_dosen = $user_data['nik_dosen'];
}
?>
<html>
<head>  
    <title>Edit Data Matakuliah</title>
    <div class="navbar">
            <div class="navbar-logo">
                KELOMPOK 17
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

    <form name="update_user" method="post" action="edit.php">
    <div class="login-form">
			<h1>Edit Data Mahasiswa</h1>
			<form action="auth" method="POST">
				<input type="text" name="nama_mk" value=<?php echo $nama_mk;?> required>
                <input type="text" name="kode_mk" value=<?php echo $kode_mk;?> required>
                <input type="text" name="nik_dosen" value=<?php echo $nik_dosen;?> required>
                <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
				<input type="submit" name="update" value="Update">
			</form>
		</div>
    </form>
</body>
</html>
