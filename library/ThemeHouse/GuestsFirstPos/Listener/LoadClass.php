<?php

class ThemeHouse_GuestsFirstPos_Listener_LoadClass extends ThemeHouse_Listener_LoadClass
{
    protected function _getExtendedClasses()
    {
        return array(
            'ThemeHouse_GuestsFirstPos' => array(
                'model' => array(
                    'XenForo_Model_Post',
                    'XenForo_Model_Thread',
                ), /* END 'model' */
                'controller' => array(
                    'XenForo_ControllerPublic_Thread',
                ), /* END 'controller' */
            ), /* END 'ThemeHouse_GuestsFirstPos' */
        );
    } /* END _getExtendedClasses */

    public static function loadClassModel($class, array &$extend)
    {
        $loadClassModel = new ThemeHouse_GuestsFirstPos_Listener_LoadClass($class, $extend, 'model');
        $extend = $loadClassModel->run();
    } /* END loadClassModel */

    public static function loadClassController($class, array &$extend)
    {
        $loadClassController = new ThemeHouse_GuestsFirstPos_Listener_LoadClass($class, $extend, 'controller');
        $extend = $loadClassController->run();
    } /* END loadClassController */
}