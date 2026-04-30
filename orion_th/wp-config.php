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
define( 'DB_NAME', 'aspectvrn_orion' );

/** Database username */
define( 'DB_USER', 'aspectvrn_orion' );

/** Database password */
define( 'DB_PASSWORD', 'yuh1dd9K' );

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
define( 'AUTH_KEY',         ':A0i{mK%/gE<pqO{ib[ $2ol?1`pzH)V]l%4m FgTHj%KS]9gA81,>h?wM,YVraq' );
define( 'SECURE_AUTH_KEY',  '9j5FHMZR1SvYI|jE/n|F{n3%xHQ-!~{#Y`G[n>&1jgxE4ZVI-%?K)H_kWzzwK:i-' );
define( 'LOGGED_IN_KEY',    'dqT&Z7W[j^X0 STl3[rtj=|M>y:zs>-;~m96+X=J2M0HMTIA)]p(f]y7e[H;7zC(' );
define( 'NONCE_KEY',        'mz:.~2,ny[ZZEZ1@J3:.SE>j<n-h:jo*?PoO/OQNES+yxSZ%I%O0d=1XAs 503:d' );
define( 'AUTH_SALT',        'lf]qpb)^h4:_U!&t*<6@F+X=>`ux:}?<_P{P4^z=;1272k)quzJ5SMvm G@zt/qz' );
define( 'SECURE_AUTH_SALT', '*HSPfhS;Ii&]TekOA`%*9KaOu>:FD/2,~C0guh[!nn,HoR3kEKKBg.&cc-6H`j(8' );
define( 'LOGGED_IN_SALT',   '2OF@?JL_9Zkj8}LK48IHBiaRgF5j7$z ?sKe,G>07v3.4.E6oF2@5g&A,~N1R-R<' );
define( 'NONCE_SALT',       'l}Qr.:(U@X<YN[zGH:Eab(*FiklVZ7:o@9)G85*>z}g!vGcuex&Hw=9qVLt:cPm_' );

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
$table_prefix = 'orwp_';

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
