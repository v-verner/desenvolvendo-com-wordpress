<?php

/**
 * Função usada para criação de shortcode padrão
 * Uso em páginas/posts [shortocde-padrao]
 */
function funcaoParaShortcode()
{
    return 'Conteudo';
}
add_shortcode('shortcode-padrao', 'funcaoParaShortcode'); 


/**
 * Função anonima para criação de shortcode padrão
 * Uso em páginas/posts ['shortcode-anonimo']
 */
add_shortcode('shortcode-anonino', function() {
    return 'Conteudo';
});


/**
 * Função usada pra criação de shortcode com parametros
 * Uso em páginas/posts [shortcode-com-parametros parametro0="5" parametro1="8"]
 */
function funcaoParaShortcodeComParams($params)
{
    $a = shortcode_atts([
        'parametro0' => 0,
        'parametro1' => 1,
    ], $params);

    return $a['paramentro0'] + $a['paramentro1'];
}
add_shortcode('shortcode-com-parametros', 'funcaoParaShortcodeComParams');


/**
 * Função usada pra criação de shortcode com parametros
 * Uso em páginas/posts [shortcode-com-parametros parametro0="5" parametro1="8"] conteudo [/shortcode-com-parametros]
 */
function funcaoParaShortcodeComConteudo($params, $content = NULL)
{
    $a = shortcode_atts([
        'parametro0' => 0,
        'parametro1' => 1,
    ], $params);

    return '<p>'. $content .'</p>';
}
add_shortcode('shortcode-com-conteudo', 'funcaoParaShortcodeComConteudo');
