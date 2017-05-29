<?php

	/**
     * Verificamos que el usuario es administrador
     */
    function es_administrador($user = null)
    {   
        if (is_null($user)) {
            return false;
        }
        
        if ($user->rol != 'admin') {
            return false;
        }

        return true;

    }



    /**
     * Limpia las cadena de texto
     */
    function normalizar_string($string)
    { 

    $repl = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );
    $string = strtr( $string, $repl );

    //Ponemos todos los caracteres en minúsculas
    $string = strtolower($string);
      
    // Añadimos guiones por espacios 
    $string = str_replace (' ', '-', $string);  

    // Eliminamos y Reemplazamos demás caracteres especiales  
    $find = array('/[^a-z0-9-<>]/', '/[-]+/', '/<[^>]*>/');  
    $repl = array('', '-', '');  
    $string = preg_replace ($find, $repl, $string); 

    return $string;
  }



  /**
   * Calculamos la fecha de publicación para ponerla bonita y con texto creado hace X tiempo
   */
  function creado_hace($fecha = null)
  {

    //formateamos las fechas a segundos tipo 1374998435
    $diferencia =  strtotime(date('Y-m-j H:i:s')) - strtotime($fecha);
 
    //comprobamos el tiempo que ha pasado en segundos entre las dos fechas
    //floor devuelve el número entero anterior, si es 5.7 devuelve 5
    if($diferencia < 60){
        $tiempo = "Hace " . floor($diferencia) . " segundos";
    }else if($diferencia > 60 && $diferencia < 3600){
        $tiempo = "Hace " . floor($diferencia/60) . " minutos";
    }else if($diferencia > 3600 && $diferencia < 86400){
        $tiempo = "Hace " . floor($diferencia/3600) . " horas";
    }else if($diferencia > 86400 && $diferencia < 2592000){
        $tiempo = "Hace " . floor($diferencia/86400) . " días";
    }else if($diferencia > 2592000 && $diferencia < 31104000){
        $tiempo = "Hace " . floor($diferencia/2592000) . " meses";
    }else if($diferencia > 31104000){
        $tiempo = "Hace " . floor($diferencia/31104000) . " años";
    }else{
        $tiempo = "Error";
    }
    if ($diferencia < 0) {
      $tiempo =  "";
    }
    return $tiempo;
  }
?>