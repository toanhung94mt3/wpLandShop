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
define( 'DB_NAME', 'wp_land_shop' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'BwCn>tjGq) L7HXF*!t44@D(J4y0-3l!7AyL~Zw^u)ZYd.rx>A84oJ+VJMui9|$&' );
define( 'SECURE_AUTH_KEY',  'uT$d7bnr*3T$Jj/7^{tkE%ina>z(=.9ZyuDdbSc6g`|7_j[w`W&FS@-eFRO@EV%I' );
define( 'LOGGED_IN_KEY',    '`*&2|!4_,g.mhFhyyyLX|J:V~JzG;WO|SJ~8IyO<Yq(u|AbjEQF27J {YSR]^]3%' );
define( 'NONCE_KEY',        '-ho%muY^]xTJ:o^YDe6eqf?j?Kv8A)$uFgBGbH$C,=hJyJz}GU:h/.2w,)[x?nW6' );
define( 'AUTH_SALT',        ';lqQHSg`1CUscs)/b}]lPy.h%ud]v{kHoP0;bb(Wkj::Okr6UQB;74*@|iTHY9t2' );
define( 'SECURE_AUTH_SALT', '+%}tq13Uo*!X3|8Ew#epu<s,fZ.AZUgo}KQU*XK}gRs/k<6;OeW*IY~1-$+1Cj=N' );
define( 'LOGGED_IN_SALT',   ' |0J2/VZ8 fkxKYCWEOPAgD98 JI3B16k.GjiIYtZ{nFnZ_bl3UB%{d`=urYwXUL' );
define( 'NONCE_SALT',       'dymI&%}6NR.~QP9G|bc#mDPu.=e+Ly;&vb<<LD`!B7: m?sJ/|GacW.n4FGhbv}]' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );

/** Sets up Debug Bar Plugin. **/
define( 'WP_DEBUG', true );
define( 'SAVEQUERIES', true );