<?php
/**
 *
 * Package: ci_demo
 * Filename: footer.php
 * Author: solidstunna101
 * Date: 25/11/13
 * Time: 11:42
 *
 */
?>

</section>

<footer>
    <?php $copyright = ( date( 'Y' > 2013 ) ) ? '2013&ndash;' . date( 'Y' ) : '2013'; ?>
    <p><small>
            Copyright &copy; <?php echo anchor( '', $site_name ) . ' ' . $copyright; ?>.
        </small></p>
</footer>

</div><!-- /wrap -->
</body>
</html>