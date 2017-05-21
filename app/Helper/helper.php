<?php

	/**
     * Verificamos que el usuario es administrador
     */
    function es_administrador($user)
    { 
        if ($user->rol != 'admin') {
            return false;
        }

        return true;

    }
?>