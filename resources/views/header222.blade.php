<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Системаи санҷиши довталабон</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        
        
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Фанҳо">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Фанҳо</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
           
              @foreach($data as $str)
                  <li><a href="{{URL::route('sanjish', [$str->id_fan, $str->kat]) }}">{{$str->nomi_fan}}</a></li>
              @endforeach

           
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Натиҷаи санҷиш">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Кластери 1</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="{{URL::route('sanjish', [6, 'B']) }}">Физика</a>
               <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="{{URL::route('sanjish', [6, 'B']) }}">Физика</a>
            </li>
            <li>
              <a href="{{URL::route('sanjish', [6, 'B']) }}">Физика</a>
            </li>

            <li>
              <a href="register.html">Registration Page</a>
            </li>
            <li>
              <a href="forgot-password.html">Forgot Password Page</a>
            </li>
            <li>
              <a href="blank.html">Blank Page</a>
            </li>
          </ul>
            </li>
            <li>
              <a href="{{URL::route('sanjish', [6, 'B']) }}">Физика</a>
            </li>

            <li>
              <a href="register.html">Registration Page</a>
            </li>
            <li>
              <a href="forgot-password.html">Forgot Password Page</a>
            </li>
            <li>
              <a href="blank.html">Blank Page</a>
            </li>
          </ul>
        </li>
       
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Баромадан">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Баромадан</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
       
        
		
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal" >
            <i class="fa fa-fw fa-sign-out"></i>Баромадан</a>
        </li>
      </ul>
    </div>
  </nav>
 