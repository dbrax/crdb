<?php

namespace Epmnzava\Crdb;

use Epmnzava\Crdb\Libs\OnlineCard;

class Crdb
{


    public function makepayment($cardtype, $order_referenceid, $amount, $currency)
    {

        $card = new OnlineCard;


        $params = [
            "vpc_AccessCode" => config("crdb.access_code"),
            "vpc_Amount" => floatval($amount) * 100,
            "vpc_Command" => "pay",
            "vpc_Currency" => $currency,
            "vpc_Locale" => "en",
            "vpc_MerchTxnRef" => $order_referenceid,
            "vpc_Merchant" => config("crdb.merchant_id"),
            "vpc_OrderInfo" => $order_referenceid,
            "vpc_ReturnURL" => config("crdb.redirect_url"),
            "vpc_Version" => 1,
            "vpc_SecureHashType" => "SHA256",
            "vpc_card" => $cardtype,
            "vpc_gateway" => "ssl"

        ];
        $redirect = $card->execute($params);

        return $redirect;
    }
}
