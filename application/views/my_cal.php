<?php
/**
 *
 * Package: ci_demo
 * Filename: my_cal.php
 * Author: solidstunna101
 * Date: 31/10/13
 * Time: 17:00
 *
 */
?>

<!doctype html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>My Calendar</title>
    <style type="text/css">
        .calendar{
            font-family: Arial;
            font-size: 12px;
        }

        table.calendar{
            border-collapse: collapse;
            margin: auto;
        }

        .calendar .days td {
            width: 80px;
            height: 80px;
            padding: 4px;
            border: 1px solid #999;
            vertical-align: top;
            background-color: #def;
        }

        .calendar .days td:hover {
            background-color: #fff;
        }
        .calendar .highlight {
            font-weight: bold;
            color: #00f;
        }
    </style>
</head>
<body>
<?php echo $calendar; ?>
</body>
</html>