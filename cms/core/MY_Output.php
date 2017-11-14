<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_output extends CI_Output {

    public function error_json($code, $data = '')
    {
        $this->set_content_type('application/json');
        $content = array(
            'code'      => $code,
            'msg'       => $data,
        );

        die(json_encode($content));
    }

    public function ok_json($data = null, $extend = null)
    {
        $this->set_content_type('application/json');
        $content = array(
            'code'      => 0,
            'msg'       => $data,
        );
        if (is_array($extend)) {
            $content = array_merge($content, $extend);
        }

        die(json_encode($content));
    }

    public function json_out($data)
    {
        $this->set_content_type('application/json');
        die(json_encode($data));
    }
}