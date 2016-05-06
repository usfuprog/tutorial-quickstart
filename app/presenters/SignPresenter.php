<?php

namespace App\Presenters;

use Nette;
use App\Forms\SignFormFactory;


class SignPresenter extends BasePresenter
{
	/** @var SignFormFactory @inject */
	public $factory;

	/**
	 * Sign-in form factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentSignInForm()
	{
		$form = $this->factory->create();
		$form->onSuccess[] = function ($form) {
			$form->getPresenter()->redirect('Homepage:');
		};
		return $form;
	}


	public function actionOut()
	{
		$this->getUser()->logout();
		$this->flashMessage('You have been signed out.');
		$this->redirect('Homepage:');
	}
        
        public function handleForm()
        {
            if ($this->isAjax()) {
                $this->redrawControl('login');
            }
        }
        
        
        public function renderForm()
        {
//            \Tracy\Debugger::log($this->template);
//            $latte = new \Latte\Engine;
//            $callModal = '===';
//            $latte->render('layout.latte', $callModal);
            $this->template->callModal = 'zzz';
            $this->callModal = 'zzz';
            $this->redrawControl('script');
            if ($this->filter)
                \Tracy\Debugger::log($this->template);
        }
}
