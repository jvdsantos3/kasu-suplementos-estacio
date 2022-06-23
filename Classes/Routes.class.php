<?php

class Routes
{
    /**@var array $_uri */
    private $_uri = [];

    /**@var array $_methods */
    private $_methods = [];

    public function add(string $uri, $method = null)
    {    
        $this->_uri[] = "/" . trim($uri, '/');

        if (!is_null($method)) {
            $this->_methods[$uri] = $method;
        }
    }

    public function submit()
    {
        $url = urldecode(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
        );

        foreach ($this->_uri as $key => $value) {
            if (preg_match("#^$value$#", $url)) {
                call_user_func($this->_methods[$value]);
                return true;
            } 
        }

        echo 'Pagina não encontrada!';
    }
}
