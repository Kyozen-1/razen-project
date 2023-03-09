@extends('landing-page-razen-project.layouts.app')

@section('content')
<section class="bg-overlay bg-overlay-gradient pb-0">
	<div class="bg-section" >
		<img src="assets/images/page-title/2.jpg" alt="Background"/>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="page-title title-1 text-center">
					<div class="title-bg">
						<h2>Our Projects</h2>
					</div>
					<ol class="breadcrumb">
						<li>
							<a href="index.html">Home</a>
						</li>
						<li class="active">Projects fullwidth - 4 column</li>
					</ol>
				</div>
				<!-- .page-title end -->
			</div>
			<!-- .col-md-12 end -->
		</div>
		<!-- .row end -->
	</div>
	<!-- .container end -->
</section>

<!-- Projects Section
============================================= -->
<section id="projects" class="projects-fullwidth projects-4col">
	<div class="container-fluid">
		<div class="row">
			<!-- Projects Filter
			============================================= -->
			<div class="col-xs-12 col-sm-12 col-md-12 projects-filter">
				<ul class="list-inline">
					<li>
						<a class="active-filter" href="#" data-filter="*">All Projects</a>
					</li>
					<li>
						<a href="#" data-filter=".interior">Interior</a>
					</li>
					<li>
						<a href="#" data-filter=".renovation">Renovation</a>
					</li>
					<li>
						<a href="#" data-filter=".architecture">Architecture</a>
					</li>
					<li>
						<a href="#" data-filter=".landscaping">Landscaping</a>
					</li>
					<li>
						<a href="#" data-filter=".gardening">Gardening</a>
					</li>
				</ul>
			</div>
			<!-- .projects-filter end -->
		</div>
		<!-- .row end -->

		<!-- Projects Item
		============================================= -->
		<div id="projects-all" class="row">

			<!-- Project Item #1 -->
			<div class="col-xs-12 col-sm-6 col-md-4 project-item interior gardening">
				<div class="project-img">
					<img class="img-responsive" src="assets/images/projects/grid2/4.jpg" alt="interior"/>
					<div class="project-hover">
						<div class="project-meta">
							<h6>Interior</h6>
							<h4>
								<a href="#">New Office Room</a>
							</h4>
						</div>
						<div class="project-zoom">
							<a class="img-popup" href="assets/images/projects/full/4.jpg" title="New Office Room"><i class="fa fa-plus"></i></a>
						</div>
					</div>
					<!-- .project-hover end -->
				</div>
				<!-- .project-img end -->

			</div>
			<!-- .project-item end -->

			<!-- Project Item #2 -->
			<div class="col-xs-12 col-sm-6 col-md-4 project-item renovation landscaping">
				<div class="project-img">
					<img class="img-responsive" src="assets/images/projects/grid2/1.jpg" alt="interior"/>
					<div class="project-hover">
						<div class="project-meta">
							<h6>Interior</h6>
							<h4>
								<a href="#">New Office Room</a>
							</h4>
						</div>
						<div class="project-zoom">
							<a class="img-popup" href="assets/images/projects/full/1.jpg" title="New Office Room"><i class="fa fa-plus"></i></a>
						</div>
					</div>
					<!-- .project-hover end -->
				</div>
				<!-- .project-img end -->

			</div>
			<!-- .project-item end -->

			<!-- Project Item #3 -->
			<div class="col-xs-12 col-sm-6 col-md-4 project-item interior landscaping">
				<div class="project-img">
					<img class="img-responsive" src="assets/images/projects/grid2/2.jpg" alt="interior"/>
					<div class="project-hover">
						<div class="project-meta">
							<h6>Interior</h6>
							<h4>
								<a href="#">New Office Room</a>
							</h4>
						</div>
						<div class="project-zoom">
							<a class="img-popup" href="assets/images/projects/full/2.jpg" title="New Office Room"><i class="fa fa-plus"></i></a>
						</div>
					</div>
					<!-- .project-hover end -->
				</div>
				<!-- .project-img end -->

			</div>
			<!-- .project-item end -->

			<!-- Project Item #4 -->
			<div class="col-xs-12 col-sm-6 col-md-4 project-item architecture">
				<div class="project-img">
					<img class="img-responsive" src="assets/images/projects/grid2/3.jpg" alt="interior"/>
					<div class="project-hover">
						<div class="project-meta">
							<h6>Interior</h6>
							<h4>
								<a href="#">New Office Room</a>
							</h4>
						</div>
						<div class="project-zoom">
							<a class="img-popup" href="assets/images/projects/full/3.jpg" title="New Office Room"><i class="fa fa-plus"></i></a>
						</div>
					</div>
					<!-- .project-hover end -->
				</div>
				<!-- .project-img end -->

			</div>
			<!-- .project-item end -->

			<!-- Project Item #5 -->
			<div class="col-xs-12 col-sm-6 col-md-4 project-item interior">
				<div class="project-img">
					<img class="img-responsive" src="assets/images/projects/grid2/5.jpg" alt="interior"/>
					<div class="project-hover">
						<div class="project-meta">
							<h6>Interior</h6>
							<h4>
								<a href="#">New Office Room</a>
							</h4>
						</div>
						<div class="project-zoom">
							<a class="img-popup" href="assets/images/projects/full/5.jpg" title="New Office Room"><i class="fa fa-plus"></i></a>
						</div>
					</div>
					<!-- .project-hover end -->
				</div>
				<!-- .project-img end -->

			</div>
			<!-- .project-item end -->

			<!-- Project Item #6 -->
			<div class="col-xs-12 col-sm-6 col-md-4 project-item interior">
				<div class="project-img">
					<img class="img-responsive" src="assets/images/projects/grid2/6.jpg" alt="interior"/>
					<div class="project-hover">
						<div class="project-meta">
							<h6>Interior</h6>
							<h4>
								<a href="#">New Office Room</a>
							</h4>
						</div>
						<div class="project-zoom">
							<a class="img-popup" href="assets/images/projects/full/6.jpg" title="New Office Room"><i class="fa fa-plus"></i></a>
						</div>
					</div>
					<!-- .project-hover end -->
				</div>
				<!-- .project-img end -->

			</div>
			<!-- .project-item end -->

			<!-- Project Item #7 -->
			<div class="col-xs-12 col-sm-6 col-md-4 project-item interior">
				<div class="project-img">
					<img class="img-responsive" src="assets/images/projects/grid2/7.jpg" alt="interior"/>
					<div class="project-hover">
						<div class="project-meta">
							<h6>Interior</h6>
							<h4>
								<a href="#">New Office Room</a>
							</h4>
						</div>
						<div class="project-zoom">
							<a class="img-popup" href="assets/images/projects/full/7.jpg" title="New Office Room"><i class="fa fa-plus"></i></a>
						</div>
					</div>
					<!-- .project-hover end -->
				</div>
				<!-- .project-img end -->

			</div>
			<!-- .project-item end -->

			<!-- Project Item #8 -->
			<div class="col-xs-12 col-sm-6 col-md-4 project-item architecture">
				<div class="project-img">
					<img class="img-responsive" src="assets/images/projects/grid2/8.jpg" alt="interior"/>
					<div class="project-hover">
						<div class="project-meta">
							<h6>Interior</h6>
							<h4>
								<a href="#">New Office Room</a>
							</h4>
						</div>
						<div class="project-zoom">
							<a class="img-popup" href="assets/images/projects/full/8.jpg" title="New Office Room"><i class="fa fa-plus"></i></a>
						</div>
					</div>
					<!-- .project-hover end -->
				</div>
				<!-- .project-img end -->

			</div>
			<!-- .project-item end -->

			<!-- Project Item #9 -->
			<div class="col-xs-12 col-sm-6 col-md-4 project-item interior">
				<div class="project-img">
					<img class="img-responsive" src="assets/images/projects/grid2/5.jpg" alt="interior"/>
					<div class="project-hover">
						<div class="project-meta">
							<h6>Interior</h6>
							<h4>
								<a href="#">New Office Room</a>
							</h4>
						</div>
						<div class="project-zoom">
							<a class="img-popup" href="assets/images/projects/full/5.jpg" title="New Office Room"><i class="fa fa-plus"></i></a>
						</div>
					</div>
					<!-- .project-hover end -->
				</div>
				<!-- .project-img end -->

			</div>
			<!-- .project-item end -->
		</div>
		<!-- .row end -->
	</div>
	<!-- .container end -->
</section>
@endsection
