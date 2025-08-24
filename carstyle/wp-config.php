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

$url = $_SERVER['REQUEST_SCHEME'] . "://" .  $_SERVER['HTTP_HOST'];

define('WP_HOME', $url);
define('WP_SITEURL', $url);

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', $_SERVER['DB_NAME']);

/** Имя пользователя MySQL */
define('DB_USER', $_SERVER['DB_USER']);

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', $_SERVER['DB_PASSWORD']);

/** Имя сервера MySQL */
define('DB_HOST', 'mysql');

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
define('AUTH_KEY',         'Oy_?JD@wU %O_<0ur#G:?o/B_c+Vsn^Zw}M=#LcyNJ-<50b._xfecfoM 2KxrGK>');
define('SECURE_AUTH_KEY',  'EL+JTBrZ1e]U!O*QLo&UzRa3~k[^Nh_ux+ D83(hTW3)NM&%0~[:.7yzXlxwyg$j');
define('LOGGED_IN_KEY',    'Pm]:tx5`6xzDLdHQ_p]mzIk*}_dEbrPo@Kk76y8b-*c95qNk=>!WyMjF(ag@J5$*');
define('NONCE_KEY',        '=T~W$K)f+&(IeUWML3gpS*5s8.nE!?.PLn2HFyun&~q1c?wCzYGh;_<~HpO46/;a');
define('AUTH_SALT',        '-Kt>crpH=GVYmPPn@5{W%Q<t/jn7eH ov<|O LPQ;<gYOUd5NpC2v^cRl*+=|g3Y');
define('SECURE_AUTH_SALT', 'Rjwo|.^yU*BY2vp1p2O4Zx;.%5Vswp-}%qC`iL[@-5VD/v KB^;c`V!=5*bN~za}');
define('LOGGED_IN_SALT',   'd1R,yVpMNk@@CRPUqgp+1 kO{.flSudYbFt-rKf)89!}<NO%b)5ru@PGjX1tQ7S4');
define('NONCE_SALT',       ']F&hd};5k]9kNOdlY}EIhy=@8wDpRjw,}h):KY&Fx5F)kEMa|&rHQHjbv/1q-zFR');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'carstyle_';

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
define('FS_METHOD', 'direct');

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
