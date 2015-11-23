<?php

/**
 *
 * @see XenForo_ControllerPublic_Thread
 */
class ThemeHouse_GuestsFirstPos_Extend_XenForo_ControllerPublic_Thread extends XFCP_ThemeHouse_GuestsFirstPos_Extend_XenForo_ControllerPublic_Thread
{

    /**
     *
     * @see XenForo_ControllerPublic_Thread::actionAddReply()
     */
    public function actionAddReply()
    {
        $response = parent::actionAddReply();

        $threadId = $this->_input->filterSingle('thread_id', XenForo_Input::UINT);

        $firstPostOnly = false;

        if (XenForo_Application::getOptions()->th_guestsFirstPost_allForums && !XenForo_Visitor::getUserId()) {
            return $this->responseError(new XenForo_Phrase('th_must_be_registered_guestsfirstpost'));
        }

        if (XenForo_Application::getOptions()->th_guestsFirstPost_checkNodePermissions) {
            $nodeId = $this->_getPostModel()->getNodeIdByThreadId($threadId);
            if (XenForo_Visitor::getInstance()->hasNodePermission($nodeId, 'showFirstPostOnly')) {
                $firstPostOnly = true;
            }
        } elseif (XenForo_Visitor::getInstance()->hasPermission('forum', 'showFirstPostOnly')) {
            $firstPostOnly = true;
        }

        if ($firstPostOnly) {
            return $this->responseError(new XenForo_Phrase('th_do_not_have_permission_guestsfirstpost'));
        }

        return $response;
    } /* END actionAddReply */

    /**
     *
     * @see XenForo_ControllerPublic_Thread::actionShowPosts()
     */
    public function actionShowPosts()
    {
        $threadId = $this->_input->filterSingle('thread_id', XenForo_Input::UINT);

        $firstPostOnly = false;

        if (XenForo_Application::getOptions()->th_guestsFirstPost_allForums && !XenForo_Visitor::getUserId()) {
            return $this->responseError(new XenForo_Phrase('th_must_be_registered_guestsfirstpost'));
        }

        if (XenForo_Application::getOptions()->th_guestsFirstPost_checkNodePermissions) {
            $nodeId = $this->_getPostModel()->getNodeIdByThreadId($threadId);
            if (XenForo_Visitor::getInstance()->hasNodePermission($nodeId, 'showFirstPostOnly')) {
                $firstPostOnly = true;
            }
        } elseif (XenForo_Visitor::getInstance()->hasPermission('forum', 'showFirstPostOnly')) {
            $firstPostOnly = true;
        }

        if ($firstPostOnly) {
            return $this->responseError(new XenForo_Phrase('th_do_not_have_permission_guestsfirstpost'));
        }

        return parent::actionShowPosts();
    } /* END actionShowPosts */

    /**
     *
     * @see XenForo_ControllerPublic_Thread::actionShowNewPosts()
     */
    public function actionShowNewPosts()
    {
        $threadId = $this->_input->filterSingle('thread_id', XenForo_Input::UINT);

        $firstPostOnly = false;

        if (XenForo_Application::getOptions()->th_guestsFirstPost_allForums && !XenForo_Visitor::getUserId()) {
            return $this->responseError(new XenForo_Phrase('th_must_be_registered_guestsfirstpost'));
        }

        if (XenForo_Application::getOptions()->th_guestsFirstPost_checkNodePermissions) {
            $nodeId = $this->_getPostModel()->getNodeIdByThreadId($threadId);
            if (XenForo_Visitor::getInstance()->hasNodePermission($nodeId, 'showFirstPostOnly')) {
                $firstPostOnly = true;
            }
        } elseif (XenForo_Visitor::getInstance()->hasPermission('forum', 'showFirstPostOnly')) {
            $firstPostOnly = true;
        }

        if ($firstPostOnly) {
            return $this->responseError(new XenForo_Phrase('th_do_not_have_permission_guestsfirstpost'));
        }

        return parent::actionShowNewPosts();
    } /* END actionShowNewPosts */
}