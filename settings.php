
<?php
defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {
    $settings = new admin_settingpage('local_ollamaai', get_string('pluginname', 'local_ollamaai'));

    $settings->add(new admin_setting_configtext(
        'local_ollamaai/apikey',
        get_string('apikey', 'local_ollamaai'),
        get_string('apikey_desc', 'local_ollamaai'),
        '',
        PARAM_TEXT
    ));

    $ADMIN->add('localplugins', $settings);
}
