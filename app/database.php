<?php

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();


class Database {
	private $host;
	private $db_name;
	private $username;
	private $password;

	public $conn;

	public function __construct()
	{
		$this->set_variables();
		try {
			$this->conn = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
	}

	private function set_variables(): void
	{
		$this->host = $_ENV['DB_HOST'];
		$this->db_name = $_ENV['DB_NAME'];
		$this->username = $_ENV['DB_USER'];
		$this->password = $_ENV['DB_PASSWORD'];
	}

	public function all(string $table): array
	{
		try {
			$sql = "SELECT * FROM $table";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
			return [];
		}
	}

	public function insert(string $table, array $data): bool
    {
        try {
            $keys = implode(',', array_keys($data));
            $values = ':' . implode(', :', array_keys($data));

            $sql = "INSERT INTO $table ($keys) VALUES ($values)";
            $stmt = $this->conn->prepare($sql);

            foreach($data as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }

            return $stmt->execute();

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

	public function update(string $table, int $row_id, array $data): bool
    {
        $set = "";
        foreach($data as $key => $value) {
            $set .= "`$key` = :$key,";
        }
        $set = rtrim($set, ",");
        $sql = "UPDATE `$table` SET $set WHERE `id` = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $row_id);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        return $stmt->execute();
    }

	public function delete(string $table, int $id): bool
	{
		try {
			$sql = "DELETE FROM $table WHERE id = :id";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindValue(':id', $id);
			return $stmt->execute();
		} catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
			return false;
		}
	}

    public function verify_admin($email, $password): bool
    {
		try {
			$sql = "SELECT `password` FROM `admin` WHERE email = :email";
			$stmt = $this->conn->prepare($sql);
	
			$stmt->bindValue(':email', $email);
			$stmt->execute();
			
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			if (!$result)
				return false;
			
			$hash = $result['password'];
			
			return (password_verify($password, $hash));

		} catch (PDOException $e) {
			echo 'Error: ' . $e->geMessage();
			return false;
		}
    }

	public function find(string $table, int $id): array
	{
		try {
			$sql = "SELECT * FROM $table WHERE id = :id";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindValue(':id', $id);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			if (!$result)
				return [];
			return $result;
		} catch (PDOException $e) {
			echo 'Error: ' . $e->getMessage();
			return [];
		}
	}

	public function count(string $table): int
	{
		try {
			$sql = "SELECT COUNT(*) AS total FROM $table";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetch();
			
			return $result['total'];
		} 
		catch (PDOException $e) {
			echo 'Error: ' . $e->getMessage();
			return 0;
		}
	}
}