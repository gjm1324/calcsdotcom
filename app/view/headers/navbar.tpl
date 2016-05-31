<nav class="navbar navbar-default banner">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Calcs.com</a>
    </div>
    <form class="navbar-form navbar-right" id="loginForm" hidden>
      <div class="form-group">
        <input class="form-control" type="Email" name="loginEmail" placeholder="Email">
      </div>
      <div class="form-group">
        <input class="form-control" type="password" name="loginPassword" placeholder="Password">
      </div>
        <button type="submit" class="btn btn-default">Login</button>
    </form>
    <ul class="nav navbar-nav navbar-right" id="myAccountTab" hidden>
      <li><a href="<?=BASE_URL?>/MyAccount">My Account</a></li>
    </ul>
  </div><!-- /.container-fluid -->
</nav> 

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li id="recentlyUsedTab" class="active">  <a href="<?=BASE_URL?>/RecentlyUsed"  >Recently Used<span class="sr-only">(current)</span></a></li>
        <li id="favoritesTab" >                   <a href="<?=BASE_URL?>/Favorites"     >Favorites</a></li>
        <li id="browseTab" >                      <a href="<?=BASE_URL?>/Browse"        >Browse</a></li>
        <li id="myCalcsTab" >                     <a href="<?=BASE_URL?>/MyCalcs"       >My Calcs</a></li>
        <li id="calcFactoryTab" >                 <a href="<?=BASE_URL?>/CalcFactory"   >Calc Factory</a></li>
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