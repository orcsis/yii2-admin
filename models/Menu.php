<?php

namespace orcsis\admin\models;

use Yii;
use orcsis\admin\components\AccessHelper;

/**
 * Model Class para la tabla "osmenu".
 *
 * @property integer $men_id
 * @property string $men_nombre
 * @property integer $men_parent
 * @property string $men_descri
 * @property string $men_modulo 
 * @property string $men_url
 * @property integer $men_orden
 * @property string $men_data
 * 
 * @property Menu $menuParent
 * @property Menu[] $menus
 */
class Menu extends \yii\db\ActiveRecord
{
    public $parent_name;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'osmenu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['men_nombre'], 'required'],
            [['parent_name'], 'filterParent'],
            [['parent_name'], 'in',
                'range' => self::find()->select(['men_nombre'])->column(),
                'message' => 'Menú "{value}" no encontrado.'],
            [['men_parent', 'men_url', 'men_data', 'men_orden'], 'default'],
            [['men_orden'], 'integer'],
            [['men_url'], 'in',
                'range' => AccessHelper::getSavedRoutes(),
                'message' => 'Url "{value}" no encontrada.']
        ];
    }

    public function filterParent()
    {
        $value = $this->parent_name;
        $parent = self::findOne(['men_nombre' => $value]);
        if ($parent) {
            $id = $this->men_id;
            $parent_id = $parent->men_id;
            while ($parent) {
                if ($parent->men_id == $id) {
                    $this->addError('parent_name', 'Bucle detectado.');
                    return;
                }
                $parent = $parent->menuParent;
            }
            $this->parent = $parent_id;
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'men_id' => 'ID',
            'men_nombre' => 'Nombre',
            'men_parent' => 'Padre',
            'parent_name' => 'Padre',
            'men_url' => 'Url/Ruta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuParent()
    {
        return $this->hasOne(Menu::className(), ['men_id' => 'men_parent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenus()
    {
        return $this->hasMany(Menu::className(), ['men_parent' => 'men_id']);
    }
}