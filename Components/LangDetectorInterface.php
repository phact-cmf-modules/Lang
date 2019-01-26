<?php
/**
 * Created by PhpStorm.
 * User: alexsandrskopin
 * Date: 26.01.2019
 * Time: 13:34
 */

namespace Modules\Lang\Components;


interface LangDetectorInterface
{
    public function detect(): string;
}