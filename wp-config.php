<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'dpcpub_wp');

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
define('AUTH_KEY',         '9gs3_f]z{=3o~BZv}Fqp;|t;v,t6xnM4(uf^Vw` 5!a&=APfH`jl$+.o1A+lnVZl');
define('SECURE_AUTH_KEY',  'j,;-5C<x5ibHnF=ceRGcDz@EVIURKwW,az?e47y@:-[<1%s^WH@2!PJyZj,xc52c');
define('LOGGED_IN_KEY',    'F#hl/=w-*i%D@kj|CwWr~5(~39?5Jl f;^0f9wu^Qu26jaI]Q2nc$p=M_(u%=c}N');
define('NONCE_KEY',        'w#|xd /k|ftL3E-qm!u&`L-L%>1&bexe~1[gu+DNoa&L1Flby&~14@D~/2wqE;a+');
define('AUTH_SALT',        'Qk9tqLH|Wz>oDE`r3D8L2~47]!LktGq&+?gK&hB-d$c@sMAX5(NlQp:EN%y46[H+');
define('SECURE_AUTH_SALT', 'h`@QPgLNEJ|l2}`<1+85]CG}v@YTX.5H-EIqj5{(W(Z^WMvgW6M+B[8X2MPT);~<');
define('LOGGED_IN_SALT',   '_9x>hyoxz*0NXJ_b7cOuu&S+`to3<o|i+wL<kEKor0c|};O=r<h7+~Tz-f]Vpir.');
define('NONCE_SALT',       'we=oqMZv=l|-I+oh:_VHQC6FahXIn-3StleNx==p_UwKYE43^VOJD)zI(u>7YqSa');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
