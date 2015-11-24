<?php 
include_once("connect.php");
include_once("session.php");
?>

<?php
$commit=@$_POST['submit'];

if(isset($commit))
    {
    $sql=mysql_query("select username from login_det where username='".$_POST['username']."' AND password='".$_POST['password']."'");
    $usercount=mysql_num_rows($sql);
    if($usercount==1)
        {
        //echo "hello";
        if($row=mysql_fetch_array($sql))
            {
            $id=$row["id"];
            }
        $_SESSION["username"]=$_POST['login'];
        header("location:admin.php");
        exit();
        }
    else
        {
        echo "Incorrect";
        //header("location:form.php");
        exit();
        }
    }

?>


<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin. Login</title>
</head>
<body>

<h3>Login here</h3>
                
        <form action="index.php" method="post" >
            <table>
                <tr>
                    <td><label for="username">Username</label></td>
                    <td><input type="text" name="username" maxlength="10" /></td>
                </tr>
                <p></p>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td><input type="password" name="password" maxlength="50" /></td>
                </tr>
            </table>
                <p></p>  
            <input type="submit" name="submit" value="Submit" />
        </form>

</body>
</html>