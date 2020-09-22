<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Integração API Cielo - E-commerce</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <style>
    button:disabled {
      cursor:not-allowed;
    }
  </style>
</head>
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
        <form id="cc-form" class="needs-validation" novalidate>
          <input type="hidden" name="total" id="total" value="20">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName">Nome</label>
              <input minLength="4" type="text" class="form-control" name="first-name" id="first-name" placeholder="nome" value="" required>
              <div class="invalid-feedback">Digite seu nome</div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Sobrenome</label>
              <input minLength="4" type="text" class="form-control" name="last-name" id="lastName" placeholder="sobrenome" value="" required>
              <div class="invalid-feedback">Digite seu sobrenome.</div>
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
              <input maxLength="9" type="text" class="form-control" id="zip" name="cc-zip" placeholder="CEP" required>
              <div class="invalid-feedback">Zip code required.</div>
            </div>
          </div>
          <hr class="mb-4">
          <div class="row">
            <input onchange="showTitulo(event)" checked type="radio" id="cc-credit" name="cc-type" value="1">
            <label for="cc-credit">Crédito</label>

            <input onchange="showTitulo(event)" type="radio" id="cc-debit" name="cc-type" value="2">
            <label for="cc-debit">Débito</label>
          </div>
          <h4 id="cc-titulo" class="mb-3">Cartão de crédito</h4>
          <h4 id="cd-titulo" class="mb-3">Cartão de débito</h4>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="cc-flag">Bandeira</label>
              <input maxLength="24" type="text" class="form-control" name="cc-flag" id="cc-flag" placeholder="Visa | Master | Dinner" required>
              <div class="invalid-feedback">Flag is required</div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="cc-number">Número do cartão</label>
              <input onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" class="form-control" name="cc-number" id="cc-number" maxLength="19" placeholder="xxxx-xxxx-xxxx-xxxx" required>
              <div class="invalid-feedback">Credit card number is required</div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 mb-3">
              <label for="cc-expiration">Expira em:</label>
              <input onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxLength="7" type="text" class="form-control" name="cc-expiration" id="cc-expiration" placeholder="01/2024" required>
              <div class="invalid-feedback">Expiration date required</div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="cc-cvv">CVV</label>
              <input onkeypress="return event.charCode >= 48 && event.charCode <= 57" minLength="3" maxLength="3" type="text" class="form-control" name="cc-cvv" id="cc-cvv" placeholder="xxx" required>
              <div class="invalid-feedback">Security code required</div>
            </div>
          </div>
          <hr class="mb-4">
          <button id="btn-continue" class="btn btn-primary btn-lg btn-block" type="submit">Continue</button>
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
      const payload = {}
      window.addEventListener('load', function() {
        HTMLFormElement.prototype.fetchForm = function(){
          return new FormData(this)
        }
        HTMLFormElement.prototype.toJSON = function(){
          const json = {}
          this.fetchForm().forEach((value, key) => json[key] = value)
          return json
        }
        
        $('#btn-continue').attr('disabled', true)
        $('input[name="cc-type"]').each(cc => $('#cd-titulo').hide())

        $('#first-name').on('keyup', e => {
          if (e.target.required && e.target.value > e.target.minLength) {
            payload['first-name'] = true
            e.target.parentNode.classList.add('was-validated')
          }
        })
        $('#cc-number').on('keyup', e => {
          if (e.target.value.length == 4) {
            e.target.value = e.target.value += '-'
          } else if (e.target.value.length == 9) {
            e.target.value = e.target.value += '-'
          } else if (e.target.value.length == 14) {
            e.target.value = e.target.value += '-'
          }
          payload['cc-credit'] = /(\d\d\d\d)-(\d\d\d\d)-(\d\d\d\d)-(\d\d\d\d)/.test(e.target.value)

          if (payload['cc-credit'] && e.target.required) {
            e.target.parentNode.classList.add('was-validated')
            $('#cc-expiration').focus()
          }
        })

        $('#cc-expiration').on('keyup', e => {
          if (e.target.value.length == 2) e.target.value = e.target.value += '/'
          payload['cc-expiration'] = /(\d\d)\/(\d\d\d\d)/.test(e.target.value)
          if (payload['cc-expiration']) $('#cc-cvv').focus()
        })

        $('#cc-cvv').on('keyup', e => {
          payload['cc-cvv'] = /\d\d\d/.test(e.target.value)
          if (payload['cc-cvv']) $('#btn-continue').focus()
        })

        $('#cc-form').on('submit', e => {
          e.preventDefault()
          for (const key in payload) {
            if (payload[key]) payload['is-valid'] = true
          }
          console.log(payload)
          if (payload['is-valid']) {
            $('#cc-form').addClass('was-validated')
          } else {
            sendPayload(document.querySelector('#cc-form').toJSON())
          }
        })
        
        $('#cc-form').on('change', e => {
          !payload['is-valid'] ? $('#btn-continue').attr('disabled', false) : $('#btn-continue').attr('disabled', true)
        })

        function sendPayload(payload) {
          console.log(payload)
        }

      }, false)
    })()

    function showTitulo(e) {
      if (e.target.value === '1') {
        $('#cc-titulo').show()
        $('#cd-titulo').hide()

      } else if (e.target.value === '2') {
        $('#cd-titulo').show()
        $('#cc-titulo').hide()

      } else {
        $('#cd-titulo').hide()
        $('#cc-titulo').hide()
      }
    }
  </script>
</body>
</html>