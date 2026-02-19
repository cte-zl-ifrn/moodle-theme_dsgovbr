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
 * Theme configuration for dsgovbr.
 *
 * @package   theme_dsgovbr
 * @copyright 2024 CTE-ZL IFRN
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$THEME->name = 'dsgovbr';
$THEME->parents = ['boost'];
$THEME->enable_dock = false;
$THEME->editor_sheets = [];
$THEME->usefallback = true;
$THEME->scss = function($theme) {
    return theme_dsgovbr_get_main_scss_content($theme);
};
$THEME->prescsscallback = 'theme_dsgovbr_get_pre_scss';
$THEME->extrascsscallback = 'theme_dsgovbr_get_extra_scss';
$THEME->layouts = [
    // Most layouts use columns2.
    'base' => [
        'file' => 'columns2.php',
        'regions' => ['side-pre'],
        'defaultregion' => 'side-pre',
    ],
    'standard' => [
        'file' => 'columns2.php',
        'regions' => ['side-pre'],
        'defaultregion' => 'side-pre',
    ],
    'course' => [
        'file' => 'columns2.php',
        'regions' => ['side-pre'],
        'defaultregion' => 'side-pre',
    ],
    'coursecategory' => [
        'file' => 'columns2.php',
        'regions' => ['side-pre'],
        'defaultregion' => 'side-pre',
    ],
    'incourse' => [
        'file' => 'columns2.php',
        'regions' => ['side-pre'],
        'defaultregion' => 'side-pre',
    ],
    'frontpage' => [
        'file' => 'columns2.php',
        'regions' => ['side-pre'],
        'defaultregion' => 'side-pre',
        'options' => ['nonavbar' => true],
    ],
    'admin' => [
        'file' => 'columns2.php',
        'regions' => ['side-pre'],
        'defaultregion' => 'side-pre',
    ],
    'mydashboard' => [
        'file' => 'columns2.php',
        'regions' => ['side-pre'],
        'defaultregion' => 'side-pre',
        'options' => ['nonavbar' => true, 'langmenu' => true],
    ],
    'mypublic' => [
        'file' => 'columns2.php',
        'regions' => ['side-pre'],
        'defaultregion' => 'side-pre',
    ],
    'login' => [
        'file' => 'login.php',
        'regions' => [],
        'options' => ['langmenu' => true],
    ],
    'popup' => [
        'file' => 'columns2.php',
        'regions' => [],
        'options' => ['nofooter' => true, 'nonavbar' => true],
    ],
    'frametop' => [
        'file' => 'columns2.php',
        'regions' => [],
        'options' => ['nofooter' => true, 'nocoursefooter' => true],
    ],
    'embedded' => [
        'file' => 'columns2.php',
        'regions' => [],
        'options' => ['nofooter' => true, 'nonavbar' => true, 'nocoursefooter' => true],
    ],
    'maintenance' => [
        'file' => 'columns2.php',
        'regions' => [],
        'options' => ['nofooter' => true, 'nonavbar' => true],
    ],
    'print' => [
        'file' => 'columns2.php',
        'regions' => [],
        'options' => ['nofooter' => true, 'nonavbar' => true, 'noblocks' => true],
    ],
    'redirect' => [
        'file' => 'columns2.php',
        'regions' => [],
        'options' => ['nofooter' => true, 'nonavbar' => true],
    ],
    'report' => [
        'file' => 'columns2.php',
        'regions' => ['side-pre'],
        'defaultregion' => 'side-pre',
    ],
    'secure' => [
        'file' => 'columns2.php',
        'regions' => ['side-pre'],
        'defaultregion' => 'side-pre',
    ],
];
$THEME->hidefromselector = false;
$THEME->requiredblocks = '';
