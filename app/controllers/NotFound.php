<?php
/*
 * @copyright Copyright (c) 2021 SaivraTechnologies (https://saivra.net/)
 *
 * This software is exclusively sold through https://saivra.net/ by the SaivraTechnologies author.
 * Downloading this product from any other sources and running it without a proper license is illegal,
 *  except the official ones linked from https://saivra.net/.
 */

namespace Altum\Controllers;

class NotFound extends Controller {

    public function index() {

        /* Custom 404 redirect if set */
        if(!empty(settings()->main->not_found_url)) {
            header('Location: ' . settings()->main->not_found_url); die();
        }

        header('HTTP/1.0 404 Not Found');

        $view = new \Altum\View('notfound/index', (array) $this);

        $this->add_view_content('content', $view->run());

    }

}
