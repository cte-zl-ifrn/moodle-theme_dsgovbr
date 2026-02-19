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
 * Custom Behat step definitions for the dsgovbr theme.
 *
 * @package   theme_dsgovbr
 * @category  test
 * @copyright 2024 CTE-ZL IFRN
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// NOTE: No MOODLE_INTERNAL check here – Behat context files are loaded directly
// by the Behat CLI, not through Moodle's normal bootstrap.

use Behat\Behat\Context\Context;
use Behat\Mink\Exception\ExpectationException;

/**
 * Behat context class for theme_dsgovbr acceptance tests.
 *
 * Provides custom step definitions that complement the standard Moodle steps
 * with dsgovbr-specific assertions.
 *
 * @package   theme_dsgovbr
 * @category  test
 * @copyright 2024 CTE-ZL IFRN
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class behat_theme_dsgovbr extends behat_base {

    /**
     * Asserts that the Gov.BR signature bar is visible in the current page.
     *
     * @Then /^the Gov\.BR signature bar should be visible$/
     * @throws ExpectationException If the signature bar is not found.
     */
    public function the_govbr_signature_bar_should_be_visible(): void {
        $session = $this->getSession();
        $page    = $session->getPage();

        $bar = $page->find('css', 'div.govbr-header-top');
        if ($bar === null) {
            throw new ExpectationException(
                'The Gov.BR signature bar (div.govbr-header-top) was not found on the page.',
                $session
            );
        }
    }

    /**
     * Asserts that the Gov.BR logo image is present inside the signature bar.
     *
     * @Then /^the Gov\.BR logo should be visible in the signature bar$/
     * @throws ExpectationException If the logo image is not found.
     */
    public function the_govbr_logo_should_be_visible_in_the_signature_bar(): void {
        $session = $this->getSession();
        $page    = $session->getPage();

        $logo = $page->find('css', 'div.govbr-header-top img.govbr-logo');
        if ($logo === null) {
            throw new ExpectationException(
                'The Gov.BR logo (div.govbr-header-top img.govbr-logo) was not found on the page.',
                $session
            );
        }
    }

    /**
     * Asserts that the current page has a non-empty <title> element.
     *
     * @Then /^the page title should not be empty$/
     * @throws ExpectationException If the page title is empty or missing.
     */
    public function the_page_title_should_not_be_empty(): void {
        $session = $this->getSession();
        $page    = $session->getPage();

        $title = $page->find('css', 'title');
        if ($title === null) {
            throw new ExpectationException(
                'No <title> element found in the page.',
                $session
            );
        }

        $text = trim($title->getText());
        if ($text === '') {
            throw new ExpectationException(
                'The <title> element is present but empty.',
                $session
            );
        }
    }

    /**
     * Asserts that the given attribute of the element matched by CSS selector
     * is not empty.
     *
     * Example usage in a feature:
     *   Then the "alt" attribute of "img.govbr-logo" "css_element" should not be empty
     *
     * NOTE: This step shadows the existing core step pattern only for the
     * "should not be empty" variant; the "should contain" variant is provided
     * by behat_general via the standard Moodle step library.
     *
     * @Then /^the "(?P<attribute>[^"]*)" attribute of "(?P<selector>[^"]*)" "css_element" should not be empty$/
     * @param string $attribute The HTML attribute name to check.
     * @param string $selector  A CSS selector for the element.
     * @throws ExpectationException If the element is not found or the attribute is empty.
     */
    public function the_attribute_of_css_element_should_not_be_empty(string $attribute, string $selector): void {
        $session = $this->getSession();
        $page    = $session->getPage();

        $element = $page->find('css', $selector);
        if ($element === null) {
            throw new ExpectationException(
                "Element '{$selector}' not found on the page.",
                $session
            );
        }

        $value = $element->getAttribute($attribute);
        if ($value === null || trim($value) === '') {
            throw new ExpectationException(
                "The '{$attribute}' attribute of element '{$selector}' is empty or missing.",
                $session
            );
        }
    }
}
