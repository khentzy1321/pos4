<div class="modal fade" id="createProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Product</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                     <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                                    placeholder="Name" value="{{ old('name') }}">
                           @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                           @enderror
                    </div>
                     <div class="form-group">
                        <label for="description">Description</label>
                        <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description"
                                    placeholder="Name" >{{ old('description') }} </textarea>
                           @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                           @enderror
                            </div>
                    <div class="form-group">
                        <label for="price">Unit Price</label>
                        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price"
                                    placeholder="Unit Price" value="{{ old('price') }}">
                           @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                           @enderror
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror" id="quantity"
                                    placeholder="Quantity" value="{{ old('quantity') }}">
                           @error('quantity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                           @enderror
                    </div>
                    <div class="form-group">
                        <label for="stocks">Stocks</label>
                        <input type="text" name="stocks" class="form-control @error('stocks') is-invalid @enderror" id="stocks"
                                    placeholder="Stocks" value="{{ old('stocks') }}">
                           @error('stocks')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                           @enderror
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-block" type="submit">Add Product</button>
                    </div>

            </form>
        </div>
      </div>
    </div>
  </div>
