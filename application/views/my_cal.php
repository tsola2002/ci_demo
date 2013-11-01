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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>
<body>
<?php echo $calendar; ?>
<script type="text/javascript">
    $(document).ready(function(){
         //attach click event to each cell
        $('.calendar .days').click(function(){

            //fetch clicked table cell
            day_num = $(this).find('.day_num').html();

            //spit out date name in alert box
            // alert(day_num);

            //get data input frm user
            //also show the data by finding html content
            day_data = prompt('Enter Stuff', $(this).find('.content').html());

            //check for null incase user clicks cancel
            if(day_data != null){

                //capture user input using ajax
                $.ajax({
                    //targeted destination url
                    url: window.location,
                    type: 'POST',
                    //data to be sent as an array
                    data: {
                       day: day_num,
                       data: day_data
                    },
                    //function to be executed on success
                    success: function(msg){
                        //on success just reload the same page
                        location.reload();
                    }
                });
            }

        });
    });
</script>
</body>
</html>