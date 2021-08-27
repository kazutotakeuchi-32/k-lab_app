<?php
  require_once "function.php";
  session_start();
  $csrf_token = get_csrf_token();
  $_SESSION['csrf_token'] = $csrf_token;
  $_SESSION['page'] = 1;
?>
<!-- php -S localhost:8080 -t ./ -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>K-LAB</title>
  <link rel="shortcut icon" href="asserts/images/favicon.png">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="asserts/stylesheets/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="asserts/js/main.js"></script>
  <script src="asserts/js/jquery-2.1.4.min.js"></script>
  <script src="asserts/js/skill.bars.jquery.js"></script>

  <script>
    jQuery( function($) {
      $('.skillbar').skillBars({
        from: 0,
        speed: 4000,
        interval: 100,
      });
    });
  </script>
</head>
<body>
  <div class="nav-wrapper">
        <nav class="header-nav">
          <button class="menu-trigger">
            <span></span>
            <span></span>
            <span></span>
          </button>
          <ul class="nav-list">
              <li class="menu nav-item"><i class="fas fa-user"></i>ABOUT</li>
              <li class="menu nav-item"><i class="fas fa-lightbulb"></i>SKILLS</li>
              <li class="menu nav-item"><i class="fas fa-archive"></i>ARCHIVE</li>
              <li class="menu nav-item"><i class="fas fa-envelope"></i>CONTACT</li>
              <li class="menu nav-item"><i class="fas fa-hashtag"></i>SNS</li>
          </ul>
        </nav>
  </div>
  <header class="header-7">
    <button class="menu-trigger">
      <span></span>
      <span></span>
      <span></span>
    </button>

    <div class="box box-logo">
      <img src="asserts/images/k-lab.png" class="logo-img" alt="">
    </div>
    <div class="sp-nav">
    </div>
    <div class="box box-nav">
      <ul class="inner-nav">
        <li class="menu"><i class="fas fa-user"></i>ABOUT </li>
        <li class="menu"><i class="fas fa-lightbulb"></i>SKILLS</li>
        <li class="menu"><i class="fas fa-archive"></i>ARCHIVE</li>
        <li class="menu"><i class="fas fa-envelope"></i>CONTACT</li>
        <li class="menu"><i class="fas fa-hashtag"></i>SNS</li>
      </ul>
    </div>
  </header>
  <main>
    <!-- ABOUT -->
      <section class="section1 about">
        <h2><i class="fas fa-user"></i>ABOUT</h2>
        <div class="flexbox">
          <div class="section1-item1">
            <img src="asserts/images/_h21AB7G.jpg" alt="">
          </div>
            <div class="profile">
              <div class="section1-item2">
                <ul>
                  <li>■　NAME</li>
                  <li>■　AGE</li>
                  <li>■　COUNTRY</li>
                  <li>■　HOBBY</li>
                  <li>
                  </li>
                </ul>
              </div>
              <div class="section1-item2">
                <ul>
                  <li>：　KAZUTO TAKEUCHI</li>
                  <li>：　22</li>
                  <li>：　JAPAN</li>
                  <li>：　GAME</li>
                </ul>
              </div>
            </div>
        </div>
      </section>
    <!--  SKILLS -->
    <section class="skills">
        <h2><i class="fas fa-lightbulb"></i></i>SKILS</h2>
      <div class="skills__box">
            <div class="front-end box">
              <h3>Front-end</h3>
              <div class="gage-area">
                <div class="skillbar skillbar-html" data-percent="60">
                  <div class="skillbar-title">HTML5</div>
                  <div class="skillbar-bar"></div>
                  <div class="skill-bar-percent"></div>
                <div class="skillbar skillbar-css" data-percent="60">
                <div class="skillbar-title">CSS</div>
                <div class="skillbar-bar"></div>
                <div class="skill-bar-percent"></div>
              </div>
              <div class="skillbar skillbar-scss" data-percent="50">
                <div class="skillbar-title">SCSS</div>
                <div class="skillbar-bar"></div>
                <div class="skill-bar-percent"></div>
              </div>
              <div class="skillbar skillbar-js" data-percent="70">
                <div class="skillbar-title">JavaScript</div>
                <div class="skillbar-bar"></div>
                <div class="skill-bar-percent"></div>
              </div>
              <div class="skillbar skillbar-js" data-percent="60">
                <div class="skillbar-title">jquery</div>
                <div class="skillbar-bar"></div>
                <div class="skill-bar-percent"></div>
              </div>
              <div class="skillbar skillbar-react" data-percent="60">
                <div class="skillbar-title">React</div>
                <div class="skillbar-bar"></div>
                <div class="skill-bar-percent"></div>
              </div>
                </div>
              </div>
            </div>
            <div class="back-end box">
              <h3>Back-end</h3>
              <div class="gage-area">
                <div class="skillbar skillbar-ruby" data-percent="70">
                  <div class="skillbar-title">Ruby</div>
                  <div class="skillbar-bar"></div>
                  <div class="skill-bar-percent"></div>

                   <div class="skillbar skillbar-ruby_on_rails" data-percent="60">
                <div class="skillbar-title">Ruby on Rails</div>
                <div class="skillbar-bar"></div>
                <div class="skill-bar-percent"></div>
              </div>
              <div class="skillbar skillbar-python" data-percent="40">
                <div class="skillbar-title">Python</div>
                <div class="skillbar-bar"></div>
                <div class="skill-bar-percent"></div>
              </div>
              <div class="skillbar skillbar-php" data-percent="40">
                <div class="skillbar-title">PHP</div>
                <div class="skillbar-bar"></div>
                <div class="skill-bar-percent"></div>
              </div>

              <div class="skillbar skillbar-mysql" data-percent="50">
                <div class="skillbar-title">Mysql</div>
                <div class="skillbar-bar"></div>
                <div class="skill-bar-percent"></div>
              </div>
                </div>
            </div>
      </div>
      <div class="devops box">
        <h3>DevOps</h3>
        <div class="gage-area">
          <div class="skillbar skillbar-docker" data-percent="40">
            <div class="skillbar-title">Docker</div>
            <div class="skillbar-bar"></div>
            <div class="skill-bar-percent"></div>
          <div class="skillbar skillbar-aws" data-percent="40">
          <div class="skillbar-title">AWS</div>
          <div class="skillbar-bar"></div>
          <div class="skill-bar-percent"></div>
        </div>
        <div class="skillbar skillbar-git" data-percent="40">
          <div class="skillbar-title">Git</div>
          <div class="skillbar-bar"></div>
          <div class="skill-bar-percent"></div>
        </div>
        <div class="skillbar skillbar-slack" data-percent="40">
          <div class="skillbar-title">Slack</div>
          <div class="skillbar-bar"></div>
          <div class="skill-bar-percent"></div>
        </div>
        <div class="skillbar skillbar-wordpress" data-percent="50">
          <div class="skillbar-title">Wordpress</div>
          <div class="skillbar-bar"></div>
          <div class="skill-bar-percent"></div>
        </div>
          </div>
      </div>
    </section>
    <section class="archive">
      <h2><i class="fas fa-archive"></i>ARCHIBE</h2>
      <div class="gallery__list">
        <li class="gallery__item">
          <img class="image1" src="asserts/images/kazugramming1.png" alt="kazugramming" width="100px" height="100px">
        </li>
        <li class="gallery__item">
          <img class="image2" src="asserts/images/typing_games1.png" alt="typing_games" width="100px" height="100px">
        </li>
        <li class="gallery__item">
          <img class="image3" src="asserts/images/excipressive1.jpeg" alt="excipressive" width="100px" height="100px">
        </li>
        <li class="gallery__item">
          <img class="image4" src="asserts/images/kazugramming_bot1.png" alt="kazugramming_bot" width="100px" height="100px">
        </li>
        <li class="gallery__item">
          <img class="image5" src="asserts/images/k-step1.png" alt="k-step" width="100px" height="100px">
        </li>
        <li class="gallery__item">
          <img class="image6" src="asserts/images/breakout_game1.png" alt="breakout_game" width="100px" height="100px">
        </li>
      </div>
    </section>
    <section class="contact">
      <!-- <div class="box">
      </div> -->
      <h2><i class="fas fa-envelope"></i>CONTACT</h2>
      <p>お気軽にお問い合わせください。</p>
      <div class="get-in-touch">
        <form class="contact-form row" >
           <div class="form-field col x-50">
              <input id="name" class="input-text js-input" type="text" name="name" >
              <label class="label" for="name">Name</label>
           </div>
           <div class="form-field col x-50">
              <input id="email" class="input-text js-input" type="email" name="email"  >
              <label class="label" for="email">E-mail</label>
           </div>
           <div class="form-field col x-100">
              <input id="message" class="input-text js-input" type="text" name="message"   >
              <label class="label" for="message">Message</label>
           </div>
           <input type="hidden" name="csrf_token" value=<?php echo $csrf_token; ?>>
           <div class="form-field col x-100 align-center">
              <input class="submit-btn" type="submit" value="Submit" name="submit">
           </div>
        </form>
     </div>
        </section>
    <section class="sns">
      <h2 id="white"><i class="fas fa-hashtag"></i>SNS</h2>
      <div class="sns__box">
        <p><a href="https://twitter.com/kazutotake10"><i class="fab fa-twitter-square"></i></a></p>
        <p><a href="https://www.facebook.com/profile.php?id=100044657116771"><i class="fab fa-facebook-square"></i></a></i></p>
        <p> <a href="https://github.com/kazutotakeuchi-32"><i class="fab fa-github"></i></a></i></p>
      </div>
    </section>
  </main>

<div id="modal">
  <div class="flexbox">
  </div>
   <button id="close">X</button>
</div>
</div>
<div id="overlay"></div>
<footer class="footer">
      <p id="copy_right">© 2020 kazutotakeuchi Inc. All Rights Reserved.</p>
</footer>
</body>
</html>
