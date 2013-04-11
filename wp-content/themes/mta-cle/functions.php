<?php

function parseFeed($url) {
    $rss = fetch_feed($url);
    $maxitems = $rss->get_item_quantity(3);
    $rss_items = $rss->get_items(0, $maxitems);
    $out = '';

    if ($maxitems == 0) :
        _e('No items', 'my-text-domain');
    else :
        foreach ($rss_items as $item) :
            $clase = $i % 2 ? ' odd' : '';
            $out .= '<div class="wNota"><div class="bajadaNota' . $clase . '"><div class="tituloNotaW">' .esc_html($item->get_title()). '</div><span class="exp"><a href="/noticias-df/?url=' . urldecode(esc_url($item->get_permalink())). '&amp;titulo='. urldecode(esc_html($item->get_title())).'"> ' . esc_html($item->get_title()) . '</a></span></div></div>';
            $i++;
        endforeach;
        return $out;
    endif;
}

function traduceMes($mes) {
    if ($mes == 1) {
        $mes = 'Enero';
    }

    if ($mes == 2) {
        $mes = 'Febrero';
    }

    if ($mes == 3) {
        $mes = 'Marzo';
    }

    if ($mes == 4) {
        $mes = 'Abril';
    }

    if ($mes == 5) {
        $mes = 'Mayo';
    }

    if ($mes == 6) {
        $mes = 'Junio';
    }

    if ($mes == 7) {
        $mes = 'Julio';
    }

    if ($mes == 8) {
        $mes = 'Agosto';
    }

    if ($mes == 9) {
        $mes = 'Septiembre';
    }

    if ($mes == 10) {
        $mes = 'Octubre';
    }

    if ($mes == 11) {
        $mes = 'Noviembre';
    }

    if ($mes == 11) {
        $mes = 'Diciembre';
    }

    return $mes;
}

function notas($args) {
    query_posts($args);
    $i = 1;
    $out = "";
    while (have_posts()) : the_post();
        $clase = $i % 2 ? ' odd' : '';
        $out .= '<div class="wNota"><div class="fotoNota">' . get_the_post_thumbnail($post->ID, "thumb") . '</div><div class="bajadaNota' . $clase . '"><div class="tituloNotaW">' . get_the_title() . '</div><span class="exp"><a href="' . get_permalink() . '"> ' . get_the_excerpt() . '</a></span></div></div>';
        $i++;
    endwhile;
    return $out;
}

function slideHome() {
    $out = '';
    $args = array('category_name' => 'banner', 'order' => 'ASC', 'posts_per_page' => 5);
    query_posts($args);
    while (have_posts()) : the_post();
        $out .= '<div class="ls-layer" style="slidedelay: 3000">' . get_the_post_thumbnail($post->ID, "slideHome", array('class' => "ls-bg")) . ' </div>';
    endwhile;
    return $out;
}

add_theme_support('post-thumbnails');
add_image_size("notas", 70, 70, false);
add_image_size("slideHome", 660, 371, false);
add_image_size("perfil", 280, 380, false);
add_image_size("portadaPerfil", 175, 240, false);
add_image_size("gallery", 200, 110, false);
?>