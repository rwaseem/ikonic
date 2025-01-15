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
define( 'DB_NAME', 'ikonic' );

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
define( 'AUTH_KEY',         '9kDBON)Ahj2q{7&TXs`DrZ/=.7[Q_R$EKR1(Rq&UJ}RkRVST}a%bW7^rbT<om1^d' );
define( 'SECURE_AUTH_KEY',  '@0,vqn;:&gbDchMoRDIB >CGUwzMH+~B0MA_T-dL748L>:I,Z2U(OjUX 13k9)e=' );
define( 'LOGGED_IN_KEY',    '({sT/+VW4w+%a$ARe!8wQ>9T);a#]et~o(DX)$bs}1+1.,4auz-.MHp2(6N>vZV-' );
define( 'NONCE_KEY',        '@jRmv^wS5c&BlHt?ME+`_afDXl w$=vhhtsy!I[nqE(zGVKY_Ut/gSb-a?`57HPP' );
define( 'AUTH_SALT',        '3ZS H2-A^@H=Nd#Q@Xl9wmL)JhIvG:1@n&wz@*.MgBy!hTLNkJ8bW5@xYLQ@]QpW' );
define( 'SECURE_AUTH_SALT', 'N?6xtd@/-|Ep1hCRieskOW`~dV,RtD&j<*i#ivp:i4dE2pak+z|!5S-/D~opT Ju' );
define( 'LOGGED_IN_SALT',   ']q/]g[,I$#{7&H%=-<[+?H$,52p,tv$`lL1C3nP1y+pRSb@)K/8W)_H~e^H?!|8;' );
define( 'NONCE_SALT',       ' FlN1TWbW}rfX->WG|NU| &k-DfyKm*nAF=%~ ,u{zzI2Zp4:ZtvnIH?o8b3?zsX' );

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
