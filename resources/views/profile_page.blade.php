@extends('master')
@section('content')
<header>
    <!-- START NAVBAR -->
    <nav
      class="navbar navbar--user navbar-expand-md navbar-light"
      id="user-nav"
    >
      <div class="container-fluid justify-content-end">
        <a class="navbar-brand" href="index.html">
          <img class="img-fluid" src="assets/images/logo.svg" alt="li data" />
        </a>

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
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item pl-4">
              <a class="nav-link" aria-current="page" href="home.html">
                <i class="bi bi-house-door"></i>
                Dashboard
              </a>
            </li>
            <li class="nav-item d-none d-md-block" id="search">
              <a class="nav-link nav-link__search active" href="people.html">
                <i class="bi bi-search"></i>
                Data Search
              </a>

              <!-- Show element on hover  -->
              <div class="search__details hide">
                <a href="people.html">
                  <div class="search__details--left d-flex">
                    <div class="search__details--icon-box">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="search__details--text">
                      <div
                        class="fw-bold heading--sub d-flex justify-content-between"
                      >
                        People
                        <i class="bi bi-arrow-right animate-arrow"></i>
                      </div>
                      <p>
                        Search for hyper-targeted lists of people using
                        filters.
                      </p>
                    </div>
                  </div>
                </a>

                <a href="company.html">
                  <div class="search__details--right d-flex">
                    <div class="search__details--icon-box">
                      <i class="bi bi-building"></i>
                    </div>
                    <div class="search__details--text">
                      <div
                        class="fw-bold heading--sub d-flex justify-content-between"
                      >
                        Companies
                        <i class="bi bi-arrow-right animate-arrow"></i>
                      </div>
                      <p>
                        Search for targeted lists of companies using filters.
                      </p>
                    </div>
                  </div>
                </a>
              </div>
            </li>

            <li class="nav-item d-md-none d-lg-none">
              <a class="nav-link" href="people.html">
                <i class="bi bi-send px-2"></i>
                People
              </a>
            </li>
            <li class="nav-item d-md-none d-lg-none">
              <a class="nav-link" href="company.html">
                <i class="bi bi-building px-2"></i>
                Companies
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="settings/upgrade.html">
                <i class="bi bi-box-seam px-2"></i>
                Products
              </a>
            </li>
          </ul>
        </div>

        <!-- START SHOW ELEMENT ON CLICKING USER -->
        <div class="user-div hide u-box-shadow-1">
          <h4 class="px-4 pt-5">{{Auth::user()->name}}</h4>
          <div class="user--label mx-4">
            <span>Admin</span>
          </div>

          <div class="user--menu">
            <a class="user--menu-item" href="{{route('profile.update',Auth::user()->id)}}">
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
          <a class="btn btn-blue mx-4" href="settings/upgrade.html"
          >Total Credits:{{Auth::user()->credits}}
        </a>
        <a class="btn btn-blue mx-4" href="settings/upgrade.html"
          >Get unlimited leads
        </a>
        
        <button type="button" class="btn">
          <i class="bi bi-telephone phone-btn"></i>
        </button>

        <!-- TODO Link to Blog site -->
        <a class="btn"><i class="bi bi-question-circle" href="#"></i></a>

        <button type="button" class="btn notification-btn">
          <i class="bi bi-bell"></i>
        </button>
        <button type="button" class="user user-btn circle-element mx-3">
          
          <p class="user-name">{{mb_substr(Auth::user()->name,0,1)}}{{substr(Auth::user()->name, -1)}}</p>
          
        </button>
      </div>
      <!-- END RIGHT NAV ITEMS -->
    </nav>
    <!-- END NAVBAR -->

    <!-- START SECOND NAVBAR -->
    <div class="navbar02 u-border-bottom">
      <a href="people.html">
        <div class="navbar02--left">
          <h2 class="nav-item nav-item--colored fs-4">
            <i class="bi bi-people pe-2"></i>
            People
          </h2>
        </div>
      </a>

      <a href="company.html">
        <div class="navbar02--right">
          <h2 class="nav-item fs-4">
            <i class="bi bi-building pe-2"></i>
            Companies
          </h2>
        </div>
      </a>
    </div>
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
      
    <section class="section-user-dashboard">
     
      <!-- START SIDEBAR -->
      <section class="section-user-dashboard--sidebar">
        <div class="heading--sub py-3 ps-4 u-border-bottom">Filters</div>

        <!-- INPUT NAME -->
        <div class="input-name u-border-bottom py-4 px-4">
          <div class="input-title pb-2">
            <i class="bi bi-person-badge pe-2"></i>
            Name
          </div>
          <form action="{{route('search.name')}}" class="" method="GET">
            
             
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
          </form>
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
      </section>
      <!-- END SIDEBAR -->

      <!-- START MAIN DASHBOARD -->
      <section class="section-user-dashboard--main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h3>Profile Update</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('profile_confirm.update',$user->id)}}" method="POST">
                                @csrf
                               
                            <div class="mb-3">
                                <label for="" class="form-label">designation</label>
                                <input type="text" name="designation" value="{{$user->designation}}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Company</label>
                                <input type="text" name="company" value="{{$user->company}}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="textAreaExample">Contact_location</label>
                                <textarea class="form-control" name="contact_location" id="textAreaExample1" rows="4">{{$user->contact_location}}</textarea>
                                
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Employees</label>
                                <input type="number" value="{{$user->employees}}" name="employees" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Industry</label>
                                <input type="text" value="{{$user->industry}}" name="industry" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
      </section>
 
</div> 
<div class="hide-text"  id="">
  @if(session('success'))
<script>
    Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: '{{session('success')}}',
  showConfirmButton: false,
  timer: 1500
})
</script>
@endif
  
@endsection
