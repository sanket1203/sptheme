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
define('DB_NAME', 'sptheme');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_POST_REVISIONS', false );
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'l V525S5F2bhhV-coKmizaS Q8!B@fe#7..K!qa0H8%SRx7x }zfQjK;&5XoJH$;');
define('SECURE_AUTH_KEY',  '>tw;sMp[UFcoJ2PT~!2Ieji!g#P!Xe6ONq?z0swb[[o(*B+XI71mlu#|YL:uo7C_');
define('LOGGED_IN_KEY',    'v$#T:Eo?8@eDhOz?FSdu[uH]%DwIpl`pPgJOEXAU{Gpx43wE=nbW*6`n$_R&aoL;');
define('NONCE_KEY',        '{ACogiVl/b:&9[:Mm6en+FXk*m9)5t*5ZmX==yQ}N3Wt/EMWMC`c>7+vKY@=Vd[7');
define('AUTH_SALT',        'vjTMTegk(tO._{Z]N~hN$PM>8Cv#3.$h.J8p1HHc3ue{~O`>F.j!7H=Dpcikh>MS');
define('SECURE_AUTH_SALT', 'jG(u9R-u2[c7&~dU;HOTJVJuC@*)fBEyb<sKM{fh=@uY-C.q-F1>TDI&|d%e:!}6');
define('LOGGED_IN_SALT',   ';fN9AGym,q)BtI5FHXb$Cv,j$LHR`dv_)`p)MtnLjuf-jE@; 0-E@5SwLW|AgF)#');
define('NONCE_SALT',       'mD=*Jl6f*1F@ky,ov|;_aNMQ/w[w[v,r|N1FG,_w  /b2qdZd<50Vr1$^+w6RDa^');

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
