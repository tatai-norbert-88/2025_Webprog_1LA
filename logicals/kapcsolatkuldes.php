<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


require_once __DIR__ . '/../includes/db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  
    $name = trim($_POST['name'] ?? ''); 
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    
    $errors = [];
    
   
    if (empty($name)) {
        $name = "Vendég"; 
    }
    
    if (empty($email)) {
        $errors[] = "Az e-mail cím megadása kötelező.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Érvénytelen e-mail formátum. Kérjük, valós e-mail címet adjon meg."; 
    }
    
    
    if (empty($message)) {
        $errors[] = "Az üzenet megadása kötelező.";
    }

    
    if (empty($errors)) {
        if (isset($pdo)) { 
            try {
                
                $sql = "INSERT INTO uzenetek (name, email, message, created_at) VALUES (:name, :email, :message, NOW())";
                $stmt = $pdo->prepare($sql);

                
                $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':message', $message, PDO::PARAM_STR);

                
                if ($stmt->execute()) {
                    $_SESSION['success_message'] = "Üzenet sikeresen elküldve!";
                    unset($_SESSION['form_data']); 
                } else {
                    $_SESSION['error_message'] = "Hiba történt az üzenet adatbázisba mentése közben.";
                    error_log("Adatbázis hiba (uzenetek insert): " . implode(" | ", $stmt->errorInfo()));
                    $_SESSION['form_data'] = $_POST; 
                }

            } catch (PDOException $e) {
                $_SESSION['error_message'] = "Adatbázis hiba történt."; 
                error_log("PDO Hiba (kapcsolatkuldes.php): " . $e->getMessage());
                $_SESSION['form_data'] = $_POST;
            }
        } else {
            $_SESSION['error_message'] = "Adatbázis kapcsolati hiba lépett fel."; 
            error_log("Hiba: \$pdo nem létezik a kapcsolatkuldes.php-ban a db.php betöltése után.");
            $_SESSION['form_data'] = $_POST;
        }
    } else {
        
        $_SESSION['error_message'] = implode("<br>", $errors);
        $_SESSION['form_data'] = $_POST;
    }

    
    header("Location: ../index.php?page=kapcsolatok"); 
    exit();

} else {
    
    $_SESSION['error_message'] = "Érvénytelen kérés. Kérjük, használja az űrlapot.";
    header("Location: ../index.php?page=cimlap"); 
    exit();
}
?>
