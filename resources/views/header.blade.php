<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Системаи санҷиши довталабон</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      
              
        
       
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

         
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Саҳифаи довталаб">
          <a class="nav-link" href="{{route('home')}}">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Саҳифаи довталаб</span>
          </a>
        </li>
        
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion" aria-expanded="false">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Фанҳо</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents" style="">
            <li>
              <a href="{{route('klaster', '1')}}">Кластери 1</a>
            </li>
             <li>
              <a href="{{route('klaster','2')}}">Кластери 2</a>
            </li>
             <li>
              <a href="{{route('klaster','3')}}">Кластери 3</a>
            </li>
             <li>
              <a href="{{route('klaster','4')}}">Кластери 4</a>
            </li>
             <li>
              <a href="{{route('klaster','5')}}">Кластери 5</a>
            </li>
           
          </ul>
        </li>
      
       
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Link">
          <a class="nav-link" href="{{'/natija'}}">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Натиҷа</span>
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
 