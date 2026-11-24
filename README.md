# Zend Framework 1 - Dojo

[![Build](https://github.com/gizmocraftcom/zf1-dojo/workflows/Build/badge.svg?event=push)](https://github.com/gizmocraftcom/zf1-dojo/actions?query=workflow%3ABuild+event%3Apush)
[![codecov](https://codecov.io/gh/gizmocraftcom/zf1-dojo/branch/master/graph/badge.svg)](https://codecov.io/gh/gizmocraftcom/zf1-dojo)
[![Latest Stable Version](https://poser.pugx.org/gizmocraft/zendframework1-dojo/v/stable)](https://packagist.org/packages/gizmocraft/zendframework1-dojo)
[![Total Downloads](https://poser.pugx.org/gizmocraft/zendframework1-dojo/downloads)](https://packagist.org/packages/gizmocraft/zendframework1-dojo)
[![License](https://poser.pugx.org/gizmocraft/zendframework1-dojo/license)](https://packagist.org/packages/gizmocraft/zendframework1-dojo)


This is just the Zend_Dojo component extracted from our fork of the Zend Framework 1 repo (https://github.com/gizmocraftcom/zf1).

Originally forked from the upstream repository https://github.com/diablomedia/zf1-dojo. Copyright and license of the original authors are kept in LICENSE.txt.

## Dojo CDN defaults

Unless you configure a local path (`setLocalPath()`) or another CDN (`setCdnBase()`, `setCdnVersion()`, `setCdnDojoPath()`), the Dojo view helper loads Dojo 1.14.1 from `https://ajax.googleapis.com/ajax/libs/dojo/1.14.1/dojo/dojo.js`. This is the newest Dojo 1.x release on the Google CDN. The previous defaults (Dojo 1.5.0 over HTTP with `dojo.xd.js`) are replaced, and the AOL CDN constants are deprecated because that CDN no longer serves Dojo. See `CHANGELOG.md` for how to pin an older version.
