@php 
$blogs = App\Models\Blog::latest()->limit(3)->get();

@endphp

<section class="blog">
                <div class="container">
                <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section__title text-center">
                                <span class="sub-title">04  - Bolgs</span>
                                <h2 class="title">All creative blogs</h2> <br><br>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-0 justify-content-center">
                        @foreach($blogs as $blog)
                        <div class="col-lg-4 col-md-6 col-sm-9">
                            <div class="blog__post__item">
                                <div class="blog__post__thumb">
                                    <a href="{{route('blog.details',$blog->id)}}"><img src="{{asset($blog->blog_image)}}" alt=""></a>
                                    <div class="blog__post__tags">
                                        <a href="blog.html">{{$blog['category']['name']}}</a>
                                    </div>
                                </div>
                                <div class="blog__post__content">
                                    <span class="date">{{Carbon\Carbon::parse($blog->created_at)->diffForHumans()}}</span>
                                    <h3 class="title"><a href="{{route('blog.details',$blog->id)}}">{{$blog->blog_title}}</a></h3>
                                    <a href="{{route('blog.details',$blog->id)}}" class="read__more">Read mORe</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="blog__button text-center">
                        <a href="{{route('all.blogs')}}" class="btn">more blog</a>
                    </div>
                </div>
            </section>