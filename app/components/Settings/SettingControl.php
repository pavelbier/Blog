<?php
/**
 * SettingControl.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date    16.02.13
 */

namespace Flame\Blog\Components\Settings;

class SettingControl extends \Flame\Application\UI\Control
{

	/** @var \Flame\Blog\Entity\Settings\SettingFacade */
	private $settingFacade;

	/** @var \Flame\Blog\Components\Settings\Forms\ISettingFormFactory */
	private $settingFormFactory;

	/**
	 * @param \Flame\Blog\Components\Settings\Forms\ISettingFormFactory $settingFormFactory
	 */
	public function injectSettingFormFactory(\Flame\Blog\Components\Settings\Forms\ISettingFormFactory $settingFormFactory)
	{
		$this->settingFormFactory = $settingFormFactory;
	}

	/**
	 * @param \Flame\Blog\Entity\Settings\SettingFacade $settingFacade
	 */
	public function injectSettingFacade(\Flame\Blog\Entity\Settings\SettingFacade $settingFacade)
	{
		$this->settingFacade = $settingFacade;
	}

	/**
	 * @return Forms\SettingForm
	 */
	protected function createComponentSettingForm()
	{
		$form = $this->settingFormFactory->create($this->settingFacade->getAvailableSetting(), $this->getDefaultValues());
		$form->onSuccess[] = $this->presenter->lazyLink('this');
		return $form;
	}

	/**
	 * @return array
	 */
	private function getDefaultValues()
	{
		$prepared = array();

		if(count($defaults = $this->settingFacade->getLast())){
			foreach($defaults as $setting){
				$prepared[$setting->getName()] = $setting->getValue();
			}
		}

		return $prepared;
	}
}
