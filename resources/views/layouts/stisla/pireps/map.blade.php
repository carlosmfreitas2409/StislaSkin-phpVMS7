<div id="map" style="border-bottom-right-radius: .5rem;; border-bottom-left-radius: .5rem; width: 100%; height: 600px"></div>

@section('scripts')
    <script type="text/javascript">
        phpvms.map.render_route_map({
            pirep_uri: '{!! url('/api/pireps/'.$pirep->id.'/acars/geojson') !!}',
            route_points: {!! json_encode($map_features['planned_rte_points'])  !!},
            planned_route_line: {!! json_encode($map_features['planned_rte_line']) !!},
            actual_route_line: {!! json_encode($map_features['actual_route_line']) !!},
            actual_route_points: {!! json_encode($map_features['actual_route_points']) !!},
            aircraft_icon: '{!! public_asset('/assets/img/acars/aircraft.png') !!}',
        });
    </script>
@endsection
