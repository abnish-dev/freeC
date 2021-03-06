@extends('layouts.master')

@section('content')

   
  <div class="container">
    <div class="row">
      <div class="col-md-12"> Users List</div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header"> All users Listing</div>
          <div class="card-body">
            <table class="table table-bordered data-table" >
              <thead class="thead thead-dark">
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <!-- <th>Total correct answers</th>
                  <th>Total wrong answers</th> -->
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>  
    </div>
  </div>
    <script>
        $.noConflict();
        jQuery(document).ready(function($) {
          $('.data-table').DataTable({
             processing: true,
             serverSide: true,
             ajax: "{{ route('users.index') }}",
             columns: [
                      { data: 'id', name: 'id' },
                      { data: 'name', name: 'name' },
                      { data: 'email', name: 'email' }
                      // { data: 'correct_answer', name: 'correct_answer'},
                      // { data: 'wrong_answer', name: 'wrong_answer'}
                   ]
            });
        });
    </script>
@endsection