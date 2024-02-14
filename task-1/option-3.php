<?php

/**
 * Способ 3
 * Пример использования sql запроса
 */


global $wpdb;
$query = "
    SELECT post_id
    FROM {$wpdb->postmeta}
    WHERE meta_key = 'approved' AND meta_value = '1'
";

$posts_ids = $wpdb->get_col($query);

// Вывод ID
foreach ($posts_ids as $id) {
    echo $id . '<br>';
}
