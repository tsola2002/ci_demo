<?php
/**
 *
 * Package: ci_demo
 * Filename: article_m.php
 * Author: solidstunna101
 * Date: 03/09/13
 * Time: 18:36
 *
 */

class Article_m extends MY_Model
{
    protected $_table_name = 'articles';
    protected $_order_by = 'pubdate desc, id desc';
    protected $_timestamps = TRUE;
    //minor editions to rules with new rules example
    //xss, default date value
    public $rules = array(
        'pubdate' => array(
            'field' => 'pubdate',
            'label' => 'Publication date',
            'rules' => 'trim|required|exact_length[10]|xss_clean'
        ),
        'title' => array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'trim|required|max_length[100]|xss_clean'
        ),
        'slug' => array(
            'field' => 'slug',
            'label' => 'Slug',
            'rules' => 'trim|required|max_length[100]|url_title|xss_clean'
        ),
        'body' => array(
            'field' => 'body',
            'label' => 'Body',
            'rules' => 'trim|required'
        )
    );

    public function get_new ()
    {
        $article = new stdClass();
        $article->title = '';
        $article->slug = '';
        $article->body = '';
        $article->pubdate = date('Y-m-d');
        return $article;
    }

    //abstracts publication into its own method
    public function set_published(){
        $this->db->where('pubdate <=', date('Y-m-d'));
    }

    //method to get the latest list of articles
    public function get_recent($limit = 3){

        // Fetch a limited number of recent articles
        //cast limit into an integer
        $limit = (int) $limit;
        //use our new set_published method
        $this->set_published();
        //limit number of articles to limit
        $this->db->limit($limit);
        //return the articles
        return parent::get();
    }


}