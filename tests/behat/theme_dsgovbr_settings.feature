@theme_dsgovbr
Feature: Gov.BR DS theme – admin settings
  In order to customise the Gov.BR DS theme
  As a site administrator
  I need to configure presets, logo, background image, brand colour, and
  raw SCSS through the administration interface

  # ---------------------------------------------------------------------------
  # Settings page navigation
  # ---------------------------------------------------------------------------

  @javascript
  Scenario: Admin can reach the theme settings page
    Given the following config values are set as admin:
      | theme | dsgovbr |
    And I log in as "admin"
    When I navigate to "Appearance > Themes > Gov.BR Design System" in site administration
    Then I should see "Gov.BR DS Theme Settings"

  @javascript
  Scenario: The General tab is the default tab on the settings page
    Given the following config values are set as admin:
      | theme | dsgovbr |
    And I log in as "admin"
    When I navigate to "Appearance > Themes > Gov.BR Design System" in site administration
    Then I should see "Theme preset"

  @javascript
  Scenario: The Advanced tab is accessible from the settings page
    Given the following config values are set as admin:
      | theme | dsgovbr |
    And I log in as "admin"
    When I navigate to "Appearance > Themes > Gov.BR Design System" in site administration
    And I follow "Advanced"
    Then I should see "Raw SCSS"

  # ---------------------------------------------------------------------------
  # General tab – Preset
  # ---------------------------------------------------------------------------

  @javascript
  Scenario: The theme preset selector is visible on the General tab
    Given the following config values are set as admin:
      | theme | dsgovbr |
    And I log in as "admin"
    When I navigate to "Appearance > Themes > Gov.BR Design System" in site administration
    Then I should see "Theme preset"

  @javascript
  Scenario: The preset selector contains the Default option
    Given the following config values are set as admin:
      | theme | dsgovbr |
    And I log in as "admin"
    When I navigate to "Appearance > Themes > Gov.BR Design System" in site administration
    Then the "Theme preset" select box should contain "Default"

  @javascript
  Scenario: The preset selector contains the Plain option
    Given the following config values are set as admin:
      | theme | dsgovbr |
    And I log in as "admin"
    When I navigate to "Appearance > Themes > Gov.BR Design System" in site administration
    Then the "Theme preset" select box should contain "Plain"

  @javascript
  Scenario: Admin can save the Plain preset and the page confirms the change
    Given the following config values are set as admin:
      | theme | dsgovbr |
    And I log in as "admin"
    When I navigate to "Appearance > Themes > Gov.BR Design System" in site administration
    And I select "Plain" from the "Theme preset" singleselect
    And I press "Save changes"
    Then I should see "Changes saved"

  @javascript
  Scenario: Admin can restore the Default preset and the page confirms the change
    Given the following config values are set as admin:
      | theme | dsgovbr |
    And I log in as "admin"
    When I navigate to "Appearance > Themes > Gov.BR Design System" in site administration
    And I select "Default" from the "Theme preset" singleselect
    And I press "Save changes"
    Then I should see "Changes saved"

  # ---------------------------------------------------------------------------
  # General tab – Logo
  # ---------------------------------------------------------------------------

  @javascript
  Scenario: The logo upload field is visible on the General tab
    Given the following config values are set as admin:
      | theme | dsgovbr |
    And I log in as "admin"
    When I navigate to "Appearance > Themes > Gov.BR Design System" in site administration
    Then I should see "Logo"

  # ---------------------------------------------------------------------------
  # General tab – Background image
  # ---------------------------------------------------------------------------

  @javascript
  Scenario: The background image upload field is visible on the General tab
    Given the following config values are set as admin:
      | theme | dsgovbr |
    And I log in as "admin"
    When I navigate to "Appearance > Themes > Gov.BR Design System" in site administration
    Then I should see "Background image"

  # ---------------------------------------------------------------------------
  # General tab – Brand colour
  # ---------------------------------------------------------------------------

  @javascript
  Scenario: The brand colour field is visible on the General tab
    Given the following config values are set as admin:
      | theme | dsgovbr |
    And I log in as "admin"
    When I navigate to "Appearance > Themes > Gov.BR Design System" in site administration
    Then I should see "Brand colour"

  @javascript
  Scenario: The brand colour field shows the Gov.BR default blue
    Given the following config values are set as admin:
      | theme | dsgovbr |
    And I log in as "admin"
    When I navigate to "Appearance > Themes > Gov.BR Design System" in site administration
    Then the field "Brand colour" matches value "#1351B4"

  @javascript
  Scenario: Admin can save a new brand colour
    Given the following config values are set as admin:
      | theme | dsgovbr |
    And I log in as "admin"
    When I navigate to "Appearance > Themes > Gov.BR Design System" in site administration
    And I set the field "Brand colour" to "#0C326F"
    And I press "Save changes"
    Then I should see "Changes saved"

  # ---------------------------------------------------------------------------
  # Advanced tab – Raw SCSS
  # ---------------------------------------------------------------------------

  @javascript
  Scenario: The Raw initial SCSS field is visible on the Advanced tab
    Given the following config values are set as admin:
      | theme | dsgovbr |
    And I log in as "admin"
    When I navigate to "Appearance > Themes > Gov.BR Design System" in site administration
    And I follow "Advanced"
    Then I should see "Raw initial SCSS"

  @javascript
  Scenario: The Raw SCSS field is visible on the Advanced tab
    Given the following config values are set as admin:
      | theme | dsgovbr |
    And I log in as "admin"
    When I navigate to "Appearance > Themes > Gov.BR Design System" in site administration
    And I follow "Advanced"
    Then I should see "Raw SCSS"

  @javascript
  Scenario: Admin can enter and save custom pre-SCSS
    Given the following config values are set as admin:
      | theme | dsgovbr |
    And I log in as "admin"
    When I navigate to "Appearance > Themes > Gov.BR Design System" in site administration
    And I follow "Advanced"
    And I set the field "Raw initial SCSS" to "$custom-var: #ff0000;"
    And I press "Save changes"
    Then I should see "Changes saved"

  @javascript
  Scenario: Admin can enter and save custom post-SCSS
    Given the following config values are set as admin:
      | theme | dsgovbr |
    And I log in as "admin"
    When I navigate to "Appearance > Themes > Gov.BR Design System" in site administration
    And I follow "Advanced"
    And I set the field "Raw SCSS" to ".custom-class { color: red; }"
    And I press "Save changes"
    Then I should see "Changes saved"
