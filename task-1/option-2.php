<?php

/**
 * Способ 2
 * Пример использования get_posts
 */
$args = array(
    'post_type'      => 'post',
    'posts_per_page' => -1,
    'fields'         => 'ids',
    'meta_key'       => 'approved',
    'meta_value'     => '1',
);

$posts_ids = get_posts($args);

// Вывод ID
foreach ($posts_ids as $id) {
    echo $id . '<br>';
}
