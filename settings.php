<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Admin settings for the dsgovbr theme.
 *
 * @package   theme_dsgovbr
 * @copyright 2024 CTE-ZL IFRN
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    $settings = new theme_boost_admin_settingspage_tabs('themesettingdsgovbr', get_string('configtitle', 'theme_dsgovbr'));
    $page = new admin_settingpage('theme_dsgovbr_general', get_string('generalsettings', 'theme_dsgovbr'));

    // Preset selector.
    $name = 'theme_dsgovbr/preset';
    $title = get_string('preset', 'theme_dsgovbr');
    $description = get_string('preset_desc', 'theme_dsgovbr');
    $default = 'default.scss';
    $choices = [
        'default.scss' => get_string('presetdefault', 'theme_dsgovbr'),
        'plain.scss'   => get_string('presetplain', 'theme_dsgovbr'),
    ];
    $setting = new admin_setting_configthemepreset($name, $title, $description, $default, $choices, 'dsgovbr');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Logo file setting.
    $name = 'theme_dsgovbr/logo';
    $title = get_string('logo', 'theme_dsgovbr');
    $description = get_string('logo_desc', 'theme_dsgovbr');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Background image setting.
    $name = 'theme_dsgovbr/backgroundimage';
    $title = get_string('backgroundimage', 'theme_dsgovbr');
    $description = get_string('backgroundimage_desc', 'theme_dsgovbr');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'backgroundimage');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Brand color (primary).
    $name = 'theme_dsgovbr/brandcolor';
    $title = get_string('brandcolor', 'theme_dsgovbr');
    $description = get_string('brandcolor_desc', 'theme_dsgovbr');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#1351B4');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);

    // Advanced settings tab.
    $page = new admin_settingpage('theme_dsgovbr_advanced', get_string('advancedsettings', 'theme_dsgovbr'));

    // Raw SCSS to include before the content.
    $name = 'theme_dsgovbr/scsspre';
    $title = get_string('rawscsspre', 'theme_dsgovbr');
    $description = get_string('rawscsspre_desc', 'theme_dsgovbr');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Raw SCSS to include after the content.
    $name = 'theme_dsgovbr/scss';
    $title = get_string('rawscss', 'theme_dsgovbr');
    $description = get_string('rawscss_desc', 'theme_dsgovbr');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);
}
