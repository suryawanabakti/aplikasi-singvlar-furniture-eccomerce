
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('home') }}">E - Square |</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="javascript:void(0)">About</a>
          </li>
          
        </ul>
        <span class="navbar-text">
          <ul class="navbar-nav auto me-5">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Hi , Surya
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Transaksi</a></li>
                <li><a class="dropdown-item" href="#">Logout</a></li>
              </ul>
            </li>
  
            <li class="nav-item">
              <a class="nav-link active position-relative" aria-current="page" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Keranjang
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">
                  3
                  <span class="visually-hidden">unread messages</span>
                </span>
              </a>
            </li>
          </ul>
        </span>
      </div>
    </div>
  </nav>
  @section('offcanvas')
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasRightLabel">Keranjang Saya</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

      <div class="row">
        <div class="col-md-6">
          <img src="{{ asset('images/product_img_1.jpg') }}" class="img img-fluid ">
        </div>
        <div class="col-md-6">
          <b>Apple Watch</b> <a href="#" class="badge bg-danger text-decoration-none">hapus</a>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing.</p>
          <span>IDR 7.000.000 x 3pcs</span>
          <span>IDR 21.000.000</span>
        </div>
      </div>
      <hr>
      
      <div class="row">
        <div class="col-md-6">
          <img src="{{ asset('images/product_img_1.jpg') }}" class="img img-fluid ">
        </div>
        <div class="col-md-6">
          <b>Apple Watch</b> <a href="#" class="badge bg-danger text-decoration-none">hapus</a>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing.</p>
          <span>IDR 7.000.000 x 3pcs</span>
          <span>IDR 21.000.000</span>
        </div>
      </div>
      <hr>
      
      <div class="row">
        <div class="col-md-6">
          <img src="{{ asset('images/product_img_1.jpg') }}" class="img img-fluid ">
        </div>
        <div class="col-md-6">
          <b>Apple Watch</b> <a href="#" class="badge bg-danger text-decoration-none">hapus</a>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing.</p>
          <span>IDR 7.000.000 x 3pcs</span>
          <span>IDR 21.000.000</span>
        </div>
      </div>
      <hr>

      <div class="row">
        <div class="col-8">
          <span>Total: </span>
        </div>
        <div class="col-4">
          <span class="fw-bolder">IDR 61</span>
        </div>
        
      </div>
      <hr>
      <div class="row text-center">
        <div class="col">
          <a href="#" class="text-decoration-none">Bayar !</a>
        </div>
      </div>

    </div>
  </div>
  @endsection

  