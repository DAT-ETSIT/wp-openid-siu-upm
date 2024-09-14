# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [v0.4.0] - 2024-09-14
### :sparkles: New Features
- [`70fdce4`](https://github.com/DAT-ETSIT/wp-openid-siu-upm/commit/70fdce4fd333539f86b72ce9535ae354cbf5fbb3) - Added given_name and family_name user meta *(commit by [@Pablofl01](https://github.com/Pablofl01))*


## [v0.3.10] - 2024-09-14
### :bug: Bug Fixes
- [`19b7c61`](https://github.com/DAT-ETSIT/wp-openid-siu-upm/commit/19b7c6104b46d4f93fa3a265f66f1d98c802d26d) - Fixed redirect_to URL encoding when params are present *(commit by [@Pablofl01](https://github.com/Pablofl01))*


## [v0.3.9] - 2024-09-03
### :bug: Bug Fixes
- [`0e604f7`](https://github.com/DAT-ETSIT/wp-openid-siu-upm/commit/0e604f700cd5b2f88a11b09efbf73ff94b5495a9) - Stringified upmClassifCode when updating user *(commit by [@Pablofl01](https://github.com/Pablofl01))*


## [v0.3.8] - 2024-09-03
### :bug: Bug Fixes
- [`08630c0`](https://github.com/DAT-ETSIT/wp-openid-siu-upm/commit/08630c0613345e8064f0dce5ca7a037684dc8ca2) - Changed main file name *(commit by [@Pablofl01](https://github.com/Pablofl01))*
- [`c0f47a0`](https://github.com/DAT-ETSIT/wp-openid-siu-upm/commit/c0f47a0db58b637ef08d0284e1a8cc8b0362232e) - upmClassifCodes now stored as string *(commit by [@Pablofl01](https://github.com/Pablofl01))*


## [v0.3.7] - 2024-09-02
### :bug: Bug Fixes
- [`73e636b`](https://github.com/DAT-ETSIT/wp-openid-siu-upm/commit/73e636b18e7022ba1b06b3ef6707ce481ca3b61f) - Updated release name *(commit by [@Pablofl01](https://github.com/Pablofl01))*


## [v0.3.6] - 2024-09-02
### :bug: Bug Fixes
- [`ce91354`](https://github.com/DAT-ETSIT/wp-openid-siu-upm/commit/ce9135419dd47fce9e288a58a17f6a1289cc387d) - Fixed updater slug and updated supported version *(commit by [@Pablofl01](https://github.com/Pablofl01))*


## [v0.3.5] - 2024-09-02
### :bug: Bug Fixes
- [`9f25516`](https://github.com/DAT-ETSIT/wp-openid-siu-upm/commit/9f25516d017cece8a6eebb2dd48f27479d97ecae) - Fixed existing user conflict when logging in with OIDC *(commit by [@Pablofl01](https://github.com/Pablofl01))*


## [v0.3.4] - 2024-09-02
### :sparkles: New Features
- [`e7adeac`](https://github.com/DAT-ETSIT/wp-openid-siu-upm/commit/e7adeac130ad2a6dc7287909fe628c0aa899fc86) - Added upmClassifCode to users and field updating on each login *(commit by [@Pablofl01](https://github.com/Pablofl01))*


## [v0.3.2] - 2023-03-27
### :bug: Bug Fixes
- [`18a0231`](https://github.com/nicko170/wp-openid/commit/18a0231bc7ac67c3498d66bc585c01704301d470) - escape url *(commit by [@nicko170](https://github.com/nicko170))*


## [v0.3.1] - 2023-03-27
### :sparkles: New Features
- [`0e98f30`](https://github.com/nicko170/wp-openid/commit/0e98f3079b31037e0ce9898c0c99a701ef0e0f0b) - rename updater, and disable caching *(commit by [@nicko170](https://github.com/nicko170))*


## [v0.3.0] - 2023-03-27
### :boom: BREAKING CHANGES
- due to [`2f04dd1`](https://github.com/nicko170/wp-openid/commit/2f04dd1deaacd479961a45427827857a5991a8a4) - fix fallback url *(commit by [@nicko170](https://github.com/nicko170))*:

  fix fallback url

- due to [`aa42493`](https://github.com/nicko170/wp-openid/commit/aa4249373b4f1c01fc696beb89ee3a778d3d4e3f) - Removed usage of REST API, and now hook login function for routes. This breaks callback URLs and they will need to be changed. *(commit by [@nicko170](https://github.com/nicko170))*:

  Removed usage of REST API, and now hook login function for routes. This breaks callback URLs and they will need to be changed.


### :bug: Bug Fixes
- [`2f04dd1`](https://github.com/nicko170/wp-openid/commit/2f04dd1deaacd479961a45427827857a5991a8a4) - fix fallback url *(commit by [@nicko170](https://github.com/nicko170))*
- [`aa42493`](https://github.com/nicko170/wp-openid/commit/aa4249373b4f1c01fc696beb89ee3a778d3d4e3f) - Removed usage of REST API, and now hook login function for routes. This breaks callback URLs and they will need to be changed. *(commit by [@nicko170](https://github.com/nicko170))*


## [v0.2.2] - 2023-03-27
### :bug: Bug Fixes
- [`af513eb`](https://github.com/nicko170/wp-openid/commit/af513ebc61641101f753161534043f0a7785235b) - **admin**: Upgrade Link broken on crappy PHP versions *(commit by [@nicko170](https://github.com/nicko170))*


## [v0.2.0] - 2023-03-27
### :sparkles: New Features
- [`35e6bf8`](https://github.com/nicko170/wp-openid/commit/35e6bf86c6f2c2aee455e91678de2c19074b1b06) - Move to cookies+transiets and not sessions for better compatibility *(commit by [@nicko170](https://github.com/nicko170))*
- [`7896cc9`](https://github.com/nicko170/wp-openid/commit/7896cc9ff221f962a941a6ac98b566a92ab1c835) - **docs**: refactor image location *(commit by [@nicko170](https://github.com/nicko170))*
- [`b519134`](https://github.com/nicko170/wp-openid/commit/b5191347a861aa315cd7cc6ef897f6be2bf7e0dc) - login page styling and allow disabling wordpress login page *(commit by [@nicko170](https://github.com/nicko170))*

### :bug: Bug Fixes
- [`24da619`](https://github.com/nicko170/wp-openid/commit/24da619d9df4e3c81809bb7da35f1ad544c2be77) - **workflows**: Fix workflows version action *(commit by [@nicko170](https://github.com/nicko170))*


## [v0.1.1] - 2023-03-26
### :bug: Bug Fixes
- [`a07460a`](https://github.com/nicko170/wp-openid/commit/a07460afa45740f1ad4a26202868174eb0e2eb96) - button not showing *(commit by [@nicko170](https://github.com/nicko170))*


## [v0.0.5] - 2023-03-26
### :sparkles: New Features
- [`b8e1786`](https://github.com/nicko170/wp-openid/commit/b8e1786a4b7dab6cc078aa85627cc33c26afd951) - **workflows**: post changelog to release body *(commit by [@nicko170](https://github.com/nicko170))*
- [`f393651`](https://github.com/nicko170/wp-openid/commit/f393651f216f7b35de6c662bf83c38a32bdef8f7) - **workflows**: release name *(commit by [@nicko170](https://github.com/nicko170))*


## [v0.0.4] - 2023-03-25
### :bug: Bug Fixes
- [`4e24c16`](https://github.com/nicko170/wp-openid/commit/4e24c161a0d6e5f626f71469d7a62c31707fb0ae) - **workflows**: fix workflows for changelog *(commit by [@nicko170](https://github.com/nicko170))*


## [v0.0.2] - 2023-03-25
### :bug: Bug Fixes
- [`616275f`](https://github.com/nicko170/wp-openid/commit/616275f55c8c28e5c3ead718a8702a2f73b10cc8) - **workflows**: Fix action workflows *(commit by [@nicko170](https://github.com/nicko170))*
- [`a2e34ca`](https://github.com/nicko170/wp-openid/commit/a2e34ca9976268fa3d9bd6a6acf53d96de3db265) - **workflows**: Fix action workflows *(commit by [@nicko170](https://github.com/nicko170))*
- [`ce54c55`](https://github.com/nicko170/wp-openid/commit/ce54c55e3e574729bbba900c5d82504eefbfb3ee) - **workflows**: Fix action workflows *(commit by [@nicko170](https://github.com/nicko170))*
- [`736cb3f`](https://github.com/nicko170/wp-openid/commit/736cb3ff6334350eb5fb3518439b4bd88c3eb149) - **workflows**: Fix action workflows *(commit by [@nicko170](https://github.com/nicko170))*


[v0.0.2]: https://github.com/nicko170/wp-openid/compare/v0.0.1...v0.0.2
[v0.0.4]: https://github.com/nicko170/wp-openid/compare/v0.0.3...v0.0.4
[v0.0.5]: https://github.com/nicko170/wp-openid/compare/v0.0.4...v0.0.5
[v0.1.1]: https://github.com/nicko170/wp-openid/compare/v0.1.0...v0.1.1
[v0.2.0]: https://github.com/nicko170/wp-openid/compare/v0.1.1...v0.2.0
[v0.2.2]: https://github.com/nicko170/wp-openid/compare/v0.2.1...v0.2.2
[v0.3.0]: https://github.com/nicko170/wp-openid/compare/v0.2.3...v0.3.0
[v0.3.1]: https://github.com/nicko170/wp-openid/compare/v0.3.0...v0.3.1
[v0.3.2]: https://github.com/nicko170/wp-openid/compare/v0.3.1...v0.3.2
[v0.3.4]: https://github.com/DAT-ETSIT/wp-siu-upm/compare/v0.3.3...v0.3.4
[v0.3.5]: https://github.com/DAT-ETSIT/wp-siu-upm/compare/v0.3.4...v0.3.5
[v0.3.6]: https://github.com/DAT-ETSIT/wp-siu-upm/compare/v0.3.5...v0.3.6
[v0.3.7]: https://github.com/DAT-ETSIT/wp-openid-siu-upm/compare/v0.3.6...v0.3.7
[v0.3.8]: https://github.com/DAT-ETSIT/wp-openid-siu-upm/compare/v0.3.7...v0.3.8
[v0.3.9]: https://github.com/DAT-ETSIT/wp-openid-siu-upm/compare/v0.3.8...v0.3.9
[v0.3.10]: https://github.com/DAT-ETSIT/wp-openid-siu-upm/compare/v0.3.9...v0.3.10
[v0.4.0]: https://github.com/DAT-ETSIT/wp-openid-siu-upm/compare/v0.3.10...v0.4.0
