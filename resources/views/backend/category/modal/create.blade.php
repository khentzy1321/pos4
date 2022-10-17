<div class="modal fade" id="createCategoryModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Users</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('categories.store') }}" method="post">

                {!! csrf_field() !!}

                   <div class="form-group">
                      <label for="">Brand Name</label>
                      <input type="text" name="name" id="" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                      @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                   <div class="form-group">
                      <label for="">Description</label>
                      <textarea type="text" name="description" id="" class="form-control  @error('description') is-invalid @enderror " value="{{ old('description') }}" required>
                         </textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                   <div class="form-group">
                      <label for="">Warranty</label>
                      <input type="text" name="warranty" id="" class="form-control  @error('warranty') is-invalid @enderror " value="{{ old('warranty') }}" required>
                      @error('warranty')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-block add_category"> Add Category</button>
                  </div>
            </form>

        </div>
      </div>
    </div>
  </div>

  @section('js')
  @endsection
