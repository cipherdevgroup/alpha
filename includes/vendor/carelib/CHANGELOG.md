# Changelog for CareLib

# 2.0.0

Welp, so much for back compat! 🤗

We introduced some breaking changes because of a fundamental change in my thinking about how to use the library. Previously, the idea was for the library to be as transparent as possible. Most implementations in our themes included aliases and used the carelib_prefix global to namespace as much of the library to sync up with the theme as possible.

The reasoning behind this was to make it easier to decouple the theme from the library at some point. With namespaced functions and aliases, the guts could be replaced without breaking functionality. In practice, this never happened and lead to more code overhead and less reusable code in our themes.

In this latest version, we've added more echoing functions and moved away from using a unique prefix for filters and other areas in the library. Themes can use CareLib functions and hooks directly without any wrapper functions. Any wrapper functions in themes should be thought more of implementations of library functions than namespace wrappers. In our own starter theme, we still have quite a few wrapper functions but no longer allow them to accept arguments. They pass arguments instead of allow arguments to be passed into them.

Anyway, enough rambling. Here are the key changes since 1.0.0:

- Removed an extra hooked action for customizer control styles
- Stopped providing image fallbacks by default in our image getter function
- Fixed an undefined index warning in the image getter
- Allowed images to link to things other than the post they're attached to
- Simplified our context function and the body classes we add
- Removed post templates in favor of the new custom post templates in core
- Removed the dashboard features (This was for commercial themes and we've never used it)
- Removed the post styles feature
- Removed the singular template filter now that singular.php is in core
- Added custom hooks that mirror the hooks used in THA
- Added a number of echoing functions for themes to use when printing CareLib functions
- Removed our attachment image gallery function
- Added some basic support for WooCommerce when it's active
- Added a helper to check if Beaver Builder is active on a given page
- Added a package.json file to allow the library to be managed via npm 🤔

# 1.0.0

First stable release! Changes from here forward will be more well-documented and backwards compatible.

## 0.2.0

Too many changes to list. I probably should have released like 10 versions by this point, but nobody is really using this library as far as I can tell, so eh.

The primary reason I'm pushing this release is because we're making some MAJOR changes for the 1.0.0 release. In order to maintain some level of backwards compatibility with our existing projects and themes, we need to tag this version now so they don't all need to be updated.

## 0.1.0

First release.
