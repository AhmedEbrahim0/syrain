<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Syrian Gourmet</title>

    <!-- CSS File -->
    <link rel="stylesheet" href="/Static/CSS/style.css" />
    <!-- Bootstrap file -->
    <link rel="stylesheet" href="/Static/Bootstrap/css/bootstrap.min.css" />

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  </head>
  <body>
    <!-- navbar -->
      <nav id="navbar" class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container" id="main_container">
          <a id="nav_brand" class="navbar-brand" href="/">
            <img
              style="width: 109px; height: 64px; flex-shrink: 0"
              src="/images/logf453o-1.png"
              alt=""
            />
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
            id="nav_toggler"
          >
            <img src="/images/vecdastor.svg" alt="" />
          </button>
          <div class=" collapse navbar-collapse" id="navbarSupportedContent">
            <ul id="nav_item" class="navbar-nav">
              <li id="Home_rout" class="nav-item activation ms-4">
                <a class="nav-link" aria-current="page" href="/index"
                  >Home
                  <p></p
                ></a>
              </li>

              <li id="Product_rout" class="nav-item ms-4">
                <a class="nav-link" href="/Product"
                  >Product
                  <p></p
                ></a>
              </li>
              <li id="Recipes_rout" class="nav-item ms-4">
                <a class="nav-link" href="/Recipes"
                  >Recipes
                  <p></p
                ></a>
              </li>
              <li id="About_rout" class="nav-item ms-4">
                <a class="nav-link" href="/About"
                  >About us
                  <p></p
                ></a>
              </li>

              <li id="Contact_rout" class="nav-item ms-4">
                <a class="nav-link" href="/Contact"
                  >Contact Us
                  <p></p
                ></a>
              </li>

              <li id="Career_rout" class="nav-item ms-4">
                <a class="nav-link" href="/Career"
                  >Career
                  <p></p
                ></a>
              </li>

              <button id="hidden_btn_nav">Get started</button>
            </ul>
          </div>
        </div>
      </nav>

    <!-- frist Sec -->
    <div class="home_page">
      <div id="HomePageBack_img">
        <img
          id="HomePageBack_img"
          src="/images/storyjghj-11.png"
          alt=""
        />
        <div class="overlay"></div>
        <div class="custom-shape-divider-bottom-1693019666">
          <svg
            data-name="Layer 1"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 1200 120"
            preserveAspectRatio="none"
          >
            <path
              d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
              class="shape-fill"
            ></path>
          </svg>
        </div>
      </div>

      <br /><br /><br /><br />
      <br /><br />

      <div
        class="container row m-auto d-flex justify-content-center align-items-center"
      >
        <div class="hidddenright col-lg-6 col-md-6 col-sm-12 col-12" id="first_home_half">
          <h1>{{$home->title}}</h1>
          <p>
          {{$home->text}}
          </p>
          <button onclick="window.location.href= '/Product' ">View Products</button>
        </div>

        <div class="hidddenleft col-lg-6 col-md-6 col-sm-12 col-12" id="second_home_half">
          <img src="/{{$home->image}}" alt="" />
        </div>
      </div>
    </div>

  
    <!-- second sec -->
    <img
      id="herb_img"
      src="/images/leaf-with-whicbte-background.png"
      alt=""
    />
    <br /><br /><br />
    <br /><br /><br />
    <div id="product_home11" class=" container">
      <h1 id="product_home_tit">Products</h1>

      <br /><br />
      <div id="container_product_card" class="row gap-5">
        @foreach($products as $product)
        <a href="/Products/{{$product->id}}" class="hidddenright card m-auto">
          <img
            src="/{{$product->image}}"
            class="card-img-top"
            alt="..."
          />
          <div class="card-body">
            <p class="card-text">{{$product->name}}</p>
          </div>
        </a>
        @endforeach


      </div>

      <button
        onclick="window.location.href= '/Product' "
        id="View_all_product1"
      >
        View all
      </button>
    </div>


    <br /><br /><br />
    <br /><br /><br />
    <!-- third sec -->
    <div id="product_home11" class="container">
      <h1 id="product_home_tit">Recipes</h1>

      <br /><br />
      <div id="container_recipes_card" class="row gap-5">

        @foreach($recipes as $recipe)
        <a href="/Recipes/{{$recipe->id}}" class="hidddenright card m-auto">
          <img
            src="/{{$recipe->image}}"
            class="card-img-top"
            alt="..."
          />
          <div class="card-body">
            <h3> {{$recipe->name}} </h3>
          </div>
        </a>
        @endforeach

      </div>

      <button
      onclick="window.location.href= '/Recipes' "
      id="View_all_product1">View all</button>
    </div>

    <br /><br /><br />
    <br /><br /><br />
    <!-- fourth sec -->
    <img
      id="herb_img22"
      src="/images/leaf-with-white-bdfgackground.png"
      alt=""
    />
    <div class="container" id="fourth_Container">
      <h1>Syrian Gourmet Presence</h1>

      <div class="hiddden">
        <img src="/{{$map->image}}" alt="" />
      </div>
    </div>

    <br /><br /><br />
    <br /><br /><br />
    <!-- footer -->
    <div id="footer_container">
      <div class="container row m-auto">
        <ul class="col-lg-3 col-md-4 col-sm-12 col-12">
          <img class="w-100" src="/images/footer-logo-1.png" alt="" />
          <br /><br />
          <p>
            Syrian Gourmet was born out of a passion for the traditional
            heritage of the ‘Moune’ or ‘seasonal storing’ of food, a custom
            widespread in Syria and many countries of the Levant region
          </p>
          <br />
          <h6 class="mb-3">Social:</h6>
          <div class="d-flex gap-3">
            <a href=""
              ><img class="w-100" src="/images/vectgjgghor.svg" alt=""
            /></a>
            <a href=""
              ><img
                class="w-100"
                src="/images/entypo-social-linkedinkhk-with-circle.svg"
                alt=""
            /></a>
            <a href=""
              ><img
                class="w-100"
                src="/images/entypo-social-twittergfh-with-circle.svg"
                alt=""
            /></a>
          </div>
        </ul>
        <ul id="Quick434" class="col-lg-5 col-md-4 col-sm-12 col-12 mt-4">
          <li><h6>Quick Link's</h6></li>
          <li><a href="">Home</a></li>
          <li><a href="">Products </a></li>
          <li><a href="">Recipes</a></li>
          <li><a href="">About us</a></li>
          <li><a href="">Conact us</a></li>
        </ul>
        <ul class="col-lg-3 col-md-4 col-sm-12 col-12 mt-4">
          <p
            style="
              color: #fff;
              font-family: Poppins;
              font-size: 14px;
              font-style: normal;
              font-weight: 400;
              line-height: 20px;
              opacity: 0.4;
            "
          >
            Join our newsletter to stay up to date on features and releases
          </p>
          <form action="">
            <label
              style="
                color: #fff;
                font-family: Inter;
                font-size: 14px;
                font-style: normal;
                font-weight: 600;
                line-height: normal;
              "
              for="email_inline"
            >
              Subscribe us</label
            >
            <br /><br />

            <div class="d-flex align-items-center">
              <input
                id="email_inline"
                class="form-control"
                type="email"
                placeholder="Enter Email"
              />
              <label for="email_inline">
                <img
                  id="email-img_sm"
                  src="/images/groupjfjfgjfg-1.svg"
                />
              </label>
            </div>
            <br />
            <button id="last_btn_emial_footer">Subscribe</button>
          </form>
        </ul>
      </div>
    </div>

    <!-- JS File -->
    <script src="/Static/JS/script.js"></script>
    <!-- Bootstrap file-->
    <script src="/Static/Bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
