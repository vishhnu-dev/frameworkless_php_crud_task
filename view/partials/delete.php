<?php
        #Catch information
        if (isset($_GET["id"]) && !empty($_GET["id"])) {
            
            #bring the database configurations
            require_once "../../config/config.php";

            $sql = "DELETE FROM users WHERE id = ?";

            #Prepare an SQL statement for execution #read more about this->here https://www.php.net/manual/pt_BR/mysqli.prepare.php
            if ($stmt = $connection->prepare($sql)) {
                $stmt->bind_param("i", $_GET["id"]);
                if ($stmt->execute()) {
                    header("Location: http://localhost/teste-de-conhecimento/");
                    exit();               
                } else {
                    #404
                    header("Location: http://localhost/teste-de-conhecimento/view/pages/404.html"); 
                }
            }
            $stmt->close();
            $connection->close();
            header("Location: http://localhost/teste-de-conhecimento/");
        } else {
            #404
            header("Location: http://localhost/teste-de-conhecimento/view/pages/404.html"); 
        }
    ?>