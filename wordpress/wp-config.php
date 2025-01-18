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
define( 'DB_NAME', 'wordpress-wlywia' );

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
define( 'AUTH_KEY',         '!_AK0L9X<l*0^Hl3_{yvT:0AH-.{km(B5k%{1].,R*/EsKhBlH/GqFUD5gFNgqd@' );
define( 'SECURE_AUTH_KEY',  'gYAiL ?)J,2sw&4t9j2qIC}Ma!xd(1vJUSixFT6E)9X-T:hkN{E{ 1#otA)6WNHn' );
define( 'LOGGED_IN_KEY',    'DeiV]#EVL!K)FkD}GjhwCyA=<vC6sXU5Amu?LZ]vfIH3xciD-a;MTK]Dy-VU*.>e' );
define( 'NONCE_KEY',        '4srdGsC%Wj[u<>02# zR=@f?p!Jf?-I(q-YBu[m2*H+V$qA1vOZ=:wS~6,HwhZ3@' );
define( 'AUTH_SALT',        'cj][Inrdj&YieulYd5O.8qe,FNsO`o9JU1a3i(6xIl8k|07g7WckM(Q|ic3Tr{|C' );
define( 'SECURE_AUTH_SALT', 'Vd6WA?TaO.:(}rI0OFf~owS[4]-{!,Zy|GKD^Jg6GU,/a)R@^^oA7B}#_xI?K[^w' );
define( 'LOGGED_IN_SALT',   '>PBu-3iO>#Xmk2E_)ZxF1_V-32rsA2Im3`yjAt#]J03GpByo+_AasbR7a/!g<IKs' );
define( 'NONCE_SALT',       ';wc;~4&!xg*Q^6;,Mtp*tn-b56?J<_tFNh-ko!)BDU>4?5^f-N2@^:U006E<6m5O' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
