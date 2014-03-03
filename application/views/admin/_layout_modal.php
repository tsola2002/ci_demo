<?php
/**
 *
 * Package: ci_demo
 * Filename: _layout_modal.php
 * Author: solidstunna101
 * Date: 23/08/13
 * Time: 04:40
 *
 */


 ?>

<?php $this->load->view('admin/components/page_head'); ?>

<body style="background: #e7e7e7;">

<div class="modal show" role="dialog">

    <div class="modal-dialog">
        <div class="modal-content">
            <?php $this->load->view($subview); // Subview is set in controller ?>
            <div class="modal-footer">
                &copy; <?php echo date('Y'); ?> <?php echo $meta_title; ?>
            </div>
        </div><!--end of modal content-->
    </div><!--end of .modal-dialog-->
</div><!--end of .modal-->






<?php $this->load->view('admin/components/page_tail'); ?>