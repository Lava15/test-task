<?php

/**
 * Способ 1
 * Пример использования WP_Query
 */

$args = array(
    'post_type'      => 'post',
    'posts_per_page' => -1,
    'fields'         => 'ids',
    'meta_query'     => array(
        array(
            'key'   => 'approved',
            'value' => '1',
        )
    )

);

$query = new WP_Query($args);
$posts_ids = $query->posts;

foreach ($posts_ids as $id) {
    echo $id . '<br>';
}
