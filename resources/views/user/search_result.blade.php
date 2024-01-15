    <h3>
        @if (isset($category_title))
            {{ $category_title }}
        @else
            Все
        @endif
    </h3>
    @foreach ($Products as $product)
        <div id="product"
            class="col-12 col-md-4 col-lg-4 justify-content-center align-items-center py-2 m-0 p-2 h-auto ">
            <div class="row border-2 border rounded-4 align-items-center align-self-center m-0 p-0 h-100">
                <img src="storage/image/{{ $product->main_image }}"
                    class="m-0 p-0 w-100 img-fluid rounded-4 align-self-center" alt="">
                <div class="text-center fs-5 p-0 m-0">
                    <p class="m-0 py-0">{{ $product->title }}</p>
                </div>
                <div class="text-center fw-light fs-6 p-0 m-0">
                    <p class="m-0 py-2">{{ $product->product_category_id }}</p>
                </div>
                <div class="row justify-content-between align-items-center m-0 py-1">
                    <div class="col-5 col-sm-6 col-md-5 col-lg-3 justify-content-center align-items-end p-0 m-0">
                        <p class="text-center text-nowrap p-0 m-0 fs-5">$ 5199</p>
                    </div>
                    <div class="col-5 col-sm-5 col-md-6 col-lg-6 align-items-center m-0 p-0">
                        <a class="btn btn-outline-danger text-center p-0 m-0 w-100 h-25 py-1 rounded-4 fs-5"
                            href="{{ route('product.show',$product->slug) }}">
                            Заказать
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{ $Products->links() }}
