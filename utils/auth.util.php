<?php

class Auth{
    public static function init(): void {
    if (session_status() === PHP_SESSION_NONE) { //IF SESSION IS NONE : LIKE NO STARTED SESSION THEN =
        session_start(); // START THE SESSION NOW!
    } 

    if (isset($_SESSION['user'])) {
        echo "You are now logged in as " . $_SESSION['user']['first_name'] . '<br>';
        echo "Your role is : " . $_SESSION['user']['role'] . '<br>';
        echo 'Your money is : ' . $_SESSION['user']['wallet'];
    } else {
        echo "No user is logged in.";
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

}