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
define('AUTH_KEY',         '^Cxd7qgn{z#8X9  L*Qo,A<7d>zPs!Zi<(&6^l{5]#p+TU55!#=l5|Y4yLY*3m~#');
define('SECURE_AUTH_KEY',  'A0?l(}j%hoaV]fo)0:]0^pZ7_;G#@!b.(aViC>XyA1ba$Yv|`H1skL6x]tOQ}q/R');
define('LOGGED_IN_KEY',    'go7,/Yu@2>99c05on.~$5Hw&W-:ZH_u~).!06kU)iL<NgJ-wMQ}-Lg%qR.-))8s}');
define('NONCE_KEY',        'I*DJ(IeC~lUod&9$ 8UZQ+s#?z8>V3(ie!K|gllP^7qn)P_<-Hb*I(|z~Ji=;pw$');
define('AUTH_SALT',        'B|b2DU,CG*JV=}2W1IbVQS.J4aM`VyTp^1 7Hp;=~[WMqtW*KyG6F:I5@Y(>G+$/');
define('SECURE_AUTH_SALT', 'M`O66@82>%]:rdxij|]?ubI^(tzcwoYsw+t<abky3)$t>!M5aQ_?x1LmH1RZ=v+j');
define('LOGGED_IN_SALT',   'U.e;:pLWi/9MnvsoUR}?h13(VmNq7=>xL?TSWi6{X&=w)0/[VQqM1{>-W.f{RItc');
define('NONCE_SALT',       'rQX$FzS{x;~%7,qOs=2$U<PUkRgX|zjZ_CC=/=RTc?n6Z-Z,:.5d:^V{~[q*qP e');

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