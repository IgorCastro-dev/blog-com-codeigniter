<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function limpar($string){
	$table = array(
        '/'=>'', '('=>'', ')'=>'',
    );
    // Traduz os caracteres em $string, baseado no vetor $table
    $string = strtr($string, $table);
	$string= preg_replace('/[,.;:`´^~\'"]/', null, iconv('UTF-8','ASCII//TRANSLIT',$string));
	$string= strtolower($string);
	$string= str_replace(" ", "-", $string);
	$string= str_replace("---", "-", $string);
	return $string;
}

function postadoem($string){
    
    $dia_sem= date('w', strtotime($string));

    if(strcmp($dia_sem,"0")){
    $semana = "Domingo";
    }elseif(strcmp($dia_sem,"1")){
    $semana = "Segunda-feira";
    }elseif(strcmp($dia_sem,"2")){
    $semana = "Terça-feira";
    }elseif(strcmp($dia_sem,"3")){
    $semana = "Quarta-feira";
    }elseif(strcmp($dia_sem,"4")){
    $semana = "Quinta-feira";
    }elseif(strcmp($dia_sem,"5")){
    $semana = "Sexta-feira";
    }else{
    $semana = "Sábado";
    }

 	$dia= date('d', strtotime($string));

	$mes_num = date('m', strtotime($string));
 	if(strcmp($mes_num,"00")){
    $mes= "Janeiro";
    }elseif(strcmp($mes_num,"01")){
    $mes = "Fevereiro";
    }elseif(strcmp($mes_num,"02")){
    $mes = "Março";
    }elseif(strcmp($mes_num,"03")){
    $mes = "Abril";
    }elseif(strcmp($mes_num,"04")){
    $mes = "Maio";
    }elseif(strcmp($mes_num,"05")){
    $mes = "Junho";
    }elseif(strcmp($mes_num,"06")){
    $mes = "Julho";
    }elseif(strcmp($mes_num,"07")){
    $mes = "Agosto";
    }elseif(strcmp($mes_num,"08")){
    $mes = "Setembro";
    }elseif(strcmp($mes_num,"09")){
    $mes = "Outubro";
    }elseif(strcmp($mes_num,"10")){
    $mes = "Novembro";
    }else{
    $mes = "Dezembro";
    }

    $ano = date('Y', strtotime($string));
    $hora = date('H:i', strtotime($string));
 
    return $semana.' '.$dia.' de '.$mes.' de '.$ano.' '.$hora;
}