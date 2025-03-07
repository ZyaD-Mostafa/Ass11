<x-layout title="Edit">

    <div class="container">
    <form method="post" action="{{route('edit.stroe' , ['id' => $product->id]) }}" enctype="multipart/form-data">
        @csrf
    <div class="mb-3">
      <label for="Name" class="form-label">Product Name</label>
      <input type="text" class="form-control" name="name" id="Name" value="{{$product->name}}" >
    </div>

    <div class="mb-3">
      <label for="Price" class="form-label">Product Price</label>
      <input type="number" class="form-control" name="price" id="Price" value="{{$product->price}}">
    </div>


    <div class="mb-3">
      <label for="description" class="form-label">description</label>
      <textarea name="description" id="description" class="form-control" cols="30" rows="2" >{{$product->description}}</textarea>
    </div>
    <div class="mb-3">
      <label for="photo" class="form-label">choose a photo</label>
      <input type="file" class="form-control" name="photo" id="photo" >
    </div>
    @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif



    <button type="submit" class="btn btn-primary">Submit</button>
  </form></div>


</x-layout>
