<!DOCTYPE html>
<html lang="en">
    <head>
	<link rel="shortcut icon" type="image/png" href="/favicon-16x16.png"/>
	<link rel="shortcut icon" type="image/png" href="http://localhost:8888/favicon.png"/>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="login.css">
	<script src="modal.js" type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="/js/form.js" type="text/javascript"></script>


    </head>
	<body>
	<div class="topnav">
  <a class="active" href="./index.php">Home</a>
  <a href="./index.php">Choose Existing Class</a>
  <a href="./createNewClass.php">Add Student</a>
  <a id="login"  onclick="document.getElementById('id01').style.display='block'">Login</a>

</div>


	<div id="id01" class="modal">


  <form class="modal-content animate" action="/loginAction.php?a=login" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="user.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">

      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>

      <span class="psw">Forgot <a href="#">password?</a></span>
     <span class="psw">New User? <a href="signUp.html">Create an account </a></span>

    </div>

  </form>

</div>



</body>
</html>
