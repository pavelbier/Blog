<?php
/**
 * UserPresenter.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date    16.02.13
 */

namespace Flame\Blog\BackModule;

class UserPresenter extends BackPresenter
{

	/**
	 * @autowire
	 * @var \Flame\Blog\UserModule\Components\Users\IUserControlFactory
	 */
	protected $userControlFactory;

	/**
	 * @return \Flame\Blog\UserModule\Components\Users\UserControl
	 */
	protected function createComponentUser()
	{
		return $this->userControlFactory->create();
	}

}
