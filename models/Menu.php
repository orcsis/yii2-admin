<?php

namespace orcsis\admin\models;

use Yii;
use orcsis\admin\components\Configs;

/**
 * This is the model class for table "osmenu".
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
 * @property Menu $menuParent Menu parent
 * @property Menu[] $menus Menu children
 *
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class Menu extends \yii\db\ActiveRecord
{
    public $parent_name;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return Configs::instance()->menuTable;
    }

    /**
     * @inheritdoc
     */
    public static function getDb()
    {
        if (Configs::instance()->db !== null) {
            return Configs::instance()->db;
        } else {
            return parent::getDb();
        }
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
                'range' => static::find()->select(['men_nombre'])->column(),
                'message' => 'Menu "{value}" no encontrado.'],
			[['men_modulo'], 'in',
				'range' => Configs::getModules(),
                'message' => 'Módulo "{value}" no encontrado.'],
            [['men_parent', 'men_url', 'men_data', 'men_orden', 'men_modulo'], 'default'],
            [['men_orden'], 'integer'],
            [['men_url'], 'in',
                'range' => static::getSavedRoutes(),
                'message' => 'Url "{value}" no encontrada.']
        ];
    }

    /**
     * Use to loop detected.
     */
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
            $this->men_parent = $parent_id;
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
            'men_modulo' => 'Módulo',
            'men_data' => 'Configuración',
            'men_orden' => 'Orden',
            'men_descri' => 'Descripción'
        ];
    }

    /**
     * Get menu parent
     * @return \yii\db\ActiveQuery
     */
    public function getMenuParent()
    {
        return $this->hasOne(Menu::className(), ['men_id' => 'men_parent']);
    }

    /**
     * Get menu children
     * @return \yii\db\ActiveQuery
     */
    public function getMenus()
    {
        return $this->hasMany(Menu::className(), ['men_parent' => 'men_id']);
    }

    /**
     * Get saved routes.
     * @return array
     */
    public static function getSavedRoutes()
    {
        $result = [];
        foreach (Yii::$app->getAuthManager()->getPermissions() as $name => $value) {
            if ($name[0] === '/' && substr($name, -1) != '*') {
                $result[] = $name;
            }
        }

        return $result;
    }
}
