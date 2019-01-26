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
 * @date 03/03/18 16:28
 */

namespace Modules\Lang\Fields\Orm;


use Modules\Lang\Traits\LangOrmFieldTrait;
use Phact\Orm\Fields\TextField;

class LangTextField extends TextField
{
    use LangOrmFieldTrait;

    public $virtual = true;

    public $editable = false;

    public $rawGet = false;

    public $rawSet = false;

    public function getFieldsClass()
    {
        return TextField::class;
    }
}