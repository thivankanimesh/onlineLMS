<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Amount;
use PayPal\Api\Payment;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use Config;
use URL;
use Session;
use Redirect;

class PaymentController extends Controller
{
    public function __construct()
    {
        $paypal_conf = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function payWithpaypal(Request $request, $subtotal){

        $payer = new Payer();
        $item_1 = new Item();
        $item_list = new ItemList();
        $amount = new Amount();
        $payment = new Payment();
        $transaction = new Transaction();
        $redirect_urls = new RedirectUrls();

        $payer->setPaymentMethod('paypal');

        //$item_1->setName('Item 1')->setCurrency('USD')->setQuantity(1)->setPrice($subtotal);
        //$item_list->setItems(array($item_1));

        $amount->setCurrency('USD')->setTotal($subtotal);

        //$transaction->setAmount($amount)->setItemList($item_list)->setDescription('Your transaction description');
        $transaction->setAmount($amount);

        $redirect_urls->setReturnUrl(URL::route('profile'))->setCancelUrl(URL::route('profile'));

        $payment->setIntent('Sale')->setPayer($payer)->setRedirectUrls($redirect_urls)->setTransactions(array($transaction));

        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (Config::get('app.debug')) {
                Session::put('error', 'Connection timeout');
                return Redirect::route('paywithpaypal');
            } else {
                Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::route('paywithpaypal');
            }
        }

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        Session::put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url)) {
            return Redirect::away($redirect_url);
        }

        Session::put('error', 'Unknown error occurred');

        return Redirect::route('paywithpaypal');
    }
}
