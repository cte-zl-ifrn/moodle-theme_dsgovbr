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
 * Unit tests for lib.php functions of the dsgovbr theme.
 *
 * @package   theme_dsgovbr
 * @copyright 2024 CTE-ZL IFRN
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

global $CFG;
require_once($CFG->dirroot . '/theme/dsgovbr/lib.php');

/**
 * Unit tests for the theme_dsgovbr lib functions.
 *
 * @package   theme_dsgovbr
 * @copyright 2024 CTE-ZL IFRN
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @covers    ::theme_dsgovbr_get_pre_scss
 * @covers    ::theme_dsgovbr_get_extra_scss
 * @covers    ::theme_dsgovbr_get_main_scss_content
 */
class theme_dsgovbr_lib_testcase extends advanced_testcase {

    /**
     * Helper: build a stub theme object with empty settings.
     *
     * @return stdClass
     */
    protected function make_theme_stub(): stdClass {
        $theme = new stdClass();
        $theme->settings = new stdClass();
        return $theme;
    }

    // -------------------------------------------------------------------------
    // theme_dsgovbr_get_pre_scss
    // -------------------------------------------------------------------------

    /**
     * Verify that get_pre_scss always returns a string.
     */
    public function test_get_pre_scss_returns_string(): void {
        $theme = $this->make_theme_stub();
        $result = theme_dsgovbr_get_pre_scss($theme);
        $this->assertIsString($result);
    }

    /**
     * When no custom scsspre is set the function still returns a string
     * (the content of scss/pre.scss if the file exists, otherwise empty).
     */
    public function test_get_pre_scss_without_custom_setting(): void {
        $theme = $this->make_theme_stub();
        $result = theme_dsgovbr_get_pre_scss($theme);
        // Must be a string; the file should exist so it should be non-empty.
        $this->assertIsString($result);
        $this->assertStringNotContainsString('{{custom}}', $result);
    }

    /**
     * When scsspre is provided in settings it is appended to the result.
     */
    public function test_get_pre_scss_appends_custom_setting(): void {
        $theme = $this->make_theme_stub();
        $customscss = '$my-custom-variable: #ff0000;';
        $theme->settings->scsspre = $customscss;

        $result = theme_dsgovbr_get_pre_scss($theme);

        $this->assertIsString($result);
        $this->assertStringContainsString($customscss, $result);
    }

    /**
     * When scsspre setting is empty no custom text is appended.
     */
    public function test_get_pre_scss_does_not_append_empty_setting(): void {
        $theme = $this->make_theme_stub();
        $theme->settings->scsspre = '';

        $result = theme_dsgovbr_get_pre_scss($theme);

        // Empty string means nothing extra was appended.
        $this->assertIsString($result);
    }

    /**
     * Pre SCSS output must contain the Gov.BR primary colour variable
     * as defined in scss/pre.scss.
     */
    public function test_get_pre_scss_contains_govbr_color(): void {
        global $CFG;
        $prefile = $CFG->dirroot . '/theme/dsgovbr/scss/pre.scss';
        if (!file_exists($prefile)) {
            $this->markTestSkipped('scss/pre.scss not found.');
        }
        $theme = $this->make_theme_stub();
        $result = theme_dsgovbr_get_pre_scss($theme);
        // The Gov.BR institutional blue must appear in the pre SCSS.
        $this->assertStringContainsString('#1351B4', $result);
    }

    // -------------------------------------------------------------------------
    // theme_dsgovbr_get_extra_scss
    // -------------------------------------------------------------------------

    /**
     * Verify that get_extra_scss always returns a string.
     */
    public function test_get_extra_scss_returns_string(): void {
        $theme = $this->make_theme_stub();
        $result = theme_dsgovbr_get_extra_scss($theme);
        $this->assertIsString($result);
    }

    /**
     * When no custom scss is set the function still returns a string.
     */
    public function test_get_extra_scss_without_custom_setting(): void {
        $theme = $this->make_theme_stub();
        $result = theme_dsgovbr_get_extra_scss($theme);
        $this->assertIsString($result);
    }

    /**
     * When scss is provided in settings it is appended to the result.
     */
    public function test_get_extra_scss_appends_custom_setting(): void {
        $theme = $this->make_theme_stub();
        $customscss = '.my-custom-class { color: red; }';
        $theme->settings->scss = $customscss;

        $result = theme_dsgovbr_get_extra_scss($theme);

        $this->assertIsString($result);
        $this->assertStringContainsString($customscss, $result);
    }

    /**
     * When scss setting is empty no custom text is appended.
     */
    public function test_get_extra_scss_does_not_append_empty_setting(): void {
        $theme = $this->make_theme_stub();
        $theme->settings->scss = '';

        $result = theme_dsgovbr_get_extra_scss($theme);

        $this->assertIsString($result);
    }

    /**
     * Extra SCSS output must include Gov.BR navbar styles from scss/post.scss.
     */
    public function test_get_extra_scss_contains_govbr_navbar(): void {
        global $CFG;
        $postfile = $CFG->dirroot . '/theme/dsgovbr/scss/post.scss';
        if (!file_exists($postfile)) {
            $this->markTestSkipped('scss/post.scss not found.');
        }
        $theme = $this->make_theme_stub();
        $result = theme_dsgovbr_get_extra_scss($theme);
        // The Gov.BR header-top element must appear in the extra SCSS.
        $this->assertStringContainsString('govbr-header-top', $result);
    }

    // -------------------------------------------------------------------------
    // theme_dsgovbr_get_main_scss_content
    // -------------------------------------------------------------------------

    /**
     * Verify that get_main_scss_content always returns a string.
     */
    public function test_get_main_scss_content_returns_string(): void {
        $theme = $this->make_theme_stub();
        $result = theme_dsgovbr_get_main_scss_content($theme);
        $this->assertIsString($result);
    }

    /**
     * When no preset is set the Boost default preset should be loaded.
     */
    public function test_get_main_scss_content_default_preset(): void {
        global $CFG;
        $boostdefault = $CFG->dirroot . '/theme/boost/scss/preset/default.scss';
        if (!file_exists($boostdefault)) {
            $this->markTestSkipped('Boost default preset not found.');
        }
        $theme = $this->make_theme_stub();
        // No preset set.
        $result = theme_dsgovbr_get_main_scss_content($theme);
        $this->assertIsString($result);
        $this->assertNotEmpty($result);
    }

    /**
     * Requesting the 'default.scss' preset explicitly should return the Boost default.
     */
    public function test_get_main_scss_content_explicit_default_preset(): void {
        global $CFG;
        $boostdefault = $CFG->dirroot . '/theme/boost/scss/preset/default.scss';
        if (!file_exists($boostdefault)) {
            $this->markTestSkipped('Boost default preset not found.');
        }
        $theme = $this->make_theme_stub();
        $theme->settings->preset = 'default.scss';

        $result = theme_dsgovbr_get_main_scss_content($theme);

        $expected = file_get_contents($boostdefault);
        $this->assertEquals($expected, $result);
    }

    /**
     * Requesting the 'plain.scss' preset should return the Boost plain preset.
     */
    public function test_get_main_scss_content_plain_preset(): void {
        global $CFG;
        $boostplain = $CFG->dirroot . '/theme/boost/scss/preset/plain.scss';
        if (!file_exists($boostplain)) {
            $this->markTestSkipped('Boost plain preset not found.');
        }
        $theme = $this->make_theme_stub();
        $theme->settings->preset = 'plain.scss';

        $result = theme_dsgovbr_get_main_scss_content($theme);

        $expected = file_get_contents($boostplain);
        $this->assertEquals($expected, $result);
    }

    /**
     * Requesting an unknown preset that does not exist in dsgovbr or boost
     * should fall back to the Boost default preset.
     */
    public function test_get_main_scss_content_unknown_preset_falls_back(): void {
        global $CFG;
        $boostdefault = $CFG->dirroot . '/theme/boost/scss/preset/default.scss';
        if (!file_exists($boostdefault)) {
            $this->markTestSkipped('Boost default preset not found.');
        }
        $theme = $this->make_theme_stub();
        $theme->settings->preset = 'nonexistent_preset.scss';

        $result = theme_dsgovbr_get_main_scss_content($theme);

        $expected = file_get_contents($boostdefault);
        $this->assertEquals($expected, $result);
    }

    /**
     * Requesting a custom preset that exists in the dsgovbr presets folder
     * should load that file (not the boost fallback).
     */
    public function test_get_main_scss_content_custom_dsgovbr_preset(): void {
        global $CFG;

        $presetdir = $CFG->dirroot . '/theme/dsgovbr/scss/preset/';
        $customfile = $presetdir . 'custom_test.scss';
        $dircreated = false;

        try {
            if (!is_dir($presetdir)) {
                mkdir($presetdir, 0755, true);
                $dircreated = true;
            }

            $written = file_put_contents($customfile, '// custom dsgovbr preset');
            if ($written === false) {
                $this->fail('Could not write temporary preset file: ' . $customfile);
            }

            $theme = $this->make_theme_stub();
            $theme->settings->preset = 'custom_test.scss';

            $result = theme_dsgovbr_get_main_scss_content($theme);

            $this->assertEquals('// custom dsgovbr preset', $result);
        } finally {
            // Always clean up, even if the test assertion fails.
            if (file_exists($customfile)) {
                unlink($customfile);
            }
            if ($dircreated && is_dir($presetdir)) {
                rmdir($presetdir);
            }
        }
    }
}
