<?php
/**
 *
 * Package: ci_demo
 * Filename: files.php
 * Author: solidstunna101
 * Date: 21/09/13
 * Time: 22:13
 *
 */

class Files extends CI_Controller {


    var $file;
    var $path;

    public function __construct()
    {
        parent::__construct();
        //file path
        $this->path = "application" . DIRECTORY_SEPARATOR .  "test_files"
            . DIRECTORY_SEPARATOR;
        $this->file = $this->path . "hello.txt";
    }

    function write_test(){
        $data = "Hello world";

        //wites data to the file & creates file
        //'a' to append to file
        //'r' read mode
        //'x' rewrite if file doesn't exist
        write_file($this->file,$data);
        echo "finished writing";
    }

    function read_test(){
        //read the contents of specified file
        $string = read_file($this->file);
        echo $string;
    }


    //this function will receive full filename paths
    function filenames_test(){
        $files = get_filenames($this->path, TRUE);
        print_r($files);
    }

    //gets information about a list of files
    function dir_file_info_test(){
        $files = get_dir_file_info($this->path);
        print_r($files);
    }

    //gets information about a single file
    //you can pass in third parameter to get a certain key value
    function file_info_test(){
        $info = get_file_info($this->file, 'date');
        print_r($info);
    }

    //get the mime extension of the file
    function mime_test(){
        echo get_mime_by_extension($this->file);
    }

    //forces a download of a file
    function download_test(){
        $string = "Hello";
       // force_download('foo.txt', $string);
        force_download('foo.txt', read_file($this->file));

    }

    //displays folder structure in array format
    function display(){
      // print_r(directory_map(BASEPATH));
        $data['files'] = directory_map(BASEPATH);

        $this->load->view('files', $data);
    }

}