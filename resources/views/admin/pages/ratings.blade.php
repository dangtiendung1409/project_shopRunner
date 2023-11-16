@extends("admin.layouts.app")
@section("main")

    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active"><a href="#"><b>Rating & Review</b></a></li>
            </ul>
            <div id="clock"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">

                        <form style="display: flex" action="{{url("admin/admin-rating/")}}" method="get">
                            <div class="input-group input-group-sm mr-2" style="width: 150px; margin-left: 5px;">
                                <input  type="text" name="user_email" value="{{app("request")->input("user_email")}}" class="form-control" placeholder="User Email">
                            </div>

                            <div class="input-group input-group-sm mr-2" style="width: 150px;">
                                <input  type="number" name="rating" value="{{app("request")->input("rating")}}" class="form-control" placeholder="Ratings">
                            </div>

                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input  value="{{app("request")->input("search")}}" type="text" name="search" class="form-control float-right" placeholder="Search">

                                <button style="height: 45px; margin-left: 3px;"  type="submit" class="btn btn-default">
                                    <i   class="fas fa-search"></i>
                                </button>

                            </div>
                        </form>
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>User Email</th>
                                <th>User</th>
                                <th>Message</th>
                                <th>Ratings</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ratings as $rating)
                                <tr>
                                    <td>{{$rating->id}}</td>
                                    <td>{{$rating->product->name}}</td>
                                    <td>{{$rating->user->email}}</td>
                                    <td>{{$rating->user->name}}</td>
                                    <td>{{$rating->message}}</td>
                                    <td>{{$rating->rating}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include("admin.layouts.scripts")
@stop
