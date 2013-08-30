<?php
/**
 *
 * Package: ci_demo
 * Filename: 004_parent_id_to_pages.php
 * Author: solidstunna101
 * Date: 30/08/13
 * Time: 14:22
 *
 */

class Migration_Parent_id_to_pages extends CI_Migration {

    public function up()
    {
        //adds new column field to table
        $fields = (array(
            'parent_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'default' => 0
            ),
        ));
        $this->dbforge->add_column('pages', $fields);
    }

    public function down()
    {
        $this->dbforge->drop_column('pages', 'parent_id');
    }

}