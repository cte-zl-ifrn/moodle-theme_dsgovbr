@theme_dsgovbr
Feature: Gov.BR DS theme – core behaviour
  In order to use the Gov.BR Design System theme
  As a site administrator or student
  I need the theme to be selectable, activate correctly, and render the
  Gov.BR visual identity on every page

  # ---------------------------------------------------------------------------
  # Theme activation
  # ---------------------------------------------------------------------------

  @javascript
  Scenario: The dsgovbr theme is listed in the theme selector
    Given I log in as "admin"
    When I navigate to "Appearance > Themes > Theme selector" in site administration
    Then I should see "Gov.BR Design System"

  @javascript
  Scenario: The dsgovbr theme description is shown in the theme selector
    Given I log in as "admin"
    When I navigate to "Appearance > Themes > Theme selector" in site administration
    Then I should see "Gov.BR"

  # ---------------------------------------------------------------------------
  # Gov.BR signature bar – authenticated pages
  # ---------------------------------------------------------------------------

  @javascript
  Scenario: Gov.BR signature bar is present on the site home page
    Given the following config values are set as admin:
      | theme | dsgovbr |
    And I log in as "admin"
    When I am on site homepage
    Then "div.govbr-header-top" "css_element" should exist

  @javascript
  Scenario: Gov.BR logo image is present in the signature bar
    Given the following config values are set as admin:
      | theme | dsgovbr |
    And I log in as "admin"
    When I am on site homepage
    Then "div.govbr-header-top img.govbr-logo" "css_element" should exist

  @javascript
  Scenario: Gov.BR signature bar shows the federal government label
    Given the following config values are set as admin:
      | theme | dsgovbr |
    And I log in as "admin"
    When I am on site homepage
    Then I should see "Governo Federal" in the "div.govbr-header-top" "css_element"

  @javascript
  Scenario: Gov.BR logo image has an alt attribute for screen readers
    Given the following config values are set as admin:
      | theme | dsgovbr |
    And I log in as "admin"
    When I am on site homepage
    Then the "alt" attribute of "div.govbr-header-top img.govbr-logo" "css_element" should contain "Gov"

  # ---------------------------------------------------------------------------
  # Gov.BR signature bar – login page (unauthenticated)
  # ---------------------------------------------------------------------------

  @javascript
  Scenario: Gov.BR signature bar is present on the login page
    Given the following config values are set as admin:
      | theme | dsgovbr |
    When I am on the "login" page
    Then "div.govbr-header-top" "css_element" should exist

  @javascript
  Scenario: Gov.BR logo image is present on the login page
    Given the following config values are set as admin:
      | theme | dsgovbr |
    When I am on the "login" page
    Then "div.govbr-header-top img.govbr-logo" "css_element" should exist

  # ---------------------------------------------------------------------------
  # Dashboard layout
  # ---------------------------------------------------------------------------

  @javascript
  Scenario: Gov.BR signature bar is present on the My Dashboard page
    Given the following config values are set as admin:
      | theme | dsgovbr |
    And I log in as "admin"
    When I am on the "My courses" page
    Then "div.govbr-header-top" "css_element" should exist

  # ---------------------------------------------------------------------------
  # Course page layout
  # ---------------------------------------------------------------------------

  @javascript
  Scenario: Gov.BR signature bar is visible on a course page
    Given the following config values are set as admin:
      | theme | dsgovbr |
    And the following "courses" exist:
      | fullname    | shortname |
      | Test Course | TC001     |
    And I log in as "admin"
    When I am on the "TC001" "course" page
    Then "div.govbr-header-top" "css_element" should exist

  # ---------------------------------------------------------------------------
  # Page structure – main content region
  # ---------------------------------------------------------------------------

  @javascript
  Scenario: The main content region is rendered on the site home page
    Given the following config values are set as admin:
      | theme | dsgovbr |
    And I log in as "admin"
    When I am on site homepage
    Then "#region-main" "css_element" should exist

  @javascript
  Scenario: The page wrapper is rendered on the site home page
    Given the following config values are set as admin:
      | theme | dsgovbr |
    And I log in as "admin"
    When I am on site homepage
    Then "#page-wrapper" "css_element" should exist
