<?php require 'pages/header.php'; ?>
<?php

if(empty($_SESSION['cLogin'])) {
    ?>
    <script type ="text/javascript">window.location.href = "login.php";</script>
    <?php
    exit;
}
?>

<div class="container">
    <h1>Meus anuçios - Adicionar anuncio</h1>

    <form method="POST" enctype = "multi/form-data">        <!-- 'multi/form-data' permite inserir imagens -->

    <div class="form-group">
        <label for = "categoria">Categoria:</label>
        <selct name = "categoria" id = "categoria" class="form-control" />
            <option></option>
        </select>
    </div>
    <div class="form-group">
        <label for = "titulo">Título:</label>
        <input type="text" name = "titulo" id = "titulo" class="form-control" />
        </select>
    </div>
    <div class="form-group">
        <label for = "valor">Valor:</label>
        <input type="text" name = "valor" id = "valor" class="form-control" />
        </select>
    </div>
    <div class="form-group">
        <label for = "descricao">Descrição:</label>
        <input type="text" name = "descricao" id = "descricao" class="form-control" />
        </select>
    </div>
    <div class="form-group">
        <label for = "estado">Estado de conservação:</label>
        <selct name = "estado" id = "estado" class="form-control" />
            <option value = "0">Ruim</option>
            <option value = "1">Bom</option>
            <option value = "2">Ótimo</option>
        </select>
    </div>
    <input type="submit" value = "Adicionar" class="btn btn-default" />
    </form>
</div

<?php require 'pages/footer.php'; ?>