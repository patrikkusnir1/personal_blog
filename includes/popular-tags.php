<!-- 
    #POPULAR TAGS
-->

<section class="tags" aria-labelledby="tag-label" id="tag-label">
    <div class="container">
        <h2 class="headline headline-2 section-title">
            <span class="span">Popular Tags</span>
        </h2>

        <p class="section-text">
            Most searched keywords
        </p>

        <ul class="grid-list">
        <?php
            show_categories( $topics );
        ?>
        </ul>
    </div>
</section>