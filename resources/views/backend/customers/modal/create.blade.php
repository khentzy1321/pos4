<div class="modal fade" id="modalCreateCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="Modal"> Create Customer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <ul class="alert-danger"></ul>
            <form method="post" action="{{route('customers.store')}}" id="form">
                @csrf
                <div class="row">
                    <div class="form-group w-100">
                      <label for="fisrt_name">First Name:</label>
                      <input type="text" class="form-control" name="first_name" id="first_name">
                    </div>
                  </div>
                  <div class="row">
                      <div class="form-group w-100">
                        <label for="Club">Last Name:</label>
                        <input type="text" class="form-control" name="last_name" id="last_name">
                      </div>
                  </div>
                  <div class="row">
                     <div class="form-group w-100">
                        <label for="Country">Email Address:</label>
                        <input type="text" class="form-control" name="email" id="email">
                      </div>
                  </div>
                  <div class="row">
                    <div class="form-group w-100">
                      <label for="Goal Score">Phone Number:</label>
                      <input type="text" class="form-control" name="phone" id="phone">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group w-100">
                      <label for="Goal Score">Address:</label>
                      <input type="text" class="form-control" name="address" id="address">
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button  type="submit" class="btn btn-success">Add Customer</button>
                </div>
          </div>
          </div>
        </div>
          </form>
            {{--  --}}
    </div>
  </div>



