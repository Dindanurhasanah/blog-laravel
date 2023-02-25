<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="widget">
                    <div class="footer-text text-left">
                        <a href="index.html"><img src="images/version/tech-footer-logo.png" alt="" class="img-fluid"></a>
                        <p>SIBOLA is a blog, we share all the news. like news about tours, gadget, and music.</p>
                        <div class="social">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>              
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Google Plus"><i class="fa fa-google-plus"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                        </div>

                        <hr class="invis">

                        <div class="newsletter-widget text-left">
                            <form class="form-inline">
                                <input type="text" class="form-control" placeholder="Enter your email address">
                                <button type="submit" class="btn btn-primary">SUBMIT</button>
                            </form>
                        </div><!-- end newsletter -->
                    </div><!-- end footer-text -->
                </div><!-- end widget -->
            </div><!-- end col -->

            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <h2 class="widget-title">Popular Categories</h2>
                    <div class="link-widget">
                        <ul>
                            @php($post_counter=0)
                                @foreach ($categories_posts as $category_footer)
                                    @php($post_counter= $category_footer->posts->count()) 
                                    @if($post_counter > 0)
                                        <li><a href="{{ route('categories.single', ['slug' => $category_footer->slug]) }}">{{ $category_footer->name }} <span>({{ $category_footer->posts_count }})</span></a></li>
                                    @endif
                            @endforeach
                        </ul>
                    </div><!-- end link-widget -->
                </div><!-- end widget -->
            </div><!-- end col -->

            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <h2 class="widget-title">Copyrights</h2>
                    <div class="link-widget">
                        <ul>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Advertising</a></li>
                            <li><a href="#">Write for us</a></li>
                            <li><a href="#">Trademark</a></li>
                            <li><a href="#">License & Help</a></li>
                        </ul>
                    </div><!-- end link-widget -->
                </div><!-- end widget -->
            </div><!-- end col -->
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <br>
                <div class="copyright">&copy;<a href="http://html.design">SIBOLA</a></div>
            </div>
        </div>
    </div><!-- end container -->
</footer><!-- end footer -->