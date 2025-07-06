<?php

class Auth{
    public static function init(): void {
    if (session_status() === PHP_SESSION_NONE) { //IF SESSION IS NONE : LIKE NO STARTED SESSION THEN =
        session_start(); // START THE SESSION NOW!
        if (headers_sent($file, $line)) {
    error_log("⚠️ Headers already sent in $file on line $line");
}

        } 
    }   
    //FOR LOGGIN IN

    //TODO: CREATE A TRY CATCH FUNCTION FOR FETCHING A ROW, ALSO A DEBUG IF WE GOT A ROW? AND A PASSWWORD VERIFY
    public static function attempt(PDO $pdo, string $username, string $password): bool {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute([':username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user || !password_verify($password, $user['password'])) {
            return false;
        }

        $_SESSION['user'] = $user;
        return true;
    }

    // FOR GETTING THE DATA?
    public static function user(): ?array
    {
        return $_SESSION['user'] ?? null;
    }

    public static function logout(): void
    {
        $_SESSION = [];
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
        session_destroy();
    }

}