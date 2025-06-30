<?php
  
  $upload_dir = array(
    'img'=> '../../../../uploads/',
  );

  $imgset = array(
   'maxsize' => 2000,     // maximum file size, in KiloBytes (2 MB)
   'maxwidth' => 900,     // maximum allowed width, in pixels
   'maxheight' => 800,    // maximum allowed height, in pixels
   'minwidth' => 10,      // minimum allowed width, in pixels
   'minheight' => 10,     // minimum allowed height, in pixels
   'type' => array('bmp', 'gif', 'jpg', 'jpe', 'png'),  // allowed extensions
  );

  $re = '';
  if(isset($_FILES['upload']) && strlen($_FILES['upload']['name']) >1) {
    define('F_NAME', preg_replace('/\.(.+?)$/i', '', basename($_FILES['upload']['name'])));  //get filename without extension

    $protocol = !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
    $site = $protocol. $_SERVER['SERVER_NAME'] .'/';
    $sepext = explode('.', strtolower($_FILES['upload']['name']));
    $type = end($sepext);
    $upload_dir = in_array($type, $imgset['type']) ? $upload_dir['img'] : $upload_dir['audio'];
    $upload_dir = trim($upload_dir, '/') .'/';

  //checkings for image or audio
  if(in_array($type, $imgset['type'])){
    list($width, $height) = getimagesize($_FILES['upload']['tmp_name']);  // image width and height
    if(isset($width) && isset($height)) {
      if($width > $imgset['maxwidth'] || $height > $imgset['maxheight']) $re .= '\\n Largura x Altura = '. $width .' x '. $height .' \n\n O tamanho máximo é Largura x Altura de: '. $imgset['maxwidth']. ' x '. $imgset['maxheight'] . ' pixels';
      if($width < $imgset['minwidth'] || $height < $imgset['minheight']) $re .= '\\n Largura x Altura = '. $width .' x '. $height .'\n\n O tamanho mínimo é Largura x Altura de: '. $imgset['minwidth']. ' x '. $imgset['minheight']. ' pixels';
      if($_FILES['upload']['size'] > $imgset['maxsize']*1000) $re .= '\n\n Tamanho máximo do arquivo não deve ultrapassar: '. $imgset['maxsize']. ' KB.';
    }
  }
  else if(in_array($type, $audioset['type'])){
    if($_FILES['upload']['size'] > $audioset['maxsize']*1000) $re .= '\\n Maximum file size must be: '. $audioset['maxsize']. ' KB.';
  }
  else $re .= 'O arquivo: '. $_FILES['upload']['name']. ' não possui uma extensão válida.';

  /*
  //set filename; if file exists, and RENAME_F is 1, set "img_name_I"
  // $p = dir-path, $fn=filename to check, $ex=extension $i=index to rename
  function setFName($p, $fn, $ex, $i){
    if(RENAME_F ==1 && file_exists($p .$fn .$ex)) return setFName($p, F_NAME .'_'. ($i +1), $ex, ($i +1));
    else return $fn .$ex;
  }
  */

  $f_name = md5(date("dmYhis")). "." .$type;
  $uploadpath = $upload_dir . $f_name;  // full file path

  // If no errors, upload the image, else, output the errors
  if($re == '') {
    if(move_uploaded_file($_FILES['upload']['tmp_name'], $uploadpath)) {
      $CKEditorFuncNum = $_GET['CKEditorFuncNum'];
      $url = "../uploads/" . $f_name;
      $msg = F_NAME .'.'. $type .' enviada com sucesso!\n\n- Tamanho: '. number_format($_FILES['upload']['size']/1024, 2, '.', '') .' KB';
      $re = in_array($type, $imgset['type']) ? "window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')"  //for img
       : 'var cke_ob = window.parent.CKEDITOR; for(var ckid in cke_ob.instances) { if(cke_ob.instances[ckid].focusManager.hasFocus) break;} cke_ob.instances[ckid].insertHtml(\'<audio src="'. $url .'" controls></audio>\', \'unfiltered_html\'); alert("'. $msg .'"); var dialog = cke_ob.dialog.getCurrent();  dialog.hide();';
    }
    else $re = 'alert("Falha ao tentar enviar a imagem!")';
  }
  else $re = 'alert("'. $re .'")';
}
@header('Content-type: text/html; charset=utf-8');
echo '<script>'. $re .';</script>';