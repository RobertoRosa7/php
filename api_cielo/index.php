<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Integração API Cielo - E-commerce</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<!-- <section class="payment">
    <div class="container">
      <h1><?php print("Working!"); ?></h1>
      <div class="title">
        <h1>Fazendo integração com API da Cielo</h1>
      </div>
      
      <div class="content">
        <div class="row">
          <div class="col-md-6">
            <form action="">
              <h3>Endereço de cobrança</h3>
              <div class="form-">
                <input type="text" class="form-control" placeholder="Nome">
                <input type="text" class="form-control" placeholder="Número do cartão">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section> -->

<body class="bg-light">
  <div class="container">
    <div class="py-5 text-center">
      <!-- <img class="d-block mx-auto mb-4" src="img/bootstrap-solid.svg" alt="" width="72" height="72"> -->
      <h2>Pagamento Online</h2>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Seu carrinho</span>
          <span class="badge badge-secondary badge-pill">3</span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Nome do produto</h6>
              <small class="text-muted">Descrição</small>
            </div>
            <span class="text-muted">R$ 12,00</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Segundo Produto</h6>
              <small class="text-muted">Descrição</small>
            </div>
            <span class="text-muted">R$ 8,00</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Terceiro Produto</h6>
              <small class="text-muted">Descrição</small>
            </div>
            <span class="text-muted">R$ 5,00</span>
          </li>

          <li class="list-group-item d-flex justify-content-between bg-light">
            <div class="text-success">
              <h6 class="my-0">Código Promocional</h6>
              <small>EXAMPLECODE</small>
            </div>
            <span class="text-success">-R$ 5,00</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (R$)</span>
            <strong>R$ 20,00</strong>
          </li>
        </ul>

        <form class="card p-2">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Promo code">
            <div class="input-group-append">
              <button type="submit" class="btn btn-secondary">Redeem</button>
            </div>
          </div>
        </form>
      </div>

      <div class="col-md-6 order-md-1">
        <h4 class="mb-3">Endereço de cobrança</h4>
        <form class="needs-validation" novalidate action="efetuar-pagamento.php" method="POST">
          <input type="hidden" name="total" id="total" value="20">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName">Nome</label>
              <input type="text" class="form-control" name="firstName" id="firstName" placeholder="nome" value="" required>
              <div class="invalid-feedback">Valid first name is required.</div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Sobrenome</label>
              <input type="text" class="form-control" name="lastName" id="lastName" placeholder="sobrenome" value="" required>
              <div class="invalid-feedback">Valid last name is required.</div>
            </div>
          </div>
          <div class="mb-3">
            <label for="email">E-mail <span class="text-muted">(Optional)</span></label>
            <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com">
            <div class="invalid-feedback">Please enter a valid email address for shipping updates.</div>
          </div>
          <div class="mb-3">
            <label for="address">Endereço</label>
            <input type="text" class="form-control" name="address" id="address" placeholder="Rua ou Av." required>
            <div class="invalid-feedback">Please enter your shipping address.</div>
          </div>
          <div class="mb-3">
            <label for="address2">Endereço 2 <span class="text-muted">(Optional)</span></label>
            <input type="text" class="form-control" name="address2" id="address2" placeholder="Apartamento ou casa">
          </div>
          <div class="row">
            <div class="col-md-4 mb-3">
              <label for="state">Estado</label>
              <select class="custom-select d-block w-100" name="state" id="state" required>
                <option value="">Selecione...</option>
                <option>SP</option>
                <option>RJ</option>
              </select>
              <div class="invalid-feedback">Please provide a valid state.</div>
            </div>

            <div class="col-md-5 mb-3">
              <label for="city">Cidade</label>
              <select class="custom-select d-block w-100" name="city" id="city" required>
                <option value="">Selecione...</option>
                <option>São Paulo</option>
                <option>Osasco</option>
              </select>
              <div class="invalid-feedback">Please select a valid city.</div>
            </div>

            <div class="col-md-3 mb-3">
              <label for="zip">CEP</label>
              <input maxLength="9" type="text" class="form-control" id="zip" id="zip" placeholder="CEP" required>
              <div class="invalid-feedback">Zip code required.</div>
            </div>
          </div>
          <hr class="mb-4">
          <h4 class="mb-3">Cartão</h4>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="cc-flag">Bandeira</label>
              <input maxLength="24" type="text" class="form-control" name="cc-flag" id="cc-flag" placeholder="Visa | Master | Dinner" required>
              <div class="invalid-feedback">Flag is required</div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="cc-number">Número do cartão</label>
              <input type="text" class="form-control" name="cc-number" id="cc-number" maxLength="16" placeholder="xxxx-xxxx-xxxx-xxxx" required>
              <div class="invalid-feedback">Credit card number is required</div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 mb-3">
              <label for="cc-expiration">Expira em:</label>
              <input maxLength="5" type="text" class="form-control" name="cc-expiration" id="cc-expiration" placeholder="01/24" required>
              <div class="invalid-feedback">Expiration date required</div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="cc-cvv">CVV</label>
              <input maxLength="3" type="text" class="form-control" name="cc-cvv" id="cc-cvv" placeholder="xxx" required>
              <div class="invalid-feedback">Security code required</div>
            </div>
          </div>
          <hr class="mb-4">
          <button class="btn btn-primary btn-lg btn-block" type="submit">Continue</button>
        </form>
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
  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';

      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation')

        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault()
              event.stopPropagation()
            }
            form.classList.add('was-validated')
          }, false)

          // form.addEventListener('focusout', event => {
          //   if (form.checkValidity() === false) {
          //     event.preventDefault()
          //     event.stopPropagation()
          //   }
          //   form.classList.add('was-validated')
          // })
        })
      }, false)
    })()
  </script>
</body>

</html>