<?php
// include database connection file
include_once("../config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $id = $_POST['id'];

    $name=$_POST['nama_mahasiswa'];
    $nim=$_POST['nim'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE mahasiswa SET nama_mahasiswa='$name', nim='$nim' WHERE nim=$id");

    // Redirect to homepage to display updated user in list
    header("Location: ../secondPage.php");
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
$result = mysqli_query($mysqli, "SELECT * FROM mahasiswa WHERE nim=$id");

while($user_data = mysqli_fetch_array($result))
{
    $name = $user_data['nama_mahasiswa'];
    $nim = $user_data['nim'];
}
?>
<html>
<head>  
    <title>Edit Data Dosen</title>
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

    <form name="update_user" method="post" action="edit.php">
    <div class="login-form">
			<h1>Edit Data Mahasiswa</h1>
			<form action="auth" method="POST">
				<input type="text" name="nama_mahasiswa" value=<?php echo $name;?> required>
                <input type="text" name="nim" value=<?php echo $nim;?> required>
                <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
				<input type="submit" name="update" value="Update">
			</form>
		</div>
    </form>
</body>
</html>
