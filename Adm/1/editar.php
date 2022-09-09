<?php
include_once "../Conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (empty($dados['id'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o id!</div>"];
} elseif (empty($dados['nome'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o nome!</div>"];
}elseif (empty($dados['email'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o e-mail!</div>"];
}else {
    $query_usuario = "UPDATE usuarios SET nome=:nome, email=:email WHERE id=:id";
    $edit_usuario = $conn->prepare($query_usuario);
    $edit_usuario->bindParam(':nome', $dados['nome']);
    $edit_usuario->bindParam(':email', $dados['email']);
    $edit_usuario->bindParam(':id', $dados['id']);

    if($edit_usuario->execute()){
        $retorna = ['status' => true, 'msg' => "<div class='alert alert-success' role='alert'>Usuário editado com sucesso!</div>"];
    }else{
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário enviar o e-mail!</div>"];
    }    
}

echo json_encode($retorna);
