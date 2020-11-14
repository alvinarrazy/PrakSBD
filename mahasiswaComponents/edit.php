<?php
// include database connection file
include_once("../config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $id = $_POST['nim'];

    $name=$_POST['nama_mahasiswa'];
    $mobile=$_POST['mobile'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE mahasiswa SET name='$name',mobile='$mobile' WHERE nim=$id");

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
    $mobile = $user_data['mobile'];
}
?>
<html>
<head>  
    <title>Edit Data Dosen</title>
    <div class="navbar">
            <div class="navbar-logo">
                KELOMPOK 17
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
				<input type="text" name="mobile" value=<?php echo $mobile;?> required>
				<input type="submit" name="update" value="Update">
			</form>
		</div>
    </form>
</body>
</html>
