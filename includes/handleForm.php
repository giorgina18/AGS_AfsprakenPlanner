<?php

class HandleForm
{
    private $db;

    // Constructor to initialize the Database instance
    public function __construct($db)
    {
        $this->db = $db;
        
        require_once 'functions.php';
        require_once 'database.php';
    }

    // Method to handle the form submission
    public function processFormSubmission($postData)
    {
        // Validate and sanitize input data
        $dag = isset($postData['day']) ? intval(($postData['day'])) : null;
        $user_id = isset($postData['user-id']) ? intval($postData['user-id']) : 0;
        $tijdstip_id = isset($postData['tijdstip-id']) ? intval($postData['tijdstip-id']) : null;
        $papiermaten_id = isset($postData['papiermaten']) ? intval($postData['papiermaten']) : null;
        $status = isset($postData['status']) ? intval($postData['status']) : null;
        $extrainfo = isset($postData['extrainfo']) ? htmlspecialchars(trim($postData['extrainfo'])) : '';

        // Check for required fields
        if (!$papiermaten_id || !$status) {
            return [
                'success' => false,
                'message' => 'Papiermaten and status are required fields.'
            ];
        }

        $data = [
            'user_id' => $user_id,         // Matches `user-id`
            'dag' => $dag,               // Matches `dag`
            'tijdstip_id' => $tijdstip_id, // Matches `tijdstip-id`
            'papiermaten_id' => $papiermaten_id, // Matches `papiermaten-id`
            'extrainfo' => $extrainfo,   // Matches `extrainfo`
            'status' => $status          // Matches `status`
        ];


        // Save the data into the database
        try {
            $this->db->insertData('tijdsloten', $data);

            return [
                'success' => true,
                'message' => 'Form submitted successfully.'
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => 'An error occurred while processing the form: ' . $e->getMessage()
            ];
        }
    }
    // Static method to handle incoming form requests
    public static function handleRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once 'Database.php';
            $db = new Database();
            $formHandler = new self($db); // Create an instance of HandleForm

            $result = $formHandler->processFormSubmission($_POST);

            // Output the result
            if ($result['success']) {
                echo '<p>' . $result['message'] . '</p>';
            } else {
                echo '<p>Error: ' . $result['message'] . '</p>';
            }
        }
    }
}
HandleForm::handleRequest();
