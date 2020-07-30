@extends ('layout')

    @section ('content')

    <div id="wrapper">

        <div 
            id="page" 
            class="container"
        >
            @foreach($artefacts as $artefact)
                <div class="content">
			        <div class="title">
                        <h2>
                            <a href="/artefacts/{{ $artefact->id }}">
                                {{  $artefact->title }}
                            </a>
                        </h2>
                    </div>

			        <p>
                        <img 
                            src="images/banner.jpg" 
                            alt="" 
                            class="image image-full" 
                        /> 
                    </p>
            
                    {!! $artefact->excerpt !!}
                </div>
            @endforeach
	    </div>
    </div>


@endsection