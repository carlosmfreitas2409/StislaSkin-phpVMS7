{{--

If you want to edit this, you can reference the CheckWX API docs:
https://api.checkwx.com/#metar-decoded

--}}
@if(!$metar)
    <span style="font-size: 15px;">@lang('widgets.weather.nometar')</span>
@else
  <table class="table table-striped">
    <tr>
      <th scope="row">@lang('widgets.weather.conditions')</th>
      <td>
        {{ $metar['category'] }}
        {{ $metar['temperature'][$unit_temp] }}
        °{{strtoupper($unit_temp)}}
        @if($metar['visibility'])
          , @lang('widgets.weather.visibility') {{ $metar['visibility'][$unit_dist] }} {{$unit_dist}}
        @endif
        @if($metar['humidity'])
          , {{ $metar['humidity'] }}% @lang('widgets.weather.humidity')
        @endif
        @if($metar['dew_point'])
          , @lang('widgets.weather.dewpoint')
          {{ $metar['dew_point'][$unit_temp] }}
          °{{strtoupper($unit_temp)}}
        @endif
      </td>
    </tr>
    <tr>
      <th scope="row">@lang('widgets.weather.barometer')</th>
      <td>
        {{ number_format($metar['barometer']['hPa'], 2) }} hPa
        / {{ number_format($metar['barometer']['inHg'], 2) }} inHg
      </td>
    </tr>
    @if($metar['clouds'])
      <tr>
        <th scope="row">@lang('widgets.weather.clouds')</th>
        <td>
          @if($unit_alt === 'ft')
            {{$metar['clouds_report_ft']}}
          @else
            {{ $metar['clouds_report'] }}
          @endif
        </td>
      </tr>
    @endif
    <tr>
      <th scope="row">@lang('widgets.weather.wind')</th>
      <td>
        {{$metar['wind_speed']}} kts @lang('common.from') {{$metar['wind_direction_label']}}
        ({{$metar['wind_direction']}}°)
        @if($metar['wind_gust_speed'])
          @lang('widgets.weather.guststo') {{ $metar['wind_gust_speed'] }}
        @endif
      </td>
    </tr>
    <tr>
      <th scope="row">@lang('common.metar')</th>
      <td>
        <div style="line-height:1.5em;min-height: 3em;">
          {{ $metar['raw'] }}
        </div>
      </td>
    </tr>
    @if($metar['remarks'])
      <tr>
        <th scope="row">@lang('widgets.weather.remarks')</th>
        <td>
          {{ $metar['remarks'] }}
        </td>
      </tr>
    @endif
    <tr>
      <th scope="row">@lang('widgets.weather.updated')</th>
      <td>{{$metar['observed_time']}} ({{$metar['observed_age']}})</td>
    </tr>
  </table>
@endif
