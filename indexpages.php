<?

  	require_once '../setup.php';

  	switch ($page) {
 		case 'mainPage': 
			$smarty = new Smarty;
  			$smarty->compile_check = true;
			$smarty->display($actions['mainPage']);
			break;
  	}

?>