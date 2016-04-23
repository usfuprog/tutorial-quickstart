<?php
try
{
    require_once 'tester.php';
    if (filter_input(INPUT_SERVER, 'QUERY_STRING')) {
        $prm = explode('?', filter_input(INPUT_SERVER, 'REQUEST_URI'));
        tester::TEST($prm . "____");
        $prm = trim($prm[0], '/');
        if (strlen($prm)) {
            $prm = $prm . '/';
        }
        tester::TEST($prm);
        foreach(filter_input_array(INPUT_GET) as $k=>$v) {
            $prm = $prm . $k . '/' . $v . '/';
        }
        tester::TEST($prm);
        header("Location: /" . $prm, TRUE, 301);
    }

//$string = 'April 15, 2003';
//$pattern = '/\d{3}/';
//$replacement = 'z';
//echo preg_replace($pattern, $replacement, $string);


//    print_r($GLOBALS);
//    print_r($_REQUEST);
//    print_r($_SERVER);
 //   echo "<hr>";
//    var_dump($_SERVER);
//    print_r($qs);
//    echo $_SERVER['REQUEST_URI'];
    
    define('__ROOT__', dirname(__FILE__) . '/');
    
    
    require_once 'conf.php';
    require_once 'user.php';
    require_once 'router.php';
    
    $v = array();
    $v['cookie_lifetime'] = 10;
//    var_dump($v);
    session_start($v);//pocemu eto ne rabotaet ???
    
    
    
    
//    $test = $_SERVER['HTTP_USER_AGENT'];
//    $browser = get_browser($test, true);
//    print_r($browser);
    
    $req_uri = filter_input(INPUT_SERVER, 'REQUEST_URI');
    
//    echo $req_uri;
    //$post_get = (filter_input_array(INPUT_POST) ?: array()) + (filter_input_array(INPUT_GET) ?: array());
    $post = filter_input_array(INPUT_POST);
    //print_r($post);
    $router = new Router($req_uri, $post);
    $ctrl = $router->Controller() ?: DEFAULT_CTRL;
    if (strtolower($ctrl) == 'index.php') {
        $ctrl = DEFAULT_CTRL;
    }
    
    $ctrl_php = 'controller_' . strtolower($ctrl) . '.php';
    $ctrl_class = 'Controller' . $ctrl;
    $action = $router->Action() ?: DEFAULT_ACTION;
    $params = $router->Params();

    require_once DIR_CTRL . $ctrl_php;
    $controller = new $ctrl_class();

 //   echo "&nbsp&nbsp&nbsp&nbsp";
//    echo $controller;
//    echo "&nbsp&nbsp&nbsp&nbsp";
//    echo $action;
//    echo "<hr>";)
//    if (isset($_SESSION['user'])) {
//        tester::TEST($_SESSION['user']); //var_dump ($_SESSION['user']);
//    }
//    else {
//        echo "not set";
//    }

//    echo $_SESSION['login'] . "••••••••";
    $controller->$action($params);
//    echo $SESSION['test'];
//    echo "&nbsp&nbsp&nbsp&nbsp";
//    echo $controller;
//    echo "&nbsp&nbsp&nbsp&nbsp";
//    echo $action;
//    echo $ctrl_class;
//    require_once 'latte.php';
    //tester::TEST($_SESSION['user']->login);
}
catch(Exception $ex) {
    echo 'Error!!!' . $ex;
}