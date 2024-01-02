<?php
/**
 * Contém todas configurações do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do banco de dados
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do banco de dados - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'bd_wordpress' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'P2^3`,;aWHoA:nk%&C9a&qA&0p8SF9rk3s1S0!UX(0tGJ<PM~HR|J:8vF<2p&5(`' );
define( 'SECURE_AUTH_KEY',  ',lQ/@;O]~[IM4G3=u#-DwVKzU6%&<r,(rui0mRK*7T)FerA;V:@OD]Qc$u6H^F#)' );
define( 'LOGGED_IN_KEY',    'g6/s*D`O;kLe5&OdyA|s0nSnPE*sw1z0sBvN]B7;fDA~[Bq@[~I,!7C+.#9AZbOz' );
define( 'NONCE_KEY',        '*]Y1Fg)(WC2ZEMl/wJbf.0RudiIw4g@JFMm>wn4CG<771(9%ald|pN.nHn-(y1rG' );
define( 'AUTH_SALT',        '`2d3P_[K[LhTPPbD 952nNYM<vb9UEV04VDsCP`Wsep*p+A}51T}VcA36]lYyZ0m' );
define( 'SECURE_AUTH_SALT', '>^9otYyVDMX[^^]d79<i]I@$5w@Lnu~JW0/vs)>rN=4;izXI7wZ}&<&(_0*iXm&U' );
define( 'LOGGED_IN_SALT',   'Yky$`aV>a]wc,1t!6^~ao(6]ytAdHSR;-W)8E|y5h*F&RvOVT$,72+F} Phu2~B_' );
define( 'NONCE_SALT',       '*|9YRo1Ng5Z5x+OKbgGf8CXBj2fz}F,7?]!>@Mh4 E=C%M?-dF7^R^6vFUm;}71$' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Adicione valores personalizados entre esta linha até "Isto é tudo". */



/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
