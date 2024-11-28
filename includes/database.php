<?php

class Database
{
    private static $connection = null;
    private $table;

    // Static method to establish and return the database connection
    public static function connection()
    {
        // Check if the connection is already established
        if (self::$connection === null) {
            // Load environment variables from .env file
            $env = self::loadEnv();

            // Get database credentials from the loaded environment variables
            $host = $env['DB_HOST'];
            $db_name = $env['DB_NAME'];
            $username = $env['DB_USER'];
            $password = $env['DB_PASSWORD'];

            // Try to establish a connection using PDO
            try {
                self::$connection = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
        return self::$connection;
    }

    // Load .env file from the parent folder and return associative array of environment variables
    private static function loadEnv()
    {
        // Change this to the correct path to the .env file (in the parent directory)
        $envFile = __DIR__ . '/../.env';  // Accessing .env in the parent directory

        if (!file_exists($envFile)) {
            die("Error: .env file not found.");
        }

        // Read the .env file contents
        $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $env = [];

        // Parse each line of the .env file
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) {
                continue;  // Skip comments
            }

            // Split each line by the first '=' to separate key and value
            list($key, $value) = explode('=', $line, 2);

            // Store key-value pairs in the $env array
            $env[trim($key)] = trim($value);
        }

        return $env;
    }

    // Method to set the table name
    public function setTable($tableName)
    {
        $this->table = $tableName;
    }

    // Method to fetch all rows from the set table
    public function fetchAllRows()
    {
        $connection = self::connection();  // Get the connection
        $query = "SELECT * FROM {$this->table}";  // Use the table name dynamically
        $statement = $connection->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Method to fetch a single row by its ID
    public function fetchRowById($id)
    {
        // Ensure we have the table name set
        if (empty($this->table)) {
            throw new Exception("Table not set. Use setTable() to set the table name.");
        }

        // Fetch the connection
        $connection = self::connection();

        // Prepare the query to fetch the row by ID
        $query = "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1"; // Use a prepared statement to prevent SQL injection
        $statement = $connection->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);  // Bind the ID as an integer

        // Execute the query
        $statement->execute();

        // Fetch the row (use fetch() instead of fetchAll() since we expect a single row)
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}
