<?php
/*
 * @copyright Copyright (c) 2021 SaivraTechnologies (https://saivra.net/)
 *
 * This software is exclusively sold through https://saivra.net/ by the SaivraTechnologies author.
 * Downloading this product from any other sources and running it without a proper license is illegal,
 *  except the official ones linked from https://saivra.net/.
 */

namespace Altum\PaymentGateways;

/* Helper class for Paystack v2 */
class Paystack {
    static public $api_url = 'https://api.paystack.co/';
    static public $secret_key = null;

    public static function get_headers() {
        return [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . self::$secret_key
        ];
    }

}
