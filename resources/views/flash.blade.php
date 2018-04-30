@if(Session::has('success'))
		<div class="alert alert-success" role="alert" align="center">
			<strong>{{ Session::get('success') }}</strong> 
		</div>


@endif

@if(count($errors) > 0)
		<div class="alert alert-danger" role="alert" align="center">
                <strong>Title of community is taked or max length of fields limited</strong>

		</div>
@endif