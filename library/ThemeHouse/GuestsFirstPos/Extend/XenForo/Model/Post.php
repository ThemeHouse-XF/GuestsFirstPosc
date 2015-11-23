<?php

/**
 *
 * @see XenForo_Model_Post
 */
class ThemeHouse_GuestsFirstPos_Extend_XenForo_Model_Post extends XFCP_ThemeHouse_GuestsFirstPos_Extend_XenForo_Model_Post
{

    /**
     *
     * @see XenForo_Model_Post::getPostsInThread()
     */
    public function getPostsInThread($threadId, array $fetchOptions = array())
    {
        $firstPostOnly = false;

        if (XenForo_Application::getOptions()->th_guestsFirstPost_allForums) {
            $firstPostOnly = !XenForo_Visitor::getUserId();
        }

        if (XenForo_Application::getOptions()->th_guestsFirstPost_checkNodePermissions) {
            $nodeId = $this->getNodeIdByThreadId($threadId);
            if (XenForo_Visitor::getInstance()->hasNodePermission($nodeId, 'showFirstPostOnly')) {
                $firstPostOnly = true;
            }
        } elseif (XenForo_Visitor::getInstance()->hasPermission('forum', 'showFirstPostOnly')) {
            $firstPostOnly = true;
        }

        if ($firstPostOnly) {
            $fetchOptions['perPage'] = 1;
            $fetchOptions['page'] = 1;
        }

        return parent::getPostsInThread($threadId, $fetchOptions);
    } /* END getPostsInThread */

    /**
     *
     * @param int $threadId
     */
    public function getNodeIdByThreadId($threadId)
    {
        return $this->_getDb()->fetchOne('
			SELECT thread.node_id
			FROM xf_thread AS thread
			WHERE thread.thread_id = ?
		', $threadId);
    } /* END getNodeIdByThreadId */
}