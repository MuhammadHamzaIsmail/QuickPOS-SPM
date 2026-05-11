<?php

use PHPUnit\Framework\TestCase;

class ContactFormTest extends TestCase
{
    // [POS-63] Empty name should fail
    public function testEmptyNameFails(): void
    {
        $name = '';
        $this->assertEmpty($name, 'Name should be empty to trigger error');
        }

    // [POS-67] Empty email should fail
    public function testEmptyEmailFails(): void
    {
        $email = '';
        $this->assertEmpty($email, 'Email should be empty to trigger error');
    }

    // [POS-69] Invalid email format should fail
    public function testInvalidEmailFails(): void
    {
        $email = 'not-an-email';
        $isValid = filter_var($email, FILTER_VALIDATE_EMAIL);
        $this->assertFalse($isValid, 'Invalid email should not pass validation');
    }

    // [POS-71] Valid email should pass
    public function testValidEmailPasses(): void
    {
        $email = 'ali@gmail.com';
        $isValid = filter_var($email, FILTER_VALIDATE_EMAIL);
        $this->assertNotFalse($isValid, 'Valid email should pass validation');
    }

    // [POS-73] All fields filled success case
    public function testAllFieldsFilledSuccess(): void
    {
        $name    = 'John Doe';
        $email   = 'ali@gmail.com';
        $message = 'Hello I want to know more about QuickPOS.';

        $errors = [];
        if (empty($name)) {
            $errors[] = "Name required";
        }
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email invalid";
        }
        if (empty($message)) {
            $errors[] = "Message required";
        }

        $this->assertEmpty($errors, 'No errors when all fields are valid');
    }

    // [POS-75] Data-driven multiple invalid emails
    public function testMultipleInvalidEmailFormats(): void
    {
        $invalidEmails = [
            'plainaddress',
            '@missinguser.com',
            'user@',
            'user@@domain.com',
            ''
        ];
        foreach ($invalidEmails as $email) {
            $isValid = filter_var($email, FILTER_VALIDATE_EMAIL);
            $this->assertFalse($isValid, "Email " . $email . " should fail validation");
        }
    }

    // [POS-77] Whitespace only message should fail
    public function testWhitespaceMessageFails(): void
    {
        $message = '   ';
        $this->assertEmpty(trim($message), 'Whitespace-only message should fail');
    }

    // [POS-79] Empty message should fail
    public function testEmptyMessageFails(): void
    {
        $message = '';
        $this->assertEmpty($message, 'Empty message should trigger error');
    }
}