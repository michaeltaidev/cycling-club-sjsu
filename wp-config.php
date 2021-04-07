<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'oh+ZOorIQbVbD8VZXwY7nEAK6pw173yl4zRtWuVDQrq9NyaNloVPW+PK2PRxOqFzombZeFdCwC1nl0BXrZrguQ==');
define('SECURE_AUTH_KEY',  'E4FrGbVJ+5Q1i8D/UdpOnlWlJiGjwf4Y4WLVx9sdl/Dlew7E4yLkBobELshJ2B+GE98Uen0Y/DjUJVwmAiDYcQ==');
define('LOGGED_IN_KEY',    'J1ZuNhkHbzGsA7jPRh1nR/NNFJr9Sw6qpkuN2uygQzdrCkX3LaO0FfZ+7hxx8iIzpArAKr+RjMw8R3JXNeSM9A==');
define('NONCE_KEY',        'QhuBYN/xqnuvJ2UuxIRJ+a9rpUmOGw4EkwSzJmAqxGh7UI0hU/zmZ9aPngmV+pKZ1583ro4bOhexzOwoL+xTAA==');
define('AUTH_SALT',        'eR9w+7uZtWZkOgnJB6aZ1n97wJ4i+X+rdnBnTvnduPxveWsAVMGki4uzTMy/4Kk9L0IYgsQyV+m42+ieF2Xwmw==');
define('SECURE_AUTH_SALT', 'VKDIvp8BDX4zranjYoqlbxDUkki5WgrMmfXGesOTbAWhFUG27yGBoJeT7AbxpmD1RVfsKuG51fg6fP4gwUV5jQ==');
define('LOGGED_IN_SALT',   'ayRnxoutkJPilDRTzAqPhbG+jSqFlzeH00bwpz497vInJ0KVkk5GuBMKwogfWmP0wYvd/fdkwBt301ELQTftGg==');
define('NONCE_SALT',       'XyTfHuI66XTRJS0UzPkWlicK42nNrpvPM5tEtit5ORBQIgzJxtpEEhOTqKOcfzFIUd2JDfJspgj8vOBrhDlkQw==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
