<?php
$barista_edge_variable_sidebar = barista_edge_get_sidebar();
?>
<div class="edgtf-column-inner">
    <aside class="edgtf-sidebar">
        <?php
            if (is_active_sidebar($barista_edge_variable_sidebar)) {
                dynamic_sidebar($barista_edge_variable_sidebar);
            }
        ?>
    </aside>
</div>
