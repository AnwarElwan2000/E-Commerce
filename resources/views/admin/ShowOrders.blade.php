<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body>


    <!-- partial -->

    @include('admin.sidebar')

    @include('admin.navbar')


    <!-- partial -->

    <div class="container-fluid page-body-wrapper mt-5 mb-5">
        <div class="container" align="center">

            <table class="table table-dark">
                <thead>
                  <tr>
                    <th class="text-light text-center" scope="col">Customer Name</th>
                    <th class="text-light text-center" scope="col">Phone</th>
                    <th class="text-light text-center" scope="col">Adress</th>
                    <th class="text-light text-center" scope="col">Product Title</th>
                    <th class="text-light text-center" scope="col">Price</th>
                    <th class="text-light text-center" scope="col">Quantity</th>
                    <th class="text-light text-center" scope="col">Status</th>
                    <th class="text-light text-center" scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($Orders as $Order)
                        
                  <tr>
                    <th class="text-light text-center" scope="row">{{$Order->name}}</th>
                    <td class="text-light text-center">{{$Order->phone}}</td>
                    <td class="text-light text-center">{{$Order->adress}}</td>
                    <td class="text-light text-center">{{$Order->product_name}}</td>
                    <td class="text-light text-center">{{$Order->Price}}</td>
                    <td class="text-light text-center">{{$Order->Quantity}}</td>
                    <td class="text-light text-center">{{$Order->Status}}</td>
                    <td class="text-light text-center">
                        <a href="{{url('UpdateStatus',$Order->id)}}" class="btn btn-outline-success">Delivered</a>
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
