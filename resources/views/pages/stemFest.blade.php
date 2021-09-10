@extends('layouts.main')
@section('title', "Stem Fest 2020")
@section('content')

<section>
	<div class="container mt-4">
		<div class="row">
			<div class="col-12 col-sm-6">
				<img class="img-thumbnail mt-2" src="{{ asset('main/dist/images/news_stem.jpg') }}" alt="Image">
			</div>
			<div class="col-12 col-sm-6">
				<h3>Stem Fest 2019-2020</h3>
				<p class="text-justify">
					In the 21st century, scientific and technological innovations have become increasingly important as we face the benefits and challenges of both globalization and a knowledge-based economy. To succeed in this new information-based and highly technological society, students need to develop their capabilities in STEM to levels much beyond what was considered acceptable in the past. We are grateful to our school for giving us this opportunity to be a part of this Internationally recognized event. <br> <br>
					STEM Fest is an interactive and educational event designed to engage students in STEM Subjects. STEM fest gives young people an insight into the vast array of career possibilities open to them in exciting and vitally important areas of science and technology.
				</p>
			</div>
		</div>
	</div>
</section>
 
<section>
	<div class="container">
		<div class="row">
			<div class="col-12">
				     <!-- Button trigger modal -->
				<button type="button" class="btn btn-primary video-btn" data-toggle="modal" data-src="https://www.youtube.com/embed/qZJS5uW35U8" data-target="#myModal">
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
	</div>
</section>
  
 
<section>
	<div class="container">
		<div class="row">
			<div class="col-12 mx-auto">
				<div class="accordion" id="faqExample">
					<div class="card">
						<div class="card-header p-2" id="headingOne">
							<h5 class="mb-0">
								<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									<h6 style="text-transform: none;"> <b>Q:1. What is difference between IELTS Regular Course and Crash Course? </b> </h6>
									 
								</button>
							</h5>
						</div>

						<div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
							data-parent="#faqExample">
							<div class="card-body">
								<b>Answer:</b> The content of IELTS regular and crash course is the same. IELTS Crash course are suitable for those who have a rush to give their exam.
							</div>
						</div>
					</div>
					{{-- <div class="card">
						<div class="card-header p-2" id="headingTwo">
							<h5 class="mb-0">
								<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									<h6 style="text-transform: none;"> <b> Q:1. What is difference between IELTS Regular Course and Crash Course? </b> </h6>
								</button>
							</h5>
						</div>
						<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqExample">
							<div class="card-body">
								<p class="text-justify">
								<b>Answer:</b>The content of IELTS regular and crash course is the same. IELTS Crash course are suitable for those who have a rush to give their exam.
								</p>
							</div>
						</div>
					</div> --}}
					<div class="card">
						<div class="card-header p-2" id="headingThree">
							<h5 class="mb-0">
								<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								   <h6 style="text-transform: none;"> Q. 2. Will Academic and General Training module classes have separate sessions?</h6>
								</button>
							</h5>
						</div>
						<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqExample">
							<div class="card-body">
								<b>Answer:</b>Whether you sit for Academic or General Training module exam, the skills you need the same. As the writing task 1 is not the same for IELTS Academic and General Training, We have individual sessions for both of them.
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header p-2" id="headingFour">
							<h5 class="mb-0">
								<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
									<h6 style="text-transform: none;"> Q. 3.    Can I enroll in multiple Courses? </h6>
								</button>
							</h5>
						</div>
						<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#faqExample">
							<div class="card-body">
								<p class="text-justify">
									<b>Answer:</b> Yes certainly, if you can manage the time and interested about other courses as well, you can definitely get an admission to all the courses.
								</p>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header p-2" id="headingFive">
							<h5 class="mb-0">
								<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
									  <h6 style="text-transform: none;"> Q. 4.  Will you be offering other types of courses in the future?</h6>
								</button>
							</h5>
						</div>
						<div id="collapseFive" class="collapse" aria-labelledby="collapseFive" data-parent="#faqExample">
							<div class="card-body">
								<p class="text-justify"><b>Answer:</b>
									We will continue to expand our course offerings based on demand, so if you don't see the course you are interested in listed on our website, please contact us
								</p>    
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> 



<section>
	<div class="container my-5">
		<div class="row">
			<div class="col-12">
				<h3 class="my-5 text-center"> <u>Top Category</u> </h3>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<p class="text-center display-2 text-info">
					<i class="fa fa-wpexplorer" aria-hidden="true"></i>
				</p>
				
				<h3 class="text-center">Science</h3>
			</div>
			<div class="col">
				<p class="text-center display-2 text-info">
					<i class="fa fa-calculator" aria-hidden="true"></i>
				</p>
				
				<h3 class="text-center">Mathematics</h3>
			</div>
			<div class="col">
				<p class="text-center display-2 text-info">
					<i class="fa fa-universal-access" aria-hidden="true"></i>
				</p>
				
				<h3 class="text-center">Biology</h3>
			</div>
			<div class="col">
				<p class="text-center display-2 text-info">
					<i class="fa fa-flask" aria-hidden="true"></i>
				</p>
				
				<h3 class="text-center">Chemistry</h3>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container page-top">
		<div class="row">
			<div class="col-12">
				<h3 class="my-5 text-center"> <u>Gallery</u> </h3>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3 col-md-4 col-xs-6 thumb">
				<a href="{{ asset('main/dist/images/events/img_one.jpg') }}" class="fancybox" rel="ligthbox">
					<img  src="{{ asset('main/dist/images/events/img_one.jpg') }}" class="zoom img-thumbnail "  alt=" Event Image">
				</a>
			</div>
			<div class="col-lg-3 col-md-4 col-xs-6 thumb">
				<a href="{{ asset('main/dist/images/events/img_two.jpg') }}" class="fancybox" rel="ligthbox">
					<img  src="{{ asset('main/dist/images/events/img_two.jpg') }}" class="zoom img-thumbnail "  alt=" Event Image">
				</a>
			</div>
			<div class="col-lg-3 col-md-4 col-xs-6 thumb">
				<a href="{{ asset('main/dist/images/events/img_three.jpg') }}" class="fancybox" rel="ligthbox">
					<img  src="{{ asset('main/dist/images/events/img_three.jpg') }}" class="zoom img-thumbnail "  alt=" Event Image">
				</a>
			</div>
			<div class="col-lg-3 col-md-4 col-xs-6 thumb">
				<a href="{{ asset('main/dist/images/events/img_four.jpg') }}" class="fancybox" rel="ligthbox">
					<img  src="{{ asset('main/dist/images/events/img_four.jpg') }}" class="zoom img-thumbnail "  alt=" Event Image">
				</a>
			</div>
			<div class="col-lg-3 col-md-4 col-xs-6 thumb">
				<a href="{{ asset('main/dist/images/events/img_five.jpg') }}" class="fancybox" rel="ligthbox">
					<img  src="{{ asset('main/dist/images/events/img_five.jpg') }}" class="zoom img-thumbnail "  alt=" Event Image">
				</a>
			</div>
			<div class="col-lg-3 col-md-4 col-xs-6 thumb">
				<a href="{{ asset('main/dist/images/events/img_six.jpg') }}" class="fancybox" rel="ligthbox">
					<img  src="{{ asset('main/dist/images/events/img_six.jpg') }}" class="zoom img-thumbnail "  alt=" Event Image">
				</a>
			</div>
			<div class="col-lg-3 col-md-4 col-xs-6 thumb">
				<a href="{{ asset('main/dist/images/events/img_seven.jpg') }}" class="fancybox" rel="ligthbox">
					<img  src="{{ asset('main/dist/images/events/img_seven.jpg') }}" class="zoom img-thumbnail "  alt=" Event Image">
				</a>
			</div>
			<div class="col-lg-3 col-md-4 col-xs-6 thumb">
				<a href="{{ asset('main/dist/images/events/img_eight.jpg') }}" class="fancybox" rel="ligthbox">
					<img  src="{{ asset('main/dist/images/events/img_eight.jpg') }}" class="zoom img-thumbnail "  alt=" Event Image">
				</a>
			</div>
		</div>
	</div>
</section>

@endsection



@section('java_script')
	<script type="text/javascript">
		$(document).ready(function(){
		$(".fancybox").fancybox({
		openEffect: "none",
		closeEffect: "none"
		});
		
		$(".zoom").hover(function(){
				
				$(this).addClass('transition');
			}, function(){
		
				$(this).removeClass('transition');
			});
		});
	</script>

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