@extends('main-layout')

@section('content')

        <div class="col-md-12">
            <div class="tabs">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#day" data-toggle="tab" name_stats_link="day" onClick="return get_stats_tab_content(this);">По дням</a>
                    </li>
                    <li>
                        <a href="#hour" data-toggle="tab" name_stats_link="hour" onClick="return get_stats_tab_content(this);">По часам</a>
                    </li>
                    <li >
                        <a href="#stream" data-toggle="tab" name_stats_link="stream" onClick="return get_stats_tab_content(this);">По потокам</a>
                    </li>  
                    <li>
                        <a href="#operator" data-toggle="tab" name_stats_link="operator" onClick="return get_stats_tab_content(this);"></i>По операторам</a>
                    </li>
                    <li>
                        <a href="#os" data-toggle="tab" name_stats_link="os" onClick="return get_stats_tab_content(this);">По ОС</a>
                    </li>
                    <li>
                        <a href="#browser" data-toggle="tab" name_stats_link="browser" onClick="return get_stats_tab_content(this);">По браузерам</a>
                    </li>
                    <li>
                        <a href="#device_model" data-toggle="tab" name_stats_link="device_model" onClick="return get_stats_tab_content(this);">По устройствам</a>
                    </li>
                    {{--
                    <li>
                        <a href="#agregator" data-toggle="tab" name_stats_link="agregator" onClick="return get_stats_tab_content(this);">По агрегаторам</a>
                    </li>
                    --}}
                    <li>
                        <a href="#country" data-toggle="tab" name_stats_link="country" onClick="return get_stats_tab_content(this);">По странам</a>
                    </li>
                    <li>
                        <a href="#category_land" data-toggle="tab" name_stats_link="category_land" onClick="return get_stats_tab_content(this);">По категориям</a>
                    </li>
                    <li>
                        <a href="#land" data-toggle="tab" name_stats_link="land" onClick="return get_stats_tab_content(this);">По лендингам</a>
                    </li>
                    <li>
                        <a href="#subscribe" data-toggle="tab" name_stats_link="subscribe" onClick="return get_stats_tab_content(this);">По подпискам</a>
                    </li>
                    
                </ul>
                <div class="tab-content">
                    <div id="day" class="tab-pane active">                     

                    </div>   
                    <div id="hour" class="tab-pane">                     

                    </div>
                    <div id="stream" class="tab-pane ">

                    </div>
                    <div id="operator" class="tab-pane">

                    </div>
                    <div id="os" class="tab-pane">

                    </div>
                    <div id="browser" class="tab-pane">

                    </div>

                    <div id="device_model" class="tab-pane">

                    </div>
                    {{--
                    <div id="agregator" class="tab-pane">                     

                    </div>
                    --}}
                    <div id="country" class="tab-pane">                     

                    </div>

                    <div id="category_land" class="tab-pane">                     

                    </div>

                    <div id="land" class="tab-pane">                     

                    </div>
                    
                    <div id="subscribe" class="tab-pane">                     

                    </div>
                </div>
            </div>
        </div>        
    </div>
@endsection