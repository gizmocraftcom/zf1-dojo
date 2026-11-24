<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Dojo
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */

/**
 * Enable Dojo components
 *
 * @package    Zend_Dojo
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id$
 */
class Zend_Dojo
{
    /**
     * Base path to AOL CDN
     *
     * @deprecated The AOL CDN no longer serves Dojo (HTTP 403). Kept so existing code keeps working; use
     *             Zend_Dojo::CDN_BASE_GOOGLE or another CDN through setCdnBase().
     */
    const CDN_BASE_AOL = 'https://o.aolcdn.com/dojo/';

    /**
     * Path to dojo on AOL CDN (following version string)
     *
     * @deprecated See Zend_Dojo::CDN_BASE_AOL.
     */
    const CDN_DOJO_PATH_AOL = '/dojo/dojo.xd.js';

    /**
     * Base path to Google CDN
     */
    const CDN_BASE_GOOGLE = 'https://ajax.googleapis.com/ajax/libs/dojo/';

    /**
     * Path to dojo on Google CDN (following version string)
     *
     * Dojo 1.7 and later is cross-domain capable through dojo.js; the Google CDN has no dojo.xd.js after 1.6.1.
     * For Dojo 1.6.1 and earlier call setCdnDojoPath('/dojo/dojo.xd.js').
     */
    const CDN_DOJO_PATH_GOOGLE = '/dojo/dojo.js';

    /**
     * Dojo-enable a form instance
     *
     * @param  Zend_Form $form
     * @return void
     */
    public static function enableForm(Zend_Form $form)
    {
        $form->addPrefixPath('Zend_Dojo_Form_Decorator', 'Zend/Dojo/Form/Decorator', 'decorator')
             ->addPrefixPath('Zend_Dojo_Form_Element', 'Zend/Dojo/Form/Element', 'element')
             ->addElementPrefixPath('Zend_Dojo_Form_Decorator', 'Zend/Dojo/Form/Decorator', 'decorator')
             ->addDisplayGroupPrefixPath('Zend_Dojo_Form_Decorator', 'Zend/Dojo/Form/Decorator')
             ->setDefaultDisplayGroupClass('Zend_Dojo_Form_DisplayGroup');

        foreach ($form->getSubForms() as $subForm) {
            self::enableForm($subForm);
        }

        if (null !== ($view = $form->getView())) {
            self::enableView($view);
        }
    }

    /**
     * Dojo-enable a view instance
     *
     * @param  Zend_View_Interface $view
     * @return void
     */
    public static function enableView(Zend_View_Interface $view)
    {
        if (false === $view->getPluginLoader('helper')->getPaths('Zend_Dojo_View_Helper')) {
            $view->addHelperPath('Zend/Dojo/View/Helper', 'Zend_Dojo_View_Helper');
        }
    }
}
