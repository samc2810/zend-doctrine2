<?php

/**
 * LICENSE
 *
 * This source file is subject to the new BSD license
 * It is  available through the world-wide-web at this URL:
 * http://www.petala-azul.com/bsd.txt
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to geral@petala-azul.com so we can send you a copy immediately.
 *
 * @package   Bvb_Grid
 * @author    Bento Vilas Boas <geral@petala-azul.com>
 * @copyright 2010 ZFDatagrid
 * @license   http://www.petala-azul.com/bsd.txt   New BSD License
 * @version   $Id$
 * @link      http://zfdatagrid.com
 */
class Bvb_Grid_Formatter_Number implements Bvb_Grid_Formatter_FormatterInterface {

    /**
     * Locale to be applied
     * @var mixed
     */
    protected $_options = array();

    /**
     * Constructor
     * 
     * @param array $options
     */
    public function __construct($options = array())
    {
        $this->_options = $options;

        if (!isset($this->_options['locale'])) {

            if (Zend_Registry::isRegistered('Zend_Locale')) {
                $locale = Zend_Registry::get('Zend_Locale');
            } else {
                $locale = new Zend_Locale();
            }

            $this->_options = array('locale' => $locale);
        }
    }

    /**
     * Formats a given value
     * @see library/Bvb/Grid/Formatter/Bvb_Grid_Formatter_FormatterInterface::format()
     */
    public function format($value)
    {
        if (!is_numeric($value)) {
            return $value;
        }
        return Zend_Locale_Format::toNumber($value, $this->_options);
    }

}