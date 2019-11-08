
<link type="text/css" rel="stylesheet" href="../Public/CSS/Login.css"/>
<div id="loginpage">
    <img id="logo" src="../Public/Images/logo.png">
    <h1 id="login-header">Sign in</h1>
    <form id="Login" method="post" action="../Controllers/MainController.php">
        <div id="login-error"></div>
        <input id="email" type="text" placeholder="Email" name="email">
        <input id="password" type="password" placeholder="Password" name="password">
        <input type="hidden" name="action" value="Login">
        <input id="login-btn" type="submit" value="Login">
    </form>
</div>

<script src="../Public/JS/jquery-3.3.1.js"></script>
<script src="/Capstone/Public/JS/Login.js"></script>