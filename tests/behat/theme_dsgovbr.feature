@theme_dsgovbr
Feature: Gov.BR DS theme appearance and accessibility
  In order to use the Gov.BR Design System theme
  As a Moodle user
  I need to see the theme applied with the correct Gov.BR visual identity

  Background:
    Given I log in as "admin"

  @javascript
  Scenario: Admin can select the dsgovbr theme in the theme selector
    When I navigate to "Appearance > Themes > Theme selector" in site administration
    Then I should see "Gov.BR Design System"

  @javascript
  Scenario: Gov.BR signature bar is visible on the home page after enabling the theme
    Given the following config values are set as admin:
      | theme | dsgovbr |
    When I am on site homepage
    Then "div.govbr-header-top" "css_element" should exist

  @javascript
  Scenario: Gov.BR logo is visible in the signature bar
    Given the following config values are set as admin:
      | theme | dsgovbr |
    When I am on site homepage
    Then "img.govbr-logo" "css_element" should exist

  @javascript
  Scenario: The login page is rendered using the dsgovbr theme
    Given the following config values are set as admin:
      | theme | dsgovbr |
    When I am on the "login" page
    Then "div.govbr-header-top" "css_element" should exist

  @javascript
  Scenario: Admin can access the dsgovbr theme settings page
    Given the following config values are set as admin:
      | theme | dsgovbr |
    When I navigate to "Appearance > Themes > Gov.BR Design System" in site administration
    Then I should see "Gov.BR DS Theme Settings"

  @javascript
  Scenario: Admin can configure a brand colour in theme settings
    Given the following config values are set as admin:
      | theme | dsgovbr |
    When I navigate to "Appearance > Themes > Gov.BR Design System" in site administration
    Then I should see "Brand colour"

  @javascript
  Scenario: Admin can configure custom SCSS in theme advanced settings
    Given the following config values are set as admin:
      | theme | dsgovbr |
    When I navigate to "Appearance > Themes > Gov.BR Design System" in site administration
    And I follow "Advanced"
    Then I should see "Raw SCSS"
    And I should see "Raw initial SCSS"
