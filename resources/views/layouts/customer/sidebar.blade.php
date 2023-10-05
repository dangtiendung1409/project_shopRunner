<div class="col-lg-3">
    <div class="shop__sidebar">
        @php
            $categories = App\Models\Category::all();
        @endphp
        <div class="shop__sidebar__accordion">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-heading">
                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                    </div>
                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="shop__sidebar__categories">
                                <ul class="nice-scroll">
                                    @foreach ($categories as $c)
                                        <li><a href="{{url("/category",["category"=>$c->slug])}}">{{$c->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-heading">
                        <a data-toggle="collapse" data-target="#collapseTwo">Branding</a>
                    </div>
                    <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="shop__sidebar__brand">
                                <ul>
                                    @foreach ($categories as $c)
                                        <li><a href="{{url("/category",["category"=>$c->slug])}}">{{$c->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-heading">
                        <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                    </div>
                    <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="shop__sidebar__price">
                                <ul>
                                    @foreach ($categories as $c)
                                        <li><a href="{{url("/category",["category"=>$c->price])}}">${{$c->price}} - ${{$c->price + $c->price}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-heading">
                        <a data-toggle="collapse" data-target="#collapseFour">Size</a>
                    </div>
                    <div id="collapseFour" class="collapse show" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="shop__sidebar__size">
{{--                                <label for="xs">xs--}}
{{--                                    <input type="radio" id="xs">--}}
{{--                                </label>--}}
{{--                                <label for="sm">s--}}
{{--                                    <input type="radio" id="sm">--}}
{{--                                </label>--}}
                                @foreach ($categories as $c)
                                    <label for="4xl">
                                        <a type="radio" href="{{url("/category",["category"=>$c->size])}}">{{$c->size}}</a>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-heading">
                        <a data-toggle="collapse" data-target="#collapseFive">Colors</a>
                    </div>
                    <div id="collapseFive" class="collapse show" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="shop__sidebar__color">
                                <label class="c-1" for="sp-1">
                                    <input type="radio" id="sp-1">
                                </label>
                                <label class="c-2" for="sp-2">
                                    <input type="radio" id="sp-2">
                                </label>
                                <label class="c-3" for="sp-3">
                                    <input type="radio" id="sp-3">
                                </label>
                                <label class="c-4" for="sp-4">
                                    <input type="radio" id="sp-4">
                                </label>
                                <label class="c-5" for="sp-5">
                                    <input type="radio" id="sp-5">
                                </label>
                                <label class="c-6" for="sp-6">
                                    <input type="radio" id="sp-6">
                                </label>
                                <label class="c-7" for="sp-7">
                                    <input type="radio" id="sp-7">
                                </label>
                                <label class="c-8" for="sp-8">
                                    <input type="radio" id="sp-8">
                                </label>
                                <label class="c-9" for="sp-9">
                                    <input type="radio" id="sp-9">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-heading">
                        <a data-toggle="collapse" data-target="#collapseSix">Tags</a>
                    </div>
                    <div id="collapseSix" class="collapse show" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="shop__sidebar__tags">
                                <a href="#">Product</a>
                                @foreach ($categories as $c)
                                    <li><a href="{{url("/category",["category"=>$c->slug])}}">{{$c->name}}</a></li>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
