<?php
/*
 * @copyright Copyright (c) 2021 SaivraTechnologies (https://saivra.net/)
 *
 * This software is exclusively sold through https://saivra.net/ by the SaivraTechnologies author.
 * Downloading this product from any other sources and running it without a proper license is illegal,
 *  except the official ones linked from https://saivra.net/.
 */

namespace Altum\Controllers;

use Altum\Alerts;

class AdminPlanCreate extends Controller {

    public function index() {

        if(in_array(settings()->license->type, ['Extended License', 'extended'])) {
            /* Get the available taxes from the system */
            $taxes = db()->get('taxes');

            /* Get the available codes from the system */
            $codes = db()->get('codes');
        }

        if(!empty($_POST)) {
            /* Filter some the variables */
            $_POST['name'] = input_clean($_POST['name']);
            $_POST['description'] = input_clean($_POST['description']);
            $_POST['monthly_price'] = (float) $_POST['monthly_price'];
            $_POST['annual_price'] = (float) $_POST['annual_price'];
            $_POST['lifetime_price'] = (float) $_POST['lifetime_price'];

            /* Determine the enabled QR codes */
            $enabled_tools = [];

            foreach((require APP_PATH . 'includes/tools.php') as $key => $value) {
                $enabled_tools[$key] = (bool) isset($_POST['enabled_tools']) && in_array($key, $_POST['enabled_tools']);
            }

            $_POST['settings'] = [
                'teams_limit'                       => (int) $_POST['teams_limit'],
                'team_members_limit'                => (int) $_POST['team_members_limit'],
                'api_is_enabled'                    => (bool) isset($_POST['api_is_enabled']),
                'affiliate_commission_percentage'   => (int) $_POST['affiliate_commission_percentage'],
                'no_ads'                            => (bool) isset($_POST['no_ads']),
                'enabled_tools'                    => $enabled_tools,
            ];

            $_POST['settings'] = json_encode($_POST['settings']);

            $_POST['color'] = !preg_match('/#([A-Fa-f0-9]{3,4}){1,2}\b/i', $_POST['color']) ? null : $_POST['color'];
            $_POST['status'] = (int) $_POST['status'];
            $_POST['order'] = (int) $_POST['order'];
            $_POST['trial_days'] = (int) $_POST['trial_days'];
            $_POST['taxes_ids'] = json_encode($_POST['taxes_ids'] ?? []);
            $_POST['codes_ids'] = json_encode($_POST['codes_ids'] ?? []);

            //Saivra:DEMO if(DEMO) Alerts::add_error('This command is blocked on the demo.');

            /* Check for any errors */
            $required_fields = ['name'];
            foreach($required_fields as $field) {
                if(!isset($_POST[$field]) || (isset($_POST[$field]) && empty($_POST[$field]) && $_POST[$field] != '0')) {
                    Alerts::add_field_error($field, l('global.error_message.empty_field'));
                }
            }

            if(!\Altum\Csrf::check()) {
                Alerts::add_error(l('global.error_message.invalid_csrf_token'));
            }

            if(!Alerts::has_field_errors() && !Alerts::has_errors()) {

                /* Database query */
                db()->insert('plans', [
                    'name' => $_POST['name'],
                    'description' => $_POST['description'],
                    'monthly_price' => $_POST['monthly_price'],
                    'annual_price' => $_POST['annual_price'],
                    'lifetime_price' => $_POST['lifetime_price'],
                    'settings' => $_POST['settings'],
                    'taxes_ids' => $_POST['taxes_ids'],
                    'codes_ids' => $_POST['codes_ids'],
                    'color' => $_POST['color'],
                    'status' => $_POST['status'],
                    'order' => $_POST['order'],
                    'datetime' => \Altum\Date::$date,
                ]);

                /* Set a nice success message */
                Alerts::add_success(sprintf(l('global.success_message.create1'), '<strong>' . $_POST['name'] . '</strong>'));

                redirect('admin/plans');
            }
        }


        /* Main View */
        $data = [
            'taxes' => $taxes ?? null,
            'codes' => $codes ?? null,
        ];

        $view = new \Altum\View('admin/plan-create/index', (array) $this);

        $this->add_view_content('content', $view->run($data));

    }

}
