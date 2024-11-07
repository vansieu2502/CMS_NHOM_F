<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cms_f' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'C?k~U>O5f,$p;V3.hw9$+O;%*cAqjk}bfpzba_Gv5 )RP]T0$NVe`TA3.]&efror' );
define( 'SECURE_AUTH_KEY',  '?d&*[/%CXEZ,g/WcvRN2^f%A^wzS;`jzD8rA3Vc!~)lX#/@SB`CK3m91yRnM,aBJ' );
define( 'LOGGED_IN_KEY',    '2{cX18pY?odEy5Da[^3]~4%_Ktd08]uK^z,k4Nkn`/_z%]8UbW7[Nt1yU8QI_4=c' );
define( 'NONCE_KEY',        'm#RBpNzXP/:yKd<I15l#BX7u6Q)E_lKpoA>8iJW_%TM[ Eq-&sWrZ!g-wydwaRhW' );
define( 'AUTH_SALT',        'M-e-DZDoBM)y5?JLGQ/hN^1,e22n>U6ux4SH-[86Y]:O3i0v>3!IqBYCV( 0hu;#' );
define( 'SECURE_AUTH_SALT', '}GJ9|00eH|)(0.DGIs9)6Qlju];ico;4a}ES8iVUu<vtRI6]#QIrI#|DYz#mq-3m' );
define( 'LOGGED_IN_SALT',   'Z5Vu4w~SUId{}^+)LnGm6&-Roj[7Jh{g|rY,}Vki3IRsgN4.v>F,N$N;(/{&2X;5' );
define( 'NONCE_SALT',       'E{?:X)VQ]>7s^iVxS3Xma5LnUzm3u4<<tIqtQ$}3GxgKCF^id?ey:=6!EK@bH=l,' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_cms';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
