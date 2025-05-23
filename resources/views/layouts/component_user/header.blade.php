 <div class="container-fluid bg-dark px-0">
     <div class="row gx-0 wow fadeIn" data-wow-delay="0.1s">
         <div class="col-lg-3 bg-primary d-none d-lg-block">
             <a href="
                
                
                index.html"
                 class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                 <h1 class="m-0 display-4 text-white text-uppercase">Animeku</h1>
             </a>
         </div>
         <div class="col-lg-9">
             <div class="row gx-0 d-none d-lg-flex bg-dark">
                 <div class="col-6 px-5 text-start">
                     <div class="h-100 d-inline-flex align-items-center py-2 me-4">

                     </div>
                 </div>

             </div>
             <nav class="navbar navbar-expand-lg navbar-dark p-3 p-lg-0 px-lg-5" style="background: #111111;">
                 <a href="index.html" class="navbar-brand d-block d-lg-none">
                     <h1 class="m-0 display-4 text-primary text-uppercase">Animeku</h1>
                 </a>
                 <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                     data-bs-target="#navbarCollapse">
                     <span class="navbar-toggler-icon"></span>
                 </button>
                 <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                     <div class="navbar-nav mr-auto py-0">
                         <a href="/" class="nav-item nav-link active">Home</a>
                         @if(Auth::user()->is_admin === 1)
                         <a href="admin/jenis" class="nav-item nav-link active">Jenis</a>
                         <a href="admin/anime" class="nav-item nav-link active">Anime</a>
                         @endif
                         @foreach ($jenis as $data)
                             <a href="{{ route('page.sortir', $data->id) }}"
                                 class="nav-item nav-link">{{ $data->jenis }}</a>
                         @endforeach
                         </form>
                     </div>
                 </div>
             </nav>
         </div>
     </div>
 </div>
