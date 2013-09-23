<!--
/**
 *
 * Package: ci_demo
 * Filename: products.php
 * Author: solidstunna101
 * Date: 23/09/13
 * Time: 11:01
 *
 */-->

<!doctype html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Shop</title>
    <style type="text/css">
        body{
            font: 13px Arial;
        }
        #products{
            text-align: center;
            float: left;
            overflow: visible;

        }
        #products ul{
            list-style-type: none;
            margin: 0px;
        }
        #products li{
            width: 230px;
            padding: 4px;
            margin: 8px;
            border: 1px solid #dddddd;
            background-color: #eeeeee;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
        }
        #products .name{font-size: 15px; margin: 5px;}
        #products .price{margin: 5px;}
        #products .option{margin: 5px;}
        #cart { padding: 4px; margin: 8px; float: left;
        border: 1px solid #dddddd; background: #eee;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
        }
        #cart table{width: 320px; border-collapse: collapse;
        text-align: left;}
        #cart th{border-bottom: 1px solid #aaa;}
        #cart caption{font-size: 15px; height: 30px; text-align: left; }
        #cart .total{height: 40px;}
        #cart .remove a{color: red;}
    </style>
</head>
<body>
    <div id="products">
        <ul>
            <!--loop through products and display them using foreach alternative syntax-->
            <?php foreach($products as $product): ?>
            <li>
                <!--  each list item should have embedded form button  -->
                <?php echo form_open('shop/add'); ?>
                <!--dynamically creating items ass separate divs-->
                <div class="name"><?php echo $product->name; ?></div>
                <div class="thumb">
                    <!--display image using CI html image helper function-->
                    <?php
                        echo img(array(
                                      'src' => 'img/' . $product->image,
                                      'class' => 'thumb',
                                      'alt' => $product->name
                        ));?>
                </div>
                <div class="price">£<?php echo $product->price; ?></div>
                <div class="option">
                    <!--  conditional to check option name is present  -->
                    <?php if($product->option_name): ?>
                        <?php echo form_label($product->option_name, 'option_'. $product->id); ?>
                        <?php echo form_dropdown(
                            $product->option_name,
                            $product->option_values,
                            NULL,
                            'id="option_'. $product->id . '"'
                        ); ?>
                    <?php endif; ?>
                </div>

                <?php echo form_hidden('id', $product->id); ?>
                <?php echo form_submit('action', 'Add to Cart'); ?>

                <?php form_close(); ?>
            </li>
            <?php endforeach; ?>
        </ul>
    </div><!-- End of products  -->




    <?php if($cart = $this->cart->contents()): ?>
        <?php //print_r($cart); ?>
        <div id="cart">
            <table>
                <caption>Shopping Cart</caption>
                <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Option</th>
                    <th>Price</th>
                    <th></th>
                </tr>
                </thead>
                <?php foreach($cart as $item): ?>
                    <tr>
                        <td><?php echo $item['name']; ?></td>
                        <td>
                            <?php if($this->cart->has_options($item['rowid'])){
                                foreach($this->cart->product_options($item['rowid']) as $option => $value){
                                    echo $option .": <em>". $value. "</em>";
                                }
                            } ?>
                        </td>
                        <td><?php echo $item['subtotal']; ?></td>
                        <td class="remove"><?php echo anchor('shop/remove/'.$item['rowid'], 'X'); ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr class="total">
                    <td colspan="2"><strong>Total</strong></td>
                    <td>£<?php echo $this->cart->total(); ?></td>
                </tr>
                </tr></tr></table>


        </div>
    <?php endif; ?>
</body>
</html>