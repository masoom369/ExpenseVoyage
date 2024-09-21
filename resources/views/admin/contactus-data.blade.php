@extends('layouts.user_dashboard')
@section('content')
   
<input type="text" id="search" placeholder="Search Categories" class="form-control mb-3">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Contact Us Data</h5>
          <div class="table-responsive">
          <table class="table table-sm">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Subject</th>
                <th scope="col">Message</th>
              </tr>
            </thead>

            
            <tbody id="messages" >
                @foreach ($messages as $contact)
              <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->subject }}</td>
                <td>{{ $contact->message }}</td>
                
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
          $(document).ready(function() {
              $('#search').on('keyup', function() {
                  var value = $(this).val().toLowerCase();
                  $('#messages tr').filter(function() {
                      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                  });
              });
          });
      </script>

@endsection
