<?php       // arquivo substitui cada letra do alfabeto com acentuação por sua versão sem acentuação

$foto = str_replace(" ", "_", $foto);
$foto = str_replace("-", "_", $foto);
$foto = str_replace("%", "_", $foto);
$foto = str_replace("#", "_", $foto);
$foto = str_replace("&", "_", $foto);
$foto = str_replace("$", "_", $foto);

$foto = str_replace("á", "a", $foto);
$foto = str_replace("à", "a", $foto);
$foto = str_replace("â", "a", $foto);
$foto = str_replace("ã", "a", $foto);
$foto = str_replace("ä", "a", $foto);
$foto = str_replace("å", "a", $foto);
$foto = str_replace("ā", "a", $foto);
$foto = str_replace("ă", "a", $foto);
$foto = str_replace("ą", "a", $foto);

$foto = str_replace("é", "e", $foto);
$foto = str_replace("è", "e", $foto);
$foto = str_replace("ê", "e", $foto);
$foto = str_replace("ë", "e", $foto);
$foto = str_replace("ē", "e", $foto);
$foto = str_replace("ĕ", "e", $foto);
$foto = str_replace("ė", "e", $foto);
$foto = str_replace("ę", "e", $foto);
$foto = str_replace("ě", "e", $foto);

$foto = str_replace("í", "i", $foto);
$foto = str_replace("ì", "i", $foto);
$foto = str_replace("î", "i", $foto);
$foto = str_replace("ï", "i", $foto);
$foto = str_replace("ī", "i", $foto);
$foto = str_replace("ĭ", "i", $foto);
$foto = str_replace("į", "i", $foto);
$foto = str_replace("ı", "i", $foto);

$foto = str_replace("ó", "o", $foto);
$foto = str_replace("ò", "o", $foto);
$foto = str_replace("ô", "o", $foto);
$foto = str_replace("õ", "o", $foto);
$foto = str_replace("ö", "o", $foto);
$foto = str_replace("ø", "o", $foto);
$foto = str_replace("ō", "o", $foto);
$foto = str_replace("ŏ", "o", $foto);
$foto = str_replace("ő", "o", $foto);
$foto = str_replace("ð", "o", $foto);

$foto = str_replace("ú", "u", $foto);
$foto = str_replace("ù", "u", $foto);
$foto = str_replace("û", "u", $foto);
$foto = str_replace("ü", "u", $foto);
$foto = str_replace("ũ", "u", $foto);
$foto = str_replace("ū", "u", $foto);
$foto = str_replace("ŭ", "u", $foto);
$foto = str_replace("ů", "u", $foto);
$foto = str_replace("ű", "u", $foto);
$foto = str_replace("ų", "u", $foto);

$foto = str_replace("ç", "c", $foto);
$foto = str_replace("Ç", "C", $foto);