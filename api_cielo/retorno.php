<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Integração API Cielo - E-commerce</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body class="bg-light">
  <div class="container">
    <div class="py-5 text-center">
      <h2>Pagamento Online</h2>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-6 order-md-2 mb-4">
        <?php
          if (isset($_GET['cod'])) {
            if ($_GET['cod'] == '0') { ?>
              <div class="alert alert-success" role="alert">
                <span>Pagamento realizado com sucesso! <?php echo "TID" . $_GET['TID'];?></span>
              </div>
            <?php } else if ($_GET['cod'] == '1') { ?>
              <div class="alert alert-danger" role="alert">
                <span>Falha ao realizar o pagamento! <?php echo "Status" . $_GET['status'] . " | Error: " . $_GET['erro'];?></span>
              </div>
            <?php } else { ?>
              <div class="alert alert-danger" role="alert">
                <span>Falha ao realizar o pagamento! <?php echo "Erro integração: " . $_GET['erro'];?></span>
              </div>
            <?php
            }
          }
        ?>
    

      </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">&copy; 2017-2018 Company Name</p>
      <ul class="list-inline">
        <li class="list-inline-item"><a href="#">Privacy</a></li>
        <li class="list-inline-item"><a href="#">Terms</a></li>
        <li class="list-inline-item"><a href="#">Support</a></li>
      </ul>
    </footer>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>