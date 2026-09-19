<!-- 
  -#HERO
-->
<section class="hero" id="home" aria-label="home">
    <div class="container">
        <div class="hero-content">
            <?php if ($user_logged_in) {
                echo "<p class='hero-subtitle'>Hello ". $name. "</p>";

                if ($visit_count % 5 == 0) {
                    echo "<p class='hero-subtitle'>You are my special guest! Nice to see you</p>";
                }
            } ?>
            
            <h1 class="headline headline1 section-title">
                <span class="span">I'm Patrik Kusnir </span>
            </h1>
            <p class="hero-text">I am graduated pharmacist whose the biggest passion is travelling by train.
                This blog has been written as my first project during my long self-taught programmer
                learning path.</p>
            <div class="input-wrapper">
                <form>
                    <input type="email" name="email_address" placeholder="Type your email address" required
                        class="input-field">
                    <button class="btn btn-primary" type="submit">
                        <span class="primary">Subscribe</span>
                        <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                    </button>
                </form>
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
