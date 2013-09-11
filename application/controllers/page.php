<?php
/**
 *
 * Package: ci_demo
 * Filename: page.php
 * Author: solidstunna101
 * Date: 22/08/13
 * Time: 13:54
 *
 */

class Page extends Frontend_Controller {


    public function __construct(){
        parent::__construct();
        //load page model inside constructor
        $this->load->model('page_m');
    }

    public function index() {

        // Fetch the page template
        $this->data['page'] = $this->page_m->get_by(array('slug' => (string) $this->uri->segment(1)), TRUE);
        count($this->data['page']) || show_404(current_url());

        // Fetch the page data
        //if the method exists we call it, if not we log an error
        $method = '_' . $this->data['page']->template;
        if (method_exists($this, $method)) {
            $this->$method();
        }
        else {
            log_message('error', 'Could not load template ' . $method .' in file ' . __FILE__ . ' at line ' . __LINE__);
            show_error('Could not load template ' . $method);
        }

        // Load the view
        $this->data['subview'] = $this->data['page']->template;
        $this->load->view('_main_layout', $this->data);
    }

    private function _page(){
        //sidebar needs to be present in the page template
        $this->data['recent_news'] = $this->article_m->get_recent();

    }

    private function _homepage(){
        //home page will load model then limit the articles to six

        //fetches most recent pages(less than or equal today)
        //$this->db->where('pubdate <=', date('Y-m-d'));
        //is being replaced with this
        $this->article_m->set_published();
        $this->db->limit(6);
        $this->data['articles'] = $this->article_m->get();
    }

    private function _news_archive(){
        $this->load->model('article_m');
        //sidebar needs to be present in news archive template
        $this->data['recent_news'] = $this->article_m->get_recent();
        // Count all articles
        //$this->db->where('pubdate <=', date('Y-m-d'));
        //is being replaced with this
        $this->article_m->set_published();
        //count all records so that we can setup paging
        $count = $this->db->count_all_results('articles');

        // Set up pagination
        //articles per page = 4
        //conditional if if articles r greater than 4
        $perpage = 4;
        if ($count > $perpage) {
            $this->load->library('pagination');
            $config['base_url'] = site_url($this->uri->segment(1) . '/');
            //total records = defined record count variable
            $config['total_rows'] = $count;
            //bringing in perpage variable
            $config['per_page'] = $perpage;
            //segment needs to be set if its not in default third segment
            $config['uri_segment'] = 2;
            //startup pagination



            $this->pagination->initialize($config);
            //store links in variable
            $this->data['pagination'] = $this->pagination->create_links();
            $offset = $this->uri->segment(2);
        }
        else {
            //if not set pagination to nothin
            $this->data['pagination'] = '';
            //and offset to zero
            $offset = 0;
        }



        // Fetch articles
        $this->db->where('pubdate <=', date('Y-m-d'));
        $this->db->limit($perpage, $offset);
        $this->data['articles'] = $this->article_m->get();
    }


}