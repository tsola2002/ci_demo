<?php
/**
 *
 * Package: ci_demo
 * Filename: listings.php
 * Author: solidstunna101
 * Date: 14/09/13
 * Time: 16:18
 *
 */

$this->load->view('header');

if ($listings) {

    echo '<h2>All Listings <cite>' . count($listings) . '</cite></h2>';
    echo '<ol id="listings">';
    $counter = 0;

    foreach ($listings as $row) {

        $counter++;

        ?>

        <li<?php if ($counter == 2) { echo ' class="alt"'; $counter = 0; } ?>>

            <?php $segments = array ('jobs', 'details', $row['id']); ?>

            <a href="<?php echo site_url($segments); ?>">

                <span class="title"><?php echo $row['title']; ?></span>
	<span class="meta"><strong><?php echo $row['type']; ?></strong>
		| <?php echo $row['company']; ?>
        | <em><?php echo $row['location']; ?></em>
	</span>
                <?php
                $posted = $row['posted'];
                $current = time();
                ?>
                <span class="posted"><cite>
                        <?php echo $this->timeword->convert($posted, $current); ?> ago
                    </cite></span>

            </a>

        </li>

    <?php

    }

    echo '</ol>';

}

else {

    echo '<h2>No Listings Available</h2>';
    echo '<p>There are currently no active listings.</p>';

}

$this->load->view('sidebar');
$this->load->view('footer');