@if(Auth::guard('company')->check())
<form action="{{route('job.seeker.list')}}" method="get">
    <div class="searchbar">
		<div class="srchbox seekersrch">		
		<div class="input-group">
		  <input type="text"  name="search" id="empsearch" value="{{Request::get('search', '')}}" class="form-control" placeholder="{{__('Enter Skills or Job Seeker Details')}}" autocomplete="off" />
		  <span class="input-group-btn">
			<input type="submit" class="btn" value="{{__('Search Job Seeker')}}">
		  </span>
		</div>
		</div>

        
    </div>
</form>
@else



	
		<div class="searchbar">
			<form action="{{route('job.list')}}" method="get">	
			<div class="input-group">

{{--				{{ \App\CountryDetail::query()->where('sort_name',\Location::get('197.132.80.240')->countryCode )->first()->getCountry('country_id') }}--}}
			<input type="text"  name="search" id="jbsearch" value="{{Request::get('search', '')}}" class="form-control" placeholder="{{__('Enter Skills or job title')}}" autocomplete="off" />
				@if(App::environment('production')){{--production mode --}}
				{!! Form::select('country_id[]', ['' => __('Select Country')]+$countries, \App\CountryDetail::query()->where('sort_name',\Location::get(request()->ip())->countryCode )->first()->getCountry('country_id'), array('class'=>'form-control', 'id'=>'functional_area_id'))  !!}
				@else{{--local mode --}}
				{!! Form::select('country_id[]', ['' => __('Select Country')]+$countries, Request::get('country_id', null), array('class'=>'form-control', 'id'=>'functional_area_id','value'=>'1'  )) !!}
				@endif

				<button type="submit" class="btn"><i class="fas fa-search"></i></button>
			</div>						
			</form>
    		</div>

	
	
	 

@endif