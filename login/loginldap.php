<style>
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
 
body {
    margin: 50px auto;
    text-align: center;
    width: 800px;
}
 
h1 {
    font-family: 'Passion One';
    font-size: 2rem;
    text-transform: uppercase;
}
 
label {
    width: 150px;
    display: inline-block;
    text-align: left;
    font-size: 1.5rem;
    font-family: 'Lato';
}
 
input {
    border: 2px solid #ccc;
    font-size: 1.5rem;
    font-weight: 100;
    font-family: 'Lato';
    padding: 10px;
}
 
form {
    margin: 25px auto;
    padding: 20px;
    border: 5px solid #ccc;
    width: 500px;
    background: #eee;
}
 
div.form-element {
    margin: 20px 0;
}
 
button {
    padding: 10px;
    font-size: 1.5rem;
    font-family: 'Lato';
    font-weight: 100;
    background: yellowgreen;
    color: white;
    border: none;
}
 
p.success,
p.error {
    color: white;
    font-family: lato;
    background: yellowgreen;
    display: inline-block;
    padding: 2px 10px;
}
 
p.error {
    background: orangered;
}
</style>
<?php

include('config.php');
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

$ldapconfig['host'] = '10.10.1.80';
$ldapconfig['port'] = '389';
$ldapconfig['basedn'] = 'dc=dylan,dc=es';
$ldapconfig['usersdn'] = 'ou=people'; //CHANGE THIS TO THE CORRECT USER OU/CN
$ds = ldap_connect($ldapconfig['host'], $ldapconfig['port']);

ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
ldap_set_option($ds, LDAP_OPT_REFERRALS, 0);
ldap_set_option($ds, LDAP_OPT_NETWORK_TIMEOUT, 10);

$dn = "uid=" . $username . "," . $ldapconfig['usersdn'] . "," . $ldapconfig['basedn'];
if (isset($_POST['login']))
{
    if ($bind = ldap_bind($ds, $dn, $password))
    {
        $_SESSION["usuario"] = $username;

        echo '<script type="text/javascript">
        alert("Sesion iniciada");
        window.location="../index.php";
        </script>';

        #header ('Location: ../../index.php');
        #exit;
    }
    else
    {

        echo '<script type="text/javascript">
    alert("No ha sido posible iniciar sesion");
    window.location="loginldap.php";
    </script>';
    }
}
?>
<h2>Login LDAP</h2>
<form method="post" action="" name="signin-form">
    <div class="form-element">
        <label>Username</label>
        <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
    </div>
    <div class="form-element">
        <label>Password</label>
        <input type="password" name="password" required />
    </div>
    <button type="submit" name="login" value="login">Log In</button>
</form>
