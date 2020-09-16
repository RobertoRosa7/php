<?php

// DEBUG PAYLOAD
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

require 'vendor/autoload.php';

use Cielo\API30\Merchant;
use Cielo\API30\Ecommerce\Environment;
use Cielo\API30\Ecommerce\CieloEcommerce;
use Cielo\API30\Ecommerce\Sale;
use Cielo\API30\Ecommerce\Payment;
use Cielo\API30\Ecommerce\CreditCard;
use Cielo\API30\Ecommerce\Request\CieloRequestException;
use Slim\Http\Headers;

// Configurar ambiente de teste vs produção
// $enviroment = $enviroment = Environment::production(); // produção
$enviroment = $enviroment = Environment::sandbox(); // desenvolvimento

// configure seu merchant
$merchant = new Merchant('bbae2368-6f0f-48fb-8726-b54717fa0866','QMNYQQFPBFJKXBWTTVWVUUZTUDMAMGUIPRLUKQAJ');

// nova instancia de Sale informando ID do pedido da loja
$sale = new Sale('123');

// nova instancia de customer informando nome do usuario
$customer = $sale->customer($_POST['firstName'] . ' ' . $_POST['lastName']);

// nova instancia de pagamento informando o valor do pagamento
$payment = $sale->payment((int) ($_POST['total'] . '00'));

$payment->setCapture(1);
$payment->setType(Payment::PAYMENTTYPE_CREDITCARD)
  ->creditCard($_POST['cc-cvv'], $_POST['cc-flag'])
  ->setExpirationDate($_POST['cc-expiration'])
  ->setCardNumber($_POST['cc-number'])
  ->setHolder($_POST['firstName'] . ' ' . $_POST['lastName']);


// fazendo pagamento pela cielo
try {
  // configure SDK com seu merchant e o ambiente apropriado
  $sale = (new CieloEcommerce($merchant, $enviroment))->createSale($sale);

  // com venda feita temos o TID e seu retorno
  $paymentId = $sale->getPayment()->getPaymentId();

  // DEBUG
  // echo $sale->getPayment()->getStatus();
  // echo "-";
  // echo $sale->getPayment()->getReturnCode();
  // echo "<pre>";
  // print_r($sale->getPayment());
  // echo "</pre>";
  // die();

  if ($sale->getPayment()->getStatus() == 2) {
    Header("Location: retorno.php?cod=0&TID=" . $sale->getPayment()->getTid());
  } else {
    header("Location: retorno.php?cod=1&status=" . $sale->getPayment()->getStatus() . "&erro=" . $sale->getPayment()->getReturnCode());
  }
} catch (CieloRequestException $e) {
  // Em caso de erro de integração podemos tratar aqui

  // DEBUG
  // echo "<pre>";
  // print_r($e);
  // echo "</pre>";
  header("Location: retorno.php?cod=2&erro=" . $e->getCieloError()->getCode());
}