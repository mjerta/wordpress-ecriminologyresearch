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


// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'database2' );
// define( 'DB_NAME', 'dbypms3ugp6syw' );
// define( 'DB_NAME', 'dbbcae2j6pewgr' );

/** MySQL database username */
define( 'DB_USER', 'user2' ); 
// define( 'DB_USER', 'uevfcvuzz9vd5' ); 
// define( 'DB_USER', 'utb7pn9hz6wwf' ); 

/** MySQL database password */
define( 'DB_PASSWORD', 'password2' );
// define( 'DB_PASSWORD', '+[Itmg$4*@2[' );
// define( 'DB_PASSWORD', '#6`3;%*11D_i' );

/** MySQL hostname */
define( 'DB_HOST', 'mariadb2' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'ISe-;gH7/{18sMo.jm#LUjx4guD=~kS50<Ay1S#o8,sS4f9|-v^BdqkU&o-O[P<g' );
define( 'SECURE_AUTH_KEY',  '3$a0`XC`hUiheC4=$E-P)7bRO/|wbH3BdUEcTR|c36/A%!WIZmfE5$5Y6 [6;0zn' );
define( 'LOGGED_IN_KEY',    'en(;c@&pkMyv|f5Dem~K%x#y)bI-W8cEURS@^lahv`~z=A<&T(w8&R.$Rf{4LFpE' );
define( 'NONCE_KEY',        '~z8ITxuRNq&pSI!}WhF-GU-9N,sAhb5/UM&B|CUspcE-5e2Zur./v*#oK*<cE,i)' );
define( 'AUTH_SALT',        'k84fC1rv!OYR#;WO;<K&WqPuR=7IiC9! _:gWEjxm#U=mt_s!2%]w%<lW}8O@XL~' );
define( 'SECURE_AUTH_SALT', 'Ci1U6>-ny5%I&`!?iws!VlXEC[OaCMQk9t%iUA@l=2_TsLm1<h8=o TE*0HDh@,A' );
define( 'LOGGED_IN_SALT',   'z!Wd9![CavwunX:%2y2asW8S6Rq5vP cfn+XR)0*n%3c)yAK*,[*I68]&Qs0U;wU' );
define( 'NONCE_SALT',       't)}kKo^PpO*BxHV*%*:T:]D3O,9IbGae,5~iUz{&M>``n#T0<*A7 >r}x|458y97' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
define( 'WP_DEBUG', true );
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

define('FS_METHOD', 'direct');

define('WP_HOME','https://wordpress-ecriminologyresearch.mpdev.nl');
define('WP_SITEURL','https://wordpress-ecriminologyresearch.mpdev.nl');