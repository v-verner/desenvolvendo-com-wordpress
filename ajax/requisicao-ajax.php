<?php

# SHORTCODE ALVO
function createAjaxTargetShortcode()
{
    $html = '
    <form id="loadPosts" action="getNewPostsToList">
        <input type="number" id="numberPosts" name="numberPosts"/>
        <input type="submit" value="Carregar Posts" class="button">
    </form>
    <div id="ajaxResponse">

    </div>';

    return $html;
}   
add_shortcode('lista-de-posts', 'createAjaxTargetShortcode');

# INSERÇÃO DO JS
function enqueueAjaxAssets()
{
    $baseUrl = get_stylesheet_directory_uri();
    wp_enqueue_script('exampleAjax', $baseUrl . '/exemplo-ajax.js', ['jquery'], null, true);
    wp_localize_script('exampleAjax', 'exampleAjaxData', [
        'url' => admin_url('admin-ajax.php')
    ]);
}
add_action('wp_enqueue_scripts', 'enqueueAjaxAssets');

# FUNÇÃO AJAX
function getNewPostsToList()
{
    $numberPosts = $_POST['numberPosts'];
    $offset      = $_POST['offset'];

    $posts = get_posts([
        'numberposts' => $numberPosts,
        'offset'      => $offset  
    ]);

    $html = '';

    if($posts) : 
        foreach($posts as $post) : 
            $html .= '<p><a href="'. get_the_permalink($post->ID) .'" target="_blank">'. $post->post_title .'</p>';
        endforeach;
    else : 
        $html = '<p>Não foram encontrados mais posts</p>';
    endif;

    exit(json_encode($html));
}
add_action('wp_ajax_getNewPostsToList', 'getNewPostsToList');
add_action('wp_ajax_nopriv_getNewPostsToList', 'getNewPostsToList');
