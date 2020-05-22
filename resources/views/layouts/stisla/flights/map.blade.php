<div id="map" style="border-bottom-right-radius: .5rem;; border-bottom-left-radius: .5rem; width: 100%; height: 600px"></div>

@section('scripts')
    <script type="text/javascript">
        phpvms.map.render_route_map({
            route_points: {!! json_encode($map_features['route_points']) !!},
            planned_route_line: {!! json_encode($map_features['planned_route_line']) !!},
            metar_wms: {!! json_encode(config('map.metar_wms')) !!},
        });
    </script>
@endsection
