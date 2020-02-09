<?php
    #bring the database configurations
    require_once "../../config/config.php";

    if (isset($_GET['id'])) {
        $sql = "SELECT * FROM users WHERE id = ?";

        #Prepare an SQL statement for execution #read more about this->here https://www.php.net/manual/pt_BR/mysqli.prepare.php
        if ($stmt = $connection->prepare($sql)) {
            $stmt->bind_param("i", $_GET["id"]);
            if ($stmt->execute()) {

                $result = $stmt->get_result();
                if ($result->num_rows == 1) {

                    $row = $result->fetch_array(MYSQLI_ASSOC);

                    $param_id = $row["id"];
                    $param_name = $row["name"];
                    $param_age = $row["age"];

                } else {
                    echo "Error! Data Not Found";
                    exit();
                }
            } else {
                echo "Error! Please try again later.";
                exit();
            }
            $stmt->close();

        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        #Catch post information
        if (!empty($_POST["name"]) && !empty($_POST["age"]) && !empty($_POST["id"])) {

            #Prepare an SQL statement for execution #read more about this->here https://www.php.net/manual/pt_BR/mysqli.prepare.php
            $sql = "UPDATE users SET name = ?, age = ? WHERE id = ?";
            if ($stmt = $connection->prepare($sql)) {

                $stmt->bind_param("ssi", $_POST["name"], $_POST["age"], $_POST["id"]);
                $stmt->execute();

                if ($stmt->error) {
                    echo "Error!" . $stmt->error;
                    exit();
                } else {
                    echo "
                        <script>
                            window.location.href = 'http://localhost/teste-de-conhecimento/';
                        </script>
                    ";
                }
                $stmt->close();
            }
        }
        $connection->close();
        
    }
?>

<!-- | -->

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> Maaf TEC | Estágio </title>
        <!-- styles -->
            <link 
                rel="stylesheet" 
                href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
                integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
                crossorigin="anonymous"
            >
        <link rel="stylesheet" href="../../assets/main.css">
        <!-- end of styles -->
    </head>
    <body>

        <!-- header -->
            <section class="header">
            <?php include 'layouts/header.html'; ?>
            </section>
        <!-- end header -->

        <!-- dashboard section -->
            <section class="dashboard">
            <div class="container">
                <div class="title">
                <a href="#">
                    <h1>Dashboard</h1>
                </a>
                </div>
            </div>
        <!-- scripts -->

        <div class="ctn-form">
            <form action="update.php" method="POST">

                <label class="tittle-form">Alterar o cadastro do usuário</label>

                <!--hidden id-->
                    <input type="hidden" name="id" value="<?php if(isset($param_id)){echo $param_id;} ?>">

                <div class="form-group">
                    <input class="form-control" name="name" placeholder="Enter your name" value="<?php if(isset($param_name)){ echo $param_name; }  ?>">
                </div>
                <div class="form-group">
                    <input class="form-control" name="age"  placeholder="Enter your age" value="<?php if(isset($param_age)){ echo $param_age; } ?>">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <!-- scripts -->
            <script>
                src="https://code.jquery.com/jquery-3.4.1.slim.min.js" 
                integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" 
                crossorigin="anonymous">
            </script>

            <script 
                src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" 
                crossorigin="anonymous">
            </script>

            <script 
                src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
                integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" 
                crossorigin="anonymous">
                </script>
        <!-- end scripts -->
    </body>
</html>