# Premium Timber Hub Block

Custom WordPress block theme for Premium Timber Hub — a single-page B2B
website for West African timber export.

## Requirements

- WordPress 6.7+ (FSE / block theme)
- PHP 7.4+

## Structure

- `theme.json` — colour palette, fluid typography, self-hosted fonts
- `style.css` — theme header + global CSS
- `functions.php` — enqueues, SEO meta, robots/noindex, RFQ form shortcode
- `parts/` — header and footer template parts
- `templates/` — front-page, page, index, single, 404
- `assets/fonts/` — self-hosted Fraunces + Inter (WOFF2)

## Notes

- All business facts are placeholders until confirmed. See the project
  `docs/launch-checklist.md`.
- RFQ form recipient is set in `functions.php` via `PTH_ENQUIRY_TO`.
