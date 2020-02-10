<?php
    #Checks if the method is post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        #bring the database configurations
        require_once "config/config.php";
        
        #Checks if the coming from form information is set
        if (isset($_POST['name']) && isset($_POST['age'])) {

            $sql = "INSERT INTO users (id, name, age) VALUES (?,?,?)";
            
            #Prepare an SQL statement for execution #read more about this->here https://www.php.net/manual/pt_BR/mysqli.prepare.php
            if ($stmt = $connection->prepare($sql)) {
                $stmt->bind_param("ssi", $_POST['id'], $_POST['name'], $_POST['age']);
                if ($stmt->execute()) {
                    
                    @header("Location: http://localhost/teste-de-conhecimento/");
                } else {
                    #404
                    @header("Location: http://localhost/teste-de-conhecimento/view/pages/404.html");
                }
                $stmt->close();

            }else{
                #404
                @header("Location: http://localhost/teste-de-conhecimento/view/pages/404.html");
            }
        }
    }
?>
<!-- | -->
<div class="ctn-form">
    <form id="form" name="form" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" onSubmit="return check_field();">

        <h5 class="title-form align-center">Cadastrar usuário</h5>

        <!--hidden id-->
            <input type="hidden" name="id">

        <div class="form-group">
            <input id="name" type="text" class="form-control" name="name" placeholder="Enter your name *">
        </div>
        <div class="form-group">
            <input id="age"  type="text" class="form-control" name="age"  placeholder="Enter your age *">
        </div>

        <button id="btn" type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
