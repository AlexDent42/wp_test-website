<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wp_testdb' );

/* Cache activation*/
define('WP_CACHE', true);

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '12345678' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '3{fF#__,vS!&p]H$5;ME-KtrAm+BDjqdtwZyl/%gib>.x[277Gyf)hGpTi,nk$Me' );
define( 'SECURE_AUTH_KEY',  'ZJ|3ARgh.R0u|we}[VpJOEZgbZ~)SSV@H8d3tPE#&Rxuw<R`>! s]TtH9;bT|XBD' );
define( 'LOGGED_IN_KEY',    'SAgv$S],vz5OnGy%)nOkjU,!`~`G)-0;V9Y=bU{EydqCj`4KDWFB@tc@$aMP%+DX' );
define( 'NONCE_KEY',        '=t,s)3ll*nLJlh=yTIDjz><G!; `nE>+7AZFOj<U9z8`M^hds;$)EA,9GWm 96+N' );
define( 'AUTH_SALT',        'rLsUSte&D,+}{*&xs(tn()~@YM+Lwq E;TkZ6?hrr$7r}&U[#dga3Acw=ce$ESpZ' );
define( 'SECURE_AUTH_SALT', 'ngc|xbuwq|~n@^wKIcZ$-0pU.6h7* E;T>ZpH.$#4c.2$5w=mN:-NN{I?e$can)a' );
define( 'LOGGED_IN_SALT',   '{kD}G^p<CX09$ZripgdO^8>|HzMTn-R.UQ-$~oIxTILkQ?zGY,GqUW[j8MXE5m$L' );
define( 'NONCE_SALT',       'wwN<SrD>t#=La#2KI=r;h;^%S5cT<m9D{$nI4;D4c?uvI#!Vbt9m$)$C,W4vsaE&' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
