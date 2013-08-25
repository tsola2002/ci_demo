<!--
/**
 *
 * Package: ci_demo
 * Filename: index.php
 * Author: solidstunna101
 * Date: 25/08/13
 * Time: 15:59
 *
 */-->


<section>
    <h2>Users</h2>
  <!--  codeigniter anchor-->
    <?php echo anchor('admin/user/edit', '<i class="icon-plus"></i> Add a user'); ?>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <!--conditional to check if we have users-->
        <!--if we do then loop through them-->
         <?php if(count($users)): foreach($users as $user): ?>
            <tr>
                <td><?php echo anchor('admin/user/edit/' . $user->id, $user->email); ?></td>
                <!--passed the ci based url along with the id-->
                <td><?php echo btn_edit('admin/user/edit/' . $user->id); ?></td>
                <!--passed the ci based url along with the id-->
                <td><?php echo btn_delete('admin/user/delete/' . $user->id); ?></td>
            </tr>
        <?php endforeach; ?>
        <?php else: ?>
            <!--if not just tell the user no users were found-->
            <tr>
                <td colspan="3">We could not find any users.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</section>