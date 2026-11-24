# Changelog

## 2.0.0

Fork of `diablomedia/zendframework1-dojo`, published as `gizmocraft/zendframework1-dojo`.

### Breaking changes

- Requires PHP `>=8.5`. Tested on PHP 8.5 and 8.6.
- Package renamed from `diablomedia/zendframework1-dojo` to `gizmocraft/zendframework1-dojo`. It now requires the `gizmocraft/zendframework1-*` forks (exception, loader, json, registry, filter, view, form at `^2.0.0`; config at `^3.0.0`).
- The default CDN settings changed, because the old defaults no longer work as intended. The configuration API (`setCdnBase()`, `setCdnVersion()`, `setCdnDojoPath()`, the `cdnBase`, `cdnVersion` and `cdnDojoPath` options) is unchanged.
  - `Zend_Dojo_View_Helper_Dojo_Container::$_cdnVersion` default: `1.5.0` -> `1.14.1`, the newest Dojo 1.x release on the Google CDN.
  - `Zend_Dojo::CDN_BASE_GOOGLE`: `http://ajax.googleapis.com/ajax/libs/dojo/` -> `https://ajax.googleapis.com/ajax/libs/dojo/` (no mixed content on HTTPS pages).
  - `Zend_Dojo::CDN_DOJO_PATH_GOOGLE`: `/dojo/dojo.xd.js` -> `/dojo/dojo.js`. The Google CDN has no `dojo.xd.js` after Dojo 1.6.1, and Dojo 1.7 and later load cross-domain through `dojo.js`. To pin Dojo 1.6.1 or older, call `setCdnVersion('1.6.1')` and `setCdnDojoPath('/dojo/dojo.xd.js')`.
  - `Zend_Dojo::CDN_BASE_AOL` and `Zend_Dojo::CDN_DOJO_PATH_AOL` are kept for compatibility and marked `@deprecated`. The AOL CDN (`o.aolcdn.com`) no longer serves Dojo (HTTP 403). `CDN_BASE_AOL` now uses `https://`.
  - Checked with HTTP requests: `https://ajax.googleapis.com/ajax/libs/dojo/1.14.1/dojo/dojo.js`, `.../dijit/themes/tundra/tundra.css`, `.../dijit/themes/claro/claro.css` and `.../dojo/resources/dojo.css` answer 200. The markup was not run in a browser.
  - Applications that need Dojo 1.15 or later (the Google CDN stops at 1.14.1) can use `setCdnBase('https://cdnjs.cloudflare.com/ajax/libs/dojo/')` with their own path layout, or a local install via `setLocalPath()`.

### Other changes

- No other public signatures changed. The package renders on PHP 8.5 and 8.6 without deprecations (form, view helpers, containers, data store, checked with a smoke script besides the test suite).
- Dev dependencies upgraded (PHPUnit 13, PHPStan 2.3, php-cs-fixer 3.95, GrumPHP 2.27). Dropped `composer-require-checker`, which has no release for PHP 8.6.
- Tests migrated to PHPUnit 13 attributes (`#[Group]`, `#[DoesNotPerformAssertions]` instead of annotations, which PHPUnit 12+ ignores).
- CI runs PHP 8.5 and 8.6.
