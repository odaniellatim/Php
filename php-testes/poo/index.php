<?php

echo "<h1>Sistema de Biblioteca Iniciado</h1> <br>";
require_once "vendor/autoload.php";

use Daniel\Biblioteca\Livro;
use Daniel\Biblioteca\Estante;
use Daniel\Biblioteca\Aluno;
use Daniel\Biblioteca\Professor;
use Daniel\Biblioteca\Visitante;
use Daniel\Biblioteca\Bibliotecario;

//Instacias de Livros cadastrados
$livro1 = new Livro("George Orwell", "1984");
$livro2 = new Livro("Antoine de Saint-Exupéry", "O Pequeno Príncipe");
$livro3 = new Livro("Saint-Exupéry", "A Pequena Solidão");
$livro4 = new Livro("George", "1984 - O Pequeno Ilustrado");
$livro5 = new Livro("Antoine Márquez", "1984 em Cem Anos");

// Instancia dos livros na pratileira
$estante = new Estante();
$estante->adicionarLivros($livro1);
$estante->adicionarLivros($livro2);
$estante->adicionarLivros($livro3);
$estante->adicionarLivros($livro4);
$estante->adicionarLivros($livro5);

//Instancia de usuarios
$aluno = new Aluno("Daniel");
$professor = new Professor("Prof. Daniel");
$visitante = new Visitante("Anonimo");

//Instancia Bibliotecario
// $bibliotecario = new Bibliotecario();

echo "<pre>";

echo "<h2>Bibliotecario.</h2>";
try {
    Bibliotecario::emprestarLivro($aluno, $livro2, $estante);
    Bibliotecario::devolverLivro($professor, $livro2, $estante);
    Bibliotecario::devolverLivro($aluno, $livro2, $estante);
} catch (Exception $e) {
    echo "Erro" . $e->getMessage() . "<br>";
}


print_r($aluno);

echo '<hr>';
try {
    Bibliotecario::emprestarLivro($professor, $livro2, $estante);
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage() . "<br>";
}

print_r($professor);


echo '<hr>';

echo "<h2>Livros Emprestados Anonimos.</h2>";
// $visitante->adicionarLivrosEmprestado($livro4);
// $visitante->adicionarLivrosEmprestado($livro5);
// $visitante->adicionarLivrosEmprestado($livro1);

print_r($visitante->podePegarEmprestado() ? "Pode" : "Não Pode");
echo "<br>";
print_r($visitante->listarLivrosEmprestados());
echo '<hr>';


echo "<pre>";
echo "<h2>Livros Emprestados Professor.</h2>";
// $professor->adicionarLivrosEmprestado($livro4);
// $professor->adicionarLivrosEmprestado($livro5);
// $professor->adicionarLivrosEmprestado($livro1);

print_r($professor->podePegarEmprestado() ? "Pode" : "Não Pode");
echo "<br>";
print_r($professor->listarLivrosEmprestados());
echo '<hr>';

echo "<h2>Livros Emprestados Alunos.</h2>";
// if ($aluno->podePegarEmprestado()) {
//     echo "Aluno pode pegar livro emprestado. <br>";
//     $aluno->adicionarLivrosEmprestado($livro1);
//     $livro1->marcarComoEmprestado();
//     $estante->removerLivro($livro1);
// }

// $aluno->adicionarLivrosEmprestado($livro2);
// $aluno->adicionarLivrosEmprestado($livro3);

print_r($aluno->podePegarEmprestado() ? "Pode" : "Não pode");
echo "<br>";
print_r($aluno->listarLivrosEmprestados());

echo '<hr>';

echo "<h2>Buscando Livro por: 1984</h2>";
$busca = $estante->buscaLivroAvancada("1984");
print_r($busca);
echo '<hr>';

echo "<h2>Livro Removido</h2>";
print_r($estante->removerLivro($livro1));
echo '<hr>';


echo "<h2>Pratileira de Livros</h2>";

print_r($estante->listarLivrosDisponiveis());
echo '<hr>';
