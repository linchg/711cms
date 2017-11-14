<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['upload_image'] = array(
    'upload_path'   => UPLOADPATH.'images',
    'allowed_types' => 'gif|jpg|png',
    'max_size'      => 10240,
    'max_width'     => 0,
    'max_height'    => 0,
    'overwrite'     => false,
    'encrypt_name'  => true,
    'remove_spaces' => true,
);

$config['upload_apk'] = array(
    'upload_path'   => UPLOADPATH.'apk',
    'allowed_types' => 'apk',
    'max_size'      => 0,
    'overwrite'     => false,
    'encrypt_name'  => true,
    'remove_spaces' => true,
    'detect_mime' => false,
);
$config['upload_text'] = array(
    'upload_path'   => UPLOADPATH,
    'allowed_types' => 'txt',
    'max_size'      => 1024,
    'max_width'     => 0,
    'max_height'    => 0,
    'overwrite'     => false,
    'encrypt_name'  => true,
    'remove_spaces' => true,
);