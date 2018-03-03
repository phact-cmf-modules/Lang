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
 * @date 03/03/18 16:23
 */

namespace Modules\Lang\Components;


use Phact\Helpers\SmartProperties;

abstract class Lang
{
    use SmartProperties;

    protected $_langs = [];

    protected $_primaryLang = '';

    /**
     * @return array
     */
    public function getLangs()
    {
        return $this->_langs;
    }

    /**
     * @param array $langs
     */
    public function setLangs($langs = [])
    {
        $this->_langs = $langs;
    }

    /**
     * @return string
     */
    public function getPrimaryLang()
    {
        return $this->_primaryLang;
    }

    /**
     * @param string $primaryLang
     */
    public function setPrimaryLang($primaryLang)
    {
        $this->_primaryLang = $primaryLang;
    }

    abstract public function getCurrentLang();
}