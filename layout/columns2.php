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
 * Two-column layout for the dsgovbr theme.
 *
 * @package   theme_dsgovbr
 * @copyright 2024 CTE-ZL IFRN
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$bodyattributes = $OUTPUT->body_attributes();
$buildregionmainsettings = !$PAGE->include_region_main_settings_in_header_actions()  && !$PAGE->has_secondary_navigation();
// If the settings menu will be included in the header then we should
// render any custom menu items as well.
$regionmainsettingsmenu = $buildregionmainsettings ? $OUTPUT->region_main_settings_menu() : false;
$header = $OUTPUT->full_header();
$sidepreblocks = $OUTPUT->blocks('side-pre');
$hasblocks = strpos($sidepreblocks, 'data-block=') !== false;
$ismaintenance = in_array($PAGE->pagelayout, ['maintenance']);
$templatecontext = [
    'sitename'                   => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), 'escape' => false]),
    'output'                     => $OUTPUT,
    'sidepreblocks'              => $sidepreblocks,
    'hasblocks'                  => $hasblocks,
    'bodyattributes'             => $bodyattributes,
    'primarymoremenu'            => $OUTPUT->primary_nav_menu()->primarymoremenu ?? false,
    'secondarymoremenu'          => $OUTPUT->secondary_nav()->secondarymoremenu ?? false,
    'msgdrawercontent'           => $OUTPUT->render_from_template('core/message_drawer', []),
    'drawers'                    => $OUTPUT->get_flat_navigation_drawers(),
    'regionmainsettingsmenu'     => $regionmainsettingsmenu,
    'hasregionmainsettingsmenu'  => !empty($regionmainsettingsmenu),
    'overflow'                   => $OUTPUT->course_content_footer(),
    'corehtmlattributes'         => $OUTPUT->htmlattributes(),
    'pageheadingbutton'          => $OUTPUT->page_heading_button(),
    'courseindexopen'            => $PAGE->user_preference_bool('courseindexopen', true),
    'blockdraweropen'            => $PAGE->user_preference_bool('blockdraweropen', true),
    'courseid'                   => $COURSE->id,
    'hasadminblock'              => $PAGE->user_preference_bool('hasadminblock', false),
    'ismaintenance'              => $ismaintenance,
    'header'                     => $header,
    'navdraweropen'              => $PAGE->user_preference_bool('drawer-open-nav', true),
    'addblockbutton'             => $OUTPUT->addblockbutton(),
    'usercreatedfirstcourse'     => $PAGE->user_preference_bool('usercreatedfirstcourse', false),
];

$nav = $PAGE->flatnav;
$templatecontext['flatnavigation'] = $nav;
$templatecontext['firstcollectionlabel'] = $nav->get_collectionlabel();

echo $OUTPUT->render_from_template('theme_dsgovbr/columns2', $templatecontext);
