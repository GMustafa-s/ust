<?php defined('Saivra') || die() ?>

<div>
    <div class="mb-3">
        <?php $tools = require APP_PATH . 'includes/tools.php'; ?>
        <div><?= l('admin_settings.tools.available_tools') . ' (' . count($tools) . ')' ?></div>
        <div class="row">
            <?php foreach($tools as $key => $value): ?>
                <div class="col-12 col-lg-6">
                    <div class="custom-control custom-checkbox my-2">
                        <input id="<?= 'tool_' . $key ?>" name="available_tools[]" value="<?= $key ?>" type="checkbox" class="custom-control-input" <?= settings()->tools->available_tools->{$key} ? 'checked="checked"' : null ?>>
                        <label class="custom-control-label d-flex align-items-center" for="<?= 'tool_' . $key ?>">
                            <?= l('tools.' . $key . '.name') ?>
                        </label>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>

    <div class="form-group">
        <label for="google_safe_browsing_is_enabled"><?= l('admin_settings.tools.google_safe_browsing_is_enabled') ?></label>
        <select id="google_safe_browsing_is_enabled" name="google_safe_browsing_is_enabled" class="form-control form-control-lg">
            <option value="1" <?= settings()->tools->google_safe_browsing_is_enabled ? 'selected="selected"' : null ?>><?= l('global.yes') ?></option>
            <option value="0" <?= !settings()->tools->google_safe_browsing_is_enabled ? 'selected="selected"' : null ?>><?= l('global.no') ?></option>
        </select>
        <small class="form-text text-muted"><?= l('admin_settings.tools.google_safe_browsing_is_enabled_help') ?></small>
    </div>

    <div class="form-group">
        <label for="google_safe_browsing_api_key"><?= l('admin_settings.tools.google_safe_browsing_api_key') ?></label>
        <input id="google_safe_browsing_api_key" type="text" name="google_safe_browsing_api_key" class="form-control form-control-lg" value="<?= settings()->tools->google_safe_browsing_api_key ?>" />
    </div>
</div>

<button type="submit" name="submit" class="btn btn-lg btn-block btn-primary mt-4"><?= l('global.update') ?></button>
