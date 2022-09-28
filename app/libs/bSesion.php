<!--
    __contructor ()
        ini_set()  --
        ini_set(sesion-name) --
        cambio cookie        
        tiempo inactivo (time - -sTime) ---- la sesion, para luego cerrarla  --
        comprobar ip --


        regen cada 1min
        rol     --
        comprobar rol --
        destroy --
        get --
        set --

-->
<?php
class Sesion
{
    function _constructor()
    {
        ini_set("session.name", "cliente");
        ini_set("session.gc_maxlifetime", "120");

        ini_set("session.cookiehttponly", "On");
        ini_set('session.use_only_cookies', "1");
        ini_set("session.cookie_lifetime", "120");

        ini_set("session.gc_probability", "1");
        ini_set("session.gc_divisor", "20");
        ini_set("session.gc_maxlifetime", "360");

        session_start();

        if (!isset($this->getAttribute('rol'))) {
            $this->setAttribute('rol', 0);
        }

        function compruebaSesion($rol = 1)
        {
            if ($_SESSION['rol'] >= $rol) {
                return true;
            } else {
                return false;
            }
        }

        $time = $this->getAttribute('time');
        $timelife = $this->getAttribute('timelife');

        $this->tiempoInactivo();
        $this->regenerarID();
    }

    /* *************************************** */

    function setAttribute($attribute, $value)
    {
        if (
            session_status() === PHP_SESSION_ACTIVE
            && is_string($attribute)
        ) {
            $_SESSION[$attribute] = $value;
        }
    }

    function getAttribute($attribute)
    {
        if (
            session_status() === PHP_SESSION_ACTIVE
            && is_string($attribute)
            && isset($_SESSION[$attribute])
        ) {
            return $_SESSION[$attribute];
        }
        return null;
    }

    function deleteAttribute($attribute)
    {
        if (
            session_status() === PHP_SESSION_ACTIVE
            && is_string($attribute)
            && isset($_SESSION[$attribute])
        ) {
            unset($_SESSION[$attribute]);
        }
    }

    function cerrarSesion()
    {
        session_unset();
        session_destroy();

        if (ini_get("session.use_cookies")) {

            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
        }

        throw new Exception("Se ha cerrado la sesion");
    }

    function tiempoInactivo()
    {
        if (time() - $this->getAttribute('time') >= 600)
            $this->cerrarSesion();
        else
            $this->setAttribute('time', time());
    }

    function regenerarID()
    {
        if (time() - $this->getAttribute('timelife') >= 100) {
            session_regenerate_id();
            $this->setAttribute('timelife', time());
        }
    }

    function comprobarIP()
    {
        if ($this->getAttribute('timelife') != $_SERVER['REMOTE_ADDR'])
            $this->cerrarSesion();
    }
}



?>