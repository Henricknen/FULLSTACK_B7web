<?php
use PHPUnit\Framework\TestCase;

class AssertativaTest extends TestCase {
    
    public function testDirExists() {       // teste verifica se diretorio existe

        $this-> assertDirectoryExists('classes');        // assertiva verifica se o diretorio 'classes' existe

    }

    public function testDirExistss() {

        $this-> assertDirectoryExists('diretorio_qualquer');        // assertiva dará erro pois 'diretorio_qualquer' não existe

    }

    public function testDirPermission1() {

        $this-> assertDirectoryIsReadable('tests');      // assertiva verifica se o diretorio espeçificado dentro das '' tem permissão de leitura
    }

    public function testDirPermission2() {

        $this-> assertDirectoryIsWritable('tests');      // verifica se o diretorio tem permissão de escrita
    }

    public function testFileEquals() {      // assertiva compara o 'conteúdo de dois arquivos distintos' verificando se são iguais

        $this-> assertFileEquals('lista1.txt', 'lista2.txt');       // o primeiro parâmetro 'lista1.txt' é o resultado esperado e o segundo parâmetro é o arquivo comparado

    }

}