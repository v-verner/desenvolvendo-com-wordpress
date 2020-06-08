<?php

/**
 * Função detalhada para registro e inserção de JS e CSS corretamente no WordPress
 */
function registerThemeAssets()
{
    $baseUrl = get_stylesheet_directory_uri();

    # CSS
    $nomeStyle = 'meu-style';
    $urlStyle = $baseUrl . '/main.css';
    $dependenciasStyle = [];
    $versaoStyle = null;
    $media = 'all';
    wp_enqueue_style($nomeStyle, $urlStyle, $dependenciasStyle, $versaoStyle, $media);

    # JS
    $nomeScript = 'meu-script';
    $urlArquivoScript = $baseUrl . '/main.js';
    $dependenciasScript = ['jquery'];
    $versaoScript = null;
    $carregarNoFooter = true;
    wp_enqueue_script($nomeScript, $urlArquivoScript, $dependenciasScript, $versaoScript, $carregarNoFooter);

    # Parametros extras ao arquivo JS
    $nomeObjeto = 'meuScriptParams';
    $objeto = [
        'parametro0' => 132,
        'parametro1' => is_user_logged_in()
        // ...
    ];
    wp_localize_script($nomeScript, $nomeObjeto, $objeto);
}
add_action('wp_enqueue_scripts', 'registerThemeAssets', 99);
