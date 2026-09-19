<!-- 
	#TOPICS SLIDER
-->
<section class="topics" id="topics" aria-labelledby="topic-label">
    <div class="container">
        <div class="card topic-card">
            <div class="card-content">
                <h2 class="headline headline-2 section-title card-title" id="topic-label">Hot topics</h2>
            </div>
            <p class="card-text">
                Don't miss out on the latest news about psychology and lifestyle. 
                We have <?= $articles_total_count ?> articles published here on website.
            </p>
            <div class="btn-group">
                <button class="btn-icon" aria-label="previous" data-slider-prev>
                    <ion-icon name="arrow-back" aria-hidden="true"></ion-icon>
                </button>
                <button class="btn-icon" aria-label="next" data-slider-next>
                    <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                </button>
            </div>
            <div class="slider" data-slider>
                <ul class="slider-list" data-slider-container>
                    <?php show_topics($collection, $topics) ?>
                </ul>
            </div>
        </div>
    </div>
</section>