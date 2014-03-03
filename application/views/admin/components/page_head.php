<!--
 Package: ci_demo
 Filename: _layout_main.php
 Author: solidstunna101
 Date: 22/08/13
 Time: 15:14
 -->

<!doctype html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title><?php echo $meta_title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--loading bootstrap/base styles-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/theme.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/custom.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/datepicker.css"/>

    <!--third party links/scripts-->
    <link href='http://fonts.googleapis.com/css?family=Bitter:400,700,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Source+Code+Pro:200,300,400,500,600,700,900' rel='stylesheet' type='text/css'>

    <!--loading base/custom javascripts-->
    <script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>js/custom.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap-datepicker.js"></script>


    <!--loading jqueryUI based on conditional-->
    <?php if(isset($sortable) && $sortable === TRUE): ?>
        <script src="<?php echo base_url('js/jquery-ui-1.9.1.custom.min.js'); ?>"></script>
        <script src="<?php echo base_url('js/jquery.mjs.nestedSortable.js'); ?>"></script>
    <?php endif; ?>

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- TinyMCE -->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/tiny_mce/tiny_mce.js"></script>
    <script type="text/javascript">
        tinyMCE.init({
            // General options
            mode : "textareas",
            theme : "advanced",
            plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

            // Theme options
            theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
            theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
            theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
            theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
            theme_advanced_toolbar_location : "top",
            theme_advanced_toolbar_align : "left",
            theme_advanced_statusbar_location : "bottom",
            theme_advanced_resizing : true

        });
    </script>
    <!-- /TinyMCE -->

</head>
