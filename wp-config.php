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
define('DB_NAME', 'jackmajafe');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '.B8!Jv<Jbv:DU4Zm6g7-<EhL4$d-8r;Q07>%mx`|WY/,AN(_>%v1b3}thV?(D)H`');
define('SECURE_AUTH_KEY',  '#e+bwi25y+k,(7ixy=iS-Q+QgICx5|B(ohbC`a^D4IQ<SwyKCIB2BsTs>+0>zk6J');
define('LOGGED_IN_KEY',    'D_ r3pZ>pG*<ZK:e]z6d*!|hKTOM+fp*D6fKj-BhO5kaQzQ<*9bEv&V!7A=V0=V>');
define('NONCE_KEY',        '1:?f4h|llk-}a,NWV$=P{:,YH?z#yKznT(KGTT-ghNk2>.+|b>>V#37THETrq =G');
define('AUTH_SALT',        'AR2k~{S*K,T0J~F9,t*8SZ?o|0/Qem/RPT8kn;yp_E4s*59uTw-DIpf8-Z[+uzU&');
define('SECURE_AUTH_SALT', 'V>&c30eRs$Ad4fl^Fq>XoOWvKYTyZNM`xSG&8 9&3/`PM90H-wA[;UQ7$|quJVv{');
define('LOGGED_IN_SALT',   'NQ -P>Sr2Sg;4K$>;K6e/hl!puoZ{kv$,[J$0!R^rU^8H5!D[Y FSV}b{9a34J/b');
define('NONCE_SALT',       '#Iq(r}B*b+eGsVM5[(T@| VD(%eiSPO{f?SqUIj+KQo3IQ*j~k1Q,;Jm.rf||.xL');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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

define('WP_SCSS_ALWAYS_RECOMPILE', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
