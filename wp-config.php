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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'wp_test');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'g+kf34R=)K^vD[I?[Y]<IOC]q=!6r4m5Yj&{1_lE0YWjOUyi2aX|Op0O!uK~IzPw');
define('SECURE_AUTH_KEY',  'DT3,Qgu?zkQ*_+4BBT;.<5OmgD*2nmX)epx;pd{}&/^f`@3oYXLR27o|.Ry+pig;');
define('LOGGED_IN_KEY',    'P.W3ImyKWCN&l,7 w3 z#j$EGqw]2W?D@|Y{|VW!pJap;L6EmW2,.00P*,wKX5m&');
define('NONCE_KEY',        '-P&MlL&62]({fUTv ]~NE14H=i/o1g =G0<Y^mXbsXy(huSBR+)A0R?!wi* UL;j');
define('AUTH_SALT',        '}bLW|cv:03S2iJ5@Ma%5RR;#KTY7dPgl<b6Jx*(b|vH;RuJ~P4o-k10W`V]`~)tM');
define('SECURE_AUTH_SALT', 'FjEy2lMXO0ye@]PGhxx&C}oghHwP5|w)zCbK,@mNr74wgS1 7` L&](K$zd4/K4$');
define('LOGGED_IN_SALT',   'MVX9y%#Ey|4LbDXJx|J,?l4N-!.f)a5}.p9/MH-N.sw[[L@SFJ2yORj2][Qt3_C}');
define('NONCE_SALT',       'D&<?rF^m,~`bFQo:f6;7Ws>V+c)d6*gD$(m .C);OcF%Y,*_+wDIYY{4lR[uFT;d');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
