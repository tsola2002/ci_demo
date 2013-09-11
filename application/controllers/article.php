<?php
/**
 *
 * Package: ci_demo
 * Filename: article.php
 * Author: solidstunna101
 * Date: 11/09/13
 * Time: 14:24
 *
 */

class Article extends Frontend_Controller {

    public function __construct(){
        parent::__construct();

        $this->data['recent_news'] = $this->article_m->get_recent();
    }

    public function index($id, $slug){
        // Fetch the article
       // $this->db->where('pubdate <=', date('Y-m-d'));
        //is being replaces with new method
        $this->article_m->set_published();
        // fetch the article by its id
        $this->data['article'] = $this->article_m->get($id);

        // Return 404 if not found
        count($this->data['article']) || show_404(uri_string());

        // Redirect if slug was incorrect
        //make variable for user requested slug
        $requested_slug = $this->uri->segment(3);
        //make variable for database slug value
        $set_slug = $this->data['article']->slug;
        //so if user slug not equal to database slug redirect
        if ($requested_slug != $set_slug) {
            redirect('article/' . $this->data['article']->id . '/' . $this->data['article']->slug, 'location', '301');
        }

        // Load view
        $this->data['subview'] = 'article';
        $this->load->view('_main_layout', $this->data);
    }
}