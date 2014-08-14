<?php
//if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('script_tag'))
{
    function script_tag($script_file = '')
    {
            if ($script_file )
              $script = '<script type="text/javascript" type="screen" src="'.base_url().$script_file.'"></script>';

            return $script;
    }
}

function pre($array = '',$msg="" )
{
    echo "<pre> $msg "; print_r($array); echo "</pre>";
}


function app_file_extension($filename=""){
    return strtolower(substr(strrchr($filename, '.'), 1));
}

function app_galeria_imagen($path="",$img="",$param=""){
    $extension = strtolower(app_file_extension($img));
    $imginfo = getimagesize($path.$img);
    $width = ( (int)$imginfo[0] > 70)? 70 : (int)$imginfo[0]; 
    $border = (isset($param['style']['border']))? $param['style']['border'] :'border:solid 1px #d0d0d0;'; 
    $str_imagen = '';
    if(in_array($extension, array('jpg','jpeg','jpe','png','gif'))){
        $str_imagen ='<div style="float:left; width:73px; padding:3px; '.$border.' margin-top: 3px; margin-right: 3px; text-align: center; overflow: hidden"><a href="###" rel="'.$path.$img.'" onclick="img_selected(this.rel)" title="'.$img.'"><img src="'.$path.$img.'" width="'.$width.'" ></a><div style="font-size: 10px; height:25px; border-top:solid 0px #d0d0d0; overflow: hidden;">'.$img.'</div></div>';
    }

    return $str_imagen;
}

function app_format_size($size) {
    $mod = 1024;
    $units = explode(' ','B KB MB GB TB PB');
    for ($i = 0; $size > $mod; $i++) {
        $size /= $mod;
    }
    return round($size, 2) . ' ' . $units[$i];
}


function cbo_anio($opIni="", $inicio="", $fin=""){
    $anio_inicio = (strlen($inicio) ==4 and (int)$inicio > 0 )? $inicio : 1900;
    $anio_final = (strlen($fin) ==4 and (int)$fin > 0 )? $fin : date("Y");

    $arr['0000'] = $opIni;
    for($i = $anio_final; $i >= $anio_inicio; $i-- ){
        $arr[$i] = $i;
    }

    return $arr;
}

function cbo_mes($opIni="")
{

    $arr = array('00' => $opIni,
                 '01' => 'Enero',
                 '02' => 'Febrero',
                 '03' => 'Marzo',
                 '04' => 'Abril',
                 '05' => 'Mayo',
                 '06' => 'Junio',
                 '07' => 'Julio',
                 '08' => 'Agosto',
                 '09' => 'Septiembre',
                 '10' => 'Octubre',
                 '11' => 'Noviembre',
                 '12' => 'Diciembre'
                );

    return $arr;
}



function cbo_dia($opIni="", $mes =0, $anio=0)
{
    $dia_inicial = 1;
    $dia_final = 31;
    if($mes > 0 and $anio >1900) $dia_final = ultimo_dia($anio,$mes);

    $arr['00'] = $opIni;
    for($i= $dia_inicial; $i <= $dia_final; $i++)
    {
        $dia = (strlen($i)==1)? "0".$i: $i;
        $arr[$dia] = $dia;
    }

    return $arr;
}


function ultimo_dia($anio,$mes){

   if($anio)
       if (((fmod($anio,4)==0) and (fmod($anio,100)!=0)) or (fmod($anio,400)==0)) {
           $dias_febrero = 29;
       } else {
           $dias_febrero = 28;
       }

   switch($mes) {
       case 01: return 31; break;
       case 02: return $dias_febrero; break;
       case 03: return 31; break;
       case 04: return 30; break;
       case 05: return 31; break;
       case 06: return 30; break;
       case 07: return 31; break;
       case 08: return 31; break;
       case 09: return 30; break;
       case 10: return 31; break;
       case 11: return 30; break;
       case 12: return 31; break;
   }
}

function app_js_acento(){
    $str ="
        var acento_a = '\u00e1';\n
        var acento_e = '\u00e9';\n
        var acento_i = '\u00ed';\n
        var acento_o = '\u00f3';\n
        var acento_u = '\u00fa';\n
        var acento_A = '\u00c1';\n
        var acento_E = '\u00c9';\n
        var acento_I = '\u00cd';\n
        var acento_O = '\u00d3';\n
        var acento_U = '\u00da';\n
        var acento_n = '\u00f1';\n
        var acento_N = '\u00d1';\n
    ";
    return $str;
}
