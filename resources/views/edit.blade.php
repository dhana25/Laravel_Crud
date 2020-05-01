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
                    <h3 class="h6 text-uppercase mb-0">Edit Form</h3>
                  </div>
                  <div class="card-body">
                    <form action="/home/{{ $list['id']}}" method="POST">
                      <input type="hidden" name="id" value="{{ $list['id']}}">
                     <input type="hidden" name="_method" value="PUT"> 
                      <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                      <div class="form-group">
                        <label class="form-control-label text-uppercase">Name</label>
                        <input type="text" placeholder="Name" name="name" class="form-control" value="{{ $list['name']}}">
                      </div>
                      <div class="form-group">
                        <label class="form-control-label text-uppercase">Email</label>
                        <input type="email" placeholder="Email Address" name="email" class="form-control" value="{{ $list['email']}}">
                      </div>
                      <div class="form-group">       
                        <label class="form-control-label">Mobile</label>
                        <input type="tel" placeholder="Mobile" name="mobile" class="form-control" value="{{ $list['mobile']}}" maxlength="10">
                      </div>
                      <div class="form-group">       
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Update</button>
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
  </body>
</html>

@else
<script type="text/javascript">window.location="/";</script>
@endif
