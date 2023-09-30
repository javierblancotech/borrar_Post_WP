<?php
require('wp-load.php');

$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => -1,
);

$posts = get_posts($args);

foreach ($posts as $post) {
    // Borrar adjuntos (imágenes) asociadas a la entrada
    $attachments = get_attached_media('image', $post->ID);
    foreach ($attachments as $attachment) {
        wp_delete_attachment($attachment->ID, true);
    }

    // Borrar la entrada
    wp_delete_post($post->ID, true);
}

echo "Entradas e imágenes asociadas borradas.";
?>
