<x-layout title="Add Product">
    <div class="container">
        <form method="post" action="{{ url('/add/store') }}" enctype="multipart/form-data">
            @csrf
        <div class="mb-3">
          <label for="Name" class="form-label">Product Name</label>
          <input type="text" class="form-control" name="name" id="Name" value="{{ old('name') }}">
          @error('name')
          <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
          <label for="Price" class="form-label">Product Price</label>
          <input type="number" class="form-control" name="price" id="Price" value="{{ old( 'price') }}">
          @error('price')
          <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>


        <div class="mb-3">
          <label for="description" class="form-label">description</label>
          <textarea name="description" id="description" class="form-control" cols="30" rows="2">{{ old( 'description') }}</textarea>
          @error('description')
          <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
          <label for="photo" class="form-label">choose a photo</label>

          <input type="file" class="form-control" name="photo" id="photo" >
          @error('photo')
          <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
      </form></div>
</x-layout>
