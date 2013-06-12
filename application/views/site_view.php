<?php
/**
 * Created by JetBrains PhpStorm.
 * User: solidstunna101
 * Date: 12/06/13
 * Time: 12:54
 * To change this template use File | Settings | File Templates.
 */

?>

<!doctype html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style type="text/css" media="screen">

        #container {
            width: 600px;
            margin: 0 auto;
        }

        table {
            width: 600px;
            margin-bottom: 10px;
            border: 1px solid #aaaaaa;
        }

        td {
            border-right: 1px solid #aaaaaa;
            padding: 1em;
        }

        td:last-child {
            border-right: none;
        }

        th {
            text-align: left;
            padding-left: 1em;
            background: #cac9c9;
            border-bottom: 1px solid #ffffff ;
            border-right: 1px solid #aaaaaa;
            color: #292929;
            font-size: 13px;
        }

        #pagination a, #pagination strong {
            background: #e3e3e3;
            padding: 4px 7px;
            text-decoration: none;
            border: 1px solid #cac9c9;
            color: #292929;
            font-size: 13px;
        }

        #pagination strong, #pagination a:hover {
            font-weight: normal;
            background: #cac9c9;
        }

        tr:nth-child(2n+1) {
            background: #e3e3e3;
        }



    </style>



</head>
<body>
<div id="container">
    <h2>Pagination</h2>
    <?php echo $this->table->generate($records); ?>
    <?php echo $this->pagination->create_links(); ?>
</div>
</body>
</html>