<x-layout title="Products">

    <h1 class=" fs-3 text-success text-left m-5">Our products in the market</h1>
        <div class=" container d-flex justify-center align-content-center flex-wrap">
        @foreach ($products as $product)

            <div class="card m-3" style="width: 18rem;">
                <img src="{{asset($product->photo ? 'upload/' . $product->photo : 'assets/img/m.png')}}" class="card-img-top"
                    alt="...">
                <div class="card-body">
                    <h4 class="card-title text-center text-success">{{$product->brand->brand_name}}</h4>
                    <h5 class="card-title text-center">{{$product->name}}</h5>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('products.pro', ['product' => $product->id]) }}" class="btn btn-primary mt-3">See More</a>
                    </div>
                </div>
            </div>

        @endforeach


            <div class="mt-5 d-flex justify-content-center  align-items-center mx-auto">
        {{$products->links()}}
    </div>
</div>

</x-layout>
