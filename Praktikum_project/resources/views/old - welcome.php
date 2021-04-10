@extends('layouts.main')
@if (session('status'))
    <div class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Alert !!!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
@endif
@section('container')
    <div class="content">
        <div class="container">
            <div class="content-top">
                <div class="col-md-6 col-md">
                    <div class="col-1">
                        <a href="single.html" class="b-link-stroke b-animate-go  thickbox">
                            <img src="{{ URL::asset('images/pi.jpg')}}" class="img-responsive" alt="" />
                            <div class="b-wrapper1 long-img">
                                <p class="b-animate b-from-right    b-delay03 ">Lorem ipsum</p><label class="b-animate b-from-right    b-delay03 "></label>
                                <h3 class="b-animate b-from-left    b-delay03 ">Trendy</h3>
                            </div>
                        </a>

                        <!---<a href="single.html"><img src="images/pi.jpg" class="img-responsive" alt=""></a>-->
                    </div>
                    <div class="col-2">
                        <span>Hot Deal</span>
                        <h2><a href="single.html">Luxurious &amp; Trendy</a></h2>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years</p>
                        <a href="single.html" class="buy-now">Buy Now</a>
                    </div>
                </div>
                <div class="col-md-6 col-md1">
                    <div class="col-3">
                        <a href="single.html"><img src="{{ URL::asset('images/pi1.jpg')}}" class="img-responsive" alt="">
                            <div class="col-pic">
                                <p>Lorem Ipsum</p>
                                <label></label>
                                <h5>For Men</h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="single.html"><img src="{{ URL::asset('images/pi2.jpg')}}" class="img-responsive" alt="">
                            <div class="col-pic">
                                <p>Lorem Ipsum</p>
                                <label></label>
                                <h5>For Kids</h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="single.html"><img src="{{ URL::asset('images/pi3.jpg')}}" class="img-responsive" alt="">
                            <div class="col-pic">
                                <p>Lorem Ipsum</p>
                                <label></label>
                                <h5>For Women</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <!--products-->
            <div class="content-mid">
                <h3>Trending Items</h3>
                <label class="line"></label>
                <div class="mid-popular">
                    <div class="col-md-3 item-grid simpleCart_shelfItem">
                        <div class=" mid-pop">
                            <div class="pro-img">
                                <img src="images/pc.jpg" class="img-responsive" alt="">
                                <div class="zoom-icon ">
                                    <a class="picture" href="{{ URL::asset('images/pc.jpg')}}" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
                                    <a href="single.html"><i class="glyphicon glyphicon-menu-right icon"></i></a>
                                </div>
                            </div>
                            <div class="mid-1">
                                <div class="women">
                                    <div class="women-top">
                                        <span>Women</span>
                                        <h6><a href="single.html">Sed ut perspiciati</a></h6>
                                    </div>
                                    <div class="img item_add">
                                        <a href="#"><img src="{{ URL::asset('images/ca.png')}}" alt=""></a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="mid-2">
                                    <p><label>$100.00</label><em class="item_price">$70.00</em></p>
                                    <div class="block">
                                        <div class="starbox small ghosting"> </div>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 item-grid simpleCart_shelfItem">
                        <div class=" mid-pop">
                            <div class="pro-img">
                                <img src="images/pc1.jpg" class="img-responsive" alt="">
                                <div class="zoom-icon ">
                                    <a class="picture" href="images/pc1.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
                                    <a href="single.html"><i class="glyphicon glyphicon-menu-right icon"></i></a>
                                </div>
                            </div>
                            <div class="mid-1">
                                <div class="women">
                                    <div class="women-top">
                                        <span>Women</span>
                                        <h6><a href="single.html">At vero eos</a></h6>
                                    </div>
                                    <div class="img item_add">
                                        <a href="#"><img src="images/ca.png" alt=""></a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="mid-2">
                                    <p><label>$100.00</label><em class="item_price">$70.00</em></p>
                                    <div class="block">
                                        <div class="starbox small ghosting"> </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 item-grid simpleCart_shelfItem">
                        <div class=" mid-pop">
                            <div class="pro-img">
                                <img src="images/pc2.jpg" class="img-responsive" alt="">
                                <div class="zoom-icon ">
                                    <a class="picture" href="images/pc2.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
                                    <a href="single.html"><i class="glyphicon glyphicon-menu-right icon"></i></a>
                                </div>
                            </div>
                            <div class="mid-1">
                                <div class="women">
                                    <div class="women-top">
                                        <span>Men</span>
                                        <h6><a href="single.html">Sed ut perspiciati</a></h6>
                                    </div>
                                    <div class="img item_add">
                                        <a href="#"><img src="images/ca.png" alt=""></a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="mid-2">
                                    <p><label>$100.00</label><em class="item_price">$70.00</em></p>
                                    <div class="block">
                                        <div class="starbox small ghosting"> </div>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 item-grid simpleCart_shelfItem">
                        <div class=" mid-pop">
                            <div class="pro-img">
                                <img src="images/pc3.jpg" class="img-responsive" alt="">
                                <div class="zoom-icon ">
                                    <a class="picture" href="images/pc3.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
                                    <a href="single.html"><i class="glyphicon glyphicon-menu-right icon"></i></a>
                                </div>
                            </div>
                            <div class="mid-1">
                                <div class="women">
                                    <div class="women-top">
                                        <span>Women</span>
                                        <h6><a href="single.html">On the other</a></h6>
                                    </div>
                                    <div class="img item_add">
                                        <a href="#"><img src="images/ca.png" alt=""></a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="mid-2">
                                    <p><label>$100.00</label><em class="item_price">$70.00</em></p>
                                    <div class="block">
                                        <div class="starbox small ghosting"> </div>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="mid-popular">
                    <div class="col-md-3 item-grid simpleCart_shelfItem">
                        <div class=" mid-pop">
                            <div class="pro-img">
                                <img src="images/pc4.jpg" class="img-responsive" alt="">
                                <div class="zoom-icon ">
                                    <a class="picture" href="images/pc4.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
                                    <a href="single.html"><i class="glyphicon glyphicon-menu-right icon"></i></a>
                                </div>
                            </div>
                            <div class="mid-1">
                                <div class="women">
                                    <div class="women-top">
                                        <span>Men</span>
                                        <h6><a href="single.html">On the other</a></h6>
                                    </div>
                                    <div class="img item_add">
                                        <a href="#"><img src="images/ca.png" alt=""></a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="mid-2">
                                    <p><label>$100.00</label><em class="item_price">$70.00</em></p>
                                    <div class="block">
                                        <div class="starbox small ghosting"> </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 item-grid simpleCart_shelfItem">
                        <div class=" mid-pop">
                            <div class="pro-img">
                                <img src="images/pc5.jpg" class="img-responsive" alt="">
                                <div class="zoom-icon ">
                                    <a class="picture" href="images/pc5.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
                                    <a href="single.html"><i class="glyphicon glyphicon-menu-right icon"></i></a>
                                </div>
                            </div>
                            <div class="mid-1">
                                <div class="women">
                                    <div class="women-top">
                                        <span>Men</span>
                                        <h6><a href="single.html">Sed ut perspiciati</a></h6>
                                    </div>
                                    <div class="img item_add">
                                        <a href="#"><img src="images/ca.png" alt=""></a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="mid-2">
                                    <p><label>$100.00</label><em class="item_price">$70.00</em></p>
                                    <div class="block">
                                        <div class="starbox small ghosting"> </div>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 item-grid simpleCart_shelfItem">
                        <div class=" mid-pop">
                            <div class="pro-img">
                                <img src="images/pc6.jpg" class="img-responsive" alt="">
                                <div class="zoom-icon ">
                                    <a class="picture" href="images/pc6.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
                                    <a href="single.html"><i class="glyphicon glyphicon-menu-right icon"></i></a>
                                </div>
                            </div>
                            <div class="mid-1">
                                <div class="women">
                                    <div class="women-top">
                                        <span>Women</span>
                                        <h6><a href="single.html">At vero eos</a></h6>
                                        <div class="img item_add">
                                            <a href="#"><img src="images/ca.png" alt=""></a>
                                        </div>
                                        <div class="mid-2">
                                            <p><label>$100.00</label><em class="item_price">$70.00</em></p>
                                            <div class="block">
                                                <div class="starbox small ghosting"> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 item-grid simpleCart_shelfItem">
                                <div class=" mid-pop">
                                    <div class="pro-img">
                                        <img src="images/pc7.jpg" class="img-responsive" alt="">
                                        <div class="zoom-icon ">
                                            <a class="picture" href="images/pc7.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
                                            <a href="single.html"><i class="glyphicon glyphicon-menu-right icon"></i></a>
                                        </div>
                                    </div>
                                    <div class="mid-1">
                                        <div class="women">
                                            <div class="women-top">
                                                <span>Men</span>
                                                <h6><a href="single.html">Sed ut perspiciati</a></h6>
                                            </div>
                                            <div class="img item_add">
                                                <a href="#"><img src="images/ca.png" alt=""></a>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="mid-2">
                                            <p><label>$100.00</label><em class="item_price">$70.00</em></p>
                                            <div class="block">
                                                <div class="starbox small ghosting"> </div>
                                            </div>

                                            <div class="clearfix"></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!--//products-->
                    <!--brand-->
                    <div class="brand">
                        <div class="col-md-3 brand-grid">
                            <img src="images/ic.png" class="img-responsive" alt="">
                        </div>
                        <div class="col-md-3 brand-grid">
                            <img src="images/ic1.png" class="img-responsive" alt="">
                        </div>
                        <div class="col-md-3 brand-grid">
                            <img src="images/ic2.png" class="img-responsive" alt="">
                        </div>
                        <div class="col-md-3 brand-grid">
                            <img src="images/ic3.png" class="img-responsive" alt="">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!--//brand-->
                </div>
            </div>
            <!--//content-->
            <!--//footer-->
            <div class="footer">
                <div class="footer-middle">
                    <div class="container">
                        <div class="col-md-3 footer-middle-in">
                            <a href="index.html"><img src="images/log.png" alt=""></a>
                            <p>Suspendisse sed accumsan risus. Curabitur rhoncus, elit vel tincidunt elementum, nunc urna tristique nisi, in interdum libero magna tristique ante. adipiscing varius. Vestibulum dolor lorem.</p>
                        </div>

                        <div class="col-md-3 footer-middle-in">
                            <h6>Information</h6>
                            <ul class=" in">
                                <li><a href="404.html">About</a></li>
                                <li><a href="contact.html">Contact Us</a></li>
                                <li><a href="#">Returns</a></li>
                                <li><a href="contact.html">Site Map</a></li>
                            </ul>
                            <ul class="in in1">
                                <li><a href="#">Order History</a></li>
                                <li><a href="wishlist.html">Wish List</a></li>
                                <li><a href="login.html">Login</a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-md-3 footer-middle-in">
                            <h6>Tags</h6>
                            <ul class="tag-in">
                                <li><a href="#">Lorem</a></li>
                                <li><a href="#">Sed</a></li>
                                <li><a href="#">Ipsum</a></li>
                                <li><a href="#">Contrary</a></li>
                                <li><a href="#">Chunk</a></li>
                                <li><a href="#">Amet</a></li>
                                <li><a href="#">Omnis</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 footer-middle-in">
                            <h6>Newsletter</h6>
                            <span>Sign up for News Letter</span>
                            <form>
                                <input type="text" value="Enter your E-mail" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Enter your E-mail';}">
                                <input type="submit" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--//footer-->
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="{{ URL::asset('js\simpleCart.min.js')}}"></script>
            <!-- slide -->
            <script src="{{ URL::asset('js\bootstrap.min.js')}}"></script>
            <!--light-box-files -->
            <script src="{{ URL::asset('js\jquery.chocolat.js')}}"></script>
            <link rel="stylesheet" href="{{ URL::asset('css\chocolat.css')}}" type="text/css" media="screen" charset="utf-8">
            <!--light-box-files -->
            <script type="text/javascript" charset="utf-8">
                $(function() {
                    $('a.picture').Chocolat();
                });
            </script>
        </div>
    </div>
@endsection