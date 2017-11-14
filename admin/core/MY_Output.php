<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_output extends CI_Output {

    public function error_json($code, $data = '')
    {
        $this->set_content_type('application/json');
        $content = array(
            'code' => $code,
            'msg'  => $data,
        );

        die(json_encode($content));
    }

    public function ok_json($data = null)
    {
        $this->set_content_type('application/json');
        $content = array(
            'code' => 0,
            'msg'  => $data,
        );

        die(json_encode($content));
    }

    public function upload_error($msg)
    {
        $msg = str_ireplace('<p>', '', $msg);
        $msg = str_ireplace('</p>', '', $msg);
        die('Error:'.$msg);
    }

    public function upload_ok($msg)
    {
        if (is_array($msg)) {
            $msg = implode('|', $msg);
        }
        die($msg);
    }
}