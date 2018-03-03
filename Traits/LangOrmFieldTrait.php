<?php
/**
 *
 *
 * All rights reserved.
 *
 * @author Okulov Anton
 * @email qantus@mail.ru
 * @version 1.0
 * @company OrderTarget
 * @site http://ordertarget.ru
 * @date 03/03/18 16:29
 */

namespace Modules\Lang\Traits;


use Exception;
use Modules\Lang\Components\Lang;
use Phact\Main\Phact;
use Phact\Orm\Model;

trait LangOrmFieldTrait
{
    public $primaryNull = false;

    public $secondaryNull = false;

    public function setValue($value, $aliasConfig = null)
    {
        throw new Exception("You cannot set value for LangField, please use lang-depends fields");
    }

    public function getValue($aliasConfig = null)
    {
        /** @var Model $model */
        $model = $this->getModel();
        return $model->getFieldValue($this->getCurrentLangName());
    }

    public function getAdditionalFields()
    {
        $fields = [];
        $langs = $this->getLangComponent()->getLangs();
        $primaryLang = $this->getLangComponent()->getPrimaryLang();
        foreach ($langs as $lang) {
            $upperLang = strtoupper($lang);
            $name = $this->buildLangName($lang);
            $fields[$name] = [
                'class' => $this->getFieldsClass(),
                'null' => $lang == $primaryLang ? $this->primaryNull : $this->secondaryNull,
                'label' => $this->label ? $this->label . " ($upperLang)": $this->label,
                'default' => $this->default
            ];
        }
        return $fields;
    }

    public function getFieldsNames()
    {
        return array_map(function ($lang) {
            return $this->buildLangName($lang);
        }, $this->getLangComponent()->getLangs());
    }

    public function getCurrentLangName()
    {
        $langCurrent = $this->getLangComponent()->getCurrentLang();
        return $this->buildLangName($langCurrent);
    }

    public function buildLangName($lang)
    {
        return $this->getName() . '_' . $lang;
    }

    /**
     * @return Lang
     */
    public function getLangComponent()
    {
        return Phact::app()->lang;
    }

    abstract public function getFieldsClass();
}