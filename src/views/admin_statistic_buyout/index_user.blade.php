@extends('main-layout')

@section('content')

        <div class="col-md-12">
            <div class="tabs">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#subscribe" data-toggle="tab" name_stats_link="subscribe" onClick="return get_stats_tab_content(this);">По подпискам</a>
                    </li>
                    
                </ul>
                <div class="tab-content">
                    <div id="subscribe" class="tab-pane active">                     

                    </div>                
                </div>
            </div>
        </div>        
    </div>
@endsection