<?php 
$posts = [
    [
        "title" => "Helpful Tips for Working from Home as a Freelancer",
        "excerpt" => "Read best tips how to work from home and be more productive",
        "image" => "./assets/images/recent-post-1.jpg",
        "badge" => "Working Tips",
        "tags"  => ["Productivity", "Work"],
        "read_time" => "3 mins"
    ]
    [
        "title" => "Self-observation is the first step of inner unfolding",
        "excerpt" => "Read best tips how to understand yourself good",
        "image" => "./assets/images/recent-post-2.jpg",
        "badge" => "Lifestyle",
        "tags"  => ["Psychology", "Lifestyle"],
        "read_time" => "2 mins"
    ]
]


?>


<?php require 'includes/header.php' ?>;
<!-- MAIN -->
    <main>
        <article>
            <!-- 
            -#HERO
        -->
            <section class="hero" id="home" aria-label="home">
                <div class="container">
                    <div class="hero-content">
                        <p class="hero-subtitle">Hello Everyone!</p>
                        <?php echo "<!-- PHP is working -->" ?>
                        <h1 class="headline headline1 section-title">
                            <span class="span">I'm Patrik Kusnir</span>
                        </h1>
                        <p class="hero-text">I am graduated pharmacist whose the biggest passion is travelling by train.
                            This blog has been written as my first project during my long self-taught programmer
                            learning path.</p>
                        <div class="input-wrapper">
                            <input type="email" name="email_address" placeholder="Type your email address" required
                                class="input-field">
                            <button class="btn btn-primary">
                                <span class="primary">Subscribe</span>
                                <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                            </button>
                        </div>
                    </div>
                    <div class="hero-banner">
                        <img src="./assets/images/author.png" width="327" height="490" alt="Patrik Kusnir"
                            class="w-100">
                        <img src="./assets/images/pattern-2.svg" width="27" height="26" alt="shape"
                            class="shape shape-1">
                        <img src="./assets/images/pattern-3.svg" width="27" height="26" alt="shape2"
                            class="shape shape-2">
                    </div>
                    <img src="./assets/images/shadow-1.svg" width="500" height="800" alt="" class="hero-bg hero-bg-1">
                    <img src="./assets/images/shadow-2.svg" width="500" height="500" alt="" class="hero-bg hero-bg-2">
            </section>
            <!-- #TOPICS  -->
            <section class="topics" id="topics" aria-labelledby="topic-label">
                <div class="container">
                    <div class="card topic-card">
                        <div class="card-content">
                            <h2 class="headline headline-2 section-title card-title" id="topic-label">Hot topics</h2>
                        </div>
                        <p class="card-text">
                            Don't miss out on the latest news about Train Travel tips and Life in Russia
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
                                <li class="slider-item">
                                    <a href="#" class="slider-card">
                                        <figure class="slider-banner img-holder" style="--width: ; --height: ;">
                                            <img src="./assets/images/topic-1.png" width="507" height="608"
                                                loading="lazy" alt="Sport" class="img-cover">
                                        </figure>
                                        <div class="slider-content">
                                            <span class="slider-title">Sport</span>
                                            <p class="slider-subtitle">38 articles</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="slider-item">
                                    <a href="#" class="slider-card">
                                        <figure class="slider-banner img-holder" style="--width: 507; --height: 618;">
                                            <img src="./assets/images/topic-2.png" width="507" height="618"
                                                loading="lazy" alt="Travel" class="img-cover">
                                        </figure>
                                        <div class="slider-content">
                                            <span class="slider-title">Travel</span>
                                            <p class="slider-subtitle">38 articles</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="slider-item">
                                    <a href="#" class="slider-card">
                                        <figure class="slider-banner img-holder" style="--width: 507; --height: 618;">
                                            <img src="./assets/images/topic-3.png" width="507" height="618"
                                                loading="lazy" alt="Design" class="img-cover">
                                        </figure>
                                        <div class="slider-content">
                                            <span class="slider-title">Design</span>
                                            <p class="slider-subtitle">78 articles</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="slider-item">
                                    <a href="#" class="slider-card">
                                        <figure class="slider-banner img-holder" style="--width: 507; --height: 618;">
                                            <img src="./assets/images/topic-4.png" width="507" height="618"
                                                loading="lazy" alt="Movie" class="img-cover">
                                        </figure>
                                        <div class="slider-content">
                                            <span class="slider-title">Movie</span>
                                            <p class="slider-subtitle">125 articles</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="slider-item">
                                    <a href="#" class="slider-card">
                                        <figure class="slider-banner img-holder" style="--width: 507; --height: 618;">
                                            <img src="./assets/images/topic-5.png" width="507" height="618"
                                                loading="lazy" alt="Movie" class="img-cover">
                                        </figure>
                                        <div class="slider-content">
                                            <span class="slider-title">Lifestyle</span>
                                            <p class="slider-subtitle">78 articles</p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 
                #FEATURED POST
            -->
            <section class="section feature" aria-label="feature" id="featured">
                <div class="container">
                    <h2 class="headline headline-2 section-title">
                        <span class="span">Editor's picked</span>
                    </h2>
                    <p class="section-text">
                        Featured and highly rated articles
                    </p>
                    <ul class="feature-list">
                        <li>
                            <div class="card feature-card">
                                <figure class="card-banner img-holder" style="--width: 1602; --height: 903;">
                                    <img src="./assets/images/featured-1.png"
                                        alt="Self-observation is the first step of inner unfolding" class="img-cover"
                                        width="1602" loading="lazy" height="903">
                                </figure>
                                <div class="card-content">
                                    <div class="card-wrapper">
                                        <div class="card-tag">
                                            <a href="#" class="span hover-2">#Travel</a>
                                            <a href="#" class="span hover-2">#Lifestyle</a>
                                        </div>
                                        <div class="wrapper">
                                            <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
                                            <span class="span">3 mins read</span>
                                        </div>

                                    </div>
                                    <h3 class="headline headline-3">
                                        <a href="#" class="card-title hover-2">
                                            Self-observation is the first step of inner unfolding
                                        </a>
                                    </h3>
                                    <div class="card-wrapper">
                                        <div class="profile-card">
                                            <img src="./assets/images/author-1.png" width="48" height="48"
                                                loading="lazy" alt="Joseph" class="profile-banner">

                                            <div>
                                                <p class="card-title">Joseph</p>
                                                <p class="card-subtitle">25 Nov 2022</p>
                                            </div>
                                        </div>
                                        <a href="#" class="card-btn">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="card feature-card">
                                <figure class="card-banner img-holder" style="--width: 1602; --height: 903;">
                                    <img src="./assets/images/featured-2.png"
                                        alt="Self-observation is the first step of inner unfolding" class="img-cover"
                                        width="1602" loading="lazy" height="903">
                                </figure>
                                <div class="card-content">
                                    <div class="card-wrapper">
                                        <div class="card-tag">
                                            <a href="#" class="span hover-2">#Design</a>
                                            <a href="#" class="span hover-2">#Movie</a>
                                        </div>
                                        <div class="wrapper">
                                            <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
                                            <span class="span">6 mins read</span>
                                        </div>

                                    </div>
                                    <h3 class="headline headline-3">
                                        <a href="#" class="card-title hover-2">
                                            Self-observation is the first step of inner unfolding
                                        </a>
                                    </h3>
                                    <div class="card-wrapper">
                                        <div class="profile-card">
                                            <img src="./assets/images/author-1.png" width="48" height="48"
                                                loading="lazy" alt="Joseph" class="profile-banner">

                                            <div>
                                                <p class="card-title">Joseph</p>
                                                <p class="card-subtitle">25 Nov 2022</p>
                                            </div>
                                        </div>
                                        <a href="#" class="card-btn">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="card feature-card">
                                <figure class="card-banner img-holder" style="--width: 1602; --height: 903;">
                                    <img src="./assets/images/featured-3.png"
                                        alt="Self-observation is the first step of inner unfolding" class="img-cover"
                                        width="1602" loading="lazy" height="903">
                                </figure>
                                <div class="card-content">
                                    <div class="card-wrapper">
                                        <div class="card-tag">
                                            <a href="#" class="span hover-2">#Design</a>
                                            <a href="#" class="span hover-2">#Movie</a>
                                        </div>
                                        <div class="wrapper">
                                            <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
                                            <span class="span">6 mins read</span>
                                        </div>

                                    </div>
                                    <h3 class="headline headline-3">
                                        <a href="#" class="card-title hover-2">
                                            Self-observation is the first step of inner unfolding
                                        </a>
                                    </h3>
                                    <div class="card-wrapper">
                                        <div class="profile-card">
                                            <img src="./assets/images/author-1.png" width="48" height="48"
                                                loading="lazy" alt="Joseph" class="profile-banner">

                                            <div>
                                                <p class="card-title">Joseph</p>
                                                <p class="card-subtitle">25 Nov 2022</p>
                                            </div>
                                        </div>
                                        <a href="#" class="card-btn">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="card feature-card">
                                <figure class="card-banner img-holder" style="--width: 1602; --height: 903;">
                                    <img src="./assets/images/featured-4.png"
                                        alt="Self-observation is the first step of inner unfolding" class="img-cover"
                                        width="1602" loading="lazy" height="903">
                                </figure>
                                <div class="card-content">
                                    <div class="card-wrapper">
                                        <div class="card-tag">
                                            <a href="#" class="span hover-2">#Design</a>
                                            <a href="#" class="span hover-2">#Movie</a>
                                        </div>
                                        <div class="wrapper">
                                            <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
                                            <span class="span">6 mins read</span>
                                        </div>

                                    </div>
                                    <h3 class="headline headline-3">
                                        <a href="#" class="card-title hover-2">
                                            Self-observation is the first step of inner unfolding
                                        </a>
                                    </h3>
                                    <div class="card-wrapper">
                                        <div class="profile-card">
                                            <img src="./assets/images/author-1.png" width="48" height="48"
                                                loading="lazy" alt="Joseph" class="profile-banner">

                                            <div>
                                                <p class="card-title">Joseph</p>
                                                <p class="card-subtitle">25 Nov 2022</p>
                                            </div>
                                        </div>
                                        <a href="#" class="card-btn">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="card feature-card">
                                <figure class="card-banner img-holder" style="--width: 1602; --height: 903;">
                                    <img src="./assets/images/featured-5.png"
                                        alt="Self-observation is the first step of inner unfolding" class="img-cover"
                                        width="1602" loading="lazy" height="903">
                                </figure>
                                <div class="card-content">
                                    <div class="card-wrapper">
                                        <div class="card-tag">
                                            <a href="#" class="span hover-2">#Design</a>
                                            <a href="#" class="span hover-2">#Movie</a>
                                        </div>
                                        <div class="wrapper">
                                            <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
                                            <span class="span">6 mins read</span>
                                        </div>

                                    </div>
                                    <h3 class="headline headline-3">
                                        <a href="#" class="card-title hover-2">
                                            Self-observation is the first step of inner unfolding
                                        </a>
                                    </h3>
                                    <div class="card-wrapper">
                                        <div class="profile-card">
                                            <img src="./assets/images/author-1.png" width="48" height="48"
                                                loading="lazy" alt="Joseph" class="profile-banner">

                                            <div>
                                                <p class="card-title">Joseph</p>
                                                <p class="card-subtitle">25 Nov 2022</p>
                                            </div>
                                        </div>
                                        <a href="#" class="card-btn">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <a href="#" class="btn btn-secondary">
                        <span class="span">Show more posts</span>
                        <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                    </a>
                </div>
                <img src="./assets/images/shadow-3.svg" width="500" height="1600" loading="lazy" alt=""
                    class="feature-bg">
            </section>

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
                        <li>
                            <button class="card tag-btn">
                                <img src="./assets/images/tag1.png" width="32" height="32 " loading="lazy" alt="Travel">
                                <p class="btn-text">Travel</p>
                            </button>
                        </li>
                        <li>
                            <button class="card tag-btn">
                                <img src="./assets/images/tag2.png" width="32" height="32 " loading="lazy"
                                    alt="Culture">
                                <p class="btn-text">Culture</p>
                            </button>
                        </li>
                        <li>
                            <button class="card tag-btn">
                                <img src="./assets/images/tag3.png" width="32" height="32 " loading="lazy"
                                    alt="Lifestyle">
                                <p class="btn-text">Lifestyle</p>
                            </button>
                        </li>
                        <li>
                            <button class="card tag-btn">
                                <img src="./assets/images/tag4.png" width="32" height="32 " loading="lazy"
                                    alt="Fashion">
                                <p class="btn-text">Fashion</p>
                            </button>
                        </li>
                        <li>
                            <button class="card tag-btn">
                                <img src="./assets/images/tag5.png" width="32" height="32 " loading="lazy" alt="Food">
                                <p class="btn-text">Food</p>
                            </button>
                        </li>
                        <li>
                            <button class="card tag-btn">
                                <img src="./assets/images/tag6.png" width="32" height="32 " loading="lazy" alt="Space">
                                <p class="btn-text">Space</p>
                            </button>
                        </li>
                        <li>
                            <button class="card tag-btn">
                                <img src="./assets/images/tag7.png" width="32" height="32 " loading="lazy" alt="Animal">
                                <p class="btn-text">Animal</p>
                            </button>
                        </li>
                        <li>
                            <button class="card tag-btn">
                                <img src="./assets/images/tag8.png" width="32" height="32 " loading="lazy"
                                    alt="Minimal">
                                <p class="btn-text">Minimal</p>
                            </button>
                        </li>
                        <li>
                            <button class="card tag-btn">
                                <img src="./assets/images/tag9.png" width="32" height="32 " loading="lazy"
                                    alt="Interior">
                                <p class="btn-text">Interior</p>
                            </button>
                        </li>
                        <li>
                            <button class="card tag-btn">
                                <img src="./assets/images/tag10.png" width="32" height="32 " loading="lazy" alt="Plant">
                                <p class="btn-text">Plant</p>
                            </button>
                        </li>
                        <li>
                            <button class="card tag-btn">
                                <img src="./assets/images/tag11.png" width="32" height="32 " loading="lazy"
                                    alt="Nature">
                                <p class="btn-text">Nature</p>
                            </button>
                        </li>
                        <li>
                            <button class="card tag-btn">
                                <img src="./assets/images/tag12.png" width="32" height="32 " loading="lazy"
                                    alt="Business">
                                <p class="btn-text">Business</p>
                            </button>
                        </li>
                    </ul>
                </div>
            </section>

            <!-- 
                #RECENT POST
            -->
            <section class="section recent-post" id="recent" aria-labelledby="recent-label">
                <div class="container">
                    <div class="post-main">
                        <h2 class="headline headline-2 section-title">
                            <span class="span">
                                Recent posts
                            </span>
                        </h2>
                        <p class="section-text">
                            Don't miss the latest trends
                        </p>
                        <ul class="grid-list">
                            <li class="recent-post-card">
                                <figure class="card-banner img-holder" style="--width: 271; --height: 258 ;">
                                    <img src="./assets/images/recent-post-1.jpg"
                                        alt="Helpful Tips for Working from Home as a Freelancer" width="271"
                                        height="258" class="img-cover" loading="lazy">
                                </figure>
                                <div class="card-content">
                                    <a href="#" class="card-badge">Working Tips</a>

                                    <h3 class="headline headline-3 card-title">
                                        <a href="#" class="link hover-2">
                                            Helpful Tips for Working from Home as a
                                            Freelancer</a>
                                    </h3>
                                    <p class="card-text">
                                        Gosh jaguar ostrich quail one excited dear hello and bound and the and bland
                                        moral misheard roadrunner flapped lynx far
                                        that and jeepers giggled far and far
                                    </p>

                                    <div class="card-wrapper">
                                        <div class="card-tag">
                                            <a href="#" class="span hover-2"># Travel</a>
                                            <a href="#" class="span hover-2"># Lifestyle</a>
                                        </div>

                                        <div class="wrapper">
                                            <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
                                            <span class="span">3 mins read</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="recent-post-card">
                                <figure class="card-banner img-holder" style="--width: 271; --height: 258 ;">
                                    <img src="./assets/images/recent-post-2.jpg"
                                        alt="Helpful Tips for Working from Home as a Freelancer" width="271"
                                        height="258" class="img-cover" loading="lazy">
                                </figure>
                                <div class="card-content">
                                    <a href="#" class="card-badge">Working Tips</a>

                                    <h3 class="headline headline-3 card-title">
                                        <a href="#" class="link hover-2">
                                            Helpful Tips for Working from Home as a
                                            Freelancer</a>
                                    </h3>
                                    <p class="card-text">
                                        Gosh jaguar ostrich quail one excited dear hello and bound and the and bland
                                        moral misheard roadrunner flapped lynx far
                                        that and jeepers giggled far and far
                                    </p>

                                    <div class="card-wrapper">
                                        <div class="card-tag">
                                            <a href="#" class="span hover-2"># Travel</a>
                                            <a href="#" class="span hover-2"># Lifestyle</a>
                                        </div>

                                        <div class="wrapper">
                                            <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
                                            <span class="span">3 mins read</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="recent-post-card">
                                <figure class="card-banner img-holder" style="--width: 271; --height: 258 ;">
                                    <img src="./assets/images/recent-post-3.jpg"
                                        alt="Helpful Tips for Working from Home as a Freelancer" width="271"
                                        height="258" class="img-cover" loading="lazy">
                                </figure>
                                <div class="card-content">
                                    <a href="#" class="card-badge">Working Tips</a>

                                    <h3 class="headline headline-3 card-title">
                                        <a href="#" class="link hover-2">
                                            Helpful Tips for Working from Home as a
                                            Freelancer</a>
                                    </h3>
                                    <p class="card-text">
                                        Gosh jaguar ostrich quail one excited dear hello and bound and the and bland
                                        moral misheard roadrunner flapped lynx far
                                        that and jeepers giggled far and far
                                    </p>

                                    <div class="card-wrapper">
                                        <div class="card-tag">
                                            <a href="#" class="span hover-2"># Travel</a>
                                            <a href="#" class="span hover-2"># Lifestyle</a>
                                        </div>

                                        <div class="wrapper">
                                            <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
                                            <span class="span">3 mins read</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="recent-post-card">
                                <figure class="card-banner img-holder" style="--width: 271; --height: 258 ;">
                                    <img src="./assets/images/recent-post-4.jpg"
                                        alt="Helpful Tips for Working from Home as a Freelancer" width="271"
                                        height="258" class="img-cover" loading="lazy">
                                </figure>
                                <div class="card-content">
                                    <a href="#" class="card-badge">Working Tips</a>

                                    <h3 class="headline headline-3 card-title">
                                        <a href="#" class="link hover-2">
                                            Helpful Tips for Working from Home as a
                                            Freelancer</a>
                                    </h3>
                                    <p class="card-text">
                                        Gosh jaguar ostrich quail one excited dear hello and bound and the and bland
                                        moral misheard roadrunner flapped lynx far
                                        that and jeepers giggled far and far
                                    </p>

                                    <div class="card-wrapper">
                                        <div class="card-tag">
                                            <a href="#" class="span hover-2"># Travel</a>
                                            <a href="#" class="span hover-2"># Lifestyle</a>
                                        </div>

                                        <div class="wrapper">
                                            <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
                                            <span class="span">3 mins read</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="recent-post-card">
                                <figure class="card-banner img-holder" style=" --width: 271; --height: 258;">
                                    <img src=" ./assets/images/recent-post-5.jpg"
                                        alt="Helpful Tips for Working from Home as a Freelancer" width="271"
                                        height="258" class="img-cover" loading="lazy">
                                </figure>
                                <div class="card-content">
                                    <a href="#" class="card-badge">Working Tips</a>

                                    <h3 class="headline headline-3 card-title">
                                        <a href="#" class="link hover-2">
                                            Helpful Tips for Working from Home as a
                                            Freelancer</a>
                                    </h3>
                                    <p class="card-text">
                                        Gosh jaguar ostrich quail one excited dear hello and bound and the and bland
                                        moral misheard roadrunner flapped lynx far
                                        that and jeepers giggled far and far
                                    </p>

                                    <div class="card-wrapper">
                                        <div class="card-tag">
                                            <a href="#" class="span hover-2"># Travel</a>
                                            <a href="#" class="span hover-2"># Lifestyle</a>
                                        </div>

                                        <div class="wrapper">
                                            <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
                                            <span class="span">3 mins read</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <nav aria-label="pagination" class="pagination">
                            <a href="#" class="pagination-btn" aria-label="previous page">
                                <ion-icon name="arrow-back" aria-hidden="true"></ion-icon>
                            </a>
                            <a href="#" class="pagination-btn">1</a>
                            <a href="#" class="pagination-btn">2</a>
                            <a href="#" class="pagination-btn">3</a>
                            <a href="#" class="pagination-btn" aria-label="more page">...</a>
                            <a href="#" class="pagination-btn" aria-label="next page">
                                <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                            </a>
                        </nav>
                    </div>
                    <div class="post-aside grid-list">
                        <div class="card aside-card">
                            <h3 class="headline headline-2 aside-title">
                                <span class="span">Popular posts</span>
                            </h3>
                            <ul class="popular-list">
                                <li>
                                    <div class="popular-card">
                                        <figure class="card-banner img-holder" style="--width:64 ; --height:64 ;"
                                            loading="lazy">
                                            <img src="./assets/images/popular-post-1.jpg" width="64" height="64" alt=""
                                                class="img-cover">
                                        </figure>
                                        <div class="card-content">
                                            <h4 class="headline headline-4 card-title">
                                                <a href="#" class="link hover-2">Creating is a privilege but it’s also a
                                                    gift</a>
                                            </h4>
                                            <div class="wrapper">
                                                <p class="card-subtitle">
                                                    15 mins read
                                                </p>
                                                <time class="publish-date" datetime="2022-04-15">
                                                    15 April 2022
                                                </time>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="popular-card">
                                        <figure class="card-banner img-holder" style="--width:64 ; --height:64 ;"
                                            loading="lazy">
                                            <img src="./assets/images/popular-post-2.jpg" width="64" height="64" alt=""
                                                class="img-cover">
                                        </figure>
                                        <div class="card-content">
                                            <h4 class="headline headline-4 card-title">
                                                <a href="#" class="link hover-2">Being unique is better than being
                                                    perfect</a>
                                            </h4>
                                            <div class="wrapper">
                                                <p class="card-subtitle">
                                                    15 mins read
                                                </p>
                                                <time class="publish-date" datetime="2022-04-15">
                                                    15 April 2022
                                                </time>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="popular-card">
                                        <figure class="card-banner img-holder" style="--width:64 ; --height:64 ;"
                                            loading="lazy">
                                            <img src="./assets/images/popular-post-3.jpg" width="64" height="64" alt=""
                                                class="img-cover">
                                        </figure>
                                        <div class="card-content">
                                            <h4 class="headline headline-4 card-title">
                                                <a href="#" class="link hover-2">Every day, in every city and town
                                                    across
                                                    the country</a>
                                            </h4>
                                            <div class="wrapper">
                                                <p class="card-subtitle">
                                                    15 mins read
                                                </p>
                                                <time class="publish-date" datetime="2022-04-15">
                                                    15 April 2022
                                                </time>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="popular-card">
                                        <figure class="card-banner img-holder" style="--width:64 ; --height:64 ;"
                                            loading="lazy">
                                            <img src="./assets/images/popular-post-4.jpg" width="64" height="64" alt=""
                                                class="img-cover">
                                        </figure>
                                        <div class="card-content">
                                            <h4 class="headline headline-4 card-title">
                                                <a href="#" class="link hover-2">Your voice, your mind, your story, your
                                                    vision</a>
                                            </h4>
                                            <div class="wrapper">
                                                <p class="card-subtitle">
                                                    15 mins read
                                                </p>
                                                <time class="publish-date" datetime="2022-04-15">
                                                    15 April 2022
                                                </time>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="popular-card">
                                        <figure class="card-banner img-holder" style="--width:64 ; --height:64 ;"
                                            loading="lazy">
                                            <img src="./assets/images/popular-post-2.jpg" width="64" height="64" alt=""
                                                class="img-cover">
                                        </figure>
                                        <div class="card-content">
                                            <h4 class="headline headline-4 card-title">
                                                <a href="#" class="link hover-2">Being unique is better than being
                                                    perfect</a>
                                            </h4>
                                            <div class="wrapper">
                                                <p class="card-subtitle">
                                                    15 mins read
                                                </p>
                                                <time class="publish-date" datetime="2022-04-15">
                                                    15 April 2022
                                                </time>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card aside-card">
                            <h3 class="headline headline-2 aside-title">
                                <span class="span">Last Comment</span>
                            </h3>
                            <ul class="comment-list">
                                <li>
                                    <div class="comment-card">
                                        <blockquote class="card-text">
                                            “ Gosh jaguar ostrich quail one excited dear hello and bound and the and
                                            bland moral misheard roadrunner “
                                        </blockquote>
                                        <div class="profile-card">
                                            <figure class="profile-banner img-holder">
                                                <img src="./assets/images/author-6.png" width="32" height="32"
                                                    loading="lazy" alt="Jane Cooper" class="img-cover">
                                            </figure>
                                            <div>
                                                <p class="card-title">Jane Cooper</p>
                                                <time class="card-date" datetime="2022-04-15">15 April 2022</time>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="comment-card">
                                        <blockquote class="card-text">
                                            “ Gosh jaguar ostrich quail one excited dear hello and bound and the and
                                            bland moral misheard roadrunner “
                                        </blockquote>
                                        <div class="profile-card">
                                            <figure class="profile-banner img-holder">
                                                <img src="./assets/images/author-7.png" width="32" height="32"
                                                    loading="lazy" alt="Katen Doe" class="img-cover">
                                            </figure>
                                            <div>
                                                <p class="card-title">Katen Doe</p>
                                                <time class="card-date" datetime="2022-04-15">15 April 2022</time>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="comment-card">
                                        <blockquote class="card-text">
                                            “ Gosh jaguar ostrich quail one excited dear hello and bound and the and
                                            bland moral misheard roadrunner “
                                        </blockquote>
                                        <div class="profile-card">
                                            <figure class="profile-banner img-holder">
                                                <img src="./assets/images/author-8.png" width="32" height="32"
                                                    loading="lazy" alt="Barbara Cartland" class="img-cover">
                                            </figure>
                                            <div>
                                                <p class="card-title">Barbara Cartland</p>
                                                <time class="card-date" datetime="2022-04-15">15 April 2022</time>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card aside-card insta-card">
                            <a href="#" class="logo">
                                <img src="./assets/images/patrik-high-resolution-logo-transparent.png" width="119"
                                    height="37" loading="lazy" alt="Train travel logo">
                            </a>
                            <p class="card-text">
                                Follow us on instagram
                            </p>
                            <ul class="insta-list">
                                <li>
                                    <a href="#" class="insta-post img-holder" style="--width: 276; --height: 277;">
                                        <img src="./assets/images/insta-post-1.png" width="276" height="277"
                                            loading="lazy" alt="insta post" class="img-cover">
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="insta-post img-holder" style="--width: 276; --height: 277;">
                                        <img src="./assets/images/insta-post-2.png" width="276" height="277"
                                            loading="lazy" alt="insta post" class="img-cover">
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="insta-post img-holder" style="--width: 276; --height: 277;">
                                        <img src="./assets/images/insta-post-3.png" width="276" height="277"
                                            loading="lazy" alt="insta post" class="img-cover">
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="insta-post img-holder" style="--width: 276; --height: 277;">
                                        <img src="./assets/images/insta-post-4.png" width="276" height="277"
                                            loading="lazy" alt="insta post" class="img-cover">
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="insta-post img-holder" style="--width: 276; --height: 277;">
                                        <img src="./assets/images/insta-post-5.png" width="276" height="277"
                                            loading="lazy" alt="insta post" class="img-cover">
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="insta-post img-holder" style="--width: 276; --height: 277;">
                                        <img src="./assets/images/insta-post-6.png" width="276" height="277"
                                            loading="lazy" alt="insta post" class="img-cover">
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="insta-post img-holder" style="--width: 276; --height: 277;">
                                        <img src="./assets/images/insta-post-6.png" width="276" height="277"
                                            loading="lazy" alt="insta post" class="img-cover">
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="insta-post img-holder" style="--width: 276; --height: 277;">
                                        <img src="./assets/images/insta-post-7.png" width="276" height="277"
                                            loading="lazy" alt="insta post" class="img-cover">
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="insta-post img-holder" style="--width: 276; --height: 277;">
                                        <img src="./assets/images/insta-post-8.png" width="276" height="277"
                                            loading="lazy" alt="insta post" class="img-cover">
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="insta-post img-holder" style="--width: 276; --height: 277;">
                                        <img src="./assets/images/insta-post-9.png" width="276" height="277"
                                            loading="lazy" alt="insta post" class="img-cover">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </article>
    </main>
    <?php require 'includes/footer.php'?>;

