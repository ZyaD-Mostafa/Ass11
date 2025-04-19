<x-layout title="SHOW">


    <div class=" container d-flex justify-center align-content-center flex-wrap">


        <div class="card m-3" style="width: 18rem;">
            <img src="{{asset($product->photo ? 'upload/'.$product->photo : 'assets/img/m.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title text-center">{{$product->name}}</h5>
                <p class="card-text">{{$product->description}}</p>
                <p class="card-text"> Price : {{$product->price}}</p>

                <div class="d-flex justify-content-between">
                    <a href="{{route('edit', ['product' => $product->id])}}" class="btn btn-primary mt-3">Edit</a>

                    <form action="{{route('delete', ['product' => $product->id]) }}" onsubmit="return confirm('Are you sure you want to delete this product?');"  method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mt-3">Delete</button>
                    </form>
                </div>
            </div>
        </div>


    </div>

</x-layout>
