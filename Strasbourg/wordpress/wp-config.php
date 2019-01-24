<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'strasbourg');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '[$(pOMlsKm}zT~B`j%L^QGoN]9JU~KZ-g{hiKGZ%J&(QPm#Tfc.lrRoofpx?+bI$');
define('SECURE_AUTH_KEY',  '[Rs.$Rf<Wdn7R67_PXyrVCKQ)#z~#cJeET/_aqO@ovh8dF3z+%(w68XMlK@)Tx?R');
define('LOGGED_IN_KEY',    '-q-5aYOLHl.,>%H`o-wB{}Z((Q. yyo1aL-_Qtl6mZTkBCg,|2Mt-})&v4Y(Q5l.');
define('NONCE_KEY',        'En)a_I4R>icM,Kg4CM,H{DFZD4>t9nhGh3_C@+nf93[#=Oeu`J,xwQ6}ZsAN=JNI');
define('AUTH_SALT',        '#o*/Xy! hk{P$!E@NoIVeUE<~yt$9|d}C__{RC!~rY<UGg^&owNb)IS>/j@w9w8f');
define('SECURE_AUTH_SALT', 'XFM.@6x-Vx3^,9+Vr{s9FtQ0F9P>Ht:=m)}y2Y>Z0^[l2veT$m4k4*56LN7}`GJm');
define('LOGGED_IN_SALT',   '{3N6}$g7YN96Z.GJ-z>8&!omH)~4A$|B+=[8fjdisR{o}i)~mESdVTkGZldsjgVr');
define('NONCE_SALT',       '`R|5L;+!?SkX^>_N_!aF~6S;#> o~S#:n$r;~wO!NhiYh)`R/v@Q]G04!9<.re3<');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'oc_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');