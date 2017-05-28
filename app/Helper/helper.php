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
?>