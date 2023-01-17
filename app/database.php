<?php

class Database {
	private $host = "localhost";
	private $db_name = "student_management_system";
	private $username = "root";
	private $password = "";

	public $conn;

	public function __construct()
	{
		try {
			$this->conn = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
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
			return $stmt->fetch(PDO::fetch_assoc());
		} catch (PDOException $e) {
			echo 'Error: ' . $e->getMessage();
			return [];
		}
	}
}