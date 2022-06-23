function loadProdutos() {
    // $("#conteudo").load("includes/produtos/index.php");
    window.location.href="/?page=produtos#produtos"; 
};

function loadCadastro() {
    // $("#conteudo").load("includes/auth/cadastro/index.php");
    window.location.href="/?page=cadastro#cadastro"; 
};

function validaDados(dados) {
    let indexVazios = [];
    for (let dado in dados) {
        if(!$(`#${dado}`).val() && !$(`#${dado}`).hasClass('opcional')){
            indexVazios.push($(`label[for="${dado}"]`).text());
            $(`#${dado}`).addClass('is-invalid')
        }
    }
    
    indexVazios = indexVazios.join(', ')
    alert(`Por Favor preencha os campos: ${indexVazios}`)
}