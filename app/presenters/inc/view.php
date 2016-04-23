<?php

require_once 'conf.php';
//require_once 'smarty.php';
//require_once 'latte.php';
require_once(LA_DIR . 'latte.php');

//class View extends Smarty {
class View extends Latte\Engine {
    private $layout;
    
    public function __construct() {
        //parent::__construct();
        $this->SetLayout(DEFAULT_LAYOUT);
    }
    
    public function SetLayout($layout) {
        $this->layout = (file_exists(DIR_VIEW . $layout) ? $layout : '');
//        var_dump($this->layout);
//        echo gettype($this->layout);
//        $this->Show($this->layout, array(0 => "zzz"));
    }
    
    public function Show($tpl, $params = NULL) {
        
//        $this->render(DIR_VIEW . $tpl, $params);        
        
//        if (isset($params)) {
//            foreach ($params as $k=>$v) {
//                $this->assign($k, $v);
////                echo $k . '___\n' . $v . "\n";
//            }
//        }
////        echo $tpl;
//        $this->assign('view', $this);
////        echo $this->layout;
////        $this->layout='';
//        $this->layout = NULL;
//        echo empty($this->layout);
        if (empty($this->layout)) {
            $this->render(DIR_VIEW . $tpl, $params);
        }
        else {
//            $this->render(DIR_VIEW . $tpl, $params);
//            print_r($params);
            $parameters = $params + array(CONTENT_TPL_VAR => $tpl, 'view' => $this);
            $this->render(DIR_VIEW . $this->layout, $parameters);
        }
        
    }
}
