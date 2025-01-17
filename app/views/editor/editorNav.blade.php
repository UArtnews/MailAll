<nav class="navbar navbar-default navbar-fixed-top" role="navigation"><!-- navbar-fixed-top -->
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#editor-nav-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a id="navbar-brand-link" class="navbar-brand" href="{{URL::to('edit/'.$instanceName)}}">{{ucfirst($instanceName)}}</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="editor-nav-collapse">
            <!-- Main Tab Links -->
            <ul class="nav navbar-nav">
				<li @if($action == 'home')class="active"@endif >
                <a id="images-nav-link" href="{{URL::to('/editors')}}"><span class="glyphicon glyphicon-home"></span> Home
					</a>
                </li>
                <li @if($action == 'articles')class="active"@endif >
                <a id="articles-nav-link" href="{{URL::to('edit/'.$instanceName.'/articles')}}">
                    <span class="glyphicon glyphicon-file"></span>&nbsp&nbspArticles
                </a>
                </li>
                @if(isset($tweakables['global-accepts-submissions']) && $tweakables['global-accepts-submissions'] = 1)
                <li @if($action == 'submissions')class="active"@endif >
                <a id="submissions-nav-link" href="{{URL::to('edit/'.$instanceName.'/submissions')}}">
                    <span class="glyphicon glyphicon-inbox"></span>
                    &nbsp;&nbsp;Submissions
                </a>
                </li>
                @endif
                <li @if($action == 'publications')class="active"@endif >
                <a id="publications-nav-link" href="{{URL::to('edit/'.$instanceName.'/publications')}}">
                    <span class="glyphicon glyphicon-book"></span>
                    &nbsp;&nbsp;Publications
                </a>
                </li>
                <li @if($action == 'images')class="active"@endif >
                <a id="images-nav-link" href="{{URL::to('edit/'.$instanceName.'/images')}}">
                    <span class="glyphicon glyphicon-picture"></span>
                    &nbsp;&nbsp;Images
                </a>
                </li>
				<!-- +++++++++++++++++++++SUPPORT MENU++++++++++++++++++++++++++++++ -->			  
				<li @if($action == 'settings')class="active"@endif >
					<a class="dropdown-toggle"  data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-info-sign"></span>&nbsp; Support
					<span class="caret"></span></a>
    				<ul class="dropdown-menu">
						@if(Auth::user()->isAdmin($instance->id))
      					<li><a id="settings-nav-link" href="{{URL::to('edit/'.$instanceName.'/settings')}}">
							<span class="glyphicon glyphicon-wrench"></span>
							&nbsp;&nbsp;Settings</a></li>
      					<li><a id="help-nav-link" href="{{URL::to('show/'.$instanceName.'/publicationLogs/')}}">
								<i class="glyphicon glyphicon-dashboard"></i>
								&nbsp;&nbsp; Log</a></li>
						@endif
						<li @if($action == 'help')class="active"@endif >
							<a id="help-nav-link" href="{{URL::to('edit/'.$instanceName.'/help')}}">
								<span class="glyphicon glyphicon-question-sign"></span>
								&nbsp;&nbsp;Help</a></li>
    				</ul> 				
				</li>			
				<!-- +++++++++++++++++++++SUPPORT MENU++++++++++++++++++++++++++++++ -->			
                
            </ul><!-- End Main Tab Links -->

            <!-- Greater Than 1200px Right Hand Nav -->
            <ul class="visible-lg nav navbar-nav navbar-right">
                <form id="searchForm" class="visible-lg navbar-form navbar-right" role="search" method="GET" action="{{ URL::to("edit/$instanceName/search/everything") }}" >
                <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="Search" size="8">
                </div>
                <button type="submit" class="btn btn-default">Go</button>
                </form>
                @if(isset($cart))
                <li>
                    <a id="article-cart-btn" href="#" data-toggle="modal" data-target="#cartModal">
                        <span class="glyphicon glyphicon-shopping-cart"></span>
                        &nbsp;Cart&nbsp;
                        <span class="badge cartCountBadge" style="background-color:#428bca;">{{ count($cart) }}</span>
                    </a>
                </li>
                @else
                <li>
                    <a id="article-cart-btn" href="#" data-toggle="modal" data-target="#cartModal">
                        <span class="glyphicon glyphicon-shopping-cart"></span>
                        &nbsp;Cart&nbsp;
                        <span class="badge cartCountBadge" style="background-color:#428bca;">0</span>
                    </a>
                </li>
                @endif
                <li class="dropdown">
                    <a href="#" id="SearchType" class="dropdown-toggle" data-toggle="dropdown">
                       <span class="glyphicon glyphicon-search" aria-hidden="true"></span> All <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#" onclick="$('#SearchType').text('Search Articles');$('#searchForm').attr('action','{{ URL::to("edit/$instanceName/search/articles") }}');" >
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Articles
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="$('#SearchType').text('Search Publications');$('#searchForm').attr('action','{{ URL::to("edit/$instanceName/search/publications") }}');" >
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Publications
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="$('#SearchType').text('Search Images');$('#searchForm').attr('action','{{ URL::to("edit/$instanceName/search/images") }}');">
                          <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Images
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="$('#SearchType').text('Search Everything');$('#searchForm').attr('action','{{ URL::to("edit/$instanceName/search/everything") }}');" >
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span> All
                            </a>
                        </li>
                    </ul>
                </li>	
            </ul>

            <!-- Less Than 1200px Right Hand Nav -->
            <ul class="hidden-lg nav navbar-nav navbar-left">
                <form id="searchForm" class="hidden-lg navbar-form navbar-right" role="search" action="{{ URL::to("edit/$instanceName/search/everything") }}" method="GET" >
                <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="Search" size="8">
                </div>
                <button type="submit" class="btn btn-default">Go</button>
                </form>
                @if(isset($cart))
                <li>
                    <a href="#" data-toggle="modal" data-target="#cartModal">
                        <span class="glyphicon glyphicon-shopping-cart"></span>
                        &nbsp;Article Cart&nbsp;
                        <span class="badge cartCountBadge" style="background-color:#428bca;">{{ count($cart) }}</span>
                    </a>
                </li>
                @else
                <li>
                    <a href="#" data-toggle="modal" data-target="#cartModal">
                        <span class="glyphicon glyphicon-shopping-cart"></span>
                        &nbsp;Article Cart&nbsp;
                        <span class="badge cartCountBadge" style="background-color:#428bca;">0</span>
                    </a>
                </li>
                @endif
                <li class="dropdown">
                    <a href="#" id="SearchType" class="dropdown-toggle" data-toggle="dropdown">
                       <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Everything <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#" onclick="$('#SearchType').text('Search Articles');$('#searchForm').attr('action','{{ URL::to("edit/$instanceName/search/articles") }}');">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Articles
                            </a>
                        </li>
                        <li><a href="#" onclick="$('#SearchType').text('Search Publications');$('#searchForm').attr('action','{{ URL::to("edit/$instanceName/search/publications") }}');">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Publications
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="$('#SearchType').text('Search Images');$('#searchForm').attr('action','{{ URL::to("edit/$instanceName/search/images") }}');">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Images
                            </a>
                        </li>
                        <li><a href="#" onclick="$('#SearchType').text('Search Everything');$('#searchForm').attr('action','{{ URL::to("edit/$instanceName/search/everything") }}');">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span> All
                            </a>
                        </li>
                    </ul>
                </li>	
            </ul>
			<ul class="hidden-lg nav navbar-nav navbar-right">

         		<li @if($action == 'help')class="active"@endif >
					<a id="help-nav-link" href="{{URL::to('edit/'.$instanceName.'/help')}}">
						<span class="glyphicon glyphicon-question-sign"></span>
						&nbsp;&nbsp;Help
					</a>
                </li>

			</ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<div style="height: 60px; widht: 60px"></div>