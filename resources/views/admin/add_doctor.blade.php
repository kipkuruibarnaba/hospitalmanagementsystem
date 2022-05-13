<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">
        label {
            display: inline-block;
            width: 200px;


        }
    </style>
    @include('admin.css')
</head>
<body>
<div class="container-scroller">
@include('admin.sidebar')
    <div class="container-fluid page-body-wrapper">
    @include('admin.navbar')
        <div class="container-fluid page-body-wrapper">
           <div class="container" style="padding-top: 100px;" >
           @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss ="alert">x</button>
               {{session()->get('message')}}
        </div>
        @endif
            <form action="{{url('upload_doctor')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div style="padding: 15px">
                    <label>Doctor Name</label>
                    <input type="text" name="doctorname" style="color: black" placeholder="Enter Doctor Name" required/>
                </div>
                <div style="padding: 15px">
                    <label>Phone Number</label>
                    <input type="text" name="phonenumber" style="color: black" placeholder="Enter Phone Number" required/>
                </div>
                <div style="padding: 15px">
                    <label>Speciality</label>
                    <select style="color: black; width: 200px" name="speciality" required>
                        <option value="">Select Speciality</option>
                        <option value="skin">Skin</option>
                        <option value="heart">Heart</option>
                        <option value="eye">Optician</option>
                        <option value="dentist">Dentist</option>
                    </select>
                </div>
                <div style="padding: 15px">
                    <label>Room Number</label>
                    <input type="text" name="roomnumber" style="color: black" placeholder="Enter Room Number" required/>
                </div>
                <div style="padding: 15px">
                    <label>Doctor Image</label>
                    <input type="file" name="file" style="color: black" required/>
                </div>
                <div style="padding: 15px">
                    <input type="submit" class="btn btn-success"/>
                </div>
            </form>
           </div>
        </div>
    </div>
</div>
@include('admin.script')
</body>
</html>
