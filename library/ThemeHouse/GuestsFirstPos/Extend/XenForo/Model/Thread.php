<?php

/**
 *
 * @see XenForo_Model_Thread
 */
class ThemeHouse_GuestsFirstPos_Extend_XenForo_Model_Thread extends XFCP_ThemeHouse_GuestsFirstPos_Extend_XenForo_Model_Thread
{
    /**
     *
     * @see XenForo_Model_Thread::getThreadById()
     */
    public function getThreadById($threadId, array $fetchOptions = array())
    {
        $thread = parent::getThreadById($threadId, $fetchOptions);

        $firstPostOnly = false;

        if (XenForo_Application::getOptions()->th_guestsFirstPost_allForums) {
            $firstPostOnly = !XenForo_Visitor::getUserId();
        }

        if (XenForo_Application::getOptions()->th_guestsFirstPost_checkNodePermissions) {
            $nodeId = $thread['node_id'];
            if (XenForo_Visitor::getInstance()->hasNodePermission($nodeId, 'showFirstPostOnly')) {
                $firstPostOnly = true;
            }
        } elseif (XenForo_Visitor::getInstance()->hasPermission('forum', 'showFirstPostOnly')) {
            $firstPostOnly = true;
        }

        if ($firstPostOnly) {
            $thread['reply_count'] = 0;
            $thread['first_post_only'] = 1;
        }

        return $thread;
    } /* END getThreadById */
}