<?php

class AuthController {
    private $authService;

    public function __construct(AuthService $authService) {
        $this->authService = $authService;
    }

    public function handleRequest($action, $data) {
        switch ($action) {
            case 'login':
                return $this->handleLogin($data);
            case 'register':
                return $this->handleRegister($data);
            case 'logout':
                return $this->handleLogout($data);
            // ... Other cases ...
        }
    }

    private function handleRegister($data) {
        return $this->authService->register($data);
    }

    private function handleLogin($data) {
        return $this->authService->login($data);
    }

    private function handleLogout() {
        return $this->authService->logout();
    }

    // ... Other functions like  forgot password etc...

}

?>
