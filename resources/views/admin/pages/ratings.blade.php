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
                                <input  type="text" name="user_email" value="{{old("user_email")}}" class="form-control" placeholder="User Email">
                            </div>

                            <div class="input-group input-group-sm mr-2" style="width: 150px;">
                                <input  type="number" name="rating" value="{{old("rating")}}" class="form-control" placeholder="Ratings">
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
                                    <td>{{$rating['id']}}</td>
                                    <td>{{$rating['product']['name']}}</td>
                                    <td>{{$rating['user']['email']}}</td>
                                    <td>{{$rating['user']['name']}}</td>
                                    <td>{{$rating['message']}}</td>
                                    <td>{{$rating['rating']}}</td>

{{--                                    <td style="display:flex;">--}}
{{--                                        @if($rating['status']==1)--}}
{{--                                            <a class="updateRatingStatus" id="rating-{{$rating['id']}}"--}}
{{--                                               rating_id="{{$rating['id']}}" href="javacript:void(0)">--}}
{{--                                                <i class="fas fa-toggle-on" aria-hidden="true" status="Active"></i>--}}
{{--                                            </a>--}}
{{--                                        @else--}}
{{--                                            <a class="updateRatingStatus" id="rating-{{$rating['id']}}"--}}
{{--                                               rating_id="{{$rating['id']}}" href="javacript:void(0)">--}}
{{--                                                <i class="fas fa-toggle-off" aria-hidden="true" status="Inactive"></i>--}}
{{--                                            </a>--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
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
    @section("before_js")
        <script>
            $(document).on("click", ".updateRatingStatus", function(){
                var status = $(this).children("i").attr("status");
                var rating_id = $(this).attr("rating_id");

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
                    },
                    type: 'post',
                    url: '/admin/update-rating-status',
                    data: {status:status, rating_id:rating_id},
                    susscess: function(resp){
                        if(resp['status']==0){
                            $("#rating-"+rating_id).html("<i class='fas fa-toggle-on' aria-hidden='true' status='Active'></i>");
                        } else if(resp['status']==1){
                            $("#rating-"+rating_id).html("<i class='fas fa-toggle-off' aria-hidden='true' status='Inactive'></i>");
                        }
                    }, error: function(){
                        alert("Error");
                    }
                });
            });
        </script>
    @stop
