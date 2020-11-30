<!DOCTYPE html>
<html lang="ru">

<body>
  <!-- START: section -->
  <section class="probootstrap-intro probootstrap-intro-inner" style="background-image: url(img/hero_bg_1_b.jpg);" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row">
        <div class="col-md-7 probootstrap-intro-text">
          <h1 class="probootstrap-animate" data-animate-effect="fadeIn"><?php echo $data['h1']; ?></h1>
        </div>
      </div>
    </div>
    <span class="probootstrap-animate"><a class="probootstrap-scroll-down js-next" href="#next-section">Scroll down <i class="icon-chevron-down"></i></a></span>
  </section>
  <!-- END: section -->
  <main>
    <section id="next-section" class="probootstrap-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 probootstrap-relative">
            <h2 class="probootstrap-heading mt0 mb50">Article</h2>
            <ul class="probootstrap-owl-navigation absolute right">
              <li><a href="#" class="probootstrap-owl-prev"><i class="icon-chevron-left"></i></a></li>
              <li><a href="#" class="probootstrap-owl-next"><i class="icon-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 probootstrap-relative">
            <div class="owl-carousel owl-carousel-carousel">
              <div class="item">
                <div class="probootstrap-program">
                  <a href="/programs/<?php echo $data['id']; ?>"><?php echo $data['h1']; ?></a><!-- <img src="img/img_1.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive img-rounded"></img> -->
                  <h3></h3>
                  <!-- <p>Sets: 3, Reps: 8-10, Rest: 30 sec.</p> -->
                  <p><?php echo $data['short_content']; ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</body>

</html>