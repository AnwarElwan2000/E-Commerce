<div class="latest-products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Latest Products</h2>
                    <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
                    <form action="{{ url('search') }}" method="GET" class="form-inline mt-3 mb-3"
                        style="float: right; padding:10px;">
                        @csrf
                        @method('GET')
                        <input type="search" name="search" placeholder="Search" class="form-control">
                        <input type="submit" value="Search" class="btn btn-success">
                    </form>
                </div>
            </div>

            @foreach ($Products as $Product)
                <div class="col-md-4">
                    <div class="product-item">
                        <a href="#"><img height="300" width="150" src="product_img/{{ $Product->Image }}"
                                alt=""></a>
                        <div class="down-content">
                            <a href="#">
                                <h4>{{ $Product->title }}</h4>
                            </a>
                            <h6>${{ $Product->Price }}</h6>
                            <p>{{ $Product->Description }}</p>

                            <form action="{{ url('AddCart', $Product->id) }}" method="POST">
                                @csrf
                                @method('POST')
                                <input type="number" name="quantity" value="1" min="1"
                                    class="form-control mb-3" style="width: 100px;">
                                <input type="submit" class="btn btn-outline-primary" value="Add Cart">
                            </form>

                        </div>
                    </div>
                </div>
            @endforeach

            @if (method_exists($Products, 'links'))
                <div class="d-flex justify-content-center">
                    {!! $Products->links() !!}
                </div>
            @endif


        </div>
    </div>
</div>
