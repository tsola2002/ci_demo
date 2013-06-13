<?php
/**
 * Created by JetBrains PhpStorm.
 * User: solidstunna101
 * Date: 13/06/13
 * Time: 14:36
 * To change this template use File | Settings | File Templates.
 */

class Gallery_model extends CI_Model {

    var $gallery_path;
    var $gallery_path_url;

    //constructor method which will be same name as the class
    function gallery_model(){

        //when using constructor you are required to call parent model
       // parent::$model;

        //path of your application defined through codeigniter constant APPPATH
        //realpath function cleans up path variable
        $this->gallery_path = realpath(APPPATH .''. '../images' );
        $this->gallery_path_url = base_url().'images/';
    }


    function do_upload(){
        $config = array(
           'allowed_types' => 'jpg|jpeg|gif|png',
            'upload_path' => $this->gallery_path,
            'max_size' => 2000
        );

        //loads upload library while passing config variables to it
        $this->load->library('upload', $config);

        //using the upload library by calling upload method which uploads an image
        $this->upload->do_upload();

        //fetches image upload data from upload library
        $image_data = $this->upload->data();

        $config = array(
            'source_image' => $image_data['full_path'],
            'new_image' => $this->gallery_path . '/thumbs',
            'maintain_ration' => true,
            'width' => 150,
            'height' => 100
        );

        //loads resize library(image_lib) to resize image
        $this->load->library('image_lib', $config);

        //resize methods that resizes the image
        $this->image_lib->resize();

    }


    function get_image(){

        $files = scandir($this->gallery_path);
        $files = array_diff($files, array('.', '..', 'thumbs'));

        $images = array();

        foreach($files as $file){
            $images [] = array(
                'url' => $this->gallery_path_url . $file,
                'thumb_url' => $this->gallery_path_url . 'thumbs/' . $file
            );
        }

        return $images;
    }

}