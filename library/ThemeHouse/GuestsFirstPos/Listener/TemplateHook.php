<?php

class ThemeHouse_GuestsFirstPos_Listener_TemplateHook extends ThemeHouse_Listener_TemplateHook
{

    protected function _getHooks()
    {
        return array(
            'thread_view_form_before'
        );
    } /* END _getHooks */

    public static function templateHook($hookName, &$contents, array $hookParams, XenForo_Template_Abstract $template)
    {
        $templateHook = new ThemeHouse_GuestsFirstPos_Listener_TemplateHook($hookName, $contents, $hookParams, $template);
        $contents = $templateHook->run();
    } /* END templateHook */

    protected function _threadViewFormBefore()
    {
        $this->_prependTemplate('th_thread_view_form_before_guestsfirstpost');
    } /* END _threadViewFormBefore */
}