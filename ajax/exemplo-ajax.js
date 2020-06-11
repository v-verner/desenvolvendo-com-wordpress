jQuery(function($){
    const $form  = $('#loadPosts');
    const $input = $('#numberPosts');
    const $responseContainer = $('#ajaxResponse');
    let offset   = 0;

    $form.submit(function(e){
        e.preventDefault();
        const numberPosts = parseInt($input.val());
        $.post({
            url : exampleAjaxData.url, // aqui é url que passamos como atributo extra com a função wp_localize_script()
            data : {
                action : 'getNewPostsToList', // este é o nome da nossa função backend
                numberPosts : numberPosts, // aqui nós estamos passando via $_POST as variáveis que iremos utilizar na função
                offset : offset // aqui nós estamos passando via $_POST as variáveis que iremos utilizar na função
            },
            success: function(res) {
                const html = JSON.parse(res);
                $responseContainer.append(html); // aqui nós acrescentamos o retorno da req. no container
                offset += numberPosts; // por fim, atualizamos o numero de posts no offset
            }
        })
    })
    
});
