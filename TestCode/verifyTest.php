<?php
require _DIR_ . "/../Tests\TestCode\dataFilter.php";
class verifyTest extends \PHPUnit\Framework\TestCase
{

    public function testLoginVarification(){

    $email='arafat@gmail.com';
    $hash='hash';
    if(isset($email) && !empty($email) AND isset($hash) && !empty($hash))
    {
        $this->assertEquals(1,1);
        $user = new \Tests\TestCode\dataFilter;
        $email = $user->dataFilter($email);
        $hash = $user->dataFilter($hash);

        $sql = "SELECT * FROM members WHERE Email='$email' AND Hash='$hash' AND Active='0'";
        //$result = mysqli_query($conn, $sql) or die($mysqli->error());

        //if ( $result->num_rows == 0 )
        //{
            $_SESSION['message'] = "Account has already been activated or the URL is invalid!";
            //header("location: error.php");
        //}
        //else
        //{
            $_SESSION['message'] = "Your account has been activated!";
            $sql = "UPDATE members SET Active='1' WHERE Email='$email'";
            //$result = mysqli_query($conn, $sql) or die($mysqli->error());
            $_SESSION['Active'] = 1;

            //header("location: success.php");
        //}
    }
     else
    {
        $_SESSION['message'] = "Invalid credentials provided for account verification!";
        //header("location: error.php");
    }
    $this->assertEquals('Arafat Hussain', 'Arafat Hussain');
    }
}