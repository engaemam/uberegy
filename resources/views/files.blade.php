@extends('layouts.app')
<style>
#myInput {
  background-image: url('/css/searchicon.png'); /* Add a search icon to input */
  background-position: 10px 12px; /* Position the search icon */
  background-repeat: no-repeat; /* Do not repeat the icon image */
  width: 100%; /* Full-width */
  font-size: 16px; /* Increase font-size */
  padding: 12px 20px 12px 40px; /* Add some padding */
  border: 1px solid #ddd; /* Add a grey border */
  margin-bottom: 12px; /* Add some space below the input */
}

#myTable {
  border-collapse: collapse; /* Collapse borders */
  width: 100%; /* Full-width */
  border: 1px solid #ddd; /* Add a grey border */
  font-size: 15px; /* Increase font-size */
}

#myTable th, #myTable td {
  text-align: left; /* Left-align text */
  padding: 7px; /* Add padding */
}

#myTable tr {
  /* Add a bottom border to all table rows */
  border-bottom: 1px solid #ddd; 
}

#myTable tr.header, #myTable tr:hover {
  /* Add a grey background color to the table header and on hover */
  background-color: #f1f1f1;
}
</style>
@section('content')
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search ..">
<button class="btn btn-primary hidden-print" onclick="printData()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>

<table id="myTable" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
    <th class="th-lg">ID
      </th>
      <th class="th-lg">Email
      </th>
      <th class="th-lg">Profile
      </th>
      <th class="th-lg">Car Lisence F
      </th>
      <th class="th-lg">Car Lisence B
      </th>
      <th class="th-lg">Criminal Report
      </th>
      <th class="th-lg">Driving Lisence
      </th>
      <th class="th-lg">ID
      </th>

      <th class="th-lg">Date/Time
      </th>
      <th class="th-lg">Action
      </th>
   
    </tr>
  </thead>
  <tbody>
  @foreach($files as $file)
    <tr>
    <td>{{$file->id}}</td>
      <td><a href="/show/email={{$file->email}}"> {{$file->email}} </a> </td>
      <td><a href="/uploads/{{$file->profile}}" download><img src="/uploads/{{$file->profile}}" alt="Image" style="width:100px;height:100px;"/>  </a></td>
      <td><a href="/uploads/{{$file->flisence}}" download><img src="/uploads/{{$file->flisence}}" alt="Image" style="width:100px;height:100px;"/>  </a></td>
      <td><a href="/uploads/{{$file->blisence}}" download><img src="/uploads/{{$file->blisence}}" alt="Image" style="width:100px;height:100px;"/>  </a></td>
      <td><a href="/uploads/{{$file->fesh}}" download><img src="/uploads/{{$file->fesh}}" alt="Image" style="width:100px;height:100px;"/>  </a></td>
      <td><a href="/uploads/{{$file->dlisence}}" download><img src="/uploads/{{$file->dlisence}}" alt="Image" style="width:100px;height:100px;"/>  </a></td>
      <td><a href="/uploads/{{$file->Uid}}" download><img src="/uploads/{{$file->Uid}}" alt="Image" style="width:100px;height:100px;"/>  </a></td>
      <td>{{$file->created_at}}</td>
     <td> <a href="/delete/id={{$file->id}}" class="btn btn-danger">Delete</a></td>
    </tr>
   @endforeach
  </tbody>

  
</table>

<script>
   function printData()
{
   var divToPrint=document.getElementById("myTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 

  }
}
</script>
@endsection
