<title>Employees - HR Plus</title>
@include('header')
<style>
</style>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6 style="color:black">Employees
                <button type="button" class="btn btn-primary mb-0 " style="float:right" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa fa-plus"></i>
                </button>
              </h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
              <div style="float:right; margin-right:25px; margin-top:10px"><input id="myInput" type="text" placeholder="Search.."></div>                
                <table class="table table-hover">
                  <thead style="color:black">
                    <tr class="text-center">
                      <th scope="col">ID</th>
                      <th scope="col">Name</th>
                      <th scope="col">Designation</th>
                      <th scope="col">Status</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody id="myTable">
                    @foreach($employees as $value)
                    <tr class="text-center">
                      <th scope="row">{{$value->id_employee}}</th>
                      <td>{{$value->name_employee}}</td>
                      <td>{{$value->designation}}</td>
                      <td>@if ($value->status_employee == 'permenant')
                                  <span class="badge badge-sm bg-gradient-success">Permenant</span>
                              @elseif($value->status_employee == 'leave')
                                    <span class="badge badge-sm bg-gradient-warning">Leave</span>                                
                              @elseif($value->status_employee == 'probation')
                                    <span class="badge badge-sm bg-gradient-primary">Probation</span>                                
                              @else
                                    <span class="badge badge-sm bg-gradient-danger">Suspend</span>                                
                          @endif</td>
                      <td>
                        <button class="btn btn-info mb-0 "><i class="fa fa-edit"></i></button>  
                        <button class="btn btn-danger mb-0 "><i class="fa fa-trash"></i></button>  
                        <button class="btn btn-success mb-0 "><i class="fa fa-external-link"></i></button>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
 
        <!-- Add Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <!-- <button class="btn btn-sm btn-success mb-0" id="datasaved">Employee Added</button> -->
              <div class="modal-body">
              <div class="btn btn-success" style="" id="datasaved">Employee Added</div>
                <form action="/add/employee/" method="post" id="insertform">
                  @csrf
                  <label for="name_employee">Name</label>
                  <input type="text" id="name_employee" name="name_employee" class="form-control" required>
                  <label for="designation">Designation</label>
                  <input type="text" id="designation" name="designation" class="form-control" required>
                  <label for="status_employee">Status</label>
                  <select id="status_employee" style="color:black" name="status_employee" class="form-control" required>
                    <option value="">Select an Employee Status</option>
                    <option value="permenant">Permenant</option>
                    <option value="probation">Probation</option>
                    <option value="leave">On Leave</option>
                    <option value="suspend">Suspend</option>
                  </select>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="savedbtn" class="btn btn-primary">Save</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
 
  @include('footer')
  
  <script>
  $(document).ready(function () { 
        $("#datasaved").hide();
    });
    $('#insertform').submit(function()
    {
        $("#datasaved").show(); 
        // $('#savedbtn').hide();       
    }
    )
    

  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>