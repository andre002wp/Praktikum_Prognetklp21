@extends('layouts.main')`

@section('container')

    <!--banner-->
    <div class="banner-top">
        <div class="container">
            <h1>Checkout</h1>
            <em></em>
            <h2><a href="index.html">Home</a><label>/</label>Checkout</h2>
        </div>
    </div>
    <!--login-->
    <script>
        $(document).ready(function(c) {
            $('.close1').on('click', function(c) {
                $('.cart-header').fadeOut('slow', function(c) {
                    $('.cart-header').remove();
                });
            });
        });

    </script>
    <script>
        $(document).ready(function(c) {
            $('.close2').on('click', function(c) {
                $('.cart-header1').fadeOut('slow', function(c) {
                    $('.cart-header1').remove();
                });
            });
        });

    </script>
    <script>
        $(document).ready(function(c) {
            $('.close3').on('click', function(c) {
                $('.cart-header2').fadeOut('slow', function(c) {
                    $('.cart-header2').remove();
                });
            });
        });

    </script>
    <div class="check-out">
        <div class="container">

            <div class="bs-example4" data-example-id="simple-responsive-table">
                <div class="table-responsive">
                    <table class="table-heading simpleCart_shelfItem">
                        <tr>
                            <th class="table-grid">Item</th>

                            <th>Prices</th>
                            <th>Delivery </th>
                            <th>Subtotal</th>
                        </tr>
                        <tr class="cart-header">

                            <td class="ring-in"><a href="single.html" class="at-in"><img src="images/ch.jpg"
                                        class="img-responsive" alt=""></a>
                                <div class="sed">
                                    <h5><a href="single.html">Sed ut perspiciatis unde</a></h5>
                                    <p>(At vero eos et accusamus et iusto odio dignissimos ducimus ) </p>

                                </div>
                                <div class="clearfix"> </div>
                                <div class="close1"> </div>
                            </td>
                            <td>$100.00</td>
                            <td>FREE SHIPPING</td>
                            <td class="item_price">$100.00</td>
                            <td class="add-check"><a class="item_add hvr-skew-backward" href="#">Add To Cart</a></td>
                        </tr>
                        <tr class="cart-header1">
                            <td class="ring-in"><a href="single.html" class="at-in"><img src="images/ch2.jpg"
                                        class="img-responsive" alt=""></a>
                                <div class="sed">
                                    <h5><a href="single.html">Sed ut perspiciatis unde</a></h5>
                                    <p>(At vero eos et accusamus et iusto odio dignissimos ducimus ) </p>
                                </div>
                                <div class="clearfix"> </div>
                                <div class="close2"> </div>
                            </td>
                            <td>$100.00</td>
                            <td>FREE SHIPPING</td>
                            <td class="item_price">$100.00</td>
                            <td class="add-check"><a class="item_add hvr-skew-backward" href="#">Add To Cart</a></td>
                        </tr>
                        <tr class="cart-header2">
                            <td class="ring-in"><a href="single.html" class="at-in"><img src="images/ch1.jpg"
                                        class="img-responsive" alt=""></a>
                                <div class="sed">
                                    <h5><a href="single.html">Sed ut perspiciatis unde</a></h5>
                                    <p>(At vero eos et accusamus et iusto odio dignissimos ducimus ) </p>
                                </div>
                                <div class="clearfix"> </div>
                                <div class="close3"> </div>
                            </td>
                            <td>$100.00</td>
                            <td>FREE SHIPPING</td>
                            <td class="item_price">$100.00</td>
                            <td class="add-check"><a class="item_add hvr-skew-backward" href="#">Add To Cart</a></td>
                        </tr>

                    </table>
                </div>
            </div>
            <div class="produced">
                <a href="single.html" class="hvr-skew-backward">Produced To Buy</a>
            </div>
        </div>
    </div>

    <!--//login-->
    <!--brand-->
    <div class="container">
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
    </div>
    <!--//brand-->
    <!--//content-->
    <!--//footer-->
    <div class="footer">
        <div class="footer-middle">
            <div class="container">
                <div class="col-md-3 footer-middle-in">
                    <a href="index.html"><img src="images/log.png" alt=""></a>
                    <p>Suspendisse sed accumsan risus. Curabitur rhoncus, elit vel tincidunt elementum, nunc urna
                        tristique nisi, in interdum libero magna tristique ante. adipiscing varius. Vestibulum dolor
                        lorem.</p>
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
                        <input type="text" value="Enter your E-mail" onfocus="this.value='';"
                            onblur="if (this.value == '') {this.value ='Enter your E-mail';}">
                        <input type="submit" value="Subscribe">
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <ul class="footer-bottom-top">
                    <li><a href="#"><img src="images/f1.png" class="img-responsive" alt=""></a></li>
                    <li><a href="#"><img src="images/f2.png" class="img-responsive" alt=""></a></li>
                    <li><a href="#"><img src="images/f3.png" class="img-responsive" alt=""></a></li>
                </ul>
                <p class="footer-class">
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
@endsection

</html>
