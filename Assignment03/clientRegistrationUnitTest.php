<?php
    use PHPUnit\Framework\TestCase;
    class clientRegistrationUnitTest extends TestCase {
        public function testClientRegistration() {

            require_once 'app/clientRegistration.php';

            $email = 'a@t.com';
            $password = '321';
            $confirmPassword = '321';
            //correct input
            $testResult = createAccount($email, $password, $confirmPassword, $users);
            $this->assertEquals(true, $testResult);

            //empty email
            $email = '';
            $testResult = createAccount($email, $password, $confirmPassword, $users);
            $this->assertEquals(false, $testResult);

            //empty password
            $password = '';
            $testResult = createAccount($email, $password, $confirmPassword, $users);
            $this->assertEquals(false, $testResult);

            //email already in use
            $email = 't@t.com';
            $testResult = createAccount($email, $password, $confirmPassword, $users);
            $this->assertEquals(false, $testResult);

            //password and confirm password not matching
            $confirmPassword = '321';
            $testResult = createAccount($email, $password, $confirmPassword, $users);
            $this->assertEquals(false, $testResult);

        }
    }
?>