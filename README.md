# moodle-theme_dsgovbr

[![Moodle Plugin CI](https://github.com/cte-zl-ifrn/moodle-theme_dsgovbr/actions/workflows/moodle-ci.yml/badge.svg)](https://github.com/cte-zl-ifrn/moodle-theme_dsgovbr/actions)
[![License: GPL v3](https://img.shields.io/badge/License-GPLv3-blue.svg)](LICENSE.md)

A Moodle theme built in conformance with the [Gov.BR Design System](https://www.gov.br/ds/), extending the default Boost theme.

## Requirements

| Component    | Version     |
|-------------|-------------|
| Moodle      | 5.1 or later |
| theme_boost | 5.1 or later |
| PHP         | 8.1 or later |

## Features

- Full compliance with the Gov.BR Design System visual identity
- Gov.BR institutional header and signature bar
- Customisable logo, background image and brand colour
- Raw SCSS injection (pre and post) for advanced customisation
- Privacy-compliant: no personal data is stored by this theme

## Installation

### Via Moodle Admin Interface

1. Download the latest release ZIP from the [Releases](https://github.com/cte-zl-ifrn/moodle-theme_dsgovbr/releases) page.
2. In Moodle, go to **Site Administration → Plugins → Install plugins**.
3. Upload the ZIP file and follow the on-screen instructions.

### Via Git (manual installation)

```bash
cd /path/to/moodle/theme
git clone https://github.com/cte-zl-ifrn/moodle-theme_dsgovbr.git dsgovbr
```

Then visit **Site Administration → Notifications** to complete the installation.

## Configuration

After installation, go to **Site Administration → Appearance → Themes → Gov.BR DS** to configure:

- **Logo** – upload a custom logo displayed in the navigation bar.
- **Background image** – image shown on the login page background.
- **Brand colour** – primary colour used throughout the theme (default: Gov.BR blue `#1351B4`).
- **Raw SCSS / Raw initial SCSS** – inject custom SCSS code.

## Privacy

This theme does not store any personal data. See [classes/privacy/provider.php](classes/privacy/provider.php) and the [Moodle Privacy API](https://moodledev.io/docs/apis/subsystems/privacy) for details.

## License

This project is licensed under the **GNU General Public License v3.0 or later**. See [LICENSE.md](LICENSE.md) for the full text.

## Authors

Developed by [CTE-ZL IFRN](https://github.com/cte-zl-ifrn).

## Contributing

Contributions are welcome! Please open an issue or submit a pull request on [GitHub](https://github.com/cte-zl-ifrn/moodle-theme_dsgovbr).
