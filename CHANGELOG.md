# Changelog for Alpha

## 2.0.0

This is a fairly massive overhaul of Alpha. There are breaking changes, so please be aware if you're planning on upgrading an older Alpha-based theme. The most noticeable change is the fact that we've gotten rid of the tiered directory structure in favor of a more standard flat directory structure. This was done primarily to make child theming and deploying easier.

Because so much has changed in this version. I'm not going to point everything out in the release, but the following is a list of all major changes since the last version. For a full breakdown, read the [commit history](https://github.com/FlagshipWP/alpha/commits/master).

- Abstracted all Grunt dependencies into a separate [config](https://github.com/FlagshipWP/flagship-wp-theme-config) and [loader](https://github.com/FlagshipWP/load-flagship-grunt-config)
- Changed to Node Sass, Node Bourbon, and Node Neat
- Moved footer widgets and author box templates to the [Flagship Library](https://github.com/FlagshipWP/flagship-library)
- Added support for some new features within the Flagship Library
- Added support for new features in WordPress 4.1 and Hybrid Core 2.1
- Added a custom icon font based on [Themicons](https://github.com/cedaro/themicons) which can be modified by adding SVG files to the /icons/ directory
- Added the [Cedaro Skip Link Focus](https://github.com/cedaro/skip-link-focus) script for cross-browser a11y skip links
- Removed Genericons
- Removed Sidr and replaced with a custom mobile menu script
- Made extensive improvements to mobile styling and moved to REM font sizes
- Improved and modernized comment styling
- Added additional Sass variables and improved Sass partial segmentation
- Various coding standards and general code improvements

## 1.1.0

Not a whole lot has changed feature-wise in this release, but a number of improvements have been made under the hood. In addition to the master and develop branches, we're now also maintaining a [node-sass branch](https://github.com/FlagshipWP/alpha/tree/node-sass) which compiles faster than the Ruby Sass version.

### New Features

- Author Box Template

### Improvements

- Moved Flagship-specific code into an independent library (https://github.com/FlagshipWP/flagship-library)
- Various style improvements
- Improved template flexibility by increasing the use of `hybrid_attr`
- Switched to jit-grunt for improved task run times
- Made Genericons a bower dependency
- All 3rd party dependencies have been updated and tested

### Deprecations

- The `alpha_footer_creds` function has been deprecated and will be removed on the next update.


## 1.0.0

First public release.
