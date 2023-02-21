<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'admin' );

/** Database password */
define( 'DB_PASSWORD', 'redhat' );

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
define( 'AUTH_KEY',         'TY5O~~<~7,6cLqW;oMMQC0n2tU(Qy%KS)GE@BdRs8xxG-m6g~X<7M0};.L>JDJD/' );
define( 'SECURE_AUTH_KEY',  '>WZh?Po/7$c1~>A63q(Aj(;3!51FIg0[_WA=dChR!G&VxPr[!bUu;Dcnu2{;wPwT' );
define( 'LOGGED_IN_KEY',    '%is90<q[,}xkKdqUY hWa~)|r~Q34]XL*j|)_^DS%dy4w`,1L?XR7~zBq6}J!u_k' );
define( 'NONCE_KEY',        'T~otHoh#iO{Td(Y_+z@9@VrM2 )kH@^M! xxxO]I:&V8<e/S*(unp]d:9zZpz,_y' );
define( 'AUTH_SALT',        '[0!,8<.Z(F4^ $St/7zi2rjqavOdTstf)--<CGqBetL#37+*LfV[]5ejUK[vPA)9' );
define( 'SECURE_AUTH_SALT', ',mtLcb!vp32n844Huh2.aC^n]ud/Mwk,~k*^?<fR]qYZb_Fn?dS3a-AY1s~7QG[6' );
define( 'LOGGED_IN_SALT',   '58fwEGg;m#{x;`B%+144 Jd)PY8jLCN{4OzPv~;Rh/G^,NNWiyh[|8dmLVO5Li-t' );
define( 'NONCE_SALT',       '+t[X8K{<H/F2#1jys|X<<HDUb& TBJj+)1SI^H(G`@rQLJD@GGs?LImCS&ddTOp6' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}


/** Sets up WordPress vars and included files. */

define( 'UPLOADS', 'wp-content/uploads' );
require_once ABSPATH . 'wp-settings.php';
