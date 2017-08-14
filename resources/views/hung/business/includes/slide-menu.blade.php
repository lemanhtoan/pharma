<div class="page-header-menu">
		<div class="container">			
			<div class="hor-menu ">
				<ul class="nav navbar-nav">
					<li @if(request()->is('business/listing') || request()->is('business/listing/create') || request()->is('business/listing/update') ) {!! 'class="active"' !!} @endif>
						<a href="{{ route('business.listing') }}" class="tooltips" data-container="body" data-placement="bottom" data-html="true" data-original-title="Business listing">
						Business listing</a>
					</li>
					<li @if(request()->is('business/user/list') ) {!! 'class="active"' !!} @endif>
						<a href="{{ route('business.user') }}" class="tooltips" data-container="body" data-placement="bottom" data-html="true" data-original-title="Users">
						Users</a>
					</li>					
					<li class="menu-dropdown">
						<a href="{{ route('logout') }}" class="tooltips" data-container="body" data-placement="bottom" data-html="true" data-original-title="Logout">
						Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</div>