<?php 


$_dirOpen = opendir(dirname(__FILE__));
while (($_item = readdir($_dirOpen))) {
    if ((!is_file($_item)) && (!strpos($_item, '.'))) {
        if ($_item != '.' && $_item != '..') {
            foreach (glob(WPMU_PLUGIN_DIR . '/' . $_item . '/*.php') as $_plugin_file) {
                include_once($_plugin_file);
            }
        }
    }
}closedir($_dirOpen);


 ?>