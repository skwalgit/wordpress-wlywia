<?php

namespace App\Hooks;

add_filter('paginate_links_output', function ($r, $args) {
    if ($args['type'] !== 'list') return $r;

    $r = str_replace(["<ul class='page-numbers'>", 'page-numbers', '<ul>'], ['', 'page-link', ''], $r);
    $list = explode("<li>", $r);
    unset($list[0]);

    $r = '<ul class="pagination justify-content-center">';
        foreach($list as $key => $item) {
            if ($args['prev_next']) {
                if ($args['current'] !== 1) {
                    $key = $key-1;
                }
            }
            $r .= '<li class="page-item' . ($args['current'] === $key ? ' active' : '') . '">' . $item . '</li>';
        }
    $r .= '</ul>';

    return $r;
}, 10, 2);
