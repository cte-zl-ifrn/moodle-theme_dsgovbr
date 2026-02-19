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
 * Theme library functions for dsgovbr.
 *
 * @package   theme_dsgovbr
 * @copyright 2024 CTE-ZL IFRN
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Returns the main SCSS content for the theme.
 *
 * @param theme_config $theme The theme config object.
 * @return string SCSS content.
 */
function theme_dsgovbr_get_main_scss_content($theme) {
    global $CFG;

    $scss = '';
    $filename = !empty($theme->settings->preset) ? $theme->settings->preset : null;

    // Load the default preset if none is set.
    if (empty($filename) || $filename === 'default.scss') {
        // We still load the Boost default preset.
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');
    } else if ($filename === 'plain.scss') {
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/plain.scss');
    } else {
        // Try to load from dsgovbr presets folder first.
        $presetfile = $CFG->dirroot . '/theme/dsgovbr/scss/preset/' . $filename;
        if (file_exists($presetfile)) {
            $scss .= file_get_contents($presetfile);
        } else {
            // Fallback to the default.
            $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');
        }
    }

    return $scss;
}

/**
 * Returns the pre SCSS content for the theme.
 * This is loaded before the main SCSS content.
 *
 * @param theme_config $theme The theme config object.
 * @return string Pre-SCSS content.
 */
function theme_dsgovbr_get_pre_scss($theme) {
    global $CFG;

    $scss = '';

    // Load the pre.scss file with Gov.BR DS variable overrides.
    $prefile = $CFG->dirroot . '/theme/dsgovbr/scss/pre.scss';
    if (file_exists($prefile)) {
        $scss .= file_get_contents($prefile);
    }

    // Custom pre SCSS from admin settings.
    if (!empty($theme->settings->scsspre)) {
        $scss .= $theme->settings->scsspre;
    }

    return $scss;
}

/**
 * Returns the extra SCSS content for the theme.
 * This is loaded after the main SCSS content.
 *
 * @param theme_config $theme The theme config object.
 * @return string Extra SCSS content.
 */
function theme_dsgovbr_get_extra_scss($theme) {
    global $CFG;

    $scss = '';

    // Load the post.scss file with Gov.BR DS customizations.
    $postfile = $CFG->dirroot . '/theme/dsgovbr/scss/post.scss';
    if (file_exists($postfile)) {
        $scss .= file_get_contents($postfile);
    }

    // Custom SCSS from admin settings.
    if (!empty($theme->settings->scss)) {
        $scss .= $theme->settings->scss;
    }

    return $scss;
}

/**
 * Serves any files associated with the theme settings.
 *
 * @param stdClass $course The course object.
 * @param stdClass $cm The course module object.
 * @param context $context The context.
 * @param string $filearea The name of the file area.
 * @param array $args Extra arguments.
 * @param bool $forcedownload Force download.
 * @param array $options Additional options.
 * @return bool|void Returns false if file not found, sends file and doesn't return otherwise.
 */
function theme_dsgovbr_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = []) {
    if ($context->contextlevel == CONTEXT_SYSTEM && ($filearea === 'logo' || $filearea === 'backgroundimage')) {
        $theme = theme_config::load('dsgovbr');
        // By default, theme files must be cache-able by both browsers and proxies.
        if (!array_key_exists('cacheability', $options)) {
            $options['cacheability'] = 'public';
        }
        return $theme->setting_file_serve($filearea, $args, $forcedownload, $options);
    } else {
        send_file_not_found();
    }
}
