<?php

class AuthService {
    private $db;

    public function __construct() {
        // Connect to the database 
        $this->db = new PDO("mysql:host=localhost;dbname=developerTest", "root", "");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function register($data) {
        $email = $data['email'];
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $username = $data['username'];

        // Insert user data into the database
        $stmt = $this->db->prepare("INSERT INTO users (email, password, username) VALUES (?, ?, ?)");
        $stmt->execute([$email, $password, $username]);

        return ['status' => 'ok', 'message' => 'User registered successfully.'];
    }

    public function login($data) {
        $email = $data['email'];
        $password = $data['password'];
        $rememberMe = $data['rememberMe'];

        // Retrieve user data from the database
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the user exists and the password is correct
        if (password_verify($password, $user['password'])) {
            // use $rememberMe to handle remember me logic goes here
            return ['status' => 'ok', 'message' => 'Hello ' . $user['username'] . ', you are logged in.'];
        } else {
            return ['status' => 'not ok', 'message' => 'Invalid email or password.'];
        }
    }

    public function logout() {
        // Implement logout logic here
        return ['status' => 'ok', 'message' => 'You have been logged out.'];
    }

}

?>
