<?php
if (!is_active_sidebar('sidebar-1')) {
    return;
}
?>

<div class="widget-area">
    <?php dynamic_sidebar('sidebar-1'); ?>
</div> 