@theme_dsgovbr
Feature: Gov.BR DS theme – accessibility
  In order to use Moodle in conformance with accessibility standards
  As any user of the Gov.BR DS theme
  I need landmark regions, skip links, focus indicators, and ARIA
  attributes to be present on every page

  # ---------------------------------------------------------------------------
  # Skip link
  # ---------------------------------------------------------------------------

  @javascript
  Scenario: A skip-to-content link is present on the site home page
    Given the following config values are set as admin:
      | theme | dsgovbr |
    And I log in as "admin"
    When I am on site homepage
    Then ".skip-link, a[href='#maincontent'], a[href='#region-main']" "css_element" should exist

  @javascript
  Scenario: A skip-to-content link is present on the login page
    Given the following config values are set as admin:
      | theme | dsgovbr |
    When I am on the "login" page
    Then ".skip-link, a[href='#maincontent'], a[href='#region-main']" "css_element" should exist

  # ---------------------------------------------------------------------------
  # ARIA landmarks
  # ---------------------------------------------------------------------------

  @javascript
  Scenario: The Gov.BR signature bar has a banner role
    Given the following config values are set as admin:
      | theme | dsgovbr |
    And I log in as "admin"
    When I am on site homepage
    Then "div.govbr-header-top[role='banner']" "css_element" should exist

  @javascript
  Scenario: The main content region has an ARIA label
    Given the following config values are set as admin:
      | theme | dsgovbr |
    And I log in as "admin"
    When I am on site homepage
    Then "section#region-main[aria-label]" "css_element" should exist

  @javascript
  Scenario: The side block region has an ARIA label
    Given the following config values are set as admin:
      | theme | dsgovbr |
    And I log in as "admin"
    When I am on site homepage
    Then "section#region-pre[aria-label], #region-main" "css_element" should exist

  # ---------------------------------------------------------------------------
  # Image alt text
  # ---------------------------------------------------------------------------

  @javascript
  Scenario: The Gov.BR logo in the signature bar has non-empty alt text
    Given the following config values are set as admin:
      | theme | dsgovbr |
    And I log in as "admin"
    When I am on site homepage
    Then the "alt" attribute of "div.govbr-header-top img.govbr-logo" "css_element" should not be empty

  @javascript
  Scenario: The Gov.BR logo on the login page has non-empty alt text
    Given the following config values are set as admin:
      | theme | dsgovbr |
    When I am on the "login" page
    Then the "alt" attribute of "div.govbr-header-top img.govbr-logo" "css_element" should not be empty

  # ---------------------------------------------------------------------------
  # Page title
  # ---------------------------------------------------------------------------

  @javascript
  Scenario: The page has a non-empty title on the site home page
    Given the following config values are set as admin:
      | theme | dsgovbr |
    And I log in as "admin"
    When I am on site homepage
    Then the page title should not be empty

  @javascript
  Scenario: The login page has a non-empty title
    Given the following config values are set as admin:
      | theme | dsgovbr |
    When I am on the "login" page
    Then the page title should not be empty
