<?php
get_header();
?>

<div class="container">
    <div class="contenuprincipal">
        <hr class="divider">
        <h1 id="titreh1" class="text-center">Formation PUB020 : WordPress, 2023</h1>
        <hr class="divider bas">
        <div class="boutonshaut">
            <div class="float-left"></div>
            <div class="float-right">
                <a id="developperreduire" href="#" class="btn btn-secondary" role="button" data-developper="Tout développer" data-reduire="Tout réduire">Tout développer</a>
            </div>
            <div class="push"></div>
        </div>
        <?php
        // Create a custom query to get posts in ascending order
        $args = array(
            'post_type' => 'post', // or 'any' to include all post types
            'order' => 'ASC',      // Display in ascending order (oldest first)
            'posts_per_page' => -1, // Display all posts (remove the limit)
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
        ?>
                <div class="card-header">
                    <a href="#" class="toggle-content"><?php the_title(); ?></a>
                </div>

                <!-- Initially hide the content -->
                <div class="list-group-item" style="display: none;">
                    <?php the_content(); ?>
                </div>
        <?php
            endwhile;
            wp_reset_postdata(); // Restore the global post data
        else :
            // If no posts are found
        ?>
            <p>No posts found</p>
        <?php
        endif;
        ?>
    </div>
    <div class="publicite baspage">
        <div class="pubhebergement">
            <p>Site fièrement hébergé chez <a href="http://www.a2hosting.com?aid=5ca65a17be949" target="_top">A2 Hosting</a>.</p>
            <p><a href="https://www.a2hosting.com?aid=5ca65a17be949&amp;bid=ed1c4a67" target="_top"><img src="//affiliates.a2hosting.com/accounts/default1/banners/ed1c4a67.jpg" alt="" title="" width="728" height="90"></a><img style="border:0" src="https://affiliates.a2hosting.com/scripts/imp.php?aid=5ca65a17be949&amp;bid=ed1c4a67" width="1" height="1" alt=""></p>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    jQuery(document).ready(function($) {
        // Add a click event handler to toggle the content
        $('.toggle-content').click(function(e) {
            e.preventDefault();
            $(this).closest('.card-header').next('.list-group-item').toggle();
        });

        // Add a click event handler for the "Tout développer / Tout réduire" button
        $('#developperreduire').click(function(e) {
            e.preventDefault();
            $('.list-group-item').toggle();

            // Toggle the button text
            var button = $(this);
            var developperText = button.data('developper');
            var reduireText = button.data('reduire');
            button.data('developper', reduireText);
            button.data('reduire', developperText);
            button.text(reduireText);
        });
    });
</script>

<?php
get_footer();
?>
