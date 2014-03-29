<?php
/**
 *
 * Package: ci_demo
 * Filename: page_m.php
 * Author: solidstunna101
 * Date: 22/08/13
 * Time: 13:50
 *
 */

class page_m extends MY_Model {
    //copied attribute fields from my_model
    protected $_table_name = 'pages';
    protected $_order_by = 'parent_id, order';
    public $rules = array(
        'parent_id' => array(
            'field' => 'parent_id',
            'label' => 'Parent',
            'rules' => 'trim|intval'
        ),
        'template' => array(
                  'field' => 'template',
                  'label' => 'Template',
                  'rules' => 'trim|required|xss_clean'
                    ),
        'title' => array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'trim|required|max_length[100]|xss_clean'
        ),
        'slug' => array(
            'field' => 'slug',
            'label' => 'Slug',
            'rules' => 'trim|required|max_length[100]|url_title|callback__unique_slug|xss_clean'
        ),
        'body' => array(
            'field' => 'body',
            'label' => 'Body',
            'rules' => 'trim|required'
        )
    );

    public function get_new ()
    {
        $page = new stdClass();
        $page->title = '';
        $page->slug = '';
        $page->body = '';
        $page->parent_id = 0;
        $page->template = 'page';
        return $page;
    }

    //function adds anchor that links to news archive
    public function get_archive_link(){
        //fetch page where template is news archive & we want a single object returned
        $page = parent::get_by(array('template' => 'news_archive'), TRUE);
        //return page slug if exist or empty string if not
        return isset($page->slug) ? $page->slug : '';
    }


    public function delete ($id)
    {
        // Delete a page
        parent::delete($id);

        // Reset parent ID for its children
        //set parent page equals zero where page equal current id
        //then update the current table
        $this->db->set(array(
            'parent_id' => 0
        ))->where('parent_id', $id)->update($this->_table_name);
    }

    public function save_order ($pages)
    {
        if (count($pages)) {
            foreach ($pages as $order => $page) {
                if ($page['item_id'] != '') {
                    $data = array('parent_id' => (int) $page['parent_id'], 'order' => $order);
                    $this->db->set($data)->where($this->_primary_key, $page['item_id'])->update($this->_table_name);
                }
            }
        }
    }

    public function get_nested ()
    {
        //fetch pages as an array
        $this->db->order_by($this->_order_by);
        $pages = $this->db->get('pages')->result_array();


        $array = array();
        foreach ($pages as $page) {
            //if page does not have parent id
            if (! $page['parent_id']) {
                $array[$page['id']] = $page;
            }
            //else we add it to the key, but inside child array
            else {
                $array[$page['parent_id']]['children'][] = $page;
            }
        }
        return $array;
    }

    public function get_with_parent ($id = NULL, $single = FALSE)
    {
        //this will do a standard get method
        //this method will get results from parent method which
        //will be turned into a join query
        //we will join pages table with itself
        $this->db->select('pages.*, p.slug as parent_slug, p.title as parent_title');
        $this->db->join('pages as p', 'pages.parent_id=p.id', 'left');
        return parent::get($id, $single);
    }

    public function get_no_parents ()
    {
        // Fetch pages without parents
        $this->db->select('id, title');
        //uses where statement to get parents wit id off zero
        $this->db->where('parent_id', 0);
        $pages = parent::get();

        // Return key => value pair array
        $array = array(
            0 => 'No parent'
        );
        if (count($pages)) {
            foreach ($pages as $page) {
                $array[$page->id] = $page->title;
            }
        }

        return $array;
    }

}