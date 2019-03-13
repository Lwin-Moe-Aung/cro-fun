
<nav class="navbar navbar-inverse navbar-lg navbar-fixed-top" style="margin-bottom: 0px;">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
                <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('slider/logo.png')}}" width="150" /></a>

        </div>

        <div class="navbar-collapse collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right hidden-xs" id="nav-button">
                @if(session('token'))
                    
                        <button href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="background-color:#222222; border: 0;">

                            @if(session('current')['role']=="finance" || session('current')['role']=="admin" || session('current')['photo'] == "" )

                                <img src="{{asset('uploads/Images/download.png')}}" class="img-circle" width="50" height="50"> 
                                <span class="caret" style="color: white;"></span>
                                
                            @else
                                <img src="{{asset('uploads/Images/'.session('current')['photo'])}}"  onerror="this.onerror=null;this.src='{{asset('uploads/Images/download.png')}}';" class="img-circle" width="50" height="50"> 
                                <span class="caret" style="color: white;"></span>
                            @endif

                        </button>
                        <ul class="dropdown-menu" id="drop-menu" style="margin: 0 76px;">
                            @if(session('token'))


                               @if(session('current')['role']=="field-officer")
                                    <li><a href="{{url('profile')}}" style="color:black;"><i class="fa fa-user" aria-hidden="true"></i>Profile</a>
                                    </li>

                                    <li><a href="{{url('borrower/form')}}" style="color:black;"><i class="fa fa-registered" aria-hidden="true"></i>Borrower Register</a></li>
                                    <li><a href="{{url('project/form')}}" style="color:black;"><i class="fa fa-registered" aria-hidden="true"></i>Project Upload</a></li>

                               @endif
                               @if(session('current')['role']=="finance" || session('current')['role']=="admin")
                                    <li><a href="{{url('finance/field-officers-listing')}}" style="color:black;"><i class="fa fa-home" aria-hidden="true"></i>{{session('current')['role']=="finance" ? "Finance" : "Admin"}} Dashboard
                                        </a>
                                    </li>
                                    <li><a href="{{url('officer/form')}}" style="color:black;"><i class="fa fa-registered" aria-hidden="true"></i>Field Officer Register</a>
                                    </li>
                                @endif
                                @if(session('current')['role']=="lender")
                                    <li><a href="{{url('profile')}}" style="color:black;"><i class="fa fa-user" aria-hidden="true"></i>Profile</a>
                                </li>

                                           <li><a href="{{url('lender/profile')}}" style="color:black;"><i class="fa fa-info-circle" aria-hidden="true"></i>Dashboard</a>
                                            <li><a style="color:black;"  href="{{url('lender/my-investments/'.session('current')['id'])}}"><i class="fa fa-info-circle" aria-hidden="true"></i>My Investments</a></li>
                                @endif
                                @if(session('current')['role']=="borrower")
                                      <li><a href="{{url('profile')}}" style="color:black;"><i class="fa fa-user" aria-hidden="true"></i>Profile</a>
                                </li>
                                <li><a style="color:black;"  href="{{url('borrowers/my-projects/'.session('current')['id'])}}"><i class="fa fa-info-circle" aria-hidden="true"></i>My Projects</a></li>
                                @endif
                
                                <li><a style="color:black;"  href="{{url('logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i>SIGN OUT</a></li>
                            @endif
                    </ul>
                    
                    @endif
            </ul>
          
            <ul class="nav navbar-nav navbar-right hidden-sm hidden-md hidden-lg">
                @if(session('token'))
                    <li style="padding-top: 8px;">
                         <button href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="background-color:#222222; border: 0;">
                            @if(session('current')['role']=="finance" || session('current')['role']=="admin")

                                <img src="{{asset('uploads/Images/download.png')}}" class="img-circle" alt="Cinque Terre" width="50" height="50"> 
                                <span class="caret" style="color: white;"></span>
                                
                            @else
                                <img src="{{asset('uploads/Images/'.session('current')['photo'])}}" class="img-circle" alt="Cinque Terre" width="50" height="50"> 
                                <span class="caret" style="color: white;"></span>
                            @endif
                        </button>

                        <ul class="dropdown-menu">
                           @if(session('current')['role']=="field-officer")
                                    <li><a href="{{url('profile')}}"><i class="fa fa-user" aria-hidden="true"></i>Profile
                                        </a>
                                    </li>

                                    <li><a href="{{url('borrower/form')}}"><i class="fa fa-registered" aria-hidden="true"></i>Borrower Register</a></li>
                                    <li><a href="{{url('project/form')}}"><i class="fa fa-registered" aria-hidden="true"></i>Project Upload</a></li>

                               @endif
                               @if(session('current')['role']=="finance" || session('current')['role']=="admin")
                                    <li><a href="{{url('finance/field-officers-listing')}}"><i class="fa fa-home" aria-hidden="true"></i>{{session('current')['role']=="finance" ? "Finance" : "Admin"}} Dashboard
                                        </a>
                                    </li>
                                    <li><a href="{{url('officer/form')}}"><i class="fa fa-registered" aria-hidden="true"></i>Field Officer Register</a>
                                    </li>
                                @endif
                                @if(session('current')['role']=="lender")
                                    <li><a href="{{url('profile')}}"><i class="fa fa-user" aria-hidden="true"></i>Profile</a>
                                </li>
                                <li><a href="{{url('lender/profile')}}" style="color:black;"><i class="fa fa-info-circle" aria-hidden="true"></i>Lender Profile</a></li>
                                <li><a style="color:black;"  href="{{url('lender/my-investments/'.session('current')['id'])}}"><i class="fa fa-info-circle" aria-hidden="true"></i>My Investments</a></li>
                                @endif
                                @if(session('current')['role']=="borrower")
                                      <li><a href="{{url('profile')}}" ><i class="fa fa-user" aria-hidden="true"></i>Profile</a>
                                </li>
                                <li><a style="color:black;"  href="{{url('borrowers/my-projects/'.session('current')['id'])}}"><i class="fa fa-info-circle" aria-hidden="true"></i>My Projects</a></li>
                                @endif
                                <li><a href="{{url('logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i>SIGN OUT</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
            
            <ul class="nav navbar-nav navbar-right hidden-sm">

                <li><a href="#invest" >HOW TO INVEST</a></li>
                <li><a href="#project" >PROJECT</a></li>
                <li><a href="#aboutus" >ABOUT US</a></li>
                <li><a href="#question">QUESTION</a></li>
                @if(!session('token'))

                    <li>
                        <button style="margin-top:9px;margin-left:10px;" class="btn btn-warning btn-sm" onclick="window.location.href='{{url('login')}}'">SIGN IN
                        </button>
                    </li>
                    <li>
                        <button style="margin-top:9px;margin-left:10px;" class="btn btn-primary btn-sm" onclick="window.location.href='{{url('lender/form')}}'">SIGN UP
                        </button>
                    </li>
                    
                    
                @endif
            </ul>

        <ul class="nav navbar-nav navbar-right hidden-xs hidden-md hidden-lg" style="position: relative;margin-left:40px;">
            <li style="padding-top: 8px;"><button href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    Menu
                    <span class="caret" style="color: white;"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#invest" >HOW TO INVEST</a></li>
                    <li><a href="#project" >PROJECT</a></li>
                    <li><a href="#aboutus" >ABOUT US</a></li>
                    <li><a href="#question">QUESTION</a></li>
                </ul>
            </li>
            @if(!session('token'))

                <li >
                        <a href="{{url('login')}}">SIGN IN</a>
                </li>
                 <li >
                        <a href="{{url('lender/form')}}">SIGN UP</a>
                </li>
            @endif
               
            
        </ul>
    </div>

    </div>
</nav>
