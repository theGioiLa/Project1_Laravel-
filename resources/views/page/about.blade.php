@extends('master')
@section('title', 'About us')
@section('content')
<div class="inner-header">
  <div class="container">
    <div class="pull-left">
      <h6 class="inner-title">Giới thiệu</h6>
    </div>
    <div class="pull-right">
      <div class="beta-breadcrumb font-large">
        <a href="{{route('homepage')}}">Home</a> / <span>Giới thiệu</span>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<div class="container">
  <div id="content">
    <div class="our-history">
      <h2 class="text-center wow fadeInDown">Mốc thời gian</h2>
      <div class="space35">&nbsp;</div>

      <div class="history-slider">
        <div class="history-navigation" style="shape-margin: center">
          <a data-slide-index="0" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">2015</span></a>
          <a data-slide-index="1" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">2016</span></a>
          <a data-slide-index="2" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">2017</span></a>
          <a data-slide-index="3" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">2018</span></a>
  
        </div>


        <div class="history-slides">
          @foreach([1, 1, 1, 1] as $i )
          <div>
            <div class="row">
              <div class="col-sm-5">
                <img src="source/assets/dest/images/history.jpg" alt="">
              </div>
              <div class="col-sm-7">
                <h5 class="other-title">Name</h5>
                <div class="space20">&nbsp;</div>
                <p>VinaCapital strives to provide the highest quality investment products, strategic financing and real estate development services across all major industries in Vietnam.
                Our corporate identity is best summarised by the following two slogans:

                “Taking Vietnam to the world”
                VinaCapital is a leading commercial ambassador for Vietnam, promoting trade and investment in Vietnam with partners around the world. We work to ensure existing and potential investors are aware of and accurately understand the nature of Vietnam’s investment opportunities.

                “A Catalyst for growth”
                VinaCapital is a catalyst supporting Vietnam’s economic development. We help introduce new ideas, approaches, products and technologies into Vietnam while providing the leadership and management support necessary to ensure international standards are successfully merged with the dynamism and entrepreneurial spirit that are the hallmark of Vietnam’s business culture.</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>

      <div class="space50">&nbsp;</div>
      <hr />
      <div class="space50">&nbsp;</div>
      {{-- <h2 class="text-center wow fadeInDown">Our Passion for What We Do Transfers Into Our Services</h2>
      <div class="space20">&nbsp;</div>
      <p class="text-center wow fadeInLeft">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<br /> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
      <div class="space35">&nbsp;</div>

      <div class="row">
        <div class="col-sm-2 col-sm-push-2">
          <div class="beta-counter">
            <p class="beta-counter-icon"><i class="fa fa-user"></i></p>
            <p class="beta-counter-value timer numbers" data-to="19855" data-speed="2000">19855</p>
            <p class="beta-counter-title">Clients Satisfied</p>
          </div>
        </div>

        <div class="col-sm-2 col-sm-push-2">
          <div class="beta-counter">
            <p class="beta-counter-icon"><i class="fa fa-picture-o"></i></p>
            <p class="beta-counter-value timer numbers" data-to="3568" data-speed="2000">3568</p>
            <p class="beta-counter-title">Amazing Works</p>
          </div>
        </div>

        <div class="col-sm-2 col-sm-push-2">
          <div class="beta-counter">
            <p class="beta-counter-icon"><i class="fa fa-clock-o"></i></p>
            <p class="beta-counter-value timer numbers" data-to="258934" data-speed="2000">258934</p>
            <p class="beta-counter-title">Support Hours</p>
          </div>
        </div>

        <div class="col-sm-2 col-sm-push-2">
          <div class="beta-counter">
            <p class="beta-counter-icon"><i class="fa fa-pencil"></i></p>
            <p class="beta-counter-value timer numbers" data-to="150" data-speed="2000">150</p>
            <p class="beta-counter-title">New Projects</p>
          </div>
        </div>
      </div> <!-- .beta-counter block end -->

      <div class="space50">&nbsp;</div>
      <hr />
      <div class="space50">&nbsp;</div>

      <h2 class="text-center wow fadeInDownwow fadeInDown">Our Amaizing Team</h2>
      <div class="space20">&nbsp;</div>
      <h5 class="text-center other-title wow fadeInLeft">Founders</h5>
      <p class="text-center wow fadeInRight">Nemo enims voluptatem quia volupas sit aspe aut odit aut fugit, sed quia <br />consequuntur magni dolores.</p>
      <div class="space20">&nbsp;</div>
      <div class="row">
        <div class="col-sm-6 wow fadeInLeft">
          <div class="beta-person media">

            <img class="pull-left" src="source/assets/dest/images/person2.jpg" alt="">

            <div class="media-body beta-person-body">
              <h5>Bob Robertson</h5>
              <p class="font-large">Founder</p>
              <p>Nemo enim ipsam voluptatem quia voluptas sit asatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque por quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam.</p>
              <a href="single_type_gallery.html">View projects <i class="fa fa-chevron-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-sm-6 wow fadeInRight">
          <div class="beta-person media ">

            <img class="pull-left" src="source/assets/dest/images/person3.jpg" alt="">

            <div class="media-body beta-person-body">
              <h5>Mike Greenwood</h5>
              <p class="font-large">Founder</p>
              <p>Nemo enim ipsam voluptatem quia voluptas sit asatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque por quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam.</p>
              <a href="single_type_gallery.html">View projects <i class="fa fa-chevron-right"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="space60">&nbsp;</div>
      <h5 class="text-center other-title wow fadeInDown">The Best of Professionals</h5>
      <p class="text-center wow fadeInUp">Nemo enims voluptatem quia volupas sit aspe aut odit aut fugit, sed quia <br />consequuntur magni dolores.</p>
      <div class="space20">&nbsp;</div>
      <div class="row">
        <div class="col-sm-3">
          <div class="beta-person beta-person-full">
            <div class="bets-img-hover">
              <img src="source/assets/dest/images/person1.jpg" alt="">
            </div>
            <div class="beta-person-body">
              <h5>Mark Priston</h5>
              <p class="font-large">Web developer</p>
              <p>Nemo enims voluptatem quia volupas sit aspe aut odit aut fugit, sed quia consequuntur magni dolores.</p>
              <a href="single_type_gallery.html">View projects <i class="fa fa-chevron-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="beta-person beta-person-full">
            <div class="bets-img-hover">
              <img src="source/assets/dest/images/person2.jpg" alt="">
            </div>
            <div class="beta-person-body">
              <h5>Bob Robertson</h5>
              <p class="font-large">Web developer</p>
              <p>Nemo enims voluptatem quia volupas sit aspe aut odit aut fugit, sed quia consequuntur magni dolores.</p>
              <a href="single_type_gallery.html">View projects <i class="fa fa-chevron-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="beta-person beta-person-full">
            <div class="bets-img-hover">
              <img src="source/assets/dest/images/person3.jpg" alt="">
            </div>
            <div class="beta-person-body">
              <h5>Mike Greenwood</h5>
              <p class="font-large">Web developer</p>
              <p>Nemo enims voluptatem quia volupas sit aspe aut odit aut fugit, sed quia consequuntur magni dolores.</p>
              <a href="single_type_gallery.html">View projects <i class="fa fa-chevron-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="beta-person beta-person-full">
            <div class="bets-img-hover">
              <img src="source/assets/dest/images/person4.jpg" alt="">
            </div>
            <div class="beta-person-body">
              <h5>David Black</h5>
              <p class="font-large">Web developer</p>
              <p>Nemo enims voluptatem quia volupas sit aspe aut odit aut fugit, sed quia consequuntur magni dolores.</p>
              <a href="single_type_gallery.html">View projects <i class="fa fa-chevron-right"></i></a>
            </div>
          </div>
        </div>
      </div> --}}
    </div> <!-- #content -->
  </div> <!-- .container -->
 
@stop