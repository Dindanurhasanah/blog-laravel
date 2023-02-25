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

        <div class="page-title lb single-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2><i class="fa fa-star bg-orange"></i> {{ $category_name->name }} <small class="hidden-xs-down hidden-sm-down">Nulla felis eros, varius sit amet volutpat non. </small></h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Blog</a></li>
                            <li class="breadcrumb-item active">Reviews</li>
                        </ol>
                    </div><!-- end col -->                    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end page-title -->

        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
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
                                            <p>{!! $post->description !!}</p>
                                            <small class="firstsmall"><a class="bg-orange" href="{{ $post->category->slug }}" title="">{{ $post->category->name }}</a></small>
                                            <small><a href="tech-single.html" title="">{{ $post->updated_at }}</a></small>
                                            <small><a href="tech-author.html" title="">BY {{ $post->user->name }}</a></small>
                                            <small><a href="tech-single.html" title=""><i class="fa fa-eye"></i> {{ $post->view_count }}</a></small>
                                        </div><!-- end meta -->
                                    </div><!-- end blog-box -->
                                @endforeach
                                <hr class="invis">
                                

                                
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