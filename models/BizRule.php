<?php

namespace orcsis\admin\models;

use orcsis\admin\components\BizRule as TBizRule;
use yii\rbac\Rule;
use Yii;

/**
 * Description of BizRule
 *
 * @author MDMunir
 */
class BizRule extends \yii\base\Model
{
    /**
     * @var string name of the rule
     */
    public $name;

    /**
     * @var integer UNIX timestamp representing the rule creation time
     */
    public $createdAt;

    /**
     * @var integer UNIX timestamp representing the rule updating time
     */
    public $updatedAt;

    /**
     *
     * @var string 
     */
    public $expresion;
    public $className;

    /**
     *
     * @var Rule 
     */
    private $_item;

    /**
     * 
     * @param \yii\rbac\Rule $item
     * @param array $config
     */
    public function __construct($item, $config = [])
    {
        $this->_item = $item;
        if ($item !== null) {
            $this->name = $item->name;
            $this->className = get_class($item);
            if ($this->className === TBizRule::className()) {
                $this->expresion = $item->expresion;
            }
        }
        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['expresion'], 'string'],
            [['className'], 'classExists']
        ];
    }

    public function classExists()
    {
        if (!class_exists($this->className) || !is_subclass_of($this->className, Rule::className())) {
            $this->addError('className', "Unknown Class: {$this->className}");
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'expresion' => 'Expresion',
        ];
    }

    public function getIsNewRecord()
    {
        return $this->_item === null;
    }

    public static function find($id)
    {
        $item = Yii::$app->authManager->getRule($id);
        if ($item !== null) {
            return new self($item);
        }
        return null;
    }

    public function save()
    {
        if ($this->validate()) {
            $manager = Yii::$app->authManager;
            $this->className = $class = $this->className ? $this->className : TBizRule::className();
            if ($this->_item === null) {
                $this->_item = new $class();
                $isNew = true;
            } else {
                $isNew = false;
                $oldName = $this->_item->name;
            }
            $this->_item->name = $this->name;
            if ($class === TBizRule::className()) {
                $this->_item->expresion = $this->expresion;
            }

            if ($isNew) {
                $manager->add($this->_item);
            } else {
                $manager->update($oldName, $this->_item);
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * 
     * @return Item
     */
    public function getItem()
    {
        return $this->_item;
    }
}