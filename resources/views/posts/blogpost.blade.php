<div class="blog-post">
    <h2 class="blog-post-title">
        <a href="/posts/{{ $post->id }}">
            {{ $post->title  }}
        </a>
    </h2>
    <p class="blog-post-meta">
        Posted By:
        @foreach($users as $user)
            @if($post->user_id == $user->id)
                {{ $user->name }}
            @endif
        @endforeach
        <br>
        At: {{ $post->created_at->toFormattedDateString() }}

    </p>

    {{ $post->description }}
</div><!-- /.blog-post -->