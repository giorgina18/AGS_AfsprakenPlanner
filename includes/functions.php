<?php
class CustomFunctions {
    public static function getRootUrl() {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $domainName = $_SERVER['HTTP_HOST'] . '/ags_afsprakenplanner/';
        return $protocol . $domainName;
    }
        // Load .env file from the parent folder and return associative array of environment variables
        public static function loadEnv()
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
}