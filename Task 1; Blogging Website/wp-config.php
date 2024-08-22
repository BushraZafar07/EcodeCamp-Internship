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
define( 'DB_NAME', 'blog_website' );

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
define( 'AUTH_KEY',         '`Q]<{W#`rjB$7t,Ce5[ALGLyOj20JV -:6:7::$Y[VF3,zvkfDmR]PImn }@W&Ie' );
define( 'SECURE_AUTH_KEY',  '$]VZ>._oa3kP}*E$Dl`%d]bw[jl= g73iiU<+^w;CSmm=*u!EQS#}lDE[?h7zS3?' );
define( 'LOGGED_IN_KEY',    'kr*HX{n9#EfkEe*,5jxz3kB`I3*_A7~Uw2:iwlDLPwF<P*W,mKD1tHM~SZHvN1&Q' );
define( 'NONCE_KEY',        'k_@7Nw+sYM^X(cw[0EoVxiL)i|ZA$VBA-T6vIXV//MtU(W@VW>Bq/To.Gh5YAQFx' );
define( 'AUTH_SALT',        '-Jp*YXktB(la:%G<z96_pI2jcpS6t]}R4fN#f41p%Mm70{cVQ85^RZmDqY(GZI0W' );
define( 'SECURE_AUTH_SALT', '=*S=@Q_f1PYxUq9!fThf!.ytnKj|cxeT k4b{LU5Ofo}Tm0`Bt<R0Vz:E`>&j3*&' );
define( 'LOGGED_IN_SALT',   'A*i+$(/6/g=D^5ys%})vcbvViA8#m_SYZ+#H4~b5j{aW1vMZNIbo8f?n+Eu2-tBo' );
define( 'NONCE_SALT',       'vcA+%8Q~t-G6e(mTJb2.0nB{XU#Eurk1F9Pp/a-yRE&Q~=YqO(!ZRi/Pg?Rnc%`N' );

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
