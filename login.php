<?php
session_start([
    'cookie_lifetime' => 0, // expire at end of session
    'cookie_httponly' => true, // inaccessible to JavaScript
    'cookie_secure' => true, // only send over HTTPS
    'cookie_samesite' => 'Strict' // protect against CSRF attacks
]);

if (isset($_COOKIE['username'])) {
  $_SESSION['username'] = true;
  header('location:profilee.php');
  exit();
}

if (isset($_SESSION['username'])) {
  header('location:profilee.php');
  exit();
}

if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
    // Validasi username dan password
  if($username == 'dewibuana' && $password == 'bunbun'){
    $_SESSION['username'] = [$username];
    // Set cookie untuk mengingat user
    //setcookie('remember_me', $username, time()+ (86400 * 1), "/",'username',true,true);
    setcookie('username', $username, time() + 3600);
    setcookie('password', $password, time() + 3600);
    header('location: profilee.php');
    exit();
  } else {
    $error = 'Username atau password salah.';
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buana Dewi Page's</title>
  <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: sans-serif;
      }

      body {
        background: #f1f1f1;
      }

      .login-box {
        width: 300px;
        height: 260px;
        background: #fff;
        color: #000;
        top: 50%;
        left: 50%;
        position: absolute;
        transform: translate(-50%, -50%);
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        padding: 30px 30px;
        box-sizing: border-box;
      }

      h2 {
        margin: 0;
        padding: 0 0 20px;
        text-align: center;
        font-size: 20px;
        color: #000;
      }

      .login-box input[type="text"],
      .login-box input[type="password"] {
        border: none;
        border-bottom: 1px solid #000;
        background: transparent;
        outline: none;
        height: 40px;
        color: #000;
        font-size: 14px;
      }

      .login-box input[type="submit"] {
        width: 50%;
          background-color: #4CAF50;
          color: #fff;
          padding: 10px;
          border-radius: 5px;
          border: none;
          cursor: pointer;
          transition: background-color 0.3s ease;
      }

      .login-box input[type="submit"]:hover {
        cursor: pointer;
        background: #ffc107;
        color: #000;
      }

      .login-box label {
        color: #000;
        font-size: 10px;
        font-weight: bold;
      }

      .user-box {
        position: relative;
      }

      .user-box input {
        width: 50%;
        padding: 10px 0;
        font-size: 14px;
        color: #000;
        margin-bottom: 30px;
        border: none;
        border-bottom: 1px solid #000;
        outline: none;
        background: transparent;
      }

      .user-box label {
        position: absolute;
        top: 0;
        left: 0;
        padding: 10px 0;
        font-size: 14px;
        color: #000;
        pointer-events: none;
        transition: 0.5s;
      }

      .user-box input:focus ~ label,
      .user-box input:valid ~ label {
        top: -20px;
        font-size: 12px
      }
      .error {
        color: red;
        font-size: 12px;
        margin-top: -15px;
        margin-bottom: 10px;
      }
    </style>
</head>
<body>
<div class="login-box">
    <h2>Login</h2>
    <?php if (isset($error)) { ?>
		<p class="error"><?php echo $error; ?></p>
	<?php } ?>
    <form action= "profilee.php" method="post">
      <div class="user-box">
        <input type="text" name="username" required><br>
        <label>Username</label>
      </div>
      <div class="user-box">
        <input type="password" name="password" required><br>
        <label>Password</label>
      </div>
      <div class="remember-me">
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Remember Me</label>
      </div>
      <button type="submit" name="login-button">Login</button>
    </form>
  </div>
</body>
</html>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  <style>
  * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: sans-serif;
}

body {
  background: #f1f1f1;
}

.login-box {
  width: 300px;
  height: 260px;
  background: #fff;
  color: #000;
  top: 50%;
  left: 50%;
  position: absolute;
  transform: translate(-50%, -50%);
  box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.3);
  border-radius: 10px;
  padding: 30px 30px;
  box-sizing: border-box;
}

h2 {
  margin: 0;
  padding: 0 0 20px;
  text-align: center;
  font-size: 20px;
  color: #000;
}

.login-box input[type="text"],
.login-box input[type="password"] {
  border: none;
  border-bottom: 1px solid #000;
  background: transparent;
  outline: none;
  height: 40px;
  color: #000;
  font-size: 14px;
}

.login-box input[type="submit"] {
   width: 50%;
    background-color: #4CAF50;
    color: #fff;
    padding: 10px;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.login-box input[type="submit"]:hover {
  cursor: pointer;
  background: #ffc107;
  color: #000;
}

.login-box label {
  color: #000;
  font-size: 10px;
  font-weight: bold;
}

.user-box {
  position: relative;
}

.user-box input {
  width: 50%;
  padding: 10px 0;
  font-size: 14px;
  color: #000;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #000;
  outline: none;
  background: transparent;
}

.user-box label {
  position: absolute;
  top: 0;
  left: 0;
  padding: 10px 0;
  font-size: 14px;
  color: #000;
  pointer-events: none;
  transition: 0.5s;
}

.user-box input:focus ~ label,
.user-box input:valid ~ label {
  top: -20px;
  font-size: 12px
}
.error {
  color: red;
  font-size: 12px;
	margin-top: -15px;
  margin-bottom: 10px;
}
</style>
</head>
<body>
  <div class="login-box">
    <h2>Login</h2>
    <form action="index.html" method="post">
      <div class="user-box">
        <input type="text" name="username" required>
        <label>Username</label>
      </div>
      <div class="user-box">
        <input type="password" name="password" required>
        <label>Password</label>
      </div>
      <div class="remember-me">
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Remember Me</label>
      </div>
      <button type="submit" name="login-button">Login</button>
    </form>
  </div>
</body>
</html> -->


<!-- //cek cookie
// if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
//     $username = $_COOKIE['username'];
//     $password = $_COOKIE['password'];

//     if($username === 'username') {
//         $_SESSION = true;
//     }
// }

// //cek session
// if(isset($_SESSION['login'])){
//     header('location: index.php');
//         exit;
// }
// $error = ' ';
// if(isset($_POST['login'])){
//     if(empty($_POST['username']) || empty($_POST['password'])) {
//         $error= "<div class='alert alert-danger' >Harus diisi semua</div>";
//     } else {
//         $username = 'dewibuana@student.ub.ac.id';
//         $password = '12345';
//     if($_POST['username']==$username){
//         if($_POST['password'==$password]){
//             $_SESSION['login']=$_POST['username'];
//             echo $_SESSION['login'];
//     //set cookie
//     if(isset($_POST['remember'])){
//         setcookie('username', $username, time() + 60000);
//         setcookie('password', $password, time() + 60000);
//     }
//     header('location: index.php');
//     } else {
//         $error = "<div class='alert alert-danger' >password salah</div>";
//     }
// } else{
//     $error= "<div class='alert alert-danger' >email salah</div>";
//     }
//   }   
// }
//     $username = $_POST['username'];
//     $password = $_POST['password'];
//     // Validasi username dan password
//     if($username == "admin" && $password == "admin123"){
//         $_SESSION['user'] = $username;
        // Set cookie untuk mengingat user
         setcookie('remember_me', $username, time() + (86400 * 30), "/",$username, true, true);
         header('Location: index.html');
         exit;
     } else {
         $error = 'Username atau password salah.';
     }
 }
?>
     <form action="index.html" method="post">
     <label>Username:</label>
     <input type="text" name="username" required><br>
    <label>Password:</label>
    <input type="password" name="password" required><br>
    <input type="submit" name="submit" value="Login">
</form> -->
