@extends('layouts.main')

@section('title', "Home")

@section('content')

<!-- =================Slider Start================== -->
{{-- <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="mask flex-center">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-7 col-12 order-md-1 order-2">
              <h4>Place of <br> invention</h4>
              <p>Lorem ipsum dolor sit amet. Reprehenderit, qui blanditiis quidem rerum <br>
              necessitatibus praesentium voluptatum deleniti atque corrupti.</p>
              <!-- <a href="#">ORDER NOW</a>  -->
            </div>
              <div class="col-md-5 col-12 order-md-2 order-1">
                <img src="{{ asset('main/dist/images/slider/robot.png') }}" class="mx-auto img-fluid" alt="slide">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="mask flex-center">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-7 col-12 order-md-1 order-2">
                <h4>Your Idea, your Dream <br> Your life</h4>
                <p>Lorem ipsum dolor sit amet. Reprehenderit, qui blanditiis quidem rerum <br>
                necessitatibus praesentium voluptatum deleniti atque corrupti.</p>
                <!--  <a href="#">ORDER NOW</a> -->
              </div>
              <div class="col-md-5 col-12 order-md-2 order-1"><img src="{{ asset('main/dist/images/slider/clip.png') }}" class="mx-auto img-fluid" alt="slide"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="mask flex-center">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-7 col-12 order-md-1 order-2">
                <h4>Some Idea make your <br> Success</h4>
                <p>Lorem ipsum dolor sit amet. Reprehenderit, qui blanditiis quidem rerum <br>
                necessitatibus praesentium voluptatum deleniti atque corrupti.</p>
                <!-- <a href="#">ORDER NOW</a>  -->
              </div>
              <div class="col-md-5 col-12 order-md-2 order-1"><img src="{{ asset('main/dist/images/slider/math.png') }}" class="mx-auto img-fluid" alt="slide"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> 
</div> --}}

{{-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">

    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{asset('main/dist/images/slider/slide_one.jpg')}}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('main/dist/images/slider/slide_two.jpg')}}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('main/dist/images/slider/slide_three.jpg')}}" alt="Third slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('main/dist/images/slider/slide_four.jpg')}}" alt="Four slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> --}}

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    @foreach($slider_image as $count)
    @if($loop->iteration == 1)
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    @else
    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->iteration - 1 }}"></li>
    @endif
    @endforeach
  </ol>
  <div class="carousel-inner">
    @foreach($slider_image as $count)
    @if($loop->iteration == 1)
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{asset('uploads/sliders/'. $count->sliderimage)}}" alt="First slide">
    </div>
    @else
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('uploads/sliders/'. $count->sliderimage)}}" alt="First slide">
    </div>
    @endif
    @endforeach
    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    
<!-- ===============Slider End================= -->
<section class="d-none d-md-block">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-6 col-lg-6 my-col-one">
        <div class="my-text-con">
          <h1>About Stem Fest</h1>
          <hr class="line-one">
          <div class="clearfix"></div>
          <p>
            In the 21st century, scientific and technological innovations have become increasingly important as we face the benefits and challenges of both globalization and a knowledge-based economy. To succeed in this new information-based and highly technological society, students need to develop their capabilities in STEM to levels much beyond what was considered acceptable in the past. We are grateful to our school for giving us this opportunity to be a part of this Internationally recognized event.
          </p>
          <button type="button" class="btn btn-primary video-btn" data-toggle="modal" data-src="https://www.youtube.com/embed/_FpPNRYsDnQ" data-target="#myModal">
            Play Media Video
          </button>

                  <!-- Modal -->
          <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">      
                <div class="modal-body">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>        
                  <!-- 16:9 aspect ratio -->
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
              </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-6 col-lg-6 my-col-two ">
       {{--  <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/_FpPNRYsDnQ"  allowscriptaccess="always" allow="autoplay"></iframe>
                </div> --}}
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-sm-12 col-md-6 col-lg-6 my-col-three">
      </div>
      <div class="col-12 col-sm-12 col-md-6 col-lg-6 my-col-one">
        {{-- <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/_FpPNRYsDnQ"  allowscriptaccess="always" allow="autoplay"></iframe>
        </div> --}}
        <div class="my-text-con">
          <h1>Why we?</h1>
          <hr class="line-one">
          <div class="clearfix"></div>
          <ul class="list_style circle">
            <li><a href="Why Choose Us.php"><i class="fa fa-check"></i> Lorem ipsum dolor, sit amet   </a></li>
            <li><a href="Why Choose Us.php"><i class="fa fa-check"></i> Suscipit culpa nemo repellat cupiditate nam, nihil assumenda!</a></li>
            <li><a href="Why Choose Us.php"><i class="fa fa-check"></i> incidunt tempora, nostrum ab saepe eveniet sint?</a></li>
            <li><a href="Why Choose Us.php"><i class="fa fa-check"></i> voluptate voluptates vero esse aliquam.</a></li>
            <li><a href="Why Choose Us.php"><i class="fa fa-check"></i> consectetur adipisicing elit. Commodi iusto</a></li>
            <li><a href="Why Choose Us.php"><i class="fa fa-check"></i> Commitment &amp; Teamwork and equal Opportunity Employer</a></li>
            <li><a href="Why Choose Us.php"><i class="fa fa-check"></i> Corporate Social responsibility</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="d-sm-block d-md-none">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-6 col-lg-6 my-col-one">
        <div class="my-text-con">
          <h1>About Stem Fest</h1>
          <hr class="line-one">
          <div class="clearfix"></div>
          <p>
            In the 21st century, scientific and technological innovations have become increasingly important as we face the benefits and challenges of both globalization and a knowledge-based economy. To succeed in this new information-based and highly technological society, students need to develop their capabilities in STEM to levels much beyond what was considered acceptable in the past. We are grateful to our school for giving us this opportunity to be a part of this Internationally recognized event.
          </p>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-6 col-lg-6 my-col-two">
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-sm-12 col-md-6 col-lg-6 my-col-one">
        <div class="my-text-con">
          <h1>Why Choose us?</h1>
          <hr class="line-one">
          <div class="clearfix"></div>
          <ul class="list_style circle">
            <li><a href="#"><i class="fa fa-check"></i> Buyer  Satisfaction</a></li>
            <li><a href="#"><i class="fa fa-check"></i> Inspiring creativity and Integrity</a></li>
            <li><a href="#"><i class="fa fa-check"></i> Fast turnaround time, high-quality products and excellent customer service.</a></li>
            <li><a href="#"><i class="fa fa-check"></i> Products made to customer specifications.</a></li>
            <li><a href="#"><i class="fa fa-check"></i> Healthy Work Environment</a></li>
            <li><a href="#"><i class="fa fa-check"></i> Commitment &amp; Teamwork and equal Opportunity Employer</a></li>
            <li><a href="#"><i class="fa fa-check"></i> Corporate Social responsibility</a></li>
          </ul>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-6 col-lg-6 my-col-two">
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container" style="padding: 80px 0;">
    <div class="row">
      <div class="col-12 col-sm-6 col-md-4 col-lg-4">
        <div class="card">
          <img class="card-img-top" src="{{ asset('main/dist/images/news_stem.jpg') }}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">1st Stem Fest</h5>
            <hr class="line-one">
            <div class="clearfix"></div>
            <p class="card-text text-justify">STEM Fest is an interactive and educational event designed to engage students in STEM Subjects. STEM fest gives young people an insight into the vast array of career possibilities open to them in exciting and vitally important areas of science and technology</p>
            <a href="{{ url('/stem-fest-2020') }}" class="btn btn-primary">Read More</a>
          </div>
        </div>
      </div>
      {{-- <div class="col-12 col-sm-6 col-md-4 col-lg-4">
        <div class="card">
          <img class="card-img-top" src="{{ asset('main/dist/images/two.jpg') }}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">2nd Stem Fest</h5>
            <hr class="line-one">
            <div class="clearfix"></div>
            <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing, elit. Eaque voluptas nihil amet doloremque neque debitis, tempore est, minus! Iure delectus, possimus eius! Ab, nesciunt! Eaque ex, exercitationem tempore quis rerum.</p>
            <a href="#" class="btn btn-primary">Read More</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4 col-lg-4">
        <div class="card">
          <img class="card-img-top" src="{{ asset('main/dist/images/one.jpg') }}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">3rd Stem Fest</h5>
            <hr class="line-one">
            <div class="clearfix"></div>
            <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing, elit. Eaque voluptas nihil amet doloremque neque debitis, tempore est, minus! Iure delectus, possimus eius! Ab, nesciunt! Eaque ex, exercitationem tempore quis rerum.</p>
            <a href="#" class="btn btn-primary">Read More</a>
          </div>
        </div>
      </div> --}}
    </div>
  </div>
</section>

<section>
  <div class="bg-two">
    <div class="bg-two-color">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h1>Stem Fest is a place of  <br> Invention and Creation</h1>
            <div class="clearfix"></div>
            <p>Join Us -></p>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container my-5">
    <div class="row">
      <div class="col-12 col-sm-6">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/_FpPNRYsDnQ"  allowscriptaccess="always" allow="autoplay"></iframe>
          {{-- <video controls autoplay="false">
            <source src="{{ asset('main/dist/videos/jamuna.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
          </video> --}}
        </div>
      </div>
      <div class="col-12 col-sm-6">
        <div class="card mt-3 mb-5 my-0 mx-auto border-0">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="100000">
            <div class="w-100 carousel-inner" role="listbox">
              <div class="carousel-item active">
                <div class="carousel-caption">
                  <div class="row">
                    {{-- <div class="col-sm-3">
                      <img src="http://via.placeholder.com/200x200" alt="" class="rounded-circle img-fluid"/>
                    </div> --}}
                    <div class="col-sm-9">
                      <h3>Gives me hope</h3>
                      <small>STEM Fest is an interactive and educational event designed to engage students in STEM Subjects. STEM fest gives young people an insight into the vast array of career possibilities open to them in exciting and vitally important areas of science and technology.</small> <br>
                      <small class="smallest mute">- Miss Roksana Zarin</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="carousel-caption">
                  <div class="row">
                    {{-- <div class="col-sm-3">
                      <img src="http://via.placeholder.com/200x200" alt="" class="rounded-circle img-fluid">
                    </div> --}}
                    <div class="col-sm-9">
                      <h3>Journey to the future</h3>
                      <small>In the 21st century, scientific and technological innovations have become increasingly important as we face the benefits and challenges of both globalization and a knowledge-based economy</small>
                      <small class="smallest mute">- Mr. Yasar Savran</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="carousel-caption">
                  <div class="row">
                    {{-- <div class="col-sm-3">
                      <img src="http://via.placeholder.com/200x200" alt="" class="rounded-circle img-fluid">
                    </div> --}}
                    <div class="col-sm-9">
                      <h3>Way of success!</h3>
                      <small>STEM Fest is an interactive and educational event designed to engage students in STEM Subjects. STEM fest gives young people an insight into the vast array of career possibilities open to them in exciting and vitally important areas of science and technology.</small>
                      <small class="smallest mute">- Mr. Md. Atiqul Islam</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="float-right navi">
            <a class="" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon ico" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon ico" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection

@section('java_script')

  <script>
    $(document).ready(function() {

    var $videoSrc;  
    $('.video-btn').click(function() {
        $videoSrc = $(this).data( "src" );
    });
    console.log($videoSrc);
 
    $('#myModal').on('shown.bs.modal', function (e) {
    
    $("#video").attr('src',$videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0" ); 
    })

    $('#myModal').on('hide.bs.modal', function (e) {
        // a poor man's stop video
        $("#video").attr('src',$videoSrc); 
    }) 
        
    });

  </script>
@endsection