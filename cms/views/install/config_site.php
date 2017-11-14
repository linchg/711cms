defined('BASEPATH') OR exit('No direct script access allowed');

$config['site'] = array(
<?php foreach ($settings as $set) : ?>
    '<?php echo $set['s_key']; ?>'         => '<?php echo $set['s_value']; ?>',
<?php endforeach; ?>
);
