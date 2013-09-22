<!--
/**
 *
 * Package: ci_demo
 * Filename: files.php
 * Author: solidstunna101
 * Date: 21/09/13
 * Time: 23:22
 *
 */-->

<!doctype html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Files</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css"/>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-2.0.2.min.js"></script>
</head>
<body>
    <?php //print_r($files); ?>
    <div id="files">

    </div>
    <script type="text/javascript">
        $(document).ready(function(){

            //encode file structure to json
            var files = <?php echo json_encode($files); ?>;

            //pass array of files to function
            var file_tree = build_file_tree(files);

            //append returned function to files div
            file_tree.appendTo('#files');

            function build_file_tree(files){

                //building file structure
                var tree = $('<ul>');

                //loop thru files array
                for (x in files)
                    {
                        //if structure is folder it will treated as an object
                        //
                        if (typeof files[x] == "object")
                        {
                            //add span variable to make it clickable
                            var span = $('<span>').html(x).appendTo(
                                //enclose new <li> tag
                                $('<li>').appendTo(tree).addClass('folder')

                            );

                            //create recursive subtree
                            //create variable for subarray within specific folder
                            //after that jquery will keep it hidden by default
                            var subtree = build_file_tree(files[x]).hide();
                            span.after(subtree);
                            //add click event which will toggle visibility of subtree
                            //which will search for <ul> tags first list first list
                            span.click(function(){
                                //returns this(the clicked object) parent(ul)

                                $(this).parent().find('ul:first').toggle();
                            });


                        }
                        else {
                            $('<li>').html(files[x]).appendTo(tree).addClass('file');
                        }

                    }

                return tree;
            }

        });
    </script>
</body>
</html>