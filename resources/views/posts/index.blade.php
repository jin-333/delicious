<x-app-layout>
    <x-slot name="head">
        <meta charset="UTF-8">
        <title>Tabetter</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </x-slot>

    <div>
        <!-- 検索フォーム -->
        <form action="{{ route('index') }}" method="GET">
            <input type="text" name="keyword" placeholder="キーワードを入力" value="{{ request('keyword') }}">
            <select name="category_id">
                <option value="">カテゴリーを選択</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            
            <div class="form-group">
                <label for="prefecture_id">都道府県</label>
                <select name="post[prefecture_id]" class="form-control">
                    <option value="">全て</option>
                    @foreach($prefectures as $prefecture)
                        <option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <button type="submit">検索</button>
        </form>
    </div>

    <h1>投稿フォーム</h1>
    <div class='posts'>
        @foreach ($posts as $post)
            <div class='post'>
                <h2 class='title'>
                    <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                </h2>
                <p>Category: {{ $post->category->name }}</p>
                <p>都道府県:{{ $prefecture->name}}</p>
                <p>{{ $post->full_address }}</p>
                <div id="map-{{ $post->id }}" class="map" style="width: 50%; height: 250px;"></div>
                <br>
                <!-- その他の投稿情報 -->
            </div>
        @endforeach
    </div>

    <br>
    <a href='/posts/create'>お店を投稿する</a>
    {{ $posts->links() }}
    
    <!-- スクリプトをビュー内で直接追加 -->
    <script>
        function initMap() {
            @foreach ($posts as $post)
                var geocoder = new google.maps.Geocoder();
                geocoder.geocode({ 'address': "{{ $post->full_address }}" }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        var map = new google.maps.Map(document.getElementById('map-{{ $post->id }}'), {
                            zoom: 15,
                            center: results[0].geometry.location
                        });
                        new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location
                            
                        });
                    } else {
                        console.error('Geocode was not successful for the following reason: ' + status);
                    }
                });
            @endforeach
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>
</x-app-layout>










