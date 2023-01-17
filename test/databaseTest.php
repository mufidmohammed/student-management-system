<?php

class DatabaseTest extends PHPUnit\Framework\TestCase
{
    public function testAll()
    {
        $db = new Database();
        $result = $db->all('students');
        $this->assertNotEmpty($result);
    }
    public function testInsert()
    {
        $db = new Database();
        $data = [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'address' => '123 Main St'
        ];
        $this->assertTrue($db->insert('students', $data));
    }
    public function testUpdate()
    {
        $db = new Database();
        $data = [
            'name' => 'Jane Doe',
            'address' => '456 Park Ave'
        ];
        $this->assertTrue($db->update('students', 1, $data));
    }
    public function testDelete()
    {
        $db = new Database();
        $this->assertTrue($db->delete('students', 1));
    }
    public function testVerifyAdmin()
    {
        $db = new Database();
        $email = 'admin@example.com';
        $password = 'password';
        $this->assertTrue($db->verify_admin($email, $password));
    }
}
