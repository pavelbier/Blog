<?php
/**
 * PostPresenter.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date    15.02.13
 */

namespace Flame\Blog\BackModule;

class PostPresenter extends BackPresenter
{

	/**
	 * @var \Flame\Blog\Entity\Posts\Post
	 */
	private $post;

	/**
	 * @autowire
	 * @var \Flame\Blog\Components\Posts\IPostControlFactory
	 */
	protected $postControlFactory;

	/**
	 * @autowire
	 * @var \Flame\Blog\Entity\Posts\PostFacade
	 */
	protected $postFacade;

	/**
	 * @return \Flame\Blog\Components\Posts\PostControl
	 */
	protected function createComponentPost()
	{
		return $this->postControlFactory->create($this->post);
	}

	/**
	 * @param null $id
	 */
	public function actionUpdate($id = null)
	{
		$this->post = $this->postFacade->getOne($id);
	}

}
