 @if(isset(Auth::user()->email))

@include('header')
      <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
            <div class="row">
              <!-- Basic Form-->
              <div class="col-lg-12 mb-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="h6 text-uppercase mb-0">Register Form</h3>
                    <!-- <a href="{{ action('crudcontrl@logout') }}"  class="btn btn-success" style="float:right">Logout</a> -->
                  </div>
                  <div class="card-body">
                   
                    <form action="home" method="post">
                      {{ csrf_field() }}
                      
                      <div class="form-group">
                        <label class="form-control-label text-uppercase">Name</label>
                        <input type="text" placeholder="Name" name="name" class="form-control">
                      </div>
                      <div class="form-group">
                        <label class="form-control-label text-uppercase">Email</label>
                        <input type="email" placeholder="Email Address" name="email" class="form-control">
                      </div>
                      <div class="form-group">       
                        <label class="form-control-label">Mobile</label>
                        <input type="tel" placeholder="Mobile" name="mobile" class="form-control" maxlength="10">
                      </div>
                      <div class="form-group">       
                        <button type="submit" class="btn btn-primary">submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

            </div>

          </section>

           @include('footer')
        </div>
      </div>

              <!-- Horizontal Form-->
            
            
           
    <!-- JavaScript files-->
   

    <script type="text/javascript">
      
     @if(Session::has('message'))
    var type="{{Session::get('alert-type','info')}}"

  
    switch(type){
      case 'info':
             toastr.info("{{ Session::get('message') }}");
             break;
          case 'success':
              toastr.success("{{ Session::get('message') }}");
              break;
          case 'warning':
              toastr.warning("{{ Session::get('message') }}");
              break;
          case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif

    </script>

@else
<script type="text/javascript">window.location="{{ URL::to('/')}}"</script>
@endif
