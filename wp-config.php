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

// ** MySQL settings ** //
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
define('AUTH_KEY',         'r2ChYToqMCH1rZC1vKLtOBEtiBrDNsBaLVvMR3z9Anz6LfUvjiY2rBmpO1DBL8B3jnGOqFBIfdykD8Y0UOJEDQ==');
define('SECURE_AUTH_KEY',  'RB4lSyM5Gfdu/PPjR//cPxp9TgtHjuPSGK3obWsEh62iL8R95yk2FqJnNcjlkTcJ2jufNHuk0uvr6YkKdIlt1g==');
define('LOGGED_IN_KEY',    'DdGm06QprOk2Ht7ESKTW0L+6he5p4mkQfdiPa95OyL3cvhkUvDCYxhoo/7A/BVKJK/Fb0fAv+MygUcoIqZg1vw==');
define('NONCE_KEY',        'sp/AfhLFnjDcmUoyOzeOR8DAj1ZW6jM6kUuGiyLOLj6TisFC6yP5S5nyjCZkbgr26b/qYMMNUM1rpcKm104bAw==');
define('AUTH_SALT',        'T9p+Y373ISr6bLWNpAjusqvxXnZlGoU87TKcvRklTTNCi1/3ymNRdlUg1/CeCYXCWuYuTEOMf2Q6Il6b6YmAmg==');
define('SECURE_AUTH_SALT', 'fZqn/2lp4a33VCnWOPthh/FFEY6IiqAWQvoqjjMBIqrCNZtqeWRPN/R5Wdcc0PQGf/MEwseSEMmXX5oOo3GLyA==');
define('LOGGED_IN_SALT',   'xPUlS8+a+dEnTEtieiTbAv0PQSJ8CnS8Mtb1eobgDkfe3oRPI7D6NdwhSfXmAwVgww7ljdBCIlsp4ANgqE7s3g==');
define('NONCE_SALT',       '7VHaqkiGFx7q67HS//6YxK3AxJ/+eYcuvdAG8G6iiGUyvwgmjKnB+rO4WZoLI+pLMz+NRUgDkWOER4sx7oP9ew==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
