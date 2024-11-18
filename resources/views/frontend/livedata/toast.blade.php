    {{-- toast --}}
    {{-- @dd($arg,$args,'Filter',$filter,'Filterby',$filterby,'Filterby1',$filterby1,'Filterby2',$filterby2,$filterdata1,$searchDetails1) --}}
    {{-- @dd($arg,$args,'Filterby',$filterby,$filterby1,$filterdata1,$searchDetails1) --}}

 {{-- toast --}}
<section class="d-flex flex-wrap p-4">
    @php
      $filterdata = str_replace(" ","-",$filterdata);
      $filterdata1 = str_replace(" ","-",$filterdata1);
    @endphp
    {{-- old args 5 --}}
    {{-- @dd('Args',$args,'Arg',$arg,$filterby1) --}}
    @if (isset($args) && is_array($args) && count($args) == 6)
        @if ($filterby == 'hs_code')
            {{-- HS Code Toast --}}

        @elseif($filterby == 'country')
            {{-- Country Toast --}}
            <div id="toast-country" class="toast align-items-center text-white bg-primary border-0 p-2 me-3 my-2 show" role="alert" aria-live="assertive" aria-atomic="true"
                data-filter-type="{{$filterby}}" data-filter-value="{{ $filterdata1 }}">
                <div class="d-flex">
                    <div class="toast-body">
                        <h5>{{ $filterdata1 }}</h5>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @else
            {{-- Default Toast --}}
            <div id="toast-default" class="toast align-items-center text-white bg-primary border-0 p-2 me-3 my-2 show" role="alert" aria-live="assertive" aria-atomic="true"
                data-filter-type="{{$filterby}}" data-filter-value="{{ $filterdata1 }}">
                <div class="d-flex">
                    <div class="toast-body">
                        <h5>{{ $filterdata1 }}</h5>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @endif
        {{-- old args 7 --}}
    @elseif(isset($args) && is_array($args) && count($args) == 8)
        @if (is_numeric($searchDetails1))
            @if($filterby1 == 'country')
                @php
                    $filter_by = $filterby1;
                @endphp
                <div id="toast-country-1" class="toast align-items-center text-white bg-primary border-0 p-2 me-3 my-2 show" role="alert" aria-live="assertive" aria-atomic="true"
                    data-filter-type="{{$filterby1}}"
                    data-filter-value="{{ $filterdata1 }}"
                    data-type = "{{$type}}"
                    data-role = "{{$role}}"
                    base-search  = "{{$searchDetails1}}"
                    search-country = "{{$search_country}}"
                    >
                    <div class="d-flex">
                        <div class="toast-body">

                            <h5>{{ $filterdata1 }}</h5>
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            @else
                @php
                    $filter_by = $filterby1;
                @endphp
                <div id="toast-default-1" class="toast align-items-center text-white bg-primary border-0 p-2 me-3 my-2 show" role="alert" aria-live="assertive" aria-atomic="true"
                    data-filter-type="{{$filterby1}}"
                    data-filter-value="{{ $filterdata1 }}"
                    data-type = "{{$type}}"
                    data-role = "{{$role}}"
                    base-search  = "{{$searchDetails1}}"
                    search-country = "{{$search_country}}"
                    >
                    <div class="d-flex">
                        <div class="toast-body">
                            <h5>{{ $filterdata1 }}</h5>
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            @endif
        @else
            @if ($filterby1 == 'hs_code')
                {{-- @dd($filterby1,$type,$role) --}}
                <div id="toast-hs_code-1" class="toast align-items-center text-white bg-primary border-0 p-2 me-3 my-2 show" role="alert" aria-live="assertive" aria-atomic="true"
                    section_type = "{{$section_type}}"
                    data-filter-type ="{{$filterby1}}"
                    data-filter-value ="{{ $filterdata1 }}"
                    data-type = "{{$type}}"
                    data-role = "{{$role}}"
                    base-search    = "{{$searchDetails1}}"
                    search-country = "{{$search_country}}"
                    >
                    <div class="d-flex">
                        <div class="toast-body">
                            <h5>{{ $filterdata1 }}</h5>
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            @elseif($filterby1 == 'country')
                <div id="toast-country-1" class="toast align-items-center text-white bg-primary border-0 p-2 me-3 my-2 show" role="alert" aria-live="assertive" aria-atomic="true"
                    section_type = "{{$section_type}}"
                    data-filter-type ="{{$filterby1}}"
                    data-filter-value ="{{ $filterdata1 }}"
                    data-type = "{{$type}}"
                    data-role = "{{$role}}"
                    base-search  = "{{$searchDetails1}}"
                    search-country = "{{$search_country}}">
                    <div class="d-flex">
                        <div class="toast-body">
                            <h5>{{ $filterdata1 }}</h5>
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            @else
                <div id="toast-default-1" class="toast align-items-center text-white bg-primary border-0 p-2 me-3 my-2 show" role="alert" aria-live="assertive" aria-atomic="true"
                    section_type = "{{$section_type}}"
                    data-filter-type ="{{$filterby1}}"
                    data-filter-value="{{ $filterdata1 }}"
                    data-type = "{{$type}}"
                    data-role = "{{$role}}"
                    base-search  = "{{$searchDetails1}}"
                    search-country = "{{$search_country}}"
                >
                    <div class="d-flex">
                        <div class="toast-body">
                            <h5>{{ $filterdata1 }}</h5>
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            @endif
        @endif
        {{-- old args 9 --}}
    @elseif(isset($args) && is_array($args) && count($args)== 10)
        @if (is_numeric($searchDetails1))
            @if($filterby1 == 'country')
                <div id="toast-country-2" class="toast align-items-center text-white bg-primary border-0 p-2 me-3 my-2 show" role="alert" aria-live="assertive" aria-atomic="true"
                 data-filter-type1="{{$filterby}}" data-filter-value1="{{ $filterdata }}"
                    data-type = "{{$type}}"
                    data-role = "{{$role}}"
                >
                    <div class="d-flex">
                        <div class="toast-body">
                        <h5>
                            {{$filterdata}}
                        </h5>
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
                <div id="toast-country-3" class="toast align-items-center text-white bg-primary border-0 p-2 me-3 my-2 show" role="alert" aria-live="assertive" aria-atomic="true"
                 data-filter-type1="{{$filterby1}}" data-filter-value1="{{ $filterdata1 }}"
                >
                    <div class="d-flex">
                        <div class="toast-body">
                        <h5>
                            {{$filterdata1}}
                        </h5>
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            @elseif($filterby1 == 'port')

                <div id="toast-default-2" class="toast align-items-center text-white bg-primary border-0 p-2 me-3 my-2 show" role="alert" aria-live="assertive" aria-atomic="true"
                 data-filter-type1="{{$filterby}}" data-filter-value1="{{ $filterdata }}"
                 data-type = "{{$type}}"
                 data-role = "{{$role}}"
                >
                    <div class="d-flex">
                        <div class="toast-body">
                            <h5>
                                {{$filterdata}}
                            </h5>
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
                <div id="toast-default-3" class="toast align-items-center text-white bg-primary border-0 p-2 me-3 my-2 show" role="alert" aria-live="assertive" aria-atomic="true"
                data-filter-type1="{{$filterby1}}" data-filter-value1="{{ $filterdata1 }}"
                >
                    <div class="d-flex">
                        <div class="toast-body">
                        <h5>
                            {{$filterdata1}}
                        </h5>
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            @endif
        @else
            @if($filterby1 == 'country')
                <div id="toast-country-2" class="toast align-items-center text-white bg-primary border-0 p-2 me-3 my-2 show" role="alert" aria-live="assertive" aria-atomic="true"
                 data-filter-type1="{{$filterby}}" data-filter-value1="{{ $filterdata }}"
                    data-type = "{{$type}}"
                    data-role = "{{$role}}"
                >
                    <div class="d-flex">
                        <div class="toast-body">
                        <h5>
                            {{$filterdata}}
                        </h5>
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
                <div id="toast-country-3" class="toast align-items-center text-white bg-primary border-0 p-2 me-3 my-2 show" role="alert" aria-live="assertive" aria-atomic="true"
                 data-filter-type1="{{$filterby1}}" data-filter-value1="{{ $filterdata1 }}"
                 data-type = "{{$type}}"
                 data-role = "{{$role}}"
                >
                    <div class="d-flex">
                        <div class="toast-body">
                        <h5>
                            {{$filterdata1}}
                        </h5>
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            @elseif (($filterby1 == 'port'))
                <div id="toast-default-2" class="toast align-items-center text-white bg-primary border-0 p-2 me-3 my-2 show" role="alert" aria-live="assertive" aria-atomic="true"
                 data-filter-type1="{{$filterby}}" data-filter-value1="{{ $filterdata }}"
                    data-type = "{{$type}}"
                    data-role = "{{$role}}"
                >
                    <div class="d-flex">
                        <div class="toast-body">
                        <h5>
                            {{$filterdata}}
                        </h5>
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
                   <div id="toast-country-3" class="toast align-items-center text-white bg-primary border-0 p-2 me-3 my-2 show" role="alert" aria-live="assertive" aria-atomic="true"
                 data-filter-type1="{{$filterby1}}" data-filter-value1="{{ $filterdata1 }}"
                 data-type = "{{$type}}"
                 data-role = "{{$role}}"
                >
                    <div class="d-flex">
                        <div class="toast-body">
                        <h5>
                            {{$filterdata1}}
                        </h5>
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            @endif
        @endif
        {{-- old args 11 --}}
    @elseif(isset($arg) && is_array($arg) && count($arg)== 12)

        @if($filterby1 == 'country')
            <div id="toast-country-4" class="toast align-items-center text-white bg-primary border-0 p-2 me-3 my-2 show" role="alert" aria-live="assertive" aria-atomic="true"
             data-filter-type2="{{$filterby}}" data-filter-value2="{{ $filter }}"
             data-type = "{{$type}}"
             data-role = "{{$role}}"
            >
                <div class="d-flex">
                <div class="toast-body">
                    <h5>
                        {{$filter}}
                    </h5>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
            <div id="toast-country-5" class="toast align-items-center text-white bg-primary border-0 p-2 me-3 my-2 show" role="alert" aria-live="assertive" aria-atomic="true"
             data-filter-type2="{{$filterby1}}" data-filter-value2="{{ $filterdata }}"
            >
                <div class="d-flex">
                <div class="toast-body">
                    <h5>
                        {{$filterdata}}
                    </h5>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
            <div id="toast-country-6" class="toast align-items-center text-white bg-primary border-0 p-2 me-3 my-2 show" role="alert" aria-live="assertive" aria-atomic="true"
             data-filter-type2="{{$filterby2}}" data-filter-value2="{{ $filterdata1 }}"
             data-type = "{{$type}}"
             data-role = "{{$role}}"
            >
                <div class="d-flex">
                <div class="toast-body">
                    <h5>

                        {{$filterdata1}}
                    </h5>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @elseif($filterby1 == 'port')

            <div id="toast-unloading_port-1" class="toast align-items-center text-white bg-primary border-0 p-2 me-3 my-2 show" role="alert" aria-live="assertive" aria-atomic="true"
             data-filter-type2="{{$filterby}}" data-filter-value2="{{ $filter }}"
                    data-type = "{{$type}}"
                    data-role = "{{$role}}"
            >
                <div class="d-flex">
                <div class="toast-body">
                        <h5>
                            {{$filter}}
                        </h5>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
            <div id="toast-unloading_port-2" class="toast align-items-center text-white bg-primary border-0 p-2 me-3 my-2 show" role="alert" aria-live="assertive" aria-atomic="true"
             data-filter-type2="{{$filterby1}}" data-filter-value2="{{ $filterdata }}"
                                 data-type = "{{$type}}"
                    data-role = "{{$role}}"
            >
                <div class="d-flex">
                <div class="toast-body">
                    <h5>
                        {{$filterdata}}
                    </h5>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
            <div id="toast-unloading_port-3" class="toast align-items-center text-white bg-primary border-0 p-2 me-3 my-2 show" role="alert" aria-live="assertive" aria-atomic="true"
             data-filter-type2="{{$filterby2}}" data-filter-value2="{{ $filterdata1 }}"
                                 data-type = "{{$type}}"
                    data-role = "{{$role}}"
            >
                <div class="d-flex">
                <div class="toast-body">
                    <h5>
                        {{$filterdata1}}
                    </h5>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @endif
    @endif
</section>

