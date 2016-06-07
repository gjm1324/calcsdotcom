<nav class="navbar navbar-default banner">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="<?=BASE_URL?>"><img src="<?=BASE_URL?>/public/images/logo.png" style = "height: 100%;float: left;">Calcs.com</a>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1, #navbar-collapse-2" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse-1">
      <p class="navbar-text logged-in">Signed in as <?=$displayname?></p>
      <form class="navbar-form navbar-right logged-out" id="loginForm" action="<?=BASE_URL?>/user/login" method="post" hidden>
        <div class="form-group">
          <input class="form-control" type="Email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
          <input class="form-control" type="password" name="password" placeholder="Password">
        </div>
          <button type="submit" class="btn btn-default">Login</button>
          <button type="button" onclick="window.location.href='<?=BASE_URL?>/user/signup'" class="btn btn-default">Sign Up</button>
      </form>

      <ul class="nav navbar-nav navbar-right logged-in" id="myAccountTab" hidden>
        <li><a href="<?=BASE_URL?>/MyAccount">My Account</a></li>
        <li><a href="<?=BASE_URL?>/user/logout">Log Out</a></li>
      </ul>
    </div>
  </div><!-- /.container-fluid 
</nav> 

<nav class="navbar navbar-default">-->
  <div class="container-fluid second-navbar">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbar-collapse-2">
      <ul class="nav navbar-nav">
      <!-- class="active" will highlight the tab that you want selected -->
        <li id="recentlyUsedTab"  class="logged-in">  <a href="<?=BASE_URL?>/RecentlyUsed"  >Recently Used</a></li>
        <li id="favoritesTab"     class="logged-in">  <a href="<?=BASE_URL?>/Favorites"     >Favorites</a></li>
        <li id="browseTab"        class="">           <a href="<?=BASE_URL?>/Browse"        >Browse</a></li>
        <li id="myCalcsTab"       class="logged-in">  <a href="<?=BASE_URL?>/MyCalcs"       >My Calcs</a></li>
        <li id="calcFactoryTab"   class="logged-in">  <a href="<?=BASE_URL?>/CalcFactory"   >Calc Factory</a></li>
<!--        <li class="dropdown">
          <a href="#" class="dropdown-toggle" 
                      data-toggle="dropdown" 
                      role="button" 
                      aria-haspopup="true" 
                      aria-expanded="false"
                      >Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
-->
      </ul>
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>