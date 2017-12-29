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
define('AUTH_KEY',         ' E V6`.xT;lS$t1VYdlw{p6yktt>UVX22 w1Y3ES}<WdxYMkI$mlp,_F3;tXqT;W');
define('SECURE_AUTH_KEY',  'v)Z)ZGo5uBwC-:^[G:tOBn02{Ku_>c!4:iKB]h@?vm+Utzp*M3B%MXuZ3I_g5E_4');
define('LOGGED_IN_KEY',    'p%J2*ms0^u`H@f,@t}~R<[]+SE`#B2L~|EGm[Bm4CK*<myIHrN{Z8-=[]k=FO@,W');
define('NONCE_KEY',        '^&C3W|[g(^C78#o/&aOyk1q!j#S<7}f1KgcBy52HHpIEj.trnJ`_nnWoXtkX3]3y');
define('AUTH_SALT',        '=@d>-X-wi;=KA ix,KZFk4KjMN2eNB3=}FOOm+Ih=s##0,Wg*2G~$bJrJ/wy}V&.');
define('SECURE_AUTH_SALT', 'YY0b5y;$G7(xLQaz(K2/C5QYPZ_)OFZqkF}Bze[n6oP:f1p`(h(aD6dGx;kGV8M%');
define('LOGGED_IN_SALT',   'gQl1{Gpn.g&{o@Z=tVgmBpyq|+*m9P6];}71I=C4G1P*pu{+(;bj5<fsBCvr!WV?');
define('NONCE_SALT',       'D*#->A~a_MH;J+1mW{!wk!PLP4nTRu0|K]SG8-vn&>0JOa1%0Hsl)]W|{3<6eUN_');

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