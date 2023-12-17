<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style>
      #table{
        color: white;
      }

    </style>
</head>

<body>


    <!-- partial -->

    @include('admin.sidebar')

    @include('admin.navbar')


    <!-- partial -->

    <div class="container-fluid page-body-wrapper">
        <div class="container" align="center">
             <h1 class="mt-5">Show Products</h1>

             @if (session()->has('message'))
             <div class="alert alert-success mt-3 w-50">
                 <button type="button" class="close" data-dismiss="alert">x</button>
                 {{ session()->get('message') }}
             </div>
         @endif
                 
   
            <table class="table table-dark mt-5 mb-5">
                <thead>
                  <tr>
                    <th id="table" scope="col">Title</th>
                    <th id="table" scope="col">Description</th>
                    <th id="table" scope="col">Quantity</th>
                    <th id="table" scope="col">Price</th>
                    <th id="table" scope="col">Image</th>
                    <th id="table" scope="col">Update</th>
                    <th id="table" scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($Products as $Product)
                  <tr>
                    <th id="table" scope="row">{{$Product->title}}</th>
                    <td id="table">{{$Product->Description}}</td>
                    <td id="table">{{$Product->Quantity}}</td>
                    <td id="table">{{$Product->Price}}</td>
                    <td id="table"><img style="width:80px;height:80px" src="product_img/{{$Product->Image}}" alt="">
                    </td>
                    <td id="table">
                        <a href="{{url('UpdateView',$Product->id)}}" class="btn btn-outline-primary">Update</a>
                    </td>
                    <td id="table">
                        <a href="{{url('ProductDelete',$Product->id)}}" class="btn btn-outline-danger"
                          onclick="return confirm('Are You Sure')">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            

            </div>
            </div>    

    <!-- partial -->
      @include('admin.script')    

</body>

</html>
