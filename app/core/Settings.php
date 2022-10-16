<?php
/*
 * @copyright Copyright (c) 2021 SaivraTechnologies (https://saivra.net/)
 *
 * This software is exclusively sold through https://saivra.net/ by the SaivraTechnologies author.
 * Downloading this product from any other sources and running it without a proper license is illegal,
 *  except the official ones linked from https://saivra.net/.
 */

namespace Altum;

class Settings {
    public static $settings = null;

    public static function initialize($settings) {

        self::$settings = $settings;

    }

    public static function get() {
        return self::$settings;
    }
}
