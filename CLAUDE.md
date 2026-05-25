# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a custom WordPress theme for **SV Otzing 1946 e.V.**, a German sports club. The theme is a classic (non-block) WordPress theme written in PHP, CSS, and vanilla JavaScript.

The WordPress site lives at `/Users/ts/Studio/svotzing/` and this theme is installed at `wp-content/themes/sv-otzing-classic-theme/`.

## Development Setup

There is no build step. CSS and JS are plain files — edit them directly and reload the browser.

To work with the WordPress site locally, use the WordPress Developer MCP tools (`wpdev_*`) or WordPress Studio. The site must be running before changes are visible.

## Architecture

### Template Hierarchy
- `front-page.php` — homepage (custom layout with news gallery, BFV widget, sponsor slider)
- `page.php` — generic page template
- `single.php` — single post/news article
- `archive.php` — post archive/category listings
- `vorstand.php` — page template (`Template Name: Vorstand`) for displaying board members
- `header.php` / `footer.php` — shared layout wrappers
- `404.php` — not found page
- `main-page.php` — appears to be an alternate page layout

### `functions.php` Registers
- **Nav menus**: `main_menu` (desktop), `top-left-menu` (top bar), `mobile_menu`
- **Custom post types**: `vorstand` (board members) and `sponsor` (sponsors with `sponsor_url` ACF field)
- **Customizer settings**: `facebook_url`, `instagram_url`, `whatsapp_url` (under "Social Media" panel)
- **SVG upload support** via `cc_mime_types`
- **Categories on pages** via `add_categories_to_pages`
- **Helper functions**: `feather_icon($name, $w, $h, $classes)` (echoes) and `feather_icon_svg(...)` (returns string)

### Styles
- `css/theme.css` — global styles; enqueued on all pages
- `css/front-page.css` — homepage-only styles; enqueued conditionally via `is_front_page()`
- CSS custom properties in `:root`: `--red` (#d32f2f), `--font-heading` (Oswald), `--font-body` (Roboto), `--container-width` (960px)

### JavaScript
- `js/menu.js` — mobile menu behavior
- `js/gallery.js` — initializes two Swiper instances: `.swiper` (general/mobile news) and `.sponsor-swiper` (footer sponsors carousel)

### Third-party Assets (vendored in `assets/`)
- `assets/swiper/` — Swiper.js 11.1.3 (slider library used for mobile news and sponsor footer)
- `assets/feather/feather-sprite.svg` — Feather Icons sprite; icons referenced via `<use href="...#icon-name">`
- `assets/fonts/` — local fonts

### External Dependencies
- **BFV Widget** — loaded from `widget-prod.bfv.de` in `header.php`; used on the homepage to show upcoming matches. Club ID: `00ES8GNI4S00000TVV0AG08LVUPGND5I`
- **ACF (Advanced Custom Fields)** — used in templates for fields: `banner_bild`, `banner_link`, `mitglieder_bild` (on "Startseite" page), `funktion`, `e-mail`, `telefon` (on `vorstand` CPT), `sponsor_url` (on `sponsor` CPT)

### Navigation Walker
`header.php` defines `Desktop_Overview_Walker` (class) and an anonymous walker for mobile. Both inject an "Übersicht" overview link as the first child of dropdown submenus, pointing to the parent item's URL.

## Content Structure
- News posts use the `news` category; the homepage queries for `category_name => 'news'`
- The homepage reads ACF fields from the page titled **"Startseite"** (hardcoded via `get_page_by_title`)
- `vorstand` and `sponsor` CPTs are ordered by `menu_order ASC`