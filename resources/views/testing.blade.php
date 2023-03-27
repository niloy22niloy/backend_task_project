@extends('master')
@section('content')
{{-- @foreach ($name as $nam)
{{$nam->name}}
    
@endforeach
{{$name->links()}} --}}

<header>
    <!-- START NAVBAR -->
    <nav
      class="navbar navbar--user navbar-expand-md navbar-light"
      id="user-nav"
    >
      <div class="container-fluid justify-content-end">
        

        <button
          class="navbar-toggler me-auto"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="bi bi-list"></i>
        </button>
        <div
          class="collapse navbar-collapse justify-content-between"
          id="navbarSupportedContent"
        >
          
        </div>

        <!-- START SHOW ELEMENT ON CLICKING USER -->
        <div class="user-div hide u-box-shadow-1">
          <h4 class="px-4 pt-5">{{Auth::user()->name}}</h4>
          <div class="user--label mx-4">
            <span>Admin</span>
          </div>

          <div class="user--menu">
            <a class="user--menu-item" href="settings/account.html">
              <i class="bi bi-gear"></i>
              <span>Settings</span>
            </a>
            <a class="user--menu-item" href="settings/upgrade.html">
              <i class="bi bi-trophy"></i>
              <span>Upgrade Plan</span>
            </a>

            <a class="user--menu-item mb-3" href="{{route('logout')}}">
              <i class="bi bi-power"></i>
              <span>Logout</span>
            </a>
          </div>
        </div>
        <!-- END SHOW ELEMENT ON CLICKING USER -->
      </div>

      <!-- START RIGHT NAV ITEMS -->
      <div class="d-flex nav-right__box">
          
       
        
       

        <!-- TODO Link to Blog site -->
       

        
        <button type="button" class="user user-btn circle-element mx-3">
          
          <p class="user-name">{{mb_substr(Auth::user()->name,0,1)}}{{substr(Auth::user()->name, -1)}}</p>
          
        </button>
      </div>
      <!-- END RIGHT NAV ITEMS -->
    </nav>
    <!-- END NAVBAR -->

    <!-- START SECOND NAVBAR -->
    {{-- <div class="navbar02 u-border-bottom">
      <a href="people.html">
        <div class="navbar02--left">
          <h2 class="nav-item nav-item--colored fs-4">
         
          
          </h2>
        </div>
      </a>

      <a href="company.html">
        <div class="navbar02--right">
          <h2 class="nav-item fs-4">
           
           
          </h2>
        </div>
      </a>
    </div> --}}
    <!-- END SECOND NAVBAR -->

    <!-- FIXME hide when clicked somewhere else -->
    <!-- START SHOW WHEN CLICKED ON PHONE -->
    <div class="u-box-shadow-1 phone-call__div hide">
      <div class="phone-call--icon">
        <i class="bi bi-telephone-outbound text-primary"></i>
      </div>
      <div class="phone-call--text">
        Instantly click-to-call prospects from anywhere.
      </div>
      <div class="phone-call--button btn-blue">Upgrade to Professional</div>
      <a class="phone-call--link"> Learn more </a>
    </div>
    <!-- END SHOW WHEN CLICKED ON PHONE -->

    <!-- START SHOW WHEN CLICKED ON NOTIFICATION -->
    <div
      class="u-box-shadow-1 notification__sidebar hide animate__animated animate__fadeInRightBig"
    >
      <div class="notification--header">
        <div class="notification--header-title">
          <h5>NOTIFICATIONS</h5>
        </div>
        <div class="notification--header-icons">
          <div class="btn"><i class="bi bi-arrow-clockwise"></i></div>
          <div class="btn close-btn">
            <i class="bi bi-x-lg"></i>
          </div>
        </div>
      </div>
      <div class="notification--body"></div>
    </div>
    <!-- END SHOW WHEN CLICKED ON NOTIFICATION -->
  </header>

  <main id="peopleData">
    <div class="container mt-5">
        <div class="row">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Record Table For {{$search_text}}</h3>
                </div>
                <div class="card-body">
                    <div
                    class="section-table table-scrollable mx-5 mt-4 mb-2"
                    style="width: 75vw; overflow: auto; max-height: 50vh;"
                  >
                    <table
                      class="table table-hover table-bordered table-responsive mt-5"
                      id="peopleTable"
                    >
                      <thead>
                        <tr>
                          
                          <th>Name</th>
                          <th>Email</th>
                          <th>Company</th>
                          <th>Designation</th>
                         
                          
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($name as $nam)
                          <tr>
                              <td>{{$nam->name}}</td>
                              <td>{{$nam->email}}</td>
                              <td>{{$nam->company}}</td>
                              <td>{{$nam->designation}}</td>
                              
                          </tr>
                          @endforeach
                      </tbody>
                      
          
                    </table>
                    </div>
                    
                </div>
                {{-- <p>This page has been refreshed {{ $page_refresh_count }} times.</p> --}}
                
                @if($page_refresh_count == 1)
                <?php
                 $user = App\Models\User::find(Auth::user()->id);
                 $user->credits - 1;
                 $user = App\Models\User::where('id',Auth::user()->id)->update([
                  'credits'=>$user->credits - 1
                 ])
                ?>
                @endif
            </div>
        </div>
    </div>
  
      <!-- START SIDEBAR -->
      {{-- <section class="section-user-dashboard--sidebar">
        <div class="heading--sub py-3 ps-4 u-border-bottom">Filters</div>

        <!-- INPUT NAME -->
        <div class="input-name u-border-bottom py-4 px-4">
          <div class="input-title pb-2">
            <i class="bi bi-person-badge pe-2"></i>
            Name
          </div>
          
              @csrf
          <input
            type="text"
            name="name"
            id="searchPeople"
            class="w-100"
            placeholder="Enter name..."
          />
          
            <button type="submit" class="btn btn-blue rounded-1 w-100">
              Apply
            </button>
          
        </div>

        <!-- INPUT JOB TITLE -->
        <div class="input-job u-border-bottom py-4 px-4">
          <div class="input-title pb-2">
            <i class="bi bi-briefcase pe-2"></i>
            Job Title
          </div>
          <input
            type="text"
            name="job"
            id="job"
            placeholder="Search for a job title"
          />
          <form action="" class="d-flex justify-content-end mt-2">
            <button type="submit" class="btn btn-blue rounded-1 w-100">
              Apply
            </button>
          </form>
        </div>

        <!-- INPUT COMPANY NAME -->
        <div class="input-company u-border-bottom py-4 px-4">
          <div class="input-title pb-2">
            <i class="bi bi-building pe-2"></i>
            Company
          </div>
          <input
            type="text"
            name="company"
            id="company"
            placeholder="Enter companies..."
          />
          <form action="" class="d-flex justify-content-end mt-2">
            <button type="submit" class="btn btn-blue rounded-1 w-100">
              Apply
            </button>
          </form>
        </div>
      </section> --}}
      <!-- END SIDEBAR -->

      <!-- START MAIN DASHBOARD -->

        
          

        <!-- START TABLE -->
        
         
       
                  
                  

 
                    
@endsection
