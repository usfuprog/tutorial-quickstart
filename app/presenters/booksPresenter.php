<?php

namespace App\Presenters;

use Nette;


class booksPresenter extends BasePresenter
{
	/** @var Nette\Database\Context */
	private $database;


	public function __construct(Nette\Database\Context $database)
	{
		$this->database = $database;
                define('DIR_INC', str_replace('\\', '/', __DIR__) . '/inc/');
                
	}


	public function renderList()
	{
        try
        {
            require_once DIR_INC . 'tester.php';

            define('__ROOT__', dirname(__FILE__) . '/');


            require_once DIR_INC . 'conf.php';
            require_once DIR_INC . 'user.php';
            require_once DIR_INC . 'router.php';
            
            $this->getHttpResponse()->setCookie("uri", $_SERVER['REQUEST_URI'], time()+5);
            
        }
        catch(Exception $ex) {
            echo 'Error!!!' . $ex;
        }
            $this->template->books = 
            $this->database->query('call sp_getAllBooks()')->fetchAll();
	}

}
