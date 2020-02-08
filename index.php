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
    <link rel="stylesheet" href="assets/main.css">
    <!-- end of styles -->
  </head>
  <body>

    <!-- header -->
    <section class="header">
      <?php include 'view/partials/layouts/header.html'; ?>
    </section>
    <!-- end header -->

    <!-- dashboard section -->
    <section class="dashboard">
      <div class="container">
        <div class="title">
          <a href="index.php">
            <h1>Dashboard</h1>
          </a>
        </div>
      </div>

      <div class="container">
        <div class="options">
          <!-- + add user -->
          <a data-toggle="collapse" href="#insert" role="button" aria-expanded="false" aria-controls="insert">
            <button type="button" class="btn btn-primary btn-config">
              <i class="fas fa-plus"></i>
              <small id="options_text" class="form-text">Novo usuário</small>
            </button>
          </a>
          <!-- select db -->
          <a data-toggle="collapse" href="#select" role="button" aria-expanded="false" aria-controls="select">
            <button type="button" class="btn btn-primary btn-config">
              <i class="fas fa-users"></i>
              <small id="options_text" class="form-text">Usuários cadastrados</small>
            </button>
          </a>
        </div>
        <!-- collapse select users -->
        <div class="collapse" id="select">
          <div class="card card-body">
            <?php include 'view/partials/select.php'; ?>
          </div>
        </div>
        <!-- collapse add user -->
        <div class="collapse" id="insert">
          <div class="card card-body">
            <div class="container">
              <?php include 'view/partials/insert.php'; ?>
            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- end dashboard section -->

    <!-- footer -->
    <section class="footer">
      <?php include 'view/partials/layouts/footer.html'; ?>
    </section>
    <!-- end footer -->

    <!-- scripts -->
    <script 
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
    <script src="https://kit.fontawesome.com/1a0c089da4.js" crossorigin="anonymous"></script>
    <!-- end of scripts -->
  </body>
</html>