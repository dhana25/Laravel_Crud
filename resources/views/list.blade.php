
 @if(isset(Auth::user()->email))
      
 @include('header')
    
      <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
            <div class="row">
              <div class="col-lg-12 mb-4">
                <div class="card">
                  <div class="card-header">
                   <!--  @if(isset(Auth::user()->email))
                    {{ session('username') }} -->
                    <h6 class="text-uppercase mb-0">Basic Table
                    <a href="/home" class="btn btn-success" style="float:right">Add one</a>
                   <!--  <a href="{{ action('crudcontrl@logout') }}"  class="btn btn-success" style="float:right">Logout</a> -->
                  </h6>
                  </div>
                  <div class="card-body">
                    <form action="home/create" method="GET"> 
                    <table class="table card-text">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Mobile</th>
                          <th>Action</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($data as $prof)
                        
                        <tr>
                          <th scope="row">{{ $prof['id'] }}</th>
                          <td>{{ $prof['name'] }}</td>
                          <td>{{ $prof['email'] }}</td>
                          <td>{{ $prof['mobile'] }}</td>
                          <td><a href="/home/{{ $prof['id'] }}/edit" class="btn btn-info">Edit</a></td>
                          <form action="/home/{{ $prof['id']}}" method="POST">
                             <input type="hidden" name="_method" value="DELETE">
                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <td><button type="submit" class="btn btn-warning">Delete</button></td>
                        </form>
                        </tr>
                        @endforeach
                    
                       <!--  @else
                <script type="text/javascript">window.location="/";</script>
                  @endif
                     -->
                        
                      </tbody>
                    </table>
                  </form>
                  </div>
                </div>
              </div>
              
        @include('footer')
      </div>
    </div>
    <!-- JavaScript files-->
   
      <script type="text/javascript">
      
     @if(Session::has('messages'))
    var type="{{Session::get('alert-type','info')}}"

  
    switch(type){
      case 'info':
             toastr.info("{{ Session::get('messages') }}");
             break;
          case 'success':
              toastr.success("{{ Session::get('messages') }}");
              break;
          case 'warning':
              toastr.warning("{{ Session::get('messages') }}");
              break;
          case 'error':
            toastr.error("{{ Session::get('messages') }}");
            break;
    }
  @endif

    </script>
 
 @else
<script type="text/javascript">window.location="{{ URL::to('/')}}";</script>
@endif


