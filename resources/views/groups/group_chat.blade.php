
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Marble &mdash; Free HTML5 Bootstrap Website Template by FreeHTML5.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

  	<!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FreeHTML5.co
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	-->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="../favicon.ico">

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="../../../css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="../../../css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="../../../css/bootstrap.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="../../../css/flexslider.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="../../../css/style.css">

	<!-- Modernizr JS -->
	<script src="../../../js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="../../../js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
	<div id="fh5co-page">
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
		<aside id="fh5co-aside" role="complementary" class="border js-fullheight">

			<h1 id="fh5co-logo"><a href="/">Hackathon</a></h1>
			<nav id="fh5co-main-menu" role="navigation">
				<ul>
					<li><a href="/">MY PAGE</a></li>
					<li><a href="/groups">CATEGORY</a></li>
					<li><a href="/groups/create">CREATE GROUP</a></li>
					<li><a href="/logout">LOG OUT</a></li>
				</ul>
			</nav>
		</aside>

		<div id="fh5co-main">
			<aside class="col-xs-4 js-fullheight"> 
             <div class="panel panel-default"> 
                 <div class="panel-heading"> 
                     <h3 class="panel-title">{{ $group->groupname }}</h3> 
                 </div> 
                 <div class="panel-body"> 
                 	<img class="media-object img-rounded img-responsive" src="{{ asset('storage/images/' . $group->group_picture) }}" alt="写真を挿入">
                </div> 
                
                <ul style="list-style:none">
                	<li>＜カテゴリー名＞</li>
                	<li>{{ $group->category }}</li>
                	<li>＜開催日＞</li>
                	<li>{{ $group->date }}</li> 
                	<li>＜説明＞</li>
                	<li>{{ $group->description }}</li>
                	<li>＜オーガナイザー＞</li> 
                	<li>{!! link_to_route('tanins.show',$organizer->nickname, ['id' => $organizer->id]) !!}</li>
                	<div class="edit">
            		 @if(Auth::user()->id == $organizer->id)
                	<li style="float:right"><a href="/groups/{{$group->id}}/edit"><img src="{{ asset('images/EDIT.png')}}" alt="おらんでい"></img></a></li>
            		 @endif
            		</div>
                </ul>
                
                 
                	
             </div> 
             <div class="col-xs-6">
            @include('participate.join_button', ['user' => $user])
            </div>
            <div class="col-xs-6">
        	@include('groups.favorite_button', ['groups' => $group]) 
             </div>
            
             
             
         </aside>
          <div class="col-xs-8"> 
          </div>
          
          <div class="col-xs-8">
             <ul class="nav nav-tabs nav-justified"> 
                <li role="presentation" class="{{ Request::is('participation/*/participants') ? 'active' : '' }}"><a href="{{ route('groups.show', ['id' => $user->id]) }}">参加者</a></li>
                <li role="presentation" class="{{ Request::is('groups/*/chat') ? 'active' : '' }}"><a href="{{ route('groups.chat', ['id' => $user->id]) }}">CHAT</a></li>
             </ul>
           
           	<div class="fh5co-narrow-content animate-box" data-animate-effect="fadeInLeft">
					
					{!! Form::open(['route' => ['chats.store', $group->id],'method' => 'post'])!!}
					<div class="row">
						<div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group1">
										{!! Form::textarea('chat', old('chat'), ['class' => 'form-control', 'rows' => '4', 'placeholder'=>"Say something"]) !!} 
									</div>
									<div class="form-group2">
										{!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!} 
									</div>
								</div>
							</div>
						</div>
					</div>
				 {!! Form::close() !!}
			</div>
           
             
             @foreach ($chats as $chat) 
             <div class="media-body"> 
             	<div> 
                	 {!! link_to_route('tanins.show', $chat->user->nickname, ['id' => $chat->user_id]) !!} <span class="text-muted">posted at {{ $chat->created_at }}</span> 
               	</div> 
              
             	<div> 
                	 <p>{!! nl2br(e($chat->chat)) !!}</p> 
                  	@if (Auth::user()->id == $chat->user_id)
                    	{!! Form::open(['route' => ['chats.destroy', $chat->id], 'method' => 'delete']) !!}
                        	{!! Form::submit('Delete', ['class' => 'btna btn-danger btn-xs-1']) !!}
                    	{!! Form::close() !!}
                	@endif
             	</div> 
             @endforeach 
         	</div> 
         </div>
	</div>

	<!-- jQuery -->
	<script src="../../../js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="../../../js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="../../../js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="../../../js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="../../../js/jquery.flexslider-min.js"></script>
	
	
	<!-- MAIN JS -->
	<script src="../../../js/main.js"></script>

	</body>
</html>
