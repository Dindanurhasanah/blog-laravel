<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.front.head')
</head>
<body>

    <div id="wrapper">
        <header class="tech-header header">
            <div class="container-fluid">
                @include('layouts.front.navbar')
            </div><!-- end container-fluid -->
        </header><!-- end market-header -->

        <section class="section first-section">
            <div class="container-fluid">
                <div class="masonry-blog clearfix">
                    <div class="first-slot">
                        <div class="masonry-box post-media">
                             <img src="{{ asset('front/upload/hp.jpg') }}" alt="" class="img-fluid">
                             <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-orange"><a href="tech-category-01.html" title="">Gadget</a></span>
                                        <h4><a href="tech-single.html" title="">5 Tips Memilih HP Baru Sesuai Kebutuhan, Wajib Tahu! </a></h4>
                                        <small><a href="tech-single.html" title="">11 Jan, 2023</a></small>
                                        <small><a href="tech-author.html" title="">by Dinda</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                            </div><!-- end shadow -->
                        </div><!-- end post-media -->
                    </div><!-- end first-side -->

                    <div class="second-slot">
                        <div class="masonry-box post-media">
                             <img src="{{ asset('front/upload/BangunanJepang4.jpg') }}" alt="" class="img-fluid">
                             <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-orange"><a href="tech-category-01.html" title="">Wisata</a></span>
                                        <h4><a href="tech-single.html" title="">Tempat Wisata Indah di Jepang</a></h4>
                                        <small><a href="tech-single.html" title="">22 Des, 2022</a></small>
                                        <small><a href="tech-author.html" title="">by Dinda</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                             </div><!-- end shadow -->
                        </div><!-- end post-media -->
                    </div><!-- end second-side -->

                    <div class="last-slot">
                        <div class="masonry-box post-media">
                             <img src="{{ asset('front/upload/TempatWisataPurwakarta1.png') }}" alt="" class="img-fluid">
                             <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-orange"><a href="tech-category-01.html" title="">Wisata</a></span>
                                        <h4><a href="tech-single.html" title="">Tempat Wisata Keren di Purwakarta</a></h4>
                                        <small><a href="tech-single.html" title="">01 Jan, 2023</a></small>
                                        <small><a href="tech-author.html" title="">by Dinda</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                             </div><!-- end shadow -->
                        </div><!-- end post-media -->
                    </div><!-- end second-side -->
                </div><!-- end masonry -->
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-top clearfix">
                                <h4 class="pull-left">Recent News <a href="#"><i class="fa fa-rss"></i></a></h4>
                            </div><!-- end blog-top -->
                            
                                <div class="blog-list clearfix">
                                    @foreach ($posts as $post)
                                    <div class="blog-box row">
                                        <div class="col-md-4">
                                            <div class="post-media">
                                                <a href="tech-single.html" title="">
                                                    <img src="/images/posts/{{ $post->image }}" alt="" class="img-fluid">
                                                    <div class="hovereffect"></div>
                                                </a>
                                            </div><!-- end media -->
                                        </div><!-- end col -->

                                        <div class="blog-meta big-meta col-md-8">
                                            <h4><a href="{{ route('posts.single', ['slug' => $post->slug]) }}" title="">{{ $post->title }}</a></h4>
                                            <p>{!! $post->description !!}...</p>
                                            <small class="firstsmall"><a class="bg-orange" href="category/{{ $post->category->slug }}" title="">{{ $post->category->name }}</a></small>
                                            <small><a href="tech-single.html" title="">{{ $post->updated_at }}</a></small>
                                            <small><a href="tech-author.html" title="">by {{ $post->user->name }}</a></small>
                                            <small><a href="tech-single.html" title=""><i class="fa fa-eye"></i> {{ $post->view_count }}</a></small>
                                        </div><!-- end meta -->
                                    </div><!-- end blog-box -->

                                    <hr class="invis">
                                    @endforeach
                                    
                                </div><!-- end blog-list -->
                            </div><!-- end page-wrapper -->

                            <hr class="invis">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-start">
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->

                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        @include('layouts.front.sidebar')
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        @include('layouts.front.footer')

        <div class="dmtop">Scroll to Top</div>
        
    </div><!-- end wrapper -->

    @include('layouts.front.scripts')

</body>
</html>