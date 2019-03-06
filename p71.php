<?php
//---------前処理-------------//
require '../lib/SubLib.php';
	$name = $_POST['name'];
  $com = $_POST['com'];
    $fname='bbs.csv';



//---------主処理-------------//

//-------存在チェック-------//
if(!file_exists($fname))
{
  errsub('エラー',$fname,'ファイルが存在しません','','');
}

//-------空白チェック-------//
if($name==''|| $com=='')
{
	errsub('エラー','入力エラー','入力されていません','');
}

//-------レコードの作成-------//
$rec=$name.','.$mall.','.$com."\n";

$fp=fopen("bbs.csv","a");

if(!$fp)
{
errsub('エラー','処理エラー','ファイル'.$fname.'openされていません','');

}


//--------ファイル追加書き込み--------//
fputs($fp,$rec);

fclose($fp);//閉じる

$rtbl=file($fname);//一括受信


//-------反転-------//

$retbl=array_reverse($rtbl);

$rcnt=count($retbl);//レコード数の所得





//---------後処理-------------//
?>



<html>
<head>
<META HTTP-EQUIV="Content-Type"
			  CONTENT="text/html;charset=UTF-8">
<title>bbs</title>
</head>
	<body>



 <?php for($i=0;$i<$rcnt;$i++){ 
list($name,$mall,$com)=explode(',', $retbl[$i]);
  ?>



<div>

  <p>名前<?= $name[$i] ?> </p>
  <p>メール<?= $mall[$i] ?> </p>
  <p>コマンド<?= $com[$i] ?> </p>
  <hr>
</div>
 <?php  } ?>

    
  </body>
  </META>
  </html>




