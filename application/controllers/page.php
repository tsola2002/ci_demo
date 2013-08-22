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
        //simply fetch single record page from databse table
        $pages = $this->page_m->get(1);

        //fetch record using get by method
       // $pages = $this->page_m->get_by(array('slug' => 'about'));
        //the dump them to the screen
        var_dump($pages);
    }
    public function save() {
        $data = array(
            'title' => 'Portfolio',
            'slug' => 'portfolio',
            'order' => '4',
            'body' => 'list of web pages',
        );
        $id = $this->page_m->save($data);
        var_dump($id);
    }
    public function delete() {
        $this->page_m->delete(4);
    }

}