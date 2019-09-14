@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                <div class="row">
                <div class="col">
                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">عدد الشركاء</div>
                <div class="card-body">
                    <h5 class="card-title">بيانات الشركاء </h5>
                    <h1 class="card-text">{{$users}}</h1>
                </div>
                <div class="card-footer bg-transparent border-light">
                    <a href="/uberusers" class="btn btn-light">See More Details</a>
                    </div>
                </div>
                </div>
                <div class="col">
                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header">Subscribed Users</div>
                <div class="card-body">
                    <h5 class="card-title">ملفات الشركاء</h5>
                    <h1 class="card-text">{{$files}}</h1>
                        
                </div>
        
                <div class="card-footer bg-transparent border-light">
                    <a href="/uberfiles" class="btn btn-light">See More Details</a>
                    </div>
                </div>
                
                </div>
           
             
                </div>
                
               
            
                </div>
            
            </div>
            
        </div>
    </div>
</div>

@endsection
