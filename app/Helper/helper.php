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
?>