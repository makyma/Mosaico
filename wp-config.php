<?php
/**
 * Il file base di configurazione di WordPress.
 *
 * Questo file viene utilizzato, durante l’installazione, dallo script
 * di creazione di wp-config.php. Non è necessario utilizzarlo solo via
 * web, è anche possibile copiare questo file in «wp-config.php» e
 * riempire i valori corretti.
 *
 * Questo file definisce le seguenti configurazioni:
 *
 * * Impostazioni MySQL
 * * Prefisso Tabella
 * * Chiavi Segrete
 * * ABSPATH
 *
 * È possibile trovare ultetriori informazioni visitando la pagina del Codex:
 *
 * @link https://codex.wordpress.org/it:Modificare_wp-config.php
 *
 * È possibile ottenere le impostazioni per MySQL dal proprio fornitore di hosting.
 *
 * @package WordPress
 */

// ** Impostazioni MySQL - È possibile ottenere queste informazioni dal proprio fornitore di hosting ** //
/** Il nome del database di WordPress */
define('DB_NAME', 'wordpress');

/** Nome utente del database MySQL */
define('DB_USER', 'root');

/** Password del database MySQL */
define('DB_PASSWORD', '');

/** Hostname MySQL  */
define('DB_HOST', 'localhost');

/** Charset del Database da utilizzare nella creazione delle tabelle. */
define('DB_CHARSET', 'utf8mb4');

/** Il tipo di Collazione del Database. Da non modificare se non si ha idea di cosa sia. */
define('DB_COLLATE', '');

/**#@+
 * Chiavi Univoche di Autenticazione e di Salatura.
 *
 * Modificarle con frasi univoche differenti!
 * È possibile generare tali chiavi utilizzando {@link https://api.wordpress.org/secret-key/1.1/salt/ servizio di chiavi-segrete di WordPress.org}
 * È possibile cambiare queste chiavi in qualsiasi momento, per invalidare tuttii cookie esistenti. Ciò forzerà tutti gli utenti ad effettuare nuovamente il login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '<zM|%HT#D?8SUur!qUKM+j3g7p:`xO{Ta^cCSU2.zBI<H_T~Daa^3O%VDLkq}kXF');
define('SECURE_AUTH_KEY',  'D$*brLNA.#j2mKE]e;VHA[_YRh&S3!#]y*R/UHS%]`I< hTJ0V0lUl|Y/$uo_j[=');
define('LOGGED_IN_KEY',    'GDqlWyVO=`JYW(Jzcip0]}o$z%sYR4,:BIa#hfL,0(Vo4E9u*%VpMFiMhq]>S)o~');
define('NONCE_KEY',        '`0 G0Wi-h,*t]ygSEm2H+j-UYt}Was0Wx%xl|EGeFKQ5+r0c,S*=nD{[6ire7^O$');
define('AUTH_SALT',        'E.D`x_#/Q!Z?Qt,]/xR8+5(?%W@qjVxh=1Rc%m3~CD$&3U@n;|)T=~E|z>:JU4$W');
define('SECURE_AUTH_SALT', 'q>)@ ~[0/)gK`O{k]LXUfwUMBQ<P.:*{n//b30bz^CLLSg02rKIw?zhgr)1juK/T');
define('LOGGED_IN_SALT',   'e0$T|  i2?~|9*?Dq<)Fd629%1WJ)FBF,B$(LQ5#Hb6|4RW+Xzisyj-UQ#60wuMP');
define('NONCE_SALT',       'jPzb{_6g~As}.W8)Cs6-.2h:*]yEGFnwl^H~y)fUgOeX6fTGzU2kwA`&[|IU=QW(');

/**#@-*/

/**
 * Prefisso Tabella del Database WordPress.
 *
 * È possibile avere installazioni multiple su di un unico database
 * fornendo a ciascuna installazione un prefisso univoco.
 * Solo numeri, lettere e sottolineatura!
 */
$table_prefix  = 'wp_';

/**
 * Per gli sviluppatori: modalità di debug di WordPress.
 *
 * Modificare questa voce a TRUE per abilitare la visualizzazione degli avvisi
 * durante lo sviluppo.
 * È fortemente raccomandato agli svilupaptori di temi e plugin di utilizare
 * WP_DEBUG all’interno dei loro ambienti di sviluppo.
 */
define('WP_DEBUG', false);

/* Finito, interrompere le modifiche! Buon blogging. */

/** Path assoluto alla directory di WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Imposta le variabili di WordPress ed include i file. */
require_once(ABSPATH . 'wp-settings.php');