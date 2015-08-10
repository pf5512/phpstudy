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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '123456');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

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
define('AUTH_KEY',         '5a||mlF9n!eTi|eo=hkOP`B!>7p]Z51TIe?a8&OZ&12,^SeSzyVppt5LEY/2On,x');
define('SECURE_AUTH_KEY',  '!LZq^EdB%)c}3)+jWS;H/:p]?+RE{bA0)sH[Kj^A8IWGX(_?C@sqfxB`/km_z^OY');
define('LOGGED_IN_KEY',    '9nG-1|.;AG{0Wbz>SRl{]aLh!|vppA98;TP|x6R};-ctbgTftqkEa/CrX><oraE-');
define('NONCE_KEY',        'BE^2fI*b@V(<#of$d&;1?tQY=UG2HS~k9*TF8yY-8-Z$_uJ_!01l]ofWG1 Pa}qx');
define('AUTH_SALT',        '3wpN5 %-=-^peG6V!2mf/9#GKR#~w.wWTa:u{GK96^nV&.<np~S6J[tFV9=J||mq');
define('SECURE_AUTH_SALT', 'UTBTt>%b%eeNt6;t|dRBF&;F5l$A9aTtO>m;5j3J:*-EWi>6>br.VYU8@m=!41pV');
define('LOGGED_IN_SALT',   'xiO3eAmJ)7AuCGK?@&#;WfRl`IA1TvgEtKoDT{S;0T2-cA`vj)Mx~6R!(mD7o;Hn');
define('NONCE_SALT',       '0RM)|8lRa:WkdsFO4h=y^;%K(9,fok!Y: [i.!%oj@~$Tef*3`b_g4RG$|-T6X )');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
