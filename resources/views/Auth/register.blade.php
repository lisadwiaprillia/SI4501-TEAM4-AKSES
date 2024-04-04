<!-- Import Template -->
@extends('src.Template.no-header')

<!-- Set Title Halaman -->
@section('title', 'Akses')

<!-- Import Layouting -->
@section('content')

<style>
body {
    height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background-color: #f8f9fa;
    /* Optional background color */
}

.login-container {
    max-width: 800px;
}

.login-btn {
    background-color: #019F90;
    color: #fff;
}

.login-btn {
    background-color: #019F90;
    color: #fff;
    transition: transform 0.3s;
}

.login-btn:hover {
    transform: scale(1.02);
    color: #fff;
    /* Resetting text color on hover */
    background-color: #019F90;
    /* Resetting background color on hover */
    box-shadow: none;
    /* Resetting box-shadow on hover */
}

.footer_section {
    background-color: #f8f9fa;
}

a.back-link {
    color: #019F90;
}
</style>

<body>
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="login-container">
              <h2 class="text-center mb-5">Halaman Registrasi</h2>
              <form action="/register" method="POST">
                  @csrf
                  <div class="form-group">
                      <label for="name">Nama Lengkap</label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Contoh: John Doe" required>
                  </div>
                  <div class="form-group">
                      <label for="email">Alamat Email</label>
                      <input type="email" name="user_email" class="form-control" id="email" placeholder="Contoh: Johndoe@gmail.com" required>
                  </div>
                  <div class="form-group">
                      <label for="notelp">Nomor Telepon</label>
                      <input type="tel" name="user_phone" class="form-control" id="notelp" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Contoh: 082175557666" required>
                  </div>
                  <div class="form-group">
                      <label for="exampleFormControlTextarea1">Alamat</label>
                      <textarea class="form-control" name="user_address" id="exampleFormControlTextarea1" rows="3" placeholder="Contoh: Jl. Telekomunikasi. 1, Terusan Buahbatu - Bojongsoang, Telkom University, Sukapura, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat 40257" required></textarea>
                  </div>
                  <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" name="employeePassword"
                          class="form-control @error('employeePassword') is-invalid @enderror"
                          id="employeePassword" required>
                  </div>
                  <div class="form-group text-right">
                      <a href="" class="back-link">Kembali</a>
                  </div>
                  <button type="submit" name="register" class="btn btn-block login-btn">Register</button>
              </form>
          </div>
      </div>
    </div>
  </div>
@endsection
