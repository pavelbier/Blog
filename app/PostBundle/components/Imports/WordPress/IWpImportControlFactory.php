<?php
/**
 * IWpImportControlFactory.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date    17.02.13
 */

namespace Flame\Blog\PostBundle\Components\Imports\WordPress;

interface IWpImportControlFactory
{

	/**
	 * @return WpImportControl
	 */
	public function create();

}
