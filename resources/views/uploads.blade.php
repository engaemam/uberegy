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
<button  class="btn btn-success"  onclick="exportTableToExcel('myTable', 'members-data')">Export Table Data To Excel File</button>
<table id="myTable" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
    <th class="th-lg">ID
      </th>
      <th class="th-lg">First Name
      </th>
      <th class="th-lg">Last Name
      </th>
      <th class="th-lg">Email
      </th>
      <th class="th-lg">Number
      </th>
      <th class="th-lg">Governerate
      </th>
      <th class="th-lg">Vehicle
      </th>
      <th class="th-lg">Date/Time
      </th>
   
      <th class="th-lg">Action
      </th>
   
    </tr>
  </thead>
  <tbody>
  @foreach($users as $user)
    <tr>
      <td>U{{$user->id}}2</td>
      <td>{{$user->fname}}</td>
      <td>{{$user->lname}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->number}}</td>
      <td>{{$user->govern}}</td>
      <td>{{$user->vehicle}}</td>
      <td>{{$user->created_at}}</td>
     <td> <a href="/deleteU/id={{$user->id}}" class="btn btn-danger">Delete</a></td>
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
    td1 = tr[i].getElementsByTagName("td")[2];
    td2 = tr[i].getElementsByTagName("td")[3];
    td3 = tr[i].getElementsByTagName("td")[4];
    td4 = tr[i].getElementsByTagName("td")[5];
    td5 = tr[i].getElementsByTagName("td")[6];
    if (td || td1 || td2 || td3 || td4 || td5 ) {
      txtValue = td.textContent || td.innerText;
      txtValue1 = td1.textContent || td1.innerText;
      txtValue2 = td2.textContent || td2.innerText;
      txtValue3 = td3.textContent || td3.innerText;
      txtValue4 = td4.textContent || td4.innerText;
      txtValue5 = td5.textContent || td5.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1||txtValue1.toUpperCase().indexOf(filter) > -1||txtValue2.toUpperCase().indexOf(filter) > -1||txtValue3.toUpperCase().indexOf(filter) > -1||txtValue4.toUpperCase().indexOf(filter) > -1||txtValue5.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
   
  }
  
}

function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
</script>


@endsection
