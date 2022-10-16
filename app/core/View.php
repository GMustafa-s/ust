<?php
/*
 * @copyright Copyright (c) 2021 SaivraTechnologies (https://saivra.net/)
 *
 * This software is exclusively sold through https://saivra.net/ by the SaivraTechnologies author.
 * Downloading this product from any other sources and running it without a proper license is illegal,
 *  except the official ones linked from https://saivra.net/.
 */

namespace Altum;

use Altum\Traits\Paramsable;

class View {
    use Paramsable;

    public $view;
    public $view_path;

    public function __construct($view, Array $params = []) {

        $this->view = $view;
        $this->view_path = THEME_PATH . 'views/' . $view . '.php';

        $this->add_params($params);

    }

    public function run($data = []) {

        $data = (object) $data;

        ob_start();

        require $this->view_path;

        return ob_get_clean();
    }

}
