<?php
// include database connection file
include_once("../config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['Update']))
{   
    $id = $_POST['id'];

    $name=$_POST['nama_dosen'];
    $nik=$_POST['nik'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE dosen SET nama_dosen='$name',nik='$nik' WHERE nik=$id");

    // Redirect to homepage to display updated user in list
    unset($_POST['Update']);
    header("Location: ../firstPage.php");
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
$result = mysqli_query($mysqli, "SELECT * FROM dosen WHERE nik=$id");

while($user_data = mysqli_fetch_array($result))
{
    $name = $user_data['nama_dosen'];
    $nik = $user_data['nik'];
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
                <a class="nav-links" href="../firstPage.php">Kembali</a>
            </ul>
            </div>
    </div>
</head>

<body>
    <br/><br/>

    <form name="update_user" method="post" action="edit.php">
    <div class="login-form">
			<h1>Edit Data Dosen</h1>
			<form action="auth" method="POST">
				<input type="text" name="nama_dosen" value=<?php echo $name;?> required>
                <input type="text" name="nik" value=<?php echo $nik;?> required>
                <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
				<input type="submit" name="Update" value="Update">
			</form>
		</div>
    </form>
</body>
</html>
