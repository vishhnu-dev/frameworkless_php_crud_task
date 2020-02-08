<?php
    #bring the database configurations
    require_once "config/config.php";

    #Checks if the method is post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        #Checks if the coming from form information is set
        if (isset($_POST['name']) && isset($_POST['age'])) {

            $sql = "INSERT INTO users (id, name, age) VALUES (?,?,?)";
            #Prepare an SQL statement for execution #read more about this->here https://www.php.net/manual/pt_BR/mysqli.prepare.php
            if ($stmt = $connection->prepare($sql)) {

                $stmt->bind_param("ssi", $_POST['id'], $_POST['name'], $_POST['age']);
                if ($stmt->execute()) {
                    echo "Sucess! User was registered.";
                    header("location: index.php");
                    exit();
                } else {
                    #404
                    header("location: view/pages/404.html");
                }
                $stmt->close();
            }else{
                #404
                header("location: view/pages/404.html");
            }
        }
    }
?>
<div class="ctn-form">
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
        <!--hidden id-->
        <input type="hidden" name="id">

        <div class="form-group">
            <input class="form-control" name="name" placeholder="Enter your name">
        </div>

        <div class="form-group">
            <input class="form-control" name="age"  placeholder="Enter your age">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>



