/* Inicio listar os registros do banco de dados */
const tbody = document.querySelector(".listar-usuarios");

// Funcao para listar os registros do banco de dados
const listarUsuarios = async (pagina) => {

    // Fazer a requisicao para o arquivo PHP responsavel em recuperar os registros do banco de dados
    const dados = await fetch("./list.php?pagina=" + pagina);

    // Ler o objeto retornado pelo arquivo PHP
    const resposta = await dados.json();

    // Acessa o IF quando nao encontrar nenhum registro no banco de dados
    if (!resposta['status']) {
        // Envia a mensagem de erro para o arquivo HTML que deve ser apresentada para o usuario
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    } else {
        // Recuperar o SELETOR do HTML que deve receber os registros
        const conteudo = document.querySelector(".listar-usuarios");

        // Somente acessa o IF quando existir o SELETOR ".listar-usuarios"
        if (conteudo) {

            // Enviar os dados para o arquivo HTML
            conteudo.innerHTML = resposta['dados'];
        }
    }
}

// Chamar a funcao para listar os registro do banco de dados
listarUsuarios(1);

/* Fim listar os registros do banco de dados */

/* Inicio substituir o texto pelo campo na tabela */
// Funcao responsavel em substituir o texto pelo campo na tabela e receber o ID do registro que sera editado

function editar_registro(id_usuario) {
    // Ocultar o botao editar
    document.getElementById("botao_editar" + id_usuario).style.display = "none";

    // Apresentar o botao salvar
    document.getElementById("botao_salvar" + id_usuario).style.display = "block";

    // Recuperar os valores do registro que esta na tabela
    var nome = document.getElementById("valor_nome" + id_usuario);
    var email = document.getElementById("valor_email" + id_usuario);

    // Substituir o texto pelo campo e atribuir para o campo o valor que estava na tabela
    nome.innerHTML = "<input type='text' id='nome_text" + id_usuario + "' value='" + nome.innerHTML + "'>";
    email.innerHTML = "<input type='text' id='email_text" + id_usuario + "' value='" + email.innerHTML + "'>";

}

/* Fim substituir o texto pelo campo na tabela */

/* Inicio editar o registro no banco de dados */
// Funcao resposavel em salvar no banco de dados e receber o id do registro que deve ser editado

async function salvar_registro(id_usuario) {
    // Recuperar os valore dos campos
    var nome_valor = document.getElementById("nome_text" + id_usuario).value;
    var email_valor = document.getElementById("email_text" + id_usuario).value;

    // Prepara a STRING de valores que deve ser enviado para o arquivo PHP responsavel em salvar no banco de dados
    var dadosForm = "id_usuario=" + id_usuario + "&username_usuario=" + username_usuario + "&email=" + email_valor;

    // Fazer a requisicao com o FETCH para um arquivo PHP e enviar atraves do metodo POST os dados do formulario
    const dados = await fetch("editar.php", {
        method: "POST",
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: dadosForm
    });

    // Ler o objeto, a resposta do arquivo PHP
    const resposta = await dados.json();

    // Acessa o IF quando nao conseguir editar no banco de dados
    if (!resposta['status']) {
        // Envia a mensagem de erro para o arquivo HTML que deve ser apresentada para o usuario
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    } else {
        // Envia a mensagem de sucesso para o arquivo HTML que deve ser apresentada para o usuario
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];

        // Chamar a funcao para remover a mensagem apos alguns segundos
        removerMsgAlerta();

        // Substituir os campos pelo texto que estava nos campos
        document.getElementById("valor_nome" + id_usuario).innerHTML = username_usuario;
        document.getElementById("valor_email" + id_usuario).innerHTML = email_valor;

        // Apresentar o botao editar
        document.getElementById("botao_editar" + id_usuario).style.display = "block";

        // Ocultar o botao salvar
        document.getElementById("botao_salvar" + id_usuario).style.display = "none";
    }
}

/* Fim editar o registro no banco de dados */

/* Inicio remover a mensagem em 5 segundos apos apresentar a mensagem para o usuario */
function removerMsgAlerta() {
    setTimeout(function () {
        // Substituir a mensagem
        document.getElementById("msgAlerta").innerHTML = "";
    }, 5000);
}
/* Fim remover a mensagem em 5 segundos apos apresentar a mensagem para o usuario */