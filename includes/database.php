<?php

class Database
{
    private static $connection = null;

    // Static method to establish and return the database connection
    public static function connection()
    {
        // Check if the connection is already established
        if (self::$connection === null) {
            // Load environment variables from .env file
            $env = CustomFunctions::loadEnv();


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


    // Method to fetch all rows from the set table
    public function fetchAllRows($table)
    {
        $connection = self::connection();  // Get the connection
        $query = "SELECT * FROM {$table}";  // Use the table name dynamically
        $statement = $connection->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method to fetch a single row by its ID
    public function fetchRowById($table, $id)
    {
        // Ensure we have the table name set
        if (empty($table)) {
            throw new Exception("Table not set. Use setTable() to set the table name.");
        }

        // Fetch the connection
        $connection = self::connection();

        // Prepare the query to fetch the row by ID
        $query = "SELECT * FROM {$table} WHERE id = :id LIMIT 1"; // Use a prepared statement to prevent SQL injection
        $statement = $connection->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);  // Bind the ID as an integer

        // Execute the query
        $statement->execute();

        // Fetch the row (use fetch() instead of fetchAll() since we expect a single row)
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    public function fetchRowsByValue($table, $conditions)
    {
        // Ensure the table name is set
        if (empty($table)) {
            throw new Exception("Table not set. Use setTable() to set the table name.");
        }
    
        // Ensure conditions are provided
        if (empty($conditions) || !is_array($conditions)) {
            throw new Exception("Conditions must be provided as a non-empty array.");
        }
    
        // Fetch the connection
        $connection = self::connection();
    
        // Build the WHERE clause dynamically
        $whereClauses = [];
        $params = [];
        foreach ($conditions as $index => $condition) {
            if (!isset($condition['value'], $condition['id'])) {
                throw new Exception("Each condition must have 'value' and 'id' keys.");
            }
            $placeholder = ":param$index";
            $whereClauses[] = "{$condition['value']} = $placeholder";
            $params[$placeholder] = $condition['id'];
        }
        $whereClause = implode(' AND ', $whereClauses);
    
        // Prepare the query
        $query = "SELECT * FROM {$table} WHERE {$whereClause}";
        $statement = $connection->prepare($query);
    
        // Bind the parameters
        foreach ($params as $placeholder => $value) {
            $statement->bindValue($placeholder, $value, PDO::PARAM_INT);
        }
    
        // Execute the query
        $statement->execute();
    
        // Fetch all matching rows
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    


    public function insertData($table, $data)
    {
        if (empty($data)) {
            throw new Exception('No data provided for insertion.');
        }

        // Generate column names and placeholders dynamically
        $columns = '`' . implode('`, `', array_keys($data)) . '`'; // Enclose column names with backticks
        $placeholders = ':' . implode(', :', array_keys($data));  // Prepare placeholders

        $query = "INSERT INTO `$table` ($columns) VALUES ($placeholders)";
        // Prepare the query
        $statement = self::connection()->prepare($query);
        // Bind the parameters
        foreach ($data as $key => $value) {
            $statement->bindValue(":$key", $value);
        }

        // Execute the query
        $statement->execute();
    }
}
