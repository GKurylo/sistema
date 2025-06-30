<?php
session_start();
include('conexao.php');

$sql = $conn->prepare("SELECT * FROM horarios");
$sql->execute();
$dados = $sql->fetch();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Edição de Horarios</title>
    
    <?php include("app-header.php"); ?>
   <script src="../CKeditor/ckeditor.js"> type="text/css" </script>
</head>

<body>

    <?php include("app-lateral.php"); ?>

    <!-- Conteudo -->
    <div class="content-body" style="min-height: 899px;">
        <div class="container-fluid">
            <div class="row">
                <div class="card p-2">

                    <h1>Edite o horário da secretaria e das aulas!</h1>

                    <div class="row mt-3 ">
                        <form action="horario-acao.php" method="post" class="row">
                            <div class="col-12 "><br>
                                <label for="secretaria">Secretaria:</label>
                                <textarea placeholder="" type="textarea" class="form-control placeholder:text-sm"
                                    id="secretaria" name="txtSecretaria" rows="10"
                                    cols="33"><?php
                                    echo $dados["secretaria"];
                                    ?></textarea>
                            </div>

                            <div class="col-12 "><br>
                                <label for="aulas">Aulas:</label>
                                <textarea placeholder="" type="textarea" class="form-control placeholder:text-sm"
                                    id="aulas" name="txtAulas" rows="10"
                                    cols="33"><?php
                                    echo $dados["aulas"];
                                    ?></textarea>
                            </div>

                            <div class="col-12 text-center">
                                <input value="Gravar" type="submit" class="btn btn-success mt-3">
                            </div> <br>
                        </form>
                    </div> <br>

                </div>
            </div>
        </div>
    </div>

    <?php include("app-footer.php"); ?>


    <?php include("app-script.php"); ?>

  <script type="text/javascript">
 $(function () {
        CKEDITOR.replace('secretaria', {
            enterMode: CKEDITOR.ENTER_BR,
            filebrowserImageBrowseUrl: 'app-imgupload.php?list=1',
            filebrowserImageUploadUrl: 'app-imgupload.php',
            filebrowserWindowWidth: '882',
            filebrowserWindowHeight: '600',
            height: '500',
            extraPlugins: 'tableresize'
        });
        CKEDITOR.config.skin = 'bootstrapck';
        CKEDITOR.config.forcePasteAsPlainText = true;
        CKEDITOR.config.toolbar = [
            ["Source", "Preview", "Bold", "Italic", "Underline", "Strike", "StrikeThrough", "-", "Undo", "Redo", "-", "Cut", "Copy", "Paste", "Find", "SelectAll", "Replace", "-", "Outdent", "Indent", "NumberedList", "BulletedList"], ["FontSize"], ["Table", "Image", "SpecialChar", "HorizontalRule", "TextColor", "BGColor", "-", "JustifyLeft", "JustifyCenter", "JustifyRight", "JustifyBlock"], ["Link", "Unlink"]
        ];
        CKEDITOR.config.resize_enabled = false; 

        CKEDITOR.replace('aulas', {
            enterMode: CKEDITOR.ENTER_BR,
            filebrowserImageBrowseUrl: 'app-imgupload.php?list=1',
            filebrowserImageUploadUrl: 'app-imgupload.php',
            filebrowserWindowWidth: '882',
            filebrowserWindowHeight: '600',
            height: '500',
            extraPlugins: 'tableresize'
        });
    });
    </script>
    

</body>


</html>