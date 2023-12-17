<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style>
        .title {
            color: white;
            padding-top: 25px;
            font-size: 25px;

        }

        #exampleFormControlInput1 {
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

            <h1 class="title">Add Product</h1>

            @if (session()->has('message'))
                <div class="alert alert-success mt-3 w-50">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{ session()->get('message') }}
                </div>
            @endif



            <form action="{{ url('UploadProduct') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="mb-3 w-50 mt-5">
                    <label for="exampleFormControlInput1" class="form-label">Product Title</label>
                    <input type="text" name="title" required class="form-control" id="exampleFormControlInput1"
                        placeholder="Give a Product Title">
                </div>

                <div class="mb-3 w-50 mt-3">
                    <label for="exampleFormControlInput1" class="form-label">Price</label>
                    <input type="number" name="price" required class="form-control" id="exampleFormControlInput1"
                        placeholder="Give a Price">
                </div>

                <div class="mb-3 w-50 mt-3">
                    <label for="exampleFormControlInput1" class="form-label">Description</label>
                    <input type="text" name="description" required class="form-control" id="exampleFormControlInput1"
                        placeholder="Give a Description">
                </div>

                <div class="mb-3 w-50 mt-3">
                    <label for="exampleFormControlInput1" class="form-label">Quantity</label>
                    <input type="text" name="Quantity" required class="form-control" id="exampleFormControlInput1"
                        placeholder="Product Quantity">
                </div>

                <div class="mb-3 w-50 mt-3">
                    <label for="formFile" class="form-label">Upload File</label>
                    <input class="form-control" type="file" name="file" id="formFile">
                </div>

                <div class="mb-3 w-50 mt-3">

                    <input type="submit" name="upload_product" class="form-control btn btn-success">
                </div>


            </form>






        </div>
    </div>

    <!-- partial -->
    @include('admin.script')

</body>

</html>
