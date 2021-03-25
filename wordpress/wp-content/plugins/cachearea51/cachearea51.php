<?php
/**
 * Plugin Name: Cachearea51
 * Description: Plugin for cache. Attention!!! Need cache activation define('WP_CACHE', true); on wp-config.php
 * Plugin URI:  Ссылка на инфо о плагине
 * Author URI:  Ссылка на автора
 * Author:      Alex Kirpichonak
 * Version:     1.0
 *
 * Text Domain: Идентификатор перевода, указывается в load_plugin_textdomain()
 * Domain Path: Путь до файла перевода. Нужен если файл перевода находится не в той же папке, в которой находится текущий файл.
 *              Например, .mo файл находится в папке myplugin/languages, а файл плагина в myplugin/myplugin.php, тогда тут указываем "/languages"
 *
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *
 * Network:     TRUE
 * Need cache activation define('WP_CACHE', true);
 */



/*
// Redis initial
$redis = new Redis();
// Server connection
$redis->connect( 'localhost' );

// Data saving $value with $key on some time $timeout
$redis->set( $key, $value, $timeout );
// Get data with  $key
$redis->get( $key );
// Delete $key
$redis->del( $key );
*/

//Another kind of cache(OBJECT CACHE) (object-cache.php)
//wp_cache_set( $key, $value, $group, $timeout );
//wp_cache_get( $key, $group );
//wp_cache_delete( $key, $group );

//  OBJECT CACHE initial

wp_start_object_cache();

// формируем ключ
// чаще всего это URL страницы
$key = 'host:' . md5( $_SERVER['HTTP_HOST'] ) . ':uri:' . md5( $_SERVER['REQUEST_URI'] );

// берем данные из кеша по ключу
if( $data = wp_cache_get( $key, 'advanced-cache' ) ) {

    // если данные существуют, отображаем их и завершаем выполнение
    $html = $data['html'];
    die($html);
}
// если данных нет, продолжаем выполнение

// не сохраняем в кеш запросы админ панели
// проверяем наличие cookie wordpress_logged_in_*
$is_logged = count( preg_grep( '/wordpress_logged_in_/', array_keys( $_COOKIE ) ) ) > 0;

// сохраняем кеш только не залогиненых пользователей
if( ! $is_logged ) {

    // перехватываем буфер вывода
    ob_start( function( $html ) use( $key ) {

        $data = [
            'html' => $html,
            'created' => current_time('mysql'),
            'execute_time' => timer_stop(),
        ];

        // после генерации страницы сохраняем данные в кеш на 10 минут
        wp_cache_set($key, $data, 'advanced-cache', MINUTE_IN_SECONDS * 10);

        return $html;
    });

}