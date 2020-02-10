<?php
    #bring the database configuration
        require_once "config/config.php";

    #Simple select
        $sql = "SELECT * FROM users";
        $query_res = $connection->query($sql);
        
        $sql = "SELECT * FROM users";
        $query_res = $connection->query($sql);
?>

<!-- | -->

<div class="container">
    <?php
        if ($query_res->num_rows > 0) {
            echo " 
                <table class='table'>
                    <thead class='thead-dark'> 
                        <tr>
                            <th scope='col' class='upper align-center'>Usuários cadastrados</th>
                            <th scope='col' class='upper align-center'>Nome</th>
                            <th scope='col' class='upper align-center'>Idade</th>
                            <th scope='col' class='upper align-center'>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
            ";
            while ($row = $query_res->fetch_assoc()) {
                echo "
                    <tr>
                        <th class='align-center' scope='row'><i class='fas fa-users-cog'></i></th>

                        <td class='align-center'>" . $row['name'] . "</td>
                        <td class='align-center'>" . $row['age'] . " </td>

                        <td class='align-center'>
                            <a href='view/partials/delete.php?id=" . $row['id'] . "' class='btn btn-primary select-icon-text align-center'>
                                <i class='fas fa-trash-alt select-icon-text'></i>
                                <smal>Deletar usuário</smal>
                            </a>

                            <i class='fas fa-ellipsis-v title-form'></i>

                            <a href='view/partials/update.php?id=" . $row['id'] . "' class='btn btn-primary select-icon-text align-center'>
                                <i class='fas fa-user-edit'></i>
                                <smal>Alterar usuário</smal>
                            </a>
                        </td>

                    </tr>
                ";
                
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo '<p class="lead"><em>No records were found.</em></p>';
        }
    ?>
</div>