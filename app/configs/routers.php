<?php

// [A-Za-z]
// [0-9]+
// [a-zA-Z0-9]+
// [\da-fA-F]{8}-[\da-fA-F]{4}-[\da-fA-F]{4}-[\da-fA-F]{4}-[\da-fA-F]{12}

$routers['default_controller'] = 'home'; // controller mac dinh
$routers['default_action'] = 'index'; // action mac dinh

// vi du
$routers['san-pham/.+-(\d)'] = 'product/listID/$1'; 

// router web 
$routers['accout/id/([A-Za-z])'] = 'taikhoan/idtk/$1';

?>