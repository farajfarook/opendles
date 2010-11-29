<?php

/**
 * Description of BlogHandler
 *
 * @author Faraj
 */
class Bloghandler extends Model
{
    function CreateBlog($title, $user_id, $secured = false)
    {
        $this->db->set('title', $title);
        $this->db->set('user_id', $user_id);
        $this->db->set('secured', $secured);
        $this->db->insert('blog');

        $result = $this->db->get('blog');
        return $result->last_row();
    }

    function UpdateBlog($blog_id ,$title = null, $secured = null)
    {
        if($title != null) $this->db->set('title', $title);
        if($secured != null) $this->db->set('secured', $secured);
        $this->db->where('id',$blog_id);
        $this->db->update('blog');

        $this->db->where('id',$blog_id);
        $result = $this->db->get('blog');
        return $result->first_row();
    }

    function RemoveBlog($blog_id)
    {
        $this->db->where('id', $blog_id);
        $this->db->delete('blog');
        return $blog_id;
    }

    function GetBlogsOf($user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->get('blog');
    }

    function CreateBlogPost($blog_id,$user_id,$content)
    {
        $date = date ("Y-m-d H:m:s");
        $this->db->set('blog_id', $blog_id);
        $this->db->set('user_id', $user_id);
        $this->db->set('date', $date);
        $this->db->set('content', $content);
        $this->db->insert('blog_post');

        $result = $this->db->get('blog_post');
        return $result->last_row();
    }

    function UpdateBlogPost($blogpost_id,$content)
    {
        $this->db->set('content', $content);
        $this->db->where('id', $blogpost_id);
        $this->db->update('blog_post');

        $result = $this->db->get('blog_post');
        return $result->last_row();
    }

    function RemoveBlogPost($blogpost_id)
    {
        $this->db->where('id', $blogpost_id);
        $this->db->update('blog_post');
        return $blogpost_id;
    }

    function GetBlogPost($blogpost_ID)
    {
        $this->db->where('id', $blogpost_id);
        $result = $this->db->get('blog_post');
        return $result->first_row();
    }

    function CreateBlogPostReply($blogpost_id,$user_id,$content)
    {
        $date = date ("Y-m-d H:m:s");
        $this->db->set('date_of_post', $date);
        $this->db->set('blog_post_id', $blogpost_id);
        $this->db->set('user_id',$user_id);
        $this->db->set('content',$content);
        $this->db->insert('blog_post_reply');

        $result = $this->db->get('blog_post_reply');
        return $result->last_row();
    }

    function UpdateBlogPostReply($blogpostreply_id,$content)
    {
        $this->db->set('content', $content);
        $this->db->where('id', $blogpostreply_id);
        $this->db->update('blog_post_reply');

        $this->db->where('id', $blogpostreply_id);
        $result = $this->db->get('blog_post_reply');
        return $result->first_row();
    }

    function RemoveBlogPostReply($blogpostreply_id)
    {
        $this->db->where('id', $blogpostreply_id);
        $this->db->delete('blog_post_reply');
        return $blogpostreply_id;
    }

    function GetBlogPostReplies($blogpost_id)
    {
        $this->db->where('blog_post_id', $blogpost_id);
        return $this->db->get('blog_post_reply');
    }
}
 
?>