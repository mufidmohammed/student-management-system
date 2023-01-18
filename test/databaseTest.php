<?php

// require_once __DIR__ . '/../vendor/autoload.php';
require_once dirname(__DIR__) . '/app/database.php';

class DatabaseTest extends PHPUnit\Framework\TestCase
{
    public function testFind()
    {
        $db = new Database();
        $this->assertIsArray($db->find('courses', 1));
    }

    public function testAll()
    {
        $db = new Database();
        $result = $db->all('courses');
        $this->assertNotEmpty($result);
    }
    public function testInsert()
    {
        $db = new Database();
        $data = [
            'code' => 'CSC333',
            'name' => 'Networking',
            'credit_hours' => 3
        ];
        $this->assertTrue($db->insert('courses', $data));
    }
    public function testUpdate()
    {
        $db = new Database();
        $data = [
            'first_name' => 'Jon',
            'email' => 'jn@doe.com',
            'phone_number' => '0543983312'
        ];
        $this->assertTrue($db->update('instructors', 3, $data));
    }
    public function testDelete()
    {
        $db = new Database();
        $this->assertTrue($db->delete('instructors', 5));
    }
    public function testVerifyAdmin()
    {
        $db = new Database();
        $email = 'admin@site.com';
        $password = '123456';
        $this->assertTrue($db->verify_admin($email, $password));
    }
}
