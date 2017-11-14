<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Input extends CI_Input {

    public function is_get()
    {
        return strtoupper($this->server('REQUEST_METHOD')) == 'GET' ? true : false;
    }

    public function is_post()
    {
        return strtoupper($this->server('REQUEST_METHOD')) == 'POST' ? true : false;
    }

    public function is_put()
    {
        return strtoupper($this->server('REQUEST_METHOD')) == 'PUT' ? true : false;
    }

    public function is_delete()
    {
        return strtoupper($this->server('REQUEST_METHOD')) == 'DELETE' ? true : false;
    }

}