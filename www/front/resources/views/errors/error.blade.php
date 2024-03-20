<div class="row">
	<div class="col-xs-12 col-md-12 col-lg-12">
		@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
	</div>
</div>
