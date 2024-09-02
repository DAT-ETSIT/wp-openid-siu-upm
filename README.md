# WP-OpenID-SIU-UPM

A WordPress plugin to authenticate users via a OpenID Provider. This plugin is based on <a href="https://github.com/nicko170/wp-openid">nicko170's wp-openid</a> and it is adapted to work seamlessly with UPM's SIU.

![The WordPress Login Page](docs/images/login_page.png?raw=true)

## Installation

1. Download the latest release
   from [GitHub Releases](https://github.com/DAT-ETSIT/wp-openid-siu-upm/releases/latest/download/wp-openid-siu-upm.zip)
2. In WordPress, go to **Plugins** > **Add New** > **Upload Plugin** and upload the zip file.
3. Activate the plugin.
4. A new **OpenID** menu item will appear in the WordPress admin Settings menu.
5. Follow the instructions on the Settings page to configure the plugin.

## Setting up Keycloak

1. If you don't already have a Keycloak
   instance, [you can run it up in Docker](https://www.keycloak.org/guides#getting-started)
2. Sign in to your Keycloak instance with your administrator account.
3. From the Admin dashboard, go to **Clients** > **Create**.
4. Enter the following values:
    - **Client Type**: OpenID Connect
    - **Client ID**: wordpress
    - **Name**: WordPress

5. Click **Next**, and enable Client Authentication. You can leave the other options as their defaults.
6. Click **Save**, and set your URLs:
    - **Root URL**: `https://example.com/`
    - **Valid Redirect URIs**: `https://example.com/index.php?rest_route=/openid/callback`
    - **Admin URL**: `https://example.com/wp-admin`
    - The other URLs can be left as their defaults.
7. Click **Save**, and copy the **Client ID** and **Client Secret** values from the **Credentials** tab.

## Configuration

The plugin requires the following configuration options:

1. Metadata URL (e.g. `https://example.okta.com/.well-known/openid-configuration` or for
   Keycloak `https://example.com/auth/realms/example/.well-known/openid-configuration`)
2. Redirect URI (e.g. `https://example.com/wp-login.php?openid=callback`)
3. Client ID (e.g. `0oa1b2c3d4e5f6g7h8i9j`)
4. Client Secret (e.g. `0oa1b2c3d4e5f6g7h8i9j0oa1b2c3d4e5f6g7h8i9j`)

You can set these options via the Settings > Okta page in the WordPress admin, or in your `wp-config.php` file if you
don't want them to be editable by other users:

```php
define('WP_OPENID_METADATA_URL', 'https://example.okta.com/.well-known/openid-configuration');
define('WP_OPENID_REDIRECT_URI', 'https://example.com/wp-login.php?openid=callback');
define('WP_OPENID_CLIENT_ID', '0oa1b2c3d4e5f6g7h8i9j');
define('WP_OPENID_CLIENT_SECRET', '0oa1b2c3d4e5f6g7h8i9j0oa1b2c3d4e5f6g7h8i9j');
```

![Settings Page](docs/images/settings_page.png?raw=true)

## Mapping User Attributes

You can map user attributes from your OpenID Provider to WordPress user meta fields using the Settings > OpenID page.

The following WordPress user attributes are supported:

- user_login: The user's login username
- user_url: The user's website URL
- user_email: The user's email address
- display_name: The user's display name
- nickname: The user's nickname
- first_name: The user's first name
- last_name: The user's last name

The following OpenID Connect attributes are supported:

- sub: The user's unique identifier
- preferred_username: The user's preferred username
- name: The user's full name
- given_name: The user's first name
- family_name: The user's last name
- middle_name: The user's middle name
- nickname: The user's nickname
- profile: The user's profile page
- picture: The user's profile picture
- website: The user's website
- email: The user's email address

**This plugin will also add the `upmClassifCode` values to user metadata.**

![Attribute Mapping](docs/images/attribute_mapping.png?raw=true)

## User matching is performed by matching:

- The `sub` claim from the ID Token to the `openid_id` meta field on the user
- The `email` claim from the ID Token to the `user_email` field on the user
- The `preferred_username` claim from the ID Token to the `user_login` field on the user

If you have remapped the `email` or `preferred_username` claims, your mapping will be used for user matching, before
falling back to `email` and `preferred_username` respectively.

If a user is not found, a new user will be created with the attributes as mapped in the Settings > OpenID page.

## Security

If you discover any security related issues, please email me at [nick@npratley.net](mailto:nick@npratley.net) instead of
using the issue tracker.

## Credits

- [Nick Pratley](https://github.com/nicko170)
- [Pablo Fernández López](https://github.com/pablofl01)
- [DAT-ETSIT UPM](https://github.com/DAT-ETSIT)

## License

GNU General Public License v3.0

Copyright (c) 2023 Nick Pratley
