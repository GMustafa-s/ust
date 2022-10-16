<?php defined('Saivra') || die() ?>

<div class="container">
    <?= \Altum\Alerts::output_alerts() ?>

    <nav aria-label="breadcrumb">
        <ol class="custom-breadcrumbs small">
            <li><a href="<?= url('tools') ?>"><?= l('tools.breadcrumb') ?></a> <i class="fa fa-fw fa-angle-right"></i></li>
            <li class="active" aria-current="page"><?= l('tools.fahrenheit_to_celsius.name') ?></li>
        </ol>
    </nav>

    <div class="row mb-4">
        <div class="col-12 col-xl d-flex align-items-center mb-3 mb-xl-0">
            <h1 class="h4 m-0"><?= l('tools.fahrenheit_to_celsius.name') ?></h1>

            <div class="ml-2">
                <span data-toggle="tooltip" title="<?= l('tools.fahrenheit_to_celsius.description') ?>">
                    <i class="fa fa-fw fa-info-circle text-muted"></i>
                </span>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form">
                <input type="hidden" name="token" value="<?= \Altum\Csrf::get() ?>" />

                <div class="form-group">
                    <label for="fahrenheit"><i class="fa fa-fw fa-temperature-low fa-sm text-muted mr-1"></i> <?= l('tools.fahrenheit_to_celsius.fahrenheit') ?></label>
                    <input type="number" step=".01" id="fahrenheit" name="fahrenheit" class="form-control <?= \Altum\Alerts::has_field_errors('fahrenheit') ? 'is-invalid' : null ?>" value="<?= $data->values['fahrenheit'] ?>" required="required" />
                    <?= \Altum\Alerts::output_field_error('fahrenheit') ?>
                </div>

                <button type="submit" name="submit" class="btn btn-block btn-primary"><?= l('global.submit') ?></button>
            </form>

        </div>
    </div>

    <?php if(isset($data->result)): ?>
        <div class="mt-4">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <div class="d-flex justify-content-between align-items-center">
                            <label for="result"><?= l('tools.fahrenheit_to_celsius.celsius') ?></label>
                            <div>
                                <button
                                        type="button"
                                        class="btn btn-link text-muted"
                                        data-toggle="tooltip"
                                        title="<?= l('global.clipboard_copy') ?>"
                                        aria-label="<?= l('global.clipboard_copy') ?>"
                                        data-copy="<?= l('global.clipboard_copy') ?>"
                                        data-copied="<?= l('global.clipboard_copied') ?>"
                                        data-clipboard-target="#result"
                                        data-clipboard-text
                                >
                                    <i class="fa fa-fw fa-sm fa-copy"></i>
                                </button>
                            </div>
                        </div>
                        <textarea id="result" class="form-control"><?= nr($data->result, 2) ?></textarea>
                    </div>

                </div>
            </div>
        </div>
    <?php endif ?>

    <div class="mt-4">
        <div class="card">
            <div class="card-body">
                <?= l('tools.' . \Altum\Router::$method . '.extra_content') ?>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <?= $this->views['similar_tools'] ?>
    </div>

    <div class="mt-5">
        <?= $this->views['popular_tools'] ?>
    </div>
</div>

<?php include_view(THEME_PATH . 'views/partials/clipboard_js.php') ?>
