<style>
<?php include './styles/Navbar.css'; ?>
<?php include './styles/Table.css'; ?>
<?php include './styles/Form.css'; ?>
</style>

<html>
<head>
    <title>Sistem Akademik</title>
    <div class="navbar">
            <div class="navbar-logo">
                TA SBD ALVIN
            </div>
            <div>
            <ul class="nav-menu">
                <a class="nav-links" href="registrationPage.php">Admin Baru</a>
            </ul>
            </div>
    </div>

</head>

<body>
    <br/><br/>
    <form action="./actions/loginAction.php" method="post" name="form1">
		<div class="login-form">
			<h1>Login Administrator</h1>
			<form action="auth" method="POST">
				<input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
				<input type="submit" name="Submit" value="Login">
			</form>
		</div>
    </form>
</body>
</html>
