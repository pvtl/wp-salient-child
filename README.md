# PVTL WP Boilerplate

This is a [Salient child theme](https://themeforest.net/item/salient-responsive-multipurpose-theme/4363266), with:

- Laravel Mix - for frontend asset tooling
- Custom Page Builder block examples
- Custom Widget boilerplate
- Lots of developer friendly, handy tooling such as PHPCS, eslint, editorconfig and more

## Requirements

For code consistency, please ensure you have the following installed in your environment/IDE:

- `editor config` (for `.editorconfig`) to share editor config for the project
- `eslint` for JS linting ([how to →](https://medium.com/pvtl/linting-for-react-native-bdbb586ff694#df4e))
- `PHPCS` for PHP linting [(how to →](https://medium.com/@mcnamee/phpcs-code-linting-for-wordpress-c340199364c6))
- `yarn` to compile frontend assets

---

## Quickstart

```bash
# 1. Purchase and install the Parent theme (Salient) into themes
https://themeforest.net/item/salient-responsive-multipurpose-theme/4363266

# 2. Clone this theme repo into your Wordpress Themes directory
git clone git@bitbucket.org:pvtl/wordpress-salient-boilerplate-v3.git web/app/themes/salient-child

# 3. Install and compile front-end dependencies with yarn
( cd web/app/themes/salient-child && yarn )
```

---

## Commands

| Command | Description |
| --- | --- |
| `phpcs` | Lint your PHP Files (Run locally, not in Docker) |
| `yarn development` | Compiles/copies assets to /dist |
| `yarn watch` | Watches your directory and compiles/copies assets to /dist each time you press save on a SCSS or JS file. Uses LiveReload to automatically inject assets into any open browser. Note that it polls a live reload server on port 3000. |
| `yarn production`<br />or<br />`yarn prod` | Compiles/minifies/copies assets to /dist ready for production |
| `yarn lint-js` | Provides a report on your JS, against the code styleguide |

---

## Structure

| Directory | Description |
| --- | --- |
| `/acf-json` | ACF config |
| `/assets` | Frontend assets (scss, js, images) working files |
| `/assets/images` | Frontend assets (scss, js, images) working files |
| `/assets/js` | Frontend assets (scss, js, images) working files |
| `/assets/scss` | SCSS files |
| `/assets/scss/accordion` | Accordion/toggle style overrides |
| `/assets/scss/fonts` | Examples for including custom fonts |
| `/assets/scss/footer` | Styles relating to the footer |
| `/assets/scss/forms` | Form style overrides & boilerplate |
| `/assets/scss/general` | General styles that are used site-wide + small utility styles |
| `/assets/scss/header` | Styles relating to the header |
| `/assets/scss/pvtl-accordion` | Styles for the example accordion Page Builder element |
| `/assets/scss/pvtl-table` | Styles for the example table Page Builder element |
| `/assets/scss/variables` | SCSS variables. e.g. colours, sizes, etc. |
| `/dist` | Compiled frontend asset code (that you should not touch - but should be committed to the repo) |
| `/library` | Libraries and functions that are registered on theme boot and 'globally' accessible |
| `/vc-elements` | Custom Page Builder element examples. These are auto-loaded by functions.php |
| `/widgets` | Wordpress widgets |

---
