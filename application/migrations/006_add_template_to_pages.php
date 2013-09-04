<?php
/**
 *
 * Package: ci_demo
 * Filename: 006_add_template_to_pages.php
 * Author: solidstunna101
 * Date: 03/09/13
 * Time: 22:56
 *
 */

class Migration_Add_template_to_pages extends CI_Migration {

    public function up()
    {
        $fields = (array(
            'template' => array(
                'type' => 'VARCHAR',
                'constraint' => '25',
            ),
        ));
        $this->dbforge->add_column('pages', $fields);
    }

    public function down()
    {
        $this->dbforge->drop_column('pages', 'template');
    }
}

