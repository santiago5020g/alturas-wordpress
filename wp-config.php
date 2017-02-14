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
define('DB_NAME', 'n260m_19422769_wp18');

/** MySQL database username */
define('DB_USER', '19422769_1');

/** MySQL database password */
define('DB_PASSWORD', 'f0SpP9(b8(');

/** MySQL hostname */
define('DB_HOST', 'sql312.byetcluster.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'nivj2s9dvgefswa3luhal1cvnifblbkshtqyjg3tmmniyikwcnglljv68opn08b9');
define('SECURE_AUTH_KEY',  'vgz4xrwxf5mrub397jkh2jow820fujd29bi7hhgau6lpwjlfj4qqfav1hwl2wjh8');
define('LOGGED_IN_KEY',    'rqomkkzc5ndj0sjtdgbtjarwt0oqyhszvxa2jz3c27xgfmddrpzcqpsnexigoaga');
define('NONCE_KEY',        'rxhcw9xkcemg0tkllreudaa0g6vtyt26o1iqa66ro60eyh1cx7eyci9qzhos5bkw');
define('AUTH_SALT',        'x3e2y55ixspd2f6zxf32bkpwohyxyyh1babrauhf3aoagqqmc1deepuve66d0tex');
define('SECURE_AUTH_SALT', 'ude4y6e8otamsnnizp3crpxuxx2svlauhahnfxavlgh8lovtgsnqtg9nnd7ovbvf');
define('LOGGED_IN_SALT',   'zyb1ow8tt2s2yagsql3msffmwktmhzmf081pweiunhvsdmqztpejarkcjihg3kmc');
define('NONCE_SALT',       'ajkyytvxxaogl3ej43plefa0zuo14xr9iyl9pvahdm59xp1vvvx9gunra9v4jpnm');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpnj_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
