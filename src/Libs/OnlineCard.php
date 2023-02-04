<?php

namespace Epmnzava\Crdb\Libs;



class OnlineCard
{
    public function __construct()
    {
    }


    public function execute($params)
    {
        //$conn = new VPCPaymentConnection();

        $md5hash = config("crdb.access_code");
        $md5hash1 = '';
        $url = config("crdb.payment_url");
        $SECURE_SECRET = config("crdb.secure_secret");

        ksort($params);
        foreach ($params as $key => $val) {
            if (strlen($val) > 0) {
                $qstr[] = urlencode($key) . "=" . urlencode($val);
                $md5hash .= $val;
                if ((strlen($val) > 0) && ((substr($key, 0, 4) == "vpc_") || (substr($key, 0, 5) == "user_"))) {
                    if (in_array($key, array('vpc_SecureHash', 'vpc_SecureHashType')))
                        continue;
                    $md5hash1 .= $key . "=" . $val . "&";
                }
            }
        }
        $md5hash1 = rtrim($md5hash1, '&');
        $vpc_url = $url . '?' . implode("&", $qstr);
        $vpc_url .= "&vpc_SecureHash=" . strtoupper(hash_hmac('SHA256', $md5hash1, pack('H*', $SECURE_SECRET)));

        return   $vpc_url;
    }
}
