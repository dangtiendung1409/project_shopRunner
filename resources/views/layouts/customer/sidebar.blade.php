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
                        <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                    </div>
                    <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="shop__sidebar__price">
                                <ul>
                                    <li><a href="/category?price=1">Under $20.00</a></li>
                                    <li><a href="/category?price=2">$20.00 - $40.00</a></li>
                                    <li><a href="/category?price=3">$40.00 - $60.00</a></li>
                                    <li><a href="/category?price=4">$60.00 - $80.00</a></li>
                                    <li><a href="/category?price=5">Over $80.00</a></li>
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
                                    <li><a href="#">Louis Vuitton</a></li>
                                    <li><a href="#">Chanel</a></li>
                                    <li><a href="#">Hermes</a></li>
                                    <li><a href="#">Gucci</a></li>
                                </ul>
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
                                <a href="#">Bags</a>
                                <a href="#">Shoes</a>
                                <a href="#">Fashio</a>
                                <a href="#">Clothing</a>
                                <a href="#">Hats</a>
                                <a href="#">Accessories</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
