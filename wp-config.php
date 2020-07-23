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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */


$GLOBALS['SITE_SETTINGS'] = json_decode(file_get_contents(dirname(__FILE__) . '/.siteconf.json'), true);



// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', $SITE_SETTINGS['DB_NAME']);

/** Имя пользователя MySQL */
define('DB_USER', $SITE_SETTINGS['DB_USER']);

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', $SITE_SETTINGS['DB_PASS']);

/** Имя сервера MySQL */
define('DB_HOST', $SITE_SETTINGS['DB_HOST']);

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', $SITE_SETTINGS['DB_CHARSET']);

/** Схема сопоставления. Не меняйте, если не уверены. */
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
define('AUTH_KEY',         '8jmdj0pbcbpufp3gzopz4ifea8rz1cwjo58ujpvhhrzljcgtyfgq3eglcd9nexw0');
define('SECURE_AUTH_KEY',  'sjyom9repyoeyikwz5hnkdt7ebpm4lucis09ixge6iwwlmrg6sk4b7x1v0jmeeja');
define('LOGGED_IN_KEY',    'km9pyklktaxde5loevvi3wbudcj8icqgfmh0za8dwhyxvj19juupbr6vsjnczoyx');
define('NONCE_KEY',        'hjlzsws8d21wqqa3m1brf7ejbpykcsp0o2gdypf8bw2vyhj8b7ptwotze3m1kjtu');
define('AUTH_SALT',        'lsbn01wjpfit1x8opzs5wrdogbygywiqi0kpyi09mdz8ew1mzwg2obqwu6fi4vpk');
define('SECURE_AUTH_SALT', 'zsmnhruh9gsx12anjhdxi42exmgouoqkumwcyitn5gv9ds7dhqvzfwl4uxw8x7ef');
define('LOGGED_IN_SALT',   'iad1jczsgo8cnhl2lqz2etvi6vhs57huswff7p8g0atij6wo95ukzkqggezlanbo');
define('NONCE_SALT',       'b65ud2pgxnyqjqus9i19ckyc7cnn10oypof4dqbtahhsadcttpiuhobekqwuspqx');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wptc_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', $SITE_SETTINGS['WP_DEBUG']);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
