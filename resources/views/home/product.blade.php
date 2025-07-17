<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
            <br><br>
            <div>
                <form method="GET" action="{{ route('product_search') }}">
                    <input style="width: 500px;" type="text" name="search" placeholder="Search for something">
                    <input type="submit" value="Search">
                </form>
            </div>

        </div>

        <div class="row">

            @foreach ($products as $prod)

                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{ route('product_details', $prod->id) }}" class="option1">
                                    Product Details
                                </a>
                                <form action="{{ route('add_cart', $prod->id) }}" method="Post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="number" name="quantity" value="1" min="1" style="width: 100px;">

                                        </div>
                                        <div class="col-md-4">
                                            <input type="submit" value="Add to cart">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="storage/product/{{ $prod->image }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{ $prod->product_name }}
                            </h5>
                            @if($prod->discount_price != null)
                                <h6 style="color:green">
                                    ${{ $prod->discount_price}}
                                </h6>
                                <h6 style="text-decoration:line-through; color: red;">
                                    ${{ $prod->price }}
                                </h6>
                            @else
                                <h6>
                                    ${{ $prod->price }}
                                </h6>
                            @endif
                        </div>
                    </div>
                </div>

            @endforeach
            <span style="padding: top 20px;">
                {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}

            </span>

        </div>

    </div>
</section>