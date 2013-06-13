<?php
/**
 * Created by JetBrains PhpStorm.
 * User: solidstunna101
 * Date: 13/06/13
 * Time: 14:22
 * To change this template use File | Settings | File Templates.
 */

?>

<!doctype html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Image Gallery</title>
    <style type="text/css">
        #gallery {
            border: 1px solid #cccccc;
            margin: 10px auto;
            width: 570px;
            padding: 10px;

        }

        #blank_gallery {
            font-family: Arial;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }

        .thumb {
            float: left;
            width: 150px;
            height: 100px;
            padding: 10px;
            margin: 10px;
            background-color: #dddddd;
        }

        .thumb:hover {
          outline: 1px solid #999;

        }

        img {
            border: 0;
        }

        #gallery:after {
            content: ".";
            visibility: hidden;
            display: block;
            clear: both;
            height: 0;
            font-size: 0;
        }

    </style>
</head>
<body>
<div id="gallery">
    <?php if(isset($images) && count($images)):
        foreach($images as $image): ?>
            <div class="thumb">
                <a href="<?php echo $image['url']; ?>">
                    <img src="<?php echo $image['thumb_url']; ?>" alt=""/>
                </a>
            </div>
            <?php endforeach; ?>
    <?php else: ?>
        <div id="blank_gallery">Please Upload an Image</div>
    <?php endif ?>
</div>

<div id="upload">
    <?php echo form_open_multipart('gallery'); ?>
    <?php echo form_upload('userfile'); ?>
    <?php echo form_submit('upload', 'Upload'); ?>
    <?php echo form_close(); ?>
</div>

</body>
</html>