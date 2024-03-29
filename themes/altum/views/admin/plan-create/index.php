<?php defined('Saivra') || die() ?>

<nav aria-label="breadcrumb">
    <ol class="custom-breadcrumbs small">
        <li>
            <a href="<?= url('admin/plans') ?>"><?= l('admin_plans.breadcrumb') ?></a><i class="fa fa-fw fa-angle-right"></i>
        </li>
        <li class="active" aria-current="page"><?= l('admin_plan_create.breadcrumb') ?></li>
    </ol>
</nav>

<div class="d-flex justify-content-between mb-4">
    <h1 class="h3 mb-0 mr-1"><i class="fa fa-fw fa-xs fa-box-open text-primary-900 mr-2"></i> <?= l('admin_plan_create.header') ?></h1>
</div>

<?= \Altum\Alerts::output_alerts() ?>

<div class="card">
    <div class="card-body">

        <form action="" method="post" role="form">
            <input type="hidden" name="token" value="<?= \Altum\Csrf::get() ?>" />

            <div class="form-group">
                <label for="name"><?= l('admin_plans.main.name') ?></label>
                <input type="text" id="name" name="name" class="form-control form-control-lg <?= \Altum\Alerts::has_field_errors('name') ? 'is-invalid' : null ?>" required="required" />
                <?= \Altum\Alerts::output_field_error('name') ?>
            </div>

            <div class="form-group">
                <label for="description"><?= l('admin_plans.main.description') ?></label>
                <input type="text" id="description" name="description" class="form-control form-control-lg <?= \Altum\Alerts::has_field_errors('description') ? 'is-invalid' : null ?>" value="" />
                <?= \Altum\Alerts::output_field_error('description') ?>
            </div>

            <div class="form-group">
                <label for="order"><?= l('admin_plans.main.order') ?></label>
                <input type="number" min="0" id="order" name="order" class="form-control form-control-lg" value="" />
            </div>

            <div class="form-group">
                <label for="trial_days"><?= l('admin_plans.main.trial_days') ?></label>
                <input id="trial_days" type="number" min="0" name="trial_days" class="form-control form-control-lg" value="0" />
                <div><small class="form-text text-muted"><?= l('admin_plans.main.trial_days_help') ?></small></div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-xl-4">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="monthly_price"><?= l('admin_plans.main.monthly_price') ?> <small class="form-text text-muted"><?= settings()->payment->currency ?></small></label>
                            <input type="text" id="monthly_price" name="monthly_price" class="form-control form-control-lg <?= \Altum\Alerts::has_field_errors('monthly_price') ? 'is-invalid' : null ?>" required="required" />
                            <?= \Altum\Alerts::output_field_error('monthly_price') ?>
                            <small class="form-text text-muted"><?= sprintf(l('admin_plans.main.price_help'), l('admin_plans.main.monthly_price')) ?></small>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-xl-4">
                    <div class="form-group">
                        <label for="annual_price"><?= l('admin_plans.main.annual_price') ?> <small class="form-text text-muted"><?= settings()->payment->currency ?></small></label>
                        <input type="text" id="annual_price" name="annual_price" class="form-control form-control-lg <?= \Altum\Alerts::has_field_errors('annual_price') ? 'is-invalid' : null ?>" required="required" />
                        <?= \Altum\Alerts::output_field_error('annual_price') ?>
                        <small class="form-text text-muted"><?= sprintf(l('admin_plans.main.price_help'), l('admin_plans.main.annual_price')) ?></small>
                    </div>
                </div>

                <div class="col-sm-12 col-xl-4">
                    <div class="form-group">
                        <label for="lifetime_price"><?= l('admin_plans.main.lifetime_price') ?> <small class="form-text text-muted"><?= settings()->payment->currency ?></small></label>
                        <input type="text" id="lifetime_price" name="lifetime_price" class="form-control form-control-lg <?= \Altum\Alerts::has_field_errors('lifetime_price') ? 'is-invalid' : null ?>" required="required" />
                        <?= \Altum\Alerts::output_field_error('lifetime_price') ?>
                        <small class="form-text text-muted"><?= sprintf(l('admin_plans.main.price_help'), l('admin_plans.main.lifetime_price')) ?></small>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="taxes_ids"><?= l('admin_plans.main.taxes_ids') ?></label>
                <select id="taxes_ids" name="taxes_ids[]" class="form-control form-control-lg" multiple="multiple">
                    <?php if($data->taxes): ?>
                        <?php foreach($data->taxes as $tax): ?>
                            <option value="<?= $tax->tax_id ?>">
                                <?= $tax->name . ' - ' . $tax->description ?>
                            </option>
                        <?php endforeach ?>
                    <?php endif ?>
                </select>
                <small class="form-text text-muted"><?= sprintf(l('admin_plans.main.taxes_ids_help'), '<a href="' . url('admin/taxes') .'">', '</a>') ?></small>
            </div>

            <div class="form-group">
                <label for="codes_ids"><?= l('admin_plans.main.codes_ids') ?></label>
                <select id="codes_ids" name="codes_ids[]" class="form-control form-control-lg" multiple="multiple">
                    <?php if($data->codes): ?>
                        <?php foreach($data->codes as $code): ?>
                            <option value="<?= $code->code_id ?>">
                                <?= $code->name . ' - ' . $code->code ?>
                            </option>
                        <?php endforeach ?>
                    <?php endif ?>
                </select>
                <small class="form-text text-muted"><?= sprintf(l('admin_plans.main.codes_ids_help'), '<a href="' . url('admin/codes') .'">', '</a>') ?></small>
            </div>

            <div class="form-group">
                <label for="color"><?= l('admin_plans.main.color') ?></label>
                <input type="text" id="color" name="color" class="form-control form-control-lg <?= \Altum\Alerts::has_field_errors('color') ? 'is-invalid' : null ?>" value="" />
                <?= \Altum\Alerts::output_field_error('color') ?>
                <small class="form-text text-muted"><?= l('admin_plans.main.color_help') ?></small>
            </div>

            <div class="form-group">
                <label for="status"><?= l('admin_plans.main.status') ?></label>
                <select id="status" name="status" class="form-control form-control-lg">
                    <option value="1"><?= l('global.active') ?></option>
                    <option value="0"><?= l('global.disabled') ?></option>
                    <option value="2"><?= l('global.hidden') ?></option>
                </select>
            </div>

            <div class="mt-5"></div>

            <h2 class="h4"><?= l('admin_plans.plan.header') ?></h2>

            <div>
                <?php if(\Altum\Plugin::is_active('teams')): ?>
                    <div class="form-group">
                        <label for="teams_limit"><?= l('admin_plans.plan.teams_limit') ?></label>
                        <input type="number" id="teams_limit" name="teams_limit" min="-1" class="form-control form-control-lg" value="0" required="required" />
                        <small class="form-text text-muted"><?= l('admin_plans.plan.unlimited') ?></small>
                    </div>

                    <div class="form-group">
                        <label for="team_members_limit"><?= l('admin_plans.plan.team_members_limit') ?></label>
                        <input type="number" id="team_members_limit" name="team_members_limit" min="-1" class="form-control form-control-lg" value="0" required="required" />
                        <small class="form-text text-muted"><?= l('admin_plans.plan.unlimited') ?></small>
                    </div>
                <?php endif ?>

                <?php if(\Altum\Plugin::is_active('affiliate') && settings()->affiliate->is_enabled): ?>
                    <div class="form-group">
                        <label for="affiliate_commission_percentage"><?= l('admin_plans.plan.affiliate_commission_percentage') ?></label>
                        <input type="number" id="affiliate_commission_percentage" name="affiliate_commission_percentage" min="0" max="100" class="form-control form-control-lg" value="0" required="required" />
                        <small class="form-text text-muted"><?= l('admin_plans.plan.affiliate_commission_percentage_help') ?></small>
                    </div>
                <?php endif ?>

                <div class="custom-control custom-switch my-3">
                    <input id="no_ads" name="no_ads" type="checkbox" class="custom-control-input">
                    <label class="custom-control-label" for="no_ads"><?= l('admin_plans.plan.no_ads') ?></label>
                    <div><small class="form-text text-muted"><?= l('admin_plans.plan.no_ads_help') ?></small></div>
                </div>

                <div class="custom-control custom-switch my-3">
                    <input id="api_is_enabled" name="api_is_enabled" type="checkbox" class="custom-control-input">
                    <label class="custom-control-label" for="api_is_enabled"><?= l('admin_plans.plan.api_is_enabled') ?></label>
                    <div><small class="form-text text-muted"><?= l('admin_plans.plan.api_is_enabled_help') ?></small></div>
                </div>

                <h3 class="h5 mt-4"><?= l('admin_plans.plan.enabled_tools') ?></h3>
                <p class="text-muted"><?= l('admin_plans.plan.enabled_tools_help') ?></p>

                <div class="row">
                    <?php foreach((require APP_PATH . 'includes/tools.php') as $key => $value): ?>
                        <div class="col-6 mb-3">
                            <div class="custom-control custom-switch">
                                <input id="enabled_tools_<?= $key ?>" name="enabled_tools[]" value="<?= $key ?>" type="checkbox" class="custom-control-input">
                                <label class="custom-control-label" for="enabled_tools_<?= $key ?>"><?= l('tools.' . $key . '.name') ?></label>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>

            <button type="submit" name="submit" class="btn btn-lg btn-block btn-primary mt-4"><?= l('global.create') ?></button>

        </form>

    </div>
</div>
