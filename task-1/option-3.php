<?php

/**
 * Способ 3
 * Пример использования sql запроса
 */


global $wpdb;

$batch_size = 1000;
$last_post_id = 0;

/**
 * Подготовка запроса для получения ID постов для обработки
 */
$posts_ids_query = $wpdb->prepare(
    "
     SELECT post_id
     FROM {$wpdb->postmeta}
     WHERE meta_key = %s AND meta_value = %s AND post_id > %d
     ORDER BY post_id ASC
     LIMIT %d",
    'approved',
    '1',
    $last_post_id,
    $batch_size
);

while (true) {
    /**
     * Берем посты по id для текущей партии
     */
    $posts_ids = $wpdb->get_col($posts_ids_query);

    /**
     * Выход из цикла , если нет постов
     */
    if (empty($posts_ids)) {
        break;
    }

    // Process the posts for the current batch
    foreach ($posts_ids as $id) {
        echo $id . '<br>';
    }

    /**
     * Подготовка следющей партии
     */
    $last_post_id = end($posts_ids);
    $posts_ids_query = $wpdb->prepare(
        "
         SELECT post_id
         FROM {$wpdb->postmeta}
         WHERE meta_key = %s AND meta_value = %s AND post_id > %d
         ORDER BY post_id ASC
         LIMIT %d",
        'approved',
        '1',
        $last_post_id,
        $batch_size
    );
}
