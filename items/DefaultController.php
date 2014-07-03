<?php

namespace orcsis\admin\items;

class DefaultController extends \orcsis\admin\components\Controller
{
	public function actionIndex()
	{
		return $this->render('index');
	}

}
