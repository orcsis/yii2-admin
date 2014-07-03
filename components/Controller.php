<?php

namespace orcsis\admin\components;

/**
 * Description of Controller
 *
 * @author MDMunir
 * 
 * @property \orcsis\admin\Module $module
 */
class Controller extends \yii\web\Controller
{

    public function render($view, $params = [])
    {
        $position = $this->module->positionMenu;
        if (in_array($position, ['left', 'top', 'right'])) {
            return parent::render("/layouts/{$position}-menu", ['view' => $view, 'params' => $params]);
        } else {
            return parent::render($view, $params);
        }
    }
}